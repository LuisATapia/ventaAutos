<?php
    include 'cars.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;

    $id = $_GET["id"];

    try {
        $bulk->delete(['_id' => new MongoDB\BSON\ObjectId($id)]);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../showCars.php");
    }catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered ".$e);
    }

