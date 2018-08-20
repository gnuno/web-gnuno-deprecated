<?php

class ConexionMySQL{


	private function __construct(){}

	static function conectar(){

        $opciones  = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
		$link = new PDO(
			'mysql:host='. DB_HOST . ';dbname=' . DB_NAME,
			DB_USER,
            DB_PASSWORD,
            $opciones);
		
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		return $link;
	}	
}