<?php
    include 'cars.inc.php';
    $id=$_GET['idCar'];

    $filter = [
        '_id' => $id,
    ];
    $query = new MongoDB\Driver\Query($filter);

    try {
        $result = $manager->executeQuery($dbname, $query);
        $row=$result->toArray();
        $model=$row[0]->model;
        $niv=$row[0]->niv;
        $year=$row[0]->year;
        $price=$row[0]->price;
        $color=$row[0]->color;
        //header("Location: ../../compra.php");
    } catch (MongoDB\Driver\Exception\Exception $e) {
        die("Error Encountered:" . $e);
    }