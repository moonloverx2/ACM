<?php

//抽象主题
abstract class Subject{
	//添加删除需要被通知的观察者
	abstract function Add(Observer $Observer);
	abstract function Remove(Observer $Observer);
	
	//通知观察者
	abstract function SendMesg();
}

//抽象观察者
abstract class Observer{
	//根据通知做相应的操作
	abstract function Update();
}

//具体的主题
class ConcreteSubject extends Subject{
	//所有观察者
	private $Observers = array();
	public function Add(Observer $Observer)
	{
		array_push($this->Observers, $Observer);
	}
	public function Remove(Observer $Observer)
	{
		$key = array_search($Observer, $this->Observers);
		if($key !== false) unset($this->Observers[$key]);
	}
	public function SendMesg()
	{
		for ($i=0;$i<count($this->Observers);$i++)
		{
			$this->Observers[$i]->Update();
		}
	}
}

//具体的观察者
class ConcreteObserver extends Observer{
	private $Name;
	function __construct($Name)
	{
		$this->Name = $Name;
	}
	function Update()
	{
		echo $this->Name." has received the news. ";
	}
}

//调用
$Subject = new ConcreteSubject();
$ObserverA = new ConcreteObserver("ObserverA");
$ObserverB = new ConcreteObserver("ObserverB");
$Subject->Add($ObserverA);
$Subject->Add($ObserverB);

//发送通知
$Subject->SendMesg();

?>