<?php 

    
    include "connectDB.php";
    include "databaseFunctions.php";

    $name = $_POST['name'];
  

 

    updateCountry($name,$id);

    header('location:index.php');
?>