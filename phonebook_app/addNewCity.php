<?php 
    session_start();
    include "connectDB.php";
    include "databaseFunctions.php";

    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="col-12  ">
                <h3>Dodavanje novog Grada</h3>
                <form action="saveCity.php" method="POST" enctype="multipart/form-data">
                    <input type="text" required class="mt-3 form-control" name="name" placeholder="Unesi Ime grada...">
                    <input type="text">
                    <input type="text" required class="mt-3 form-control" name="name" placeholder="Unesi ID Drzave...">

               
                    
       

                    <button class="btn float-end mt-3 btn-primary">Dodaj Grad</button>
                </form>
    </div>
        

         <script src="app.js"></script>
         <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>