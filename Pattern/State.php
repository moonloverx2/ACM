<?php
//电灯-context类
class Light{
	private $State;
	function __construct(LightState $State)
	{
		$this->State = $State;
	}
	function PressSwich()
	{
		$this->State->PressSwich($this);
	}
	function SetState(LightState $State)
	{
		$this->State = $State;
	}
	function GetState()
	{
		return $this->State;
	}
}

//电灯状态抽象类-State
abstract class LightState{
	//按开关
	abstract function PressSwich(Light $Light);
}

//关灯
class Off extends LightState{
	function PressSwich(Light $Light)
	{
		echo "turn off the light. ";
		$Light->SetState(new On());
	}
}

//开灯
class On extends LightState{
	function PressSwich(Light $Light)
	{
		echo "turn on the light. ";
		$Light->SetState(new Off());
	}
}

//调用
$Light = new Light(new On());
$Light->PressSwich();
$Light->PressSwich();


?>