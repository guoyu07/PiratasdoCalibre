<?php
	
	include 'Config.class.php';
	
	class DB
	{	
		private static $Instance;
		
		public static function getInstance()
		{
			if(!isset(self::$Instance))
			{
				try
				{
					self::$Instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
					self::$Instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					//$Pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
					self::$Instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				}
				catch(PDOException $e)
				{
					//var_dump($e);
					//echo $e->getMessage();
					echo "<h1>Não foi possível estabelecer uma conexão com o banco de dados!</h1>";
				}
			}
			
			return self::$Instance;
		}
		
		public static function Prepare($Query)
		{
			return self::getInstance()->Prepare($Query);
		}
	}
	
?>