<?php 
    include "connectDB.php";
    include "databaseFunctions.php";

    if(isset($_GET['id'])){
        $contact = findContactById($_GET['id']);
    }else{
        header("location:index.php");
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>IzmjenaGrada</title>
</head>
<body>
    
    <div class="container">

    <form action="updateCountry.php" method="POST" enctype="multipart/form-data">
        <div class="row mt-5">
        
            

            <div class="col-6 offset-1">
                <h3>Izmjena Drzave</h3>
                    <input type="hidden" name="id" value="<?=$countries['id']?>">
                    <input type="text" required class="mt-3 form-control" name="name" placeholder="Unesite ime..." value="<?=$countries['name']?>">
                   
                  


                    <button class="btn float-end mt-3 btn-primary">Izmijeni drzavu</button>
            </div>
        </div>
    </form>

    </div>

    <script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
