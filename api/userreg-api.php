<?php
    include "../include/autoload.php";

    header("Content-Type: application/json");

    if (isset($_POST["username"])) {
        //Getting details from the form
        $username = $_POST["username"];
        $firstname = $_POST["first"];
        $lastname = $_POST["last"];

        //Creating an instance of a Class
        $new_user = new UserController();
        $response[] = $new_user->addNewUser($username, $firstname, $lastname);
        echo json_encode($response);
    }else{
        $error[] = array("message" => "POST username is not set");
        echo json_encode($error);
    }


?>