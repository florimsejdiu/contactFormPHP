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
$connection->select_db("contactForm_db");

$create_database = "CREATE DATABASE contactForm_db";

if($connection->query($create_database) === TRUE)
{
    printf("Query executed successfully: %s", $create_database);
}
else
{
    printf("Error: %s", $connection->error);
}