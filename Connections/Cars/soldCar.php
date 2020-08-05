<?php
    include 'cars.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_POST["id"];
    $niv = $_POST["niv"];
    $model = $_POST["model"];
    $year= $_POST["year"];
    $plate=$_POST["plate"];
    $color = $_POST["color"];
    $price= $_POST["price"];

    try {
        $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id)],
        [
            'niv' => $niv,
            'model' => $model,
            'year' => $year,
            'plate' => $plate,
            'color'=>$color
                
        ]);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../showCars.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }