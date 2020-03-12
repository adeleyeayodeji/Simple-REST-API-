<?php
    include "../include/autoload.php";
    header("Content-Type: application/json");

    if (isset($_POST["username"])) {
        $username = $_POST["username"];
        $lastname = $_POST["last"];
        $firstname = $_POST["first"];
        $id = $_POST["id"];

        //Creating an instance of a class
        $update_data = new UserController();
        $edit_response[] = $update_data->updateUserData($id, $username, $firstname, $lastname);
        echo json_encode($edit_response);
    }else{
        $error[] = array("message" => "POST update is not set");
        echo json_encode($error);
    }
?>
