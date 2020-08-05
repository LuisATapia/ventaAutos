<?php 
include 'db.inc.php';
session_start();
$bulk = new MongoDB\Driver\BulkWrite;
$id = $_SESSION["idUser"];
$name = $_POST["updateName"];
$lastname = $_POST["updateLastName"];
$curp = $_POST["updateCurp"];
$typeUser = $_POST["updateTypeUser"];
$email = $_POST["updateEmail"];

if(!isset($_POST['updatePass']) || !isset($_POST['updateConfirm']))
{
	$password= $_POST["pass"];
}else
{
	$password = $_POST["updatePassword"];
}


try {
    $bulk->update(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'name' => $name, 
            'lastname' => $lastname,
            'curp' => $curp,
            'typeUser'=>$typeUser,
            'email' => $email, 
            'password' => $password,
        ]
    );
    $result = $manager->executeBulkWrite($dbname, $bulk);
    header("Location: ../../menuStart.php");
} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error:" . $e);
}