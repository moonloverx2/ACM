<?php

//创建第一个抽象类
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


//创建第二个抽象类
abstract class Language{
	abstract function LanguageType();
}


//创建继承抽象类的实体类PHP/NET/Java
class PHP extends Language{
	function LanguageType()
	{
		echo 'PHP Program.';
	}
}

class NET extends Language{
	function LanguageType()
	{
		echo 'NET Program.';
	}
}

class Java extends Language{
	function LanguageType()
	{
		echo 'Java Program.';
	}
}

//为 DbConnection 和 Language 对象创建抽象工厂。
abstract class ProgramFactory{
     	abstract function GetDataBase();
     	abstract function GetLanguage();
}

//实现工厂，生成基于给定信息的实体类的对象微软/开源/甲骨文
class MicrosoftFactory extends ProgramFactory{
	public function GetDataBase()
	{
		return new MSSqlConnection(); 
	}	
	
	public function GetLanguage()
	{
		return new NET();
	}
}

class OpensourceFactory extends ProgramFactory{
	public function GetDataBase()
	{
		return new MySqlConnection();
	}

	public function GetLanguage()
	{
		return new PHP();
	}
}


class OracleFactory extends ProgramFactory{
	public function GetDataBase()
	{
		return new OracleConnection();
	}

	public function GetLanguage()
	{
		return new Java();
	}
}


//根据不同的工厂，生成不同的对象
$Factory = new OracleFactory();
$Factory->GetDataBase()->Connection();
$Factory->GetLanguage()->LanguageType();

?>





