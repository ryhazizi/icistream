<?php

	class Database 
  {

		private $Server     = "localhost";
		private $Username   = "root";
		private $Password   = "";
		private $Database   = "icistream";
		private $Mysqli;
		private static $Connection = null;

		public function __construct()
		{
		  $this->Mysqli = new mysqli($this->Server, $this->Username, $this->Password, $this->Database);

		}

		public static function getConnection()
		{
    	   if (!isset(self::$Connection))
    	   {
              self::$Connection = new Database();
           }
             return self::$Connection;
    }

    public function query($sql)
    {
      return $this->Mysqli->query($sql);
    }

	}


?>