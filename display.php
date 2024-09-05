<?php
//include the database connection file
require_once "db_connect.php";

$sql="SELECT * FROM documents";

$result=$connection->query($sql);

// print_r($result);

$connection->close();
