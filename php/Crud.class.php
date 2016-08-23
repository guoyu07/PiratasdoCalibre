<?php
	
	require_once 'DB.class.php';
	
	abstract class Crud extends DB
	{
		protected $table;
		
		abstract public function Create();
		abstract public function Read();
		abstract public function Update();
		abstract public function Delete();
		
	}
?>