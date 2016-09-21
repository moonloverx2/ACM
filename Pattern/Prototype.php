<?php

//抽象原型，定义克隆方法
abstract class  Prototype{
	abstract function Copy();
}

//具体原型
class ConcretePrototype extends Prototype{
	private $Name;
	public function SetName($Name)
	{
		$this->Name=$Name;
	}
	public function GetName()
	{
        return  "Name is ".$this->Name;		
	}
	public function Copy()
	{
		//浅拷贝
		//return  $this;
		
		//深拷贝1
		return clone $this;
		
		//深拷贝2
//		$tmp = serialize($this);
//		$tmp = unserialize($tmp);
//		return $tmp;
	}
}

$obj = new ConcretePrototype();

$obj->SetName("Michael");
$cloneobj = $obj->Copy();

echo $cloneobj->GetName();

?>