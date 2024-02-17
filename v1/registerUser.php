<?php

require_once '../includes/DbOperations.php';


// Create a  associative array
$response = array();

// Check if there is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
        // Operate the data further

        $db = new DbOperations();

        if ($db->createUser(
            $_POST['username'],
            $_POST['password'],
            $_POST['email']
        )) {
            $response["error"] = false;
            $response["message"] = "User registered succefully";
        } else {
            $response["error"] = true;
            $response["message"] = "Some error occured. Please try again";
        }
    } else {
        $response["error"] = true;
        $response["message"] = "Required fields are missing";
    }
} else {
    $response["error"] = true;
    $response["message"] = "Invalid Request";
}

// Display the response in JSON format
echo json_encode($response);
