<?php 

    $upload_dir = "uploads/profile_photos/";
    session_start();
    include "connectDB.php";
    include "databaseFunctions.php";
    include "helper_functions.php";

    // superglobals, $_POST, $_GET, $_SERVER
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $city_id = $_POST['city_id'];

    $user_id = $_SESSION['user']['id'];

    $new_photo_path = null;
    $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png', 'gif'];
    // handle file uploading
    if(isset($_FILES['profile_photo'])){
        $new_photo_path = uploadFile($allowed_extensions, $upload_dir);
    }else{
       $new_photo_path = $upload_dir."placeholder.jpg"; 
    }

    saveContactToDatabase($first_name, $last_name, $email, $user_id, $city_id, $new_photo_path);
    
    header("location:./index.php");
?>