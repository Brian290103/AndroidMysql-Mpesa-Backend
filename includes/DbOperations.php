<?php

class DbOperations
{

    private  $con;

    function __construct()
    {

        require_once dirname(__FILE__) . '/DbConnect.php';

        $db = new DbConnect();

        $this->con = $db->connect();
    }

    // CURD

    // 1. CREATE

    function createUser($username, $pass, $email)
    {
        $password = md5($pass);
        $stmt = $this->con->prepare("INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES (NULL, ?, ?, ?, current_timestamp());");

        $stmt->bind_param("sss", $username, $password, $email);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
