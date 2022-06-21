<?php 

    include "connectDB.php";
    include "databaseFunctions.php";
    include "helper_functions.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else{
        header("location:index.php");
    }

    deleteCity($id);
    
    header("location:index.php");

?>