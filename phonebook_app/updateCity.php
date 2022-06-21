<?php 

    
    include "connectDB.php";
    include "databaseFunctions.php";

    $name = $_POST['name'];
    $country_id = $_POST['country_id']
  

 

    updateCity($name,$id,$country_id);

    header('location:index.php');
?>