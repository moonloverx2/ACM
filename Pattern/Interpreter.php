<?php
//上下文类
class Context{
	public $Num;
	function Set($Num)
	{
		$this->Num = $Num;
	}
	function Get()
	{
		return $this->Num;
	}
}

//抽象解释器
abstract class AbstractExpreesion{
	abstract function Interpret(Context $Context);
}

//自加解释器
class PlusExpression extends AbstractExpreesion{
	function Interpret(Context $Context)
	{
		$Context->Num = $Context->Num+1;
	}
}

//自减解释器
class MinusExpression extends AbstractExpreesion{
	function Interpret(Context $Context)
	{
		$Context->Num = $Context->Num-1;
	}
}

//调用
//上下文
$Context = new Context();
$Context->Set(100);
//加减法
$PlusExpression = new  PlusExpression();
$MinusExpression = new MinusExpression();
//两次自加一次自减
$PlusExpression->Interpret($Context);
$PlusExpression->Interpret($Context);
$MinusExpression->Interpret($Context);
//输出
echo $Context->Get();

?>