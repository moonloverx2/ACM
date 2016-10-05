<?php
//总店-树根
abstract class Market{
	public $Name;
	abstract function Add(Market $Market);
	abstract function Remove(Market $Market);
	abstract function Display();
}

//分店-树枝
class MarketBranch extends Market{
	public $Markets = Array();
	function __construct($Name)
	{
		$this->Name = $Name;
	}
	public function Add(Market $Market)
	{
		array_push($this->Markets, $Market);
	}
	public function Remove(Market $Market)
	{
		$key = array_search($Market, $this->Markets);
		if($key !== false) unset($this->Markets[$key]);
	}
	public function Display()
	{
		echo " This is MarketBranch ".$this->Name;
		foreach($this->Markets as $Market){
			$Market->Display();
    	}
	}
}

//加盟店-叶子
class MarketJoin extends Market{
	function __construct($Name)
	{
		$this->Name = $Name;
	}
	public function Add(Market $Market)
	{
		//最底层不实现
	}
	public function Remove(Market $Market)
	{
		//最底层不实现
	}
	public function Display()
	{
		echo " This is MarketJoin ".$this->Name;
	}
}

//调用

//总店
$RootMarket = new MarketBranch("RootMarket");

//分店
$MarketBranch = new MarketBranch("MarketBranch");

//两家在分店加盟的加盟店
$MarketJoinA = new MarketJoin("MarketJoinA");
$MarketJoinB = new MarketJoin("MarketJoinB");
$MarketBranch->Add($MarketJoinA);
$MarketBranch->Add($MarketJoinB);

//分店属于总店
$RootMarket->Add($MarketBranch);

//显示
//$MarketBranch->Remove($MarketJoinA);
$RootMarket->Display();


?>