<?php
//抽象模板
abstract class Account{
	//模板方法，给出了逻辑的骨架，而逻辑的组成是一些相应的抽象操作，它们推迟到子类去实现。
	function CalculateInterest()
	{
		$Money = $this->GetMoney();
		$InterestRate = $this->GetInterestRate();
		echo "The Interest is ".$Money*$InterestRate;
	}
	
	//一些抽象行为，放到子类去实现
	public abstract function GetMoney();
	public abstract function GetInterestRate();
}

//具体模板角色类

//普通帐号
class MoneyMarket extends Account{
	private $Money;
	function __construct($Money)
	{
		$this->Money = $Money;
	}
	function GetMoney()
	{
		return $this->Money;
	}
	function GetInterestRate()
	{
		return 0.045;
	}
}

//定期帐号
class CDAccount extends Account{
	private $Money;
	function __construct($Money)
	{
		$this->Money = $Money;
	}
	function GetMoney()
	{
		return $this->Money;
	}
	function GetInterestRate()
	{
		return 0.06;
	}
}

//调用
//普通帐号
$MoneyMarket = new MoneyMarket(2000000);
$MoneyMarket->CalculateInterest();

//定期帐号
$CDAccount = new CDAccount(2000000);
$CDAccount->CalculateInterest();


?>