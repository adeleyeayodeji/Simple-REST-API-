<?php
    //Fix cross Origin
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

    spl_autoload_register("loadclass");
    
    function loadclass($classname)
    {
        $path = "Class/";
        $extention = ".php";
        $fullpath = $path.$classname.$extention;

        include $fullpath;
    }

?>
