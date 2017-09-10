<?php
   require 'core/init.php';
   $Result = "";

   $session->start();

   if ($session->check("Email") == "FALSE")
   {
      header("location: ".$baseurl->get()."404.html");
   }
   
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>iCiStream</title>
   <link rel="stylesheet" type="text/css" href="assets/css/font.css">
   <link rel="stylesheet" type="text/css" href="assets/css/style.css">
   <link rel="stylesheet" type="text/css" href="assets/fontawesome/font-awesome.css">
   <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
   <script src="assets/js/sweetalert.min.js"></script>
   <link rel="stylesheet" type="text/css" href="assets/css/sweetalert.css">
</head>
<body>