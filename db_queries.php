<?php
require_once(__DIR__.'/constants.php');

final class Queries {
    const CREATE_DATABASE = "CREATE DATABASE IF NOT EXISTS ".Constants::DB_NAME;

    const CREATE_USERS_TABLE = "CREATE TABLE IF NOT EXISTS ".Constants::USERS_TABLE_NAME
            ."(
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                surname VARCHAR(100) NOT NULL,
                email VARCHAR(50) NOT NULL,
                phonenumber VARCHAR(50) NOT NULL,
                message VARCHAR(500) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                )";

    const GET_ALL_USERS_QUERY = "SELECT * FROM ".Constants::USERS_TABLE_NAME;

    static function GET_USER_DATA($user_id) {
        return "SELECT * FROM ".Constants::USERS_TABLE_NAME." WHERE id = ". $user_id;
    }

        static function REGISTER_QUERY($name, $surname, $email, $phonenumber, $message) {
        return "INSERT INTO ". Constants::USERS_TABLE_NAME. 
        "(name, surname, email, phonenumber,message) VALUES ('".$name."','".$surname."','".$email."','".$phonenumber."','".$message."')";
    }



}