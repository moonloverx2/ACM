 <?php
//子系统角色
class CarDoor{
	public function Open()
	{
		echo "Open the door. ";
	}
	public function Close()
	{
		echo "Close the door. ";
	}
}
class Engine{
	public function Start()
	{
		echo "Start Engine. ";
	}
	public function Stop()
	{
		echo "Stop Engine. ";
	}
}
class Accelerator{
	public function Run()
	{
		echo "Press the accelerator. ";
	}
}
class Breaking {

	public function Run()
	{
		echo "Break. ";
	}
}

//如果不采用外观模式，那么开车和停车的调用如下
$CarDoor = new CarDoor();
$Engine = new Engine();
$Accelerator = new Accelerator();
$Breaking = new Breaking();

//开车
$CarDoor->Open();
$Engine->Start();
$Accelerator->Run();

//停车
$Breaking->Run();
$Engine->Stop();
$CarDoor->Close();

//采用外观模式.定义外观角色
class Facade{
	private $CarDoor;
	private $Engine;
	private $Accelerator;
	private $Breaking;
	
	function __construct()
	{
		$this->CarDoor = new CarDoor();
		$this->Engine = new Engine();
		$this->Accelerator = new Accelerator();
		$this->Breaking = new Breaking();
	}
	
	public function Start()
	{
		$this->CarDoor->Open();
		$this->Engine->Start();
		$this->Accelerator->Run();
	}
	
	public function Stop()
	{
		$this->Breaking->Run();
		$this->Engine->Stop();
		$this->CarDoor->Close();
	}
	
}

//调用外观模式
$Facade = new Facade();
$Facade->Start();
$Facade->Stop();

?>

