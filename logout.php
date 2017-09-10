<?php

	require_once 'core/init.php';
	$session->start();

	if ($session->check("Email") == "FALSE")
    {
       header("location: ".$baseurl->get()."404.html");
    }
    else
    {
	   $session->delete();
   	   header("location: ".$baseurl->get()."admin.php");
    }
?>