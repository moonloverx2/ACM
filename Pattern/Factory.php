<?php

//创建抽象类
abstract class  DbConnection{
   abstract public function Connection();
}

//创建继承抽象类的实体类MSSQL/MySql/Oracle
class MSSqlConnection extends DbConnection{
    function Connection()
     {
         echo 'MSSql Connection.'; 	
     }	
}

class MySqlConnection extends DbConnection{
	function Connection()
	{
		echo 'MySql Connection.';
	}
}

class OracleConnection extends DbConnection{
	function Connection()
	{
		echo 'Oracle Connection.';
	}
}

//创建抽象工厂
abstract class AbstractFactory{
	abstract  static function CreateConnection();
}

//具体工厂
class MSSqlFactory extends AbstractFactory{
	public static function CreateConnection()
	{
		return new MSSqlConnection();
	}
}

class MySqlFactory extends AbstractFactory{
	public static function CreateConnection()
	{
		return new MySqlConnection();
	}
}

class OracleFactory extends AbstractFactory{
	public static function CreateConnection()
	{
		return new OracleConnection();
	}
}


//根据不同的工厂生成不同的对象，并使用各自的方法
$Connection = OracleFactory::CreateConnection();
$Connection->Connection();

?>




