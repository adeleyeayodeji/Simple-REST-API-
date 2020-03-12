<?php

include "../include/autoload.php";
//Json response
header("Content-Type: application/json");
//Get user id
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    //Creating an instance of a class
    $loaddata = new UserController();
    //Delete user data
    $response[] = $loaddata->userDeleteById($id);
    echo json_encode($response);
}else{
        //if id not found
        $error[] = array("message" => "Unique ID is needed");
        echo json_encode($error);
}
?>