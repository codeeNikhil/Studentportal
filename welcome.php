<?php

if($_SERVER["REQUEST_METHOD"]=='POST'){

    session_start();
    if(!isset($_SESSION['count'])){
        $_SESSION['count']= $_POST['count'];
        
    }else{
        
        $_SESSION['count']=$_POST['count'];
    }
    header("location:index.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>welcome to studentmarks portal </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
  <form action="welcome.php" method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Enter no of student you want to add</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="count" aria-describedby="emailHelp">
   
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></scrip>
  </body>
</html>