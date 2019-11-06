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

$create_users_table = "CREATE TABLE users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    surname VARCHAR(100) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phonenumber VARCHAR(50) NOT NULL,
    message VARCHAR(500) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if($connection->query($create_users_table) === TRUE)
{
    printf("Query executed successfully: %s", $create_users_table);
}
else
{
    printf("Error: %s", $connection->error);
}