<?php
session_start();
    include 'cars.inc.php';
    $bulk = new MongoDB\Driver\BulkWrite;
    $id=["id"];
    $niv = $_POST["niv"];
    $model = $_POST["model"];
    $year= $_POST["year"];
    $plate=$_POST["plate"];
    $color = $_POST["color"];
    $price= $_POST["price"];
    $tag1=$_POST["tag1"];
    $tag2=$_POST["tag2"];
    $tags=[$tag1,$tag2];
    $priceF= floatval($price);
    $marca=$_POST["marcaAuto"];
    $trans=$_POST["transAuto"];

    /*****IMAGEN*****/
    $ruta = '../../fotoAutos/'.$niv;
    $imagen = $_FILES['pic']['tmp_name'];
    move_uploaded_file($imagen,$ruta);
    /*************/
    $car = [
        '_id' => new MongoDB\BSON\ObjectId,
        'niv' => $niv, 
        'marca'=>$marca,
        'tipo'=>$trans,
        'model' => $model,
        'year' => $year,
        'plate'=>$plate,
        'color' => $color,
        'price'=>$priceF,
        'status'=>'disponible',
        'vendedor'=>$_SESSION['idUser'],
        'image'=>$ruta,
        'tags'=>$tags
    ];

    try{
        $bulk->insert($car);
        $result = $manager->executeBulkWrite($dbname, $bulk);
        header("Location: ../../showCars.php");
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
