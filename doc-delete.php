<?php
//include the database connection file
require_once "db_connect.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $sql="DELETE FROM documents WHERE id=$id";
    if($connection->query($sql)===TRUE){
        echo"data deleted sucessfully";
        header("Location: users.php");

    }else{
        echo "Error Deleting Data".$connection->error;
    }
}
$connection->close();

