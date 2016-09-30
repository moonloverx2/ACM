<?php
//定义接口
interface CarShop
{
   public function SellCar();	
}

//定义代理
class PsoxyCarShop implements CarShop{
	private $Shop;
	function __construct(CarShop $Shop){
		$this->Shop = $Shop;
	}
	
	public function SellCar()
	{
		$this->Shop->SellCar();
	}
}

//具体接口代理商
class ConcreteCarShop implements CarShop
{
	private $CarName;
	function __construct($CarName)
	{
		$this->CarName = $CarName;
	}
	public function SellCar()
	{
		echo 'Sell a  '.$this->CarName;
	} 
}

//调用
$Car = new ConcreteCarShop('Mercedes');
$Shop = new PsoxyCarShop($Car);
$Shop->SellCar();
?>