<?php
	
	spl_autoload_register(function($class){
  		require_once 'classes/'.$class.'.php';
	});

	$system  = new Database;
	$baseurl = new BaseURL;
	$val     = new Validation;
	$session = new Session;
	$admin   = new Admin;
	$icistream = new iCistream;
	$search = new Search;
	$category = new Category;
?>