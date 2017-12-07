<?php

//turn on debugging messages
ini_set('display_errors', 'On');
error_reporting(E_ALL);

define ('DATABASE', 'dg457');
define ('USERNAME', 'dg457');
define ('PASSWORD', 'xx0YWWEe');
define ('CONNECTION', 'sql1.njit.edu');
    
//autoloader class to allow for any file or directory
class Manage {
    public static function autoload($class){

        include $class . '.php';
    }

}

spl_autoload_register(array('Manage', 'autoload'));

$obj = new main();
class main {
    public function __construct(){

        //print all outputs
        $form = '<form method="post" enctype="multipart/form-data">';
        $form .= '<h1>Table: Accounts</h1>h1>';

        //select all records
        $form .= '<h2>Select All Records</h2>';
        $records = accounts::findAll();
        $tableSet = htmlTable::generateTablefromMultiArray($records);
        $form .= $tableSet;

        //Find one record
        $form .= '<h2>Select one record</h2>';
        $id=3;
        $records = accounts::findOne($id);
        $tableSet = htmlTable::generateTablefromOnerecord($records);
        $form .= '<h2>Retrieval of record by id: '.$id.'</h2>';
        $form .= $tableSet;

        //Insert one record
        $form .= '<h2>Insert one record</h2>';
        $record = new account();
        $record->email="goofy@disney.com";
        $record->fname-"Big";
        $record->lname="Dog";
        $record->phone="555-123-4567";
        $record->birthday="01-01-1938";
        $record->gender="male";
        $record->password="98765";
        $last_id = $record->save();
        $records = accounts::findAll();
        $tableSet = htmlTable::generateTablefromMultiArray($records);
        $form .= '<h2>Inserted record</h2>';
        $form .= $tableSet;

        //Update one record
        $form .= '<h2>Update one record</h2>';
        $records = accounts::findOne($last_id);
        $record = new account();
        $record->id=$records->id;
        $record->birthday="02-02-1940";
        $record->save();
        $form .= '<h2>Record update with id: ' .$records->id.'</h2>';
        $records = accounts::findAll();
        $tableSet = htmlTable::generateTablefromMultiArray($records);
        $form .= $tableSet;

        //Delete one record
        $form .= '<h2>Delete one record</h2>';
        $records = accounts::findOne($lastInsertedId);
        $record = new account();
        $record->id=$records->id;
        $records->delete();
        $form .= '<h2>Completed deletion</h2>';
        $records = accounts::findAll();
        $tableSet = htmlTable::generateTablefromMultiArray($records);
        $form .= $tableSet;

        $form .= '<h1>Table: Todos</h1>';

        //Select all records
        $form .= '<h2>Select all records</h2>';
        $records = todos::findAll();
        $tableSet = htmlTable::generateTablefromMultiArray($records);
        $form .= $tableSet;

        //Select one record
        $form .= '<h2>Select one record</h2>';
        $id=7;
        $records = todos::findOne($id);
        $tableGen = htmlTable::generateTableFromOneRecord($records);
        $form .= '<h3>Record retrieved with id: '.$id.'</h3>';
        $form .= $tableGen;

        //Insert one record
        $form .= '<h2>Insert one record</h2>';
        $record = new todo();
        $record->owneremail="firstone@njit.com";
        $record->ownerid=8;
        $record->createddate="01-01-2001";
        $record->duedate="02-02-2002";
        $record->message="newly admitted";
        $record->isdone=2;
        $lastInsertedId=$record->save();
        $records = todos::findAll();
        $tableGen = htmlTable::genarateTableFromMultiArray($records);
        $form .= '<h3>After Inserting</h3>';
        $form .= $tableGen;

        //Update one record
        $form .= '<h2>Update one record</h2>';
        $records = todos::findOne($lastInsertedId);
        $record = new todo();
        $record->id=$records->id;
        $record->ownerid="8";
        $record->message="inital semester";
        $record->save();
        $form .= '<h3>Record update with id: '.$records->id.'</h3>';
        $records = todos::findAll();
        $tableGen = htmlTable::genarateTableFromMultiArray($records);
        $form .= $tableGen;

        //Delete one record
        $form .= '<h2>Delete One Record</h2>';
        $records = todos::findOne($lastInsertedId);
        $record= new todo();
        $record->id=$records->id;
        $record->delete();
        $form .= '<h3>Record with id: '.$records->id.' is deleted</h3>';
        $form .= '<h3>Deletion completed</h3>';
        $records = todos::findAll();
        $tableGen = htmlTable::genarateTableFromMultiArray($records);
        $form .= $tableGen;
        $form .= '</form> ';
        print($form);


    }
}
?>



