<?php

    class Db 
    {
        private static $host = "localhost";
        private static $user = "root";
        private static $pass = "";
        private static $db = "restapi";

        protected function connect()
        {
            $data_source_name = "mysql:host=".self::$host.";dbname=".self::$db;
            $conn = new PDO($data_source_name, self::$user, self::$pass);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $conn;
        }
    }
    