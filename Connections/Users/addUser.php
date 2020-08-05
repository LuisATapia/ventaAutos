<?php
   include 'db.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $name = $_POST["registerName"];
    $lastname = $_POST["registerLastName"];
    $curp = $_POST["registerCurp"];
    $typeUser = $_POST["registerTypeUser"];
    $email = $_POST["registerEmail"];
    $password = $_POST["registerPassword"];
    $bank  = $_POST["registerBank"];
    $numCard=$_POST["registerNumCard"];
    $dateExp=$_POST["registerExp"];
    $codeCvv=$_POST["registerCvv"];
    $money=$_POST["registerMoney"];
    

    $user = [
        '_id' => new MongoDB\BSON\ObjectId,
        'name' => $name, 
        'lastname' => $lastname,
        'curp' => $curp,
        'typeUser'=>$typeUser,
        'email' => $email, 
        'password' => $password,
        'card'=>
        [
            'numCard'=>$numCard,
            'bank'=>$bank,
            'dateExp'=>$dateExp,
            'codeCvv'=>$codeCvv,
            'money'=>$money,
        ]
    ];

    try{
        $bulk->insert($user);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../log_in.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
/*******************************/
try {
    $bulk->update(
        ['_id' => new MongoDB\BSON\ObjectId],
        [
        'name' => $name, 
        'lastname' => $lastname,
        'curp' => $curp,
        'typeUser'=>$typeUser,
        'email' => $email, 
        'password' => $password,
        'card'=>
        [
            'numCard'=>$numCard,
            'dateExp'=>$dateExp,
            'codeCvv'=>$codeCvv,
            'money'=>$money
        ]
    ]
    );
    $result = $manager->executeBulkWrite($dbname, $bulk);
    header("Location: ../../menuStart.php");
} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error:" . $e);
}
