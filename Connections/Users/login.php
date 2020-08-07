<?php 
    session_start();
    include 'db.inc.php';
    $email = $_POST["email"];
    $password = $_POST["password"];

    $filter = [
        'email' => $email, 
        'password' => $password
    ];
    $query = new MongoDB\Driver\Query($filter);

    try{
        $result = $manager->executeQuery($dbname, $query);
        $row = $result->toArray();
        $user = $row[0]->_id;
        //var_dump($result);
        $_SESSION['idUser'] =$user;
        $_SESSION['typeUser']=$row[0]->typeUser;
        $_SESSION['nombre']=$row[0]->name;
        if($_SESSION["typeUser"]=="user")
        {
            header("Location: ../../menuStart.php");
        }else
        {
            header("Location: ../../menuAdmin.php");
        }
        
    }   catch(MongoDB\Driver\Exception\Exception $e){
        die("Error Encountered: ".$e);
    }
