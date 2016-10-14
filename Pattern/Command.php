<?php
//命令抽象类
abstract class Command{
	//执行方法
	abstract function Excute();
}

//具体命令类-可以根据不同情况有多个继承具体类
class ConcreteCommand extends Command{
	private $Receiver;
	function __construct(Receiver $Receiver)
	{
		$this->Receiver = $Receiver;
	}
	function Excute()
	{
		$this->Receiver->DoSomething();
	}
}

//接受者类
class Receiver{
	//定义接受者要做的事情，可以有很多
	function DoSomething()
	{
		echo "Receiver do something.";
	}
}

//调用者
class Invoker{
	private $Command;
	function __construct(Command $Command)
	{
		$this->Command = $Command;
	}
	function Action()
	{
		$this->Command->Excute();
	}
}

//调用
//不使用调用者类调用
$Receiver = new  Receiver();
$Command = new ConcreteCommand($Receiver);
$Command->Excute();

//使用调用者类
$Invoker = new Invoker($Command);
$Invoker->Action();
?>