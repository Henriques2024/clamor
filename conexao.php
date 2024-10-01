<?php

//define("servername", "localhost");
//define("username", "root");
//define("password", "");


//$conn = new MySQLi(servername, username,password, dbname);
   
$servername= "localhost";
$username= "root";
$password=""; 

    
$conn = new PDO ("mysql:host=$servername;dbname=clamor", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//} catch (PDOException $e) {

  //echo '<br>'.$e->getMessage();
//exit();

    ?>