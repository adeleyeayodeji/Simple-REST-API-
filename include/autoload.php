<?php

    spl_autoload_register("loadclass");
    
    function loadclass($classname)
    {
        $path = "Class/";
        $extention = ".php";
        $fullpath = $path.$classname.$extention;

        include $fullpath;
    }

?>