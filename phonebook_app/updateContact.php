<?php 

    $upload_dir = "uploads/profile_photos/";
    include "connectDB.php";
    include "databaseFunctions.php";
    include "helper_functions.php";

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $city_id = $_POST['city_id'];
    $id = $_POST['id'];
    $old_profile_photo = $_POST['old_profile_photo'];

    $allowed_extensions = ['jpg', 'jpeg', 'bmp', 'png', 'gif'];
    // handle file uploading
    if(isset($_FILES['profile_photo'])){
        $profile_photo = uploadFile($allowed_extensions, $upload_dir);
        deletePhotoForUser($id);
    }else{
        $profile_photo = $old_profile_photo; 
    }

    updateContact($first_name, $last_name, $email, $id, $city_id, $profile_photo);

    header('location:index.php');
?>