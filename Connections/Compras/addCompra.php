<?php
/*include '../Users/selectOne.php';
include '../Users/db.inc.php';

$price=floatval($_POST['price']);
$moneySaldo=floatval($_POST['moneySaldo']);
$saldoAct=$moneySaldo-$price;
$saldoAct=floatval($saldoAct);

$bulk = new MongoDB\Driver\BulkWrite;
try {
    $bulk->update(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'name' => $name, 
            'lastname' => $last,
            'curp' => $curp,
            'typeUser'=>$typeUser,
            'email' => $email, 
            'password' => $pass,
            'card'=>
            [
                'numCard'=>$numCard,
                'bank'=>$bank,
                'dateExp'=>$dateExp,
                'codeCvv'=>$cvv,
                'money'=>$saldoAct
            ]
        ]
    );
    $result = $manager->executeBulkWrite($dbname, $bulk);
} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error:" . $e);
}*/

/***************ACTUALIZAR AUTO************************/
session_start();
    include '../Cars/cars.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_POST["idCar"];
    $niv = $_POST["niv"];
    $model = $_POST["model"];
    $year= $_POST["year"];
    $plate=$_POST["plate"];
    $color = $_POST["color"];
    $tag0 = $_POST["tag0"];
    $tag1 = $_POST["tag1"];
    $priceF = floatval($_POST['price']);
    $status= "sold";
    $tipo=$_POST["tipoT"];
    $vendedor= $_POST["vendedor"];
    $marca=$_POST["marca"];
    try {
        $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'niv' => $niv,
            'marca'=>$marca,
            'model' => $model,
            'tipo'=>$tipo,
            'year' => $year,
            'plate' => $plate,
            'color'=>$color, 
            'price'=>$priceF, 
            'status'=>$status,
            'vendedor'=>$vendedor,
            'tags'=>[$tag0, $tag1]    
        ]);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../menuStart.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }
/****************COMPRA****************/
include 'compras.inc.php';

$bulk = new MongoDB\Driver\BulkWrite;

$idUser=$_SESSION["idUser"];

$compra=[
	'_id'=> new MongoDB\BSON\ObjectId,
	'idComprador'=>$idUser,
	'date'=>date("Y-m-d H:i:s"),
    'car'=>[
            'niv' => $niv,
            'marca'=>$marca,
            'model' => $model,
            'tipo'=>$tipo,
            'year' => $year,
            'plate' => $plate,
            'color'=>$color, 
            'price'=>$priceF, 
            'status'=>$status,
            'vendedor'=>$vendedor,
            'tags'=>[$tag0, $tag1]    
        ]
];

try{
	$bulk->insert($compra);
	$result = $manager->executeBulkWrite($dbname, $bulk);
}   catch(MongoDB\Driver\Exception\Exception $e){
	die("Error Encountered: ".$e);
}

/*******************Valores del usuario***********************//*
include '../Users/db.inc.php';
    $idU=$_POST["vendedor"];

    $filt = [
        '_id' => new MongoDB\BSON\ObjectId($idU)
    ];

    $query = new MongoDB\Driver\Query($filt);

    try {
        $result = $manager->executeQuery($dbname, $query);
        $row=$result->toArray();
        $name=$row[0]->name;
        $last=$row[0]->lastname;
        $typeUser=$row[0]->typeUser;
        $curp=$row[0]->curp;
        $email=$row[0]->email;
        $pass=$row[0]->password;
        $numCard=$row[0]->card->numCard;
        $bank=$row[0]->card->bank;
        $dateExp=$row[0]->card->dateExp;
        $cvv=$row[0]->card->codeCvv;
        $money=$row[0]->card->money;
        //header("Location: ../../menu_Master.php");
    } catch (MongoDB\Driver\Exception\Exception $e) {
        die("Error Encountered:" . $e);
    }*/
    
    /**********CAMBIAR DINERO DEL VENDEDOR*********/
/*    $money=floatval($money);
    $dineroV=$money+$price;
    $dineroV=floatval($dineroV);
    $idU=$_POST["vendedor"];
    $bulk = new MongoDB\Driver\BulkWrite;
try {
    $bulk->update(
        ['_id' => new MongoDB\BSON\ObjectId($idU)],
        [
            'name' => $name, 
            'lastname' => $last,
            'curp' => $curp,
            'typeUser'=>$typeUser,
            'email' => $email, 
            'password' => $pass,
            'card'=>
            [
                'numCard'=>$numCard,
                'bank'=>$bank,
                'dateExp'=>$dateExp,
                'codeCvv'=>$cvv,
                'money'=>$dineroV
            ]
        ]
    );
   $result = $manager->executeBulkWrite($dbname, $bulk);
   header("Location: ../../verCompras.php");
} catch (MongoDB\Driver\Exception\Exception $e) {
    die("Error:" . $e);
}*/