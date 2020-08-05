<?php
    session_start();
    include 'cars.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_POST["id"];
    $niv = $_POST["niv"];
    $model = $_POST["model"];
    $year= $_POST["year"];
    $plate=$_POST["plate"];
    $color = $_POST["color"];
    $tag0 = $_POST["tag0"];
    $tag1 = $_POST["tag1"]; 
    $price = $_POST["price"];
    $status=$_POST["status"];
    $priceF = floatval($price);
    $marca=$_POST["marcaAuto"];
    $tipo=$_POST["transAuto"];
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
            'vendedor'=>$_SESSION['idUser'],
            'tags'=>[$tag0, $tag1]    
        ]);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../showCars.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }