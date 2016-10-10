<?php
//抽象迭代器 由于Iterator是关键字所有用MyIterator
abstract class MyIterator{
	//第一个
	abstract function First();
	//下一个  
    abstract function Next();
    //是否是最后一个  
    abstract function IsDone();
    //当前对象  
    abstract function CurrentItem();  
}

//具体的迭代器--不带聚集的
class ConcreteIterator extends MyIterator{
	private $Aggregate;
	private $Current = 0;
    function __construct(Array $Aggregate)
    {
    	$this->Aggregate = $Aggregate;
    }
    function First()
    {
    	return $this->Aggregate[0];
    }
    function Next()
    {
    	$this->Current++;
    	if($this->Current<count($this->Aggregate))
    	{
    	    return $this->Aggregate[$this->Current];	
    	}
    	else
        {
    	    return null;	
    	}    	
    }
    function IsDone()
    {    	
    	return $this->Current>=count($this->Aggregate)?true:false;
    }
    function CurrentItem()
    {
    	return $this->Aggregate[$this->Current];
    }
}

//调用

$Testarray = array('a','b','c');
$ConcreteIterator = new ConcreteIterator($Testarray);
while (!$ConcreteIterator->IsDone())
{	
	echo $ConcreteIterator->CurrentItem()." it's your turn.";
	$ConcreteIterator->Next();
}


////抽象聚合
//abstract class Aggregate  {
//	abstract function CreateIterator();
//}
//
////具体的迭代器
//class ConcreteIterator extends MyIterator{
//	private $Aggregate;
//	private $Current = 0;
//    function __construct(ConcreteAggregate $Aggregate)
//    {
//    	$this->Aggregate = $Aggregate;
//    }
//    function First()
//    {
//    	return $this->Aggregate->Aggregates[0];
//    }
//    function Next()
//    {
//    	$this->Current++;
//    	if($this->Current<$this->Aggregate->Count())
//    	{
//    	    return $this->Aggregate->Aggregates[$this->Current];	
//    	}
//    	else
//        {
//    	    return null;	
//    	}    	
//    }
//    function IsDone()
//    {    	
//    	return $this->Current>=$this->Aggregate->Count()?true:false;
//    }
//    function CurrentItem()
//    {
//    	return $this->Aggregate->Aggregates[$this->Current];
//    }
//}
//
////具体的聚合
//class ConcreteAggregate extends Aggregate{
//	public  $Aggregates = array();
//	public function CreateIterator()
//	{
//		return new ConcreteIterator($this);
//	}
//	
//	//返回聚集总个数
//	public function Count()
//	{
//		return count($this->Aggregates);
//	}
//}
//
////测试类
//class Test{
//	public $Name;
//	function __construct($Name)
//	{
//		$this->Name = $Name;
//	}
//	public function GetName()
//	{
//		echo $this->Name;
//	}
//}
//
////调用
//$TestA = new Test("DaLi");
//$TestB = new Test("ErGou");
//
//$ConcreteAggregate = new ConcreteAggregate();
//$ConcreteAggregate->Aggregates = array($TestA,$TestB);
//$ConcreteIterator = $ConcreteAggregate->CreateIterator();
//while (!$ConcreteIterator->IsDone())
//{	
//	echo $ConcreteIterator->CurrentItem()->GetName()." it's your turn.";
//	$ConcreteIterator->Next();
//}

?>