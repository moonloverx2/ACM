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

//创建一个工厂，生成基于给定信息的实体类的对象
class ConnectionFactory{
	public static function GetConnection($DbType)
	{
		switch ($DbType) {
			case 'MSSql' :
				return new MSSqlConnection ();
				break;
			case 'MySql' :
				return new MySqlConnection ();
				break;
			case 'Oracle' :
				return new OracleConnection ();
				break;
		}
	}
	
}


//根据传入的值来生成不同的对象，并使用各自的方法
$Connection = ConnectionFactory::GetConnection('Oracle');
$Connection->Connection();


?>




