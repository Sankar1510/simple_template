<?php

$servername="localhost";
$username="root";
$password="";
$dbname="employs";

//create connection
$connection = new mysqli($servername,$username,$password,$dbname);

//check connection

if($connection->connect_error){
    die("connection failed:".$connection->connect_error);
}

