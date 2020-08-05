<?php
   include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $name = $_POST["registerName"];
    $lastname = $_POST["registerLastName"];
    $curp = $_POST["registerCurp"];
    $typeUser = $_POST["registerTypeUser"];
    $email = $_POST["registerEmail"];
    $password = $_POST["registerPassword"];

    $user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'name' => $name, 
        'lastname' => $lastname,
        'curp' => $curp,
        'typeUser'=>$typeUser,
        'email' => $email, 
        'password' => $password
    ];

    try{
        $bulk->insert($user);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../log_in.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
