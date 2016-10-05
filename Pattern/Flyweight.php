<?php
//抽象类
abstract class Flyweight{
	public $Name;
	abstract function ShowName();
}

//具体实现
class ConcreteFlyweight extends Flyweight{
	function __construct($Name)
	{
		$this->Name = $Name;
	}
	function ShowName()
	{
		echo " Name is ".$this->Name;
	}
}

//一个工厂,如果有则返回，没有则新建
class FlyweightFactory{
	private $Flyweights = array();
	function GetFlyweight($Name)
	{
		if(isset($this->Flyweights[$Name]))
		{
			return $this->Flyweights[$Name];
		}
		else 
		{
			$Flyweight = new ConcreteFlyweight($Name);
			$this->Flyweights[$Name] = $Flyweight;
			return $Flyweight;
		}
	}
	function GetSize()
	{
		echo  " The size of the Array is ".count($this->Flyweights);
	}
}

//调用，创建工厂，根据不同name得到不同对象
$Factory = new FlyweightFactory();
$Fly1 = $Factory->GetFlyweight("Google");
$Fly2 = $Factory->GetFlyweight("Baidu");
$Fly3 = $Factory->GetFlyweight("Google");
$Fly4 = $Factory->GetFlyweight("Google");
$Fly5 = $Factory->GetFlyweight("Google");

//执行显示方法
$Fly1->ShowName();
$Fly2->ShowName();
$Fly3->ShowName();
$Fly4->ShowName();
$Fly5->ShowName();

//显示对象个数，输出2
$Factory->GetSize();
?>