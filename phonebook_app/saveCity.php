<?php 

    session_start();
    include "connectDB.php";
    include "databaseFunctions.php";


    // superglobals, $_POST, $_GET, $_SERVER
    $name = $_POST['name'];
    $country_id = $_POST['country_id'];

    $user_id = $_SESSION['user']['id'];

 
    saveCitiesToDatabase($id,$name,$country_id);
    
    header("location:./index.php");
?>