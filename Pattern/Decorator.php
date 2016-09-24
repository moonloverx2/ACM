<?php
//被装饰者的抽象类
abstract class Component{
	abstract function Operation();
}

//装饰者抽象类
abstract class Decorator extends Component{
	protected $Component;
	function __construct(Component $Component){
		$this->Component = $Component;
	}	
	public function Operation()
	{
		$this->Component->Operation();
	}
}

//具体的被装饰者类
class  ConcreteComponent extends Component{
	public function Operation()
	{
		echo ' This is ConcreteComponent. ';
	}
}

//具体的装饰者
class ConcreteDecoratorOne extends Decorator{
	public function __construct(Component $Component)
	{
		parent::__construct($Component);
	}	
	public function Operation()
	{
		parent::Operation();
		$this->AddOperationOne();
	}	
	public function AddOperationOne()
	{
		echo ' Add the first Operation. ';
	}
}
class ConcreteDecoratorTwo extends Decorator{
	public function __construct(Component $Component)
	{
		parent::__construct($Component);
	}	
	public function Operation()
	{
		parent::Operation();
		$this->AddOperationTwo();
	}	
	public function AddOperationTwo()
	{
		echo ' Add the second Operation. ';
	}
}

//调用
$ConcreteComponent = new ConcreteComponent();
$ConcreteDecoratorOne = new ConcreteDecoratorOne($ConcreteComponent);
$ConcreteDecoratorOne->Operation();
$ConcreteDecoratorTwo = new ConcreteDecoratorTwo($ConcreteDecoratorOne);
$ConcreteDecoratorTwo->Operation();
?>