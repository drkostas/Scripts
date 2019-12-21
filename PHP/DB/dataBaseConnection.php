<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);
    include_once("passwords.php");
    class DataBaseConnection
    {
        protected static $connection;

        public static function getConnection()
        {        
            if (!self::$connection)
            {
                // self::$connection = new PDO('mysql:host=serverDB.rds.amazonaws.com:3306;dbname=DBNAME', 'username', 'password',  array(
                //                 PDO::ATTR_TIMEOUT => "10",
                //                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                //             ));
                // self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$connection = new PDO('mysql:host=localhost;dbname=localDBname', 'localDBname', 'localDBpassword');
            }
            return self::$connection;
        }
    }
?> 