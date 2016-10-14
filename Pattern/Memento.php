<?php
//发起者
class Originator{
	//备份的数据，可以任何对象
	private $State;
	function SetState($State)
	{
		$this->State = $State;
	}
	function GetState()
	{
		echo " State is ".$this->State;
	}
	//得到一个新的备份
	function CreateMemento()
	{
		return new Memento($this->State);
	}
	//从备份中恢复数据
	function RestoreMemento(Memento $Memento)
	{
		$this->SetState($Memento->GetState());
	}
}

//备忘录
class Memento{
	private $State;
	//备份
	function __construct($State)
	{
		$this->State = $State;
	}
   function SetState($State)
	{
		$this->State = $State;
	}
	//获取备份
	function GetState()
	{
		return  $this->State;
	}
}

//管理者
class Caretaker{
	private $Memento;
	function __construct(Memento $Memento)
	{
		$this->Memento = $Memento;
	}
	function  GetMemento(){
		return $this->Memento;
	}
	function SetMemento(Memento $Memento){
		$this->Memento = $Memento;
	}
}

//调用
//发起者对象-赋值
$Originator = new Originator();
$Originator->SetState("StateA");
$Originator->GetState();

//备份管理者进行备份
$Caretaker = new Caretaker($Originator->CreateMemento());

//发起者修改数据
$Originator->SetState("StateB");
$Originator->GetState();

//进行备份恢复
$Originator->RestoreMemento($Caretaker->GetMemento());
$Originator->GetState();


?>