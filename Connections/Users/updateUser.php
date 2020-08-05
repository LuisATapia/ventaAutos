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
$numCard=$_POST["updateNumCard"];
$dateExp=$_POST["updateExp"];
$codeCvv=$_POST["updateCvv"];
$money=$_POST["updateMoney"];
$bank=$_POST["updateBank"];

if(!isset($_POST['updatePass']) || !isset($_POST['updateConfirm']))
{
	$password= $_POST["pass"];
}else
{
	$password = $_POST["updatePassword"];
}

if(isset($_POST["updateCvv"]))
{
    $cvv=$_POST["cvv"];
}else
{
    $cvv=$_POST["updateCvv"];
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
        'card'=>
        [
            'numCard'=>$numCard,
            'bank'=>$bank,
            'dateExp'=>$dateExp,
            'codeCvv'=>$cvv,
            'money'=>$money
        ]
    ]
    );
    $result = $manager->executeBulkWrite($dbname, $bulk);
    header("Location: ../../menuStart.php");
} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error:" . $e);
}