<?php

$servername = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "logintest";

$conn = msqli_connect($servername,$dBUsername,$dBPassword,$dBName);

 if (!$conn) {
   die("connection failed: ".mysqli_connect_error())
 }
