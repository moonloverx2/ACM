<?php
//抽象处理类
abstract  class Handler{
	//持有下一个处理请求的对象
	protected $successor;
	//赋值
	function SetSuccessor(Handler $Handler)
	{
		$this->successor = $Handler;
	}
	//获取对象
	function GetSuccessor()
	{
		return $this->successor;
	}
	abstract function Handle($Name,$Count);
} 

//项目经理-能批准一天的假期
class ProjectManager extends Handler{
	//进行处理
	function Handle($Name, $Count)
	{
		if($Count<1)
		{
			echo $Name.", ProjectManager agreed to your application.";
		}
		else
		{
			if(parent::GetSuccessor()!=null)
			{
				parent::GetSuccessor()->Handle($Name, $Count);
			}
		}
	}
}

//部门经理-能批准2天的假期
class DeptManager  extends Handler{
	//进行处理
	function Handle($Name, $Count)
	{
		if($Count<2)
		{
			echo $Name.", DeptManager agreed to your application.";
		}
		else
		{
			if(parent::GetSuccessor()!=null)
			{
				parent::GetSuccessor()->Handle($Name, $Count);
			}
		}
	}
}

//总经理-都能批准
class GeneralManager extends Handler{
	//进行处理
	function Handle($Name, $Count)
	{
		if($Count>0)
		{
			echo $Name.", GeneralManager agreed to your application.";
		}
		else
		{
			if(parent::GetSuccessor()!=null)
			{
				parent::GetSuccessor()->Handle($Name, $Count);
			}
		}
	}
}

//调用
$ProjectManager = new ProjectManager();
$DeptManager = new DeptManager();
$GeneralManager = new GeneralManager();

//项目经理装载下一个处理对象-部门经理
$ProjectManager->SetSuccessor($DeptManager);
//部门经理装载下一个处理对象-总经理
$DeptManager->SetSuccessor($GeneralManager);

//Dali对项目经理请假
$ProjectManager->Handle("DaLi", 1000);

?>