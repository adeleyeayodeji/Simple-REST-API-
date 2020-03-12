<?php
    include "../include/autoload.php";
    //Creating an instance of a class
    $viewUsers = new UserView();
    echo $viewUsers->viewUsers();

?>