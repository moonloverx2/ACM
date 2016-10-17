<?php
//抽象元素类
abstract class Element {
   abstract function  Accept(IVisitor $Visitor);
   abstract function DoSomething();
}

//访问者抽象类
abstract class IVisitor {
	abstract function Visit1(ConcreteElement1 $el1);
	abstract function Visit2(ConcreteElement2 $el2);
}

//具体元素类
class ConcreteElement1 extends Element {
	public function DoSomething(){
		echo  "this is element1. ";
	}

	public function Accept(IVisitor $Visitor) {
		$Visitor->Visit1($this);
	}
}

class ConcreteElement2 extends Element {
	public function DoSomething(){
		echo  "this is element2. ";
	}

	public function Accept(IVisitor $Visitor) {
		$Visitor->Visit2($this);
	}
}

//具体访问类
class Visitor extends IVisitor {

	public function Visit1(ConcreteElement1 $el1) {
		$el1->DoSomething();
	}

	public function Visit2(ConcreteElement2 $el2) {
		$el2->DoSomething();
	}
}

//对象结构 存储要访问的对象
class ObjectStructure {

	private $obj = array();


	public function addElement( $ele ) {
		array_push($this->obj, $ele);
	}

	public function handleRequest( IVisitor $Visitor ) {
		//遍历对象结构中的元素，接受访问
		foreach( $this->obj as $ele ) {
			$ele->Accept( $Visitor );
		}
	}
}

//调用
$Os = new ObjectStructure();
$Os->addElement(new ConcreteElement1());
$Os->addElement(new ConcreteElement2());

$Visitor = new Visitor();
$Os->handleRequest($Visitor);


?>