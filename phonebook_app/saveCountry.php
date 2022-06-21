<?php 
    session_start();
    include "connectDB.php";
    include "databaseFunctions.php";
  

    // superglobals, $_POST, $_GET, $_SERVER
    $name = $_POST['name'];
    

    $user_id = $_SESSION['user']['id'];

 

    saveCountryToDB($name);
    
    header("location:./index.php");
?>