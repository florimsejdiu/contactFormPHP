<?php

$server_name="localhost";
$username="root";
$password="";

$connection = new mysqli($server_name, $username, $password);

if($connection->connect_error)
{
    die("Connection failed:{$connection->connect_error}");
}
echo "Connection established successfully";

$connection->select_db("contactForma_db");
