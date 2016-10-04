<?php
//抽象街道类
abstract class Road{
	public  $Car;
	abstract function Run();
}

//抽象车类
abstract class Auto{
	abstract function GetCar();
}

//街道
class Street extends Road{
	function Run()
	{
		$this->Car->GetCar();
		echo 'on the street.';
	}
}

//高速公路
class SpeedRoad extends Road{
	function Run()
	{
		$this->Car->GetCar();
		echo 'on the speedroad.';
	}
}

//小汽车
class Car extends Auto{
	function GetCar()
	{
		echo 'A Car is running ';
	}
}

//公交车
class Bus extends Auto{
	function GetCar()
	{
		echo 'A Bus is running ';
	}
}

//调用
//高速公路上跑小汽车
$SpeedRoad = new SpeedRoad();
$SpeedRoad->Car = new Car();
$SpeedRoad->Run();

?>