<?php
 session_start();
 $_SESSION["typeUser"]=0;
 $_SESSION["idUser"]=0;
 session_destroy();
 header("Location: ../../log_in.php");

