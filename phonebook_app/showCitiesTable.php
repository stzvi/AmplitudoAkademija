<?php 
    session_start();
    include "connectDB.php";
    include "databaseFunctions.php";

    if(!$_SESSION['loggedIn']){
        header("location:login.php");
        exit;
    }

    $searchTerm = "";
    if(isset($_GET['searchTerm']) && $_GET['searchTerm'] != ""){
        $searchTerm = $_GET['searchTerm'];
        $countries = getCities($_GET['searchTerm']);
    }else{
        $countries = getCities();
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
<div class="container">

<div class="row mt-5">
    <div class="col-12">

        <form action="showCitiesTable.php" method="GET">
            <input type="text" value="<?=$searchTerm?>" name="searchTerm" placeholder="Pretraga" class="form-control my-3">
        </form>

        <table class="table table-hover">

            <thead>
                <tr>
                    <th></th>
                    <th>Ime</th>
                    <th>Id</th>
                    <th>Drzava Id</th>
                    
                </tr>
            </thead>


<?php 

foreach($cities as $city){
    
    $name = $city['name'];
    $id = $city['id'];
    $countyName = $city['country_id'];
   

    echo "
        <tr>
            <td>$name</td>
            <td>$id</td>
            <td>$country_id</td>
           
            <td>
                <a href='editCity.php?id=$id' >izmjena</a>
            </td>
            <td>
                <a href='deleteCity.php?id=$id' class ="btn btn-primary" data-toggle= "modal" data-target="#deleteModal">brisanje</a>
               
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Da li ste sigurni da zelite izbrisati ovaj red?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne</button>
        <button type="button" class="btn btn-primary">Da</button>
      </div>
    </div>
  </div>
</div>
  
            </td>
        </tr>";
}

?>       

<a href="addNewCity.php" class="btn btn-success">Dodaj novu Drzavu</a>


<script src="app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>