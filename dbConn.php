<?php

class dbConn{
    //variable holding connection object
    protected static $db;
    //private construct
    private function __construct()
    {
        try {
            //assign PDO object to DB variable
            self::$db = new \PDO('mysql:host=' . CONNECTION .';dbname=' . DATABASE, USERNAME, PASSWORD );
            self::$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );

        } catch (\PDOException $e) {
            //output error
            echo "Connection Error: " . $e->getMessage();
        }
    }
    //get connection function
    public static function getConnection() {
        //guarantees single instance, if no connection, object exists, one will be created
        if (!self::$db) {
            new dbConn();
        }
        //return connection
        return self::$db;

    }
}
?>