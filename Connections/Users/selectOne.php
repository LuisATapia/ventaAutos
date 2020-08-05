<?php
try{
    session_start();
}catch(Exception $e)
{

}
    include 'db.inc.php';
    $id=$_SESSION['idUser'];

    $filter = [
        '_id' => $id,
    ];
    $query = new MongoDB\Driver\Query($filter);

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
    }