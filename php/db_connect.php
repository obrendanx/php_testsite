<?php
function OpenCon()
 {
 $dbhost = "192.168.1.5";
 $dbuser = "testuser";
 $dbpass = "Zx56Tt407.9s";
 $db = "test_database";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>