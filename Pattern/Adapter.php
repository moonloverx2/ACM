<?php
//类适配器模式

//目标接口
 interface Target{
     function OperationOne();
     function OperationTwo();
 }

 // 需要适配的类
 class Adaptee{
     function OperationOne()
     {
         echo 'This is OperationOne.';
     }
 }
 
//适配器
 class Adapter extends Adaptee implements Target {
 function OperationTwo()
     {
         echo 'This is OperationTwo.';
     }
 }

 //调用
 $Adapter = new Adapter();
 $Adapter->OperationOne();
 $Adapter->OperationTwo();
 

 //对象适配器模式
 
 //目标接口
interface Target{
    function OperationOne();
    function OperationTwo();
}

 // 需要适配的类
class Adaptee{
    function OperationOne()
    {
        echo 'This is OperationOne.';
    }
}

//适配器
class Adapter implements Target {
    private $adaptee;
    function __construct($adaptee)
    {
        $this->adaptee = $adaptee;
    }
   function OperationOne()
    {
        return $this->adaptee->OperationOne();
    }
    function OperationTwo()
    {
        echo 'This is another OperationTwo.';
    }
}

 //调用
$Adapter = new Adapter(new Adaptee());
$Adapter->OperationOne();
$Adapter->OperationTwo();

?>