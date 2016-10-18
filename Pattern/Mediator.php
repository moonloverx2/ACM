<?php
//抽象同事类
abstract class Colleague {
	protected  $Number;

	public function  getNumber() {
		echo  $this->Number;
	}
	public function setNumBer($Number)
	{
        $this->Number = $Number;	
	}
	//这里加入中介
	 abstract function  setMediator($Number, Mediator $AM);
}

//具体同事类
class ColleagueA extends Colleague{
	function setMediator($Number, Mediator $AM)
	{
		$this->Number = $Number;
		//对其他同事通讯
		$AM->AaffectB();
		
	}
}

class ColleagueB extends Colleague{
	function setMediator($Number, Mediator $AM)
	{
		$this->Number = $Number;
		//对其他同事通讯
		$AM->BaffectA();

	}
}

//抽象中介者
abstract class Mediator {
	protected  $A;
	protected  $B;

	function __construct(Colleague $A, Colleague $B) {
		$this->A = $A;
		$this->B = $B;
	}
	
   abstract function AaffectB();

	abstract function BaffectA();

}

//具体中介类，实现具体通讯内容
class Concreteediator extends Mediator {

	//处理A对B的影响
	public function  AaffectB() {
		$Number = $this->A->getNumber();
		$this->B->setNumber($Number*100);
	}

	//处理B对A的影响
	public function BaffectA() {
		$Number = $this->B->getNumber();
		$this->A->setNumber($Number/100);
	}
}

//声明同事
$ColleagueA = new ColleagueA();
$ColleagueB = new ColleagueB();

//声明中介者
$Concreteediator = new Concreteediator($ColleagueA,$ColleagueB);

//调用
$ColleagueA->setMediator(100, $Concreteediator);
$ColleagueA->getNumber();
$ColleagueB->getNumber();

?>