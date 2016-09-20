<?php

//产品类,测试数据“程序”
class Program{
	public $DataBase;
	public $Language;
	public function SetDataBase($DataBase)
	{
		$this->DataBase = $DataBase;
	}
	public function SetLanguage($Language)
	{		
		$this->Language = $Language;
	}
	public function ShowInfo()
	{
		echo "DataBase is ".$this->DataBase." and Language is ".$this->Language;
	}
}

//抽象创造者，一般包含创造和返回两个方法，规范产品的组建，一般是由子类实现。
abstract class Builder{
	abstract function CreateProgram($DataBase,$Language); 
	abstract function GetProgram(); 
}

//创造者，真正实现功能的类，并且返回一个组建好的对象
class ConcreteBuilder extends Builder{
	private $Program;
	function __construct()
	{
		$this->Program = new Program();
	}
	public function CreateProgram($DataBase,$Language)
	{
		$this->Program->SetDataBase($DataBase);		
		$this->Program->SetLanguage($Language);
	}
	public function GetProgram()
	{
		return $this->Program;
	}	
}

//导演类，用于统一组装流程
class Director{
	private  $builder;
	function __construct()
	{
		$this->builder = new ConcreteBuilder();
	}
	function GetnewProgram($DataBase,$Language)
	{
		$this->builder->CreateProgram($DataBase,$Language);
		return $this->builder->GetProgram();
	}
}

$Client = new Director();
$Program = $Client->GetnewProgram("Mysql", "PHP");
$Program->ShowInfo();
?>




