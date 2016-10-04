<?php
class DataBaseConnection{
	//定义私有静态变量，不能通过实例对象来访问
	private static $_instance;
	
	//测试变量
	public $DataType;
	
	//私有构造和克隆方法，防止new对象
	private function __construct(){
		
	}
	private function __clone(){
		
	}
	//唯一访问入库，返回单例对象
	public static function  GetInstance(){
		//如果没有实例化，则new一个,然后返回
		if (self::$_instance===null)
		{
			self::$_instance = new self();			
		}
		return self::$_instance;
	}
	
	//测试方法
    public function SetDbType($DataType)
	{
	    $this->DataType = $DataType;
	}
	public function GetDbType()
	{
		echo "DataBase is ".$this->DataType;
	}
}

//调用。不能再用以前那种new对象来调用了，需要用类来调取静态方法
$DB = DataBaseConnection::GetInstance();
$DB->SetDbType("Oracle");
$DB->GetDbType();

?>