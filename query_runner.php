<?php
require_once(__DIR__.'/db_queries.php');

class QueryRunner {
    private $connection = NULL;

    function __construct()
    {
        $this->connection = new mysqli(Constants::SERVER_NAME, Constants::USERNAME, Constants::PASSWORD);

        if($this->connection->connect_error)
        {
            die("Connection failed:{$this->connection->connect_error}");
        }
        $this->createDatabase();
        $this->createUsersTable();
    }

    private function createDatabase() {
        if($this->connection->query(Queries::CREATE_DATABASE) != TRUE)
        {
            printf("Error: %s", $this->connection->error);
        }
        $this->connection->select_db(Constants::DB_NAME);
    }

    private function createUsersTable() {
        if($this->connection->query(Queries::CREATE_USERS_TABLE) != TRUE)
        {
            printf("Error: %s", $this->connection->error);
        }
    }

    public function register() {
        $result=$this->connection->query(
            Queries::REGISTER_QUERY($_SESSION['name'],$_SESSION['surname'],
            $_SESSION['email'],$_SESSION['phonenumber'], $_SESSION['message']));

        if(!$result) {
            $_SESSION["register_error"] = "Email is already in use!";
        }

        return $result;
    }

    public function update_user($user_id) {
        $result=$this->connection->query(
            Queries::UPDATE_QUERY($user_id, $_SESSION['name'],
            $_SESSION['email'],$_SESSION['password']));

        if(!$result) {
            return false;
        }

        return $result;
    }

    public function get_all_users() {
        $result=$this->connection->query(Queries::GET_ALL_USERS_QUERY);
        if($result->num_rows > 0)
        {
            return $result;       
        }
        return [];
    }

    public function get_user_data($user_id) {
        $result=$this->connection->query(
            Queries::GET_USER_DATA($user_id));

        if(!$result) {
            header("Location: home.php");
        }

        return $result->fetch_assoc();
    }

    public function delete_user($user_id){
        $result=$this->connection->query(
            Queries::DELETE_QUERY($user_id));
            
        return $result;
    }
}