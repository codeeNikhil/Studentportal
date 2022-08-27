<?php
session_start();
require "partials/connection.php";



if($_SERVER["REQUEST_METHOD"]=="POST"){

  $tempregno=$_POST['regno'];
  $regno=array();
  foreach($tempregno as $chk1)  
  {  
   array_push($regno,$chk1);
 } 
  $tempnmae=$_POST['name'];
  $name=array();
  foreach($tempnmae as $chk1)  
  {  
   array_push($name,$chk1);
 } 
  $tempclass=$_POST['class'];
  $class=array();
  foreach($tempclass as $chk1)  
  {  
   array_push($class,$chk1);
 } 
  $tempmaths=$_POST['maths'];
  $maths=array();
  foreach($tempmaths as $chk1)  
  {  
   array_push($maths,$chk1);
 } 
  $tempphysics=$_POST['physics'];
  $physics=array();
  foreach($tempphysics as $chk1)  
  {  
   array_push($physics,$chk1);
 } 

  $tempchemistry=$_POST['chemistry'];
  $chemistry=array();
  foreach($tempchemistry as $chk1)  
  {  
   array_push($chemistry,$chk1);
 } 
 
 

for($row=0;$row<count($regno);$row++){

  
  $sql="INSERT INTO `user` (`student_reg`,`student_name`, `student_class`) VALUES ('$regno[$row]', '$name[$row]', '$class[$row]');";
  $sql1="INSERT INTO `marks` (`student_reg`,`maths`,`physics`, `chemistry`) VALUES ('$regno[$row]','$maths[$row]', '$physics[$row]', '$chemistry[$row]');";
  
  
  $result=mysqli_query($con,$sql);
  $result3=mysqli_query($con,$sql1);

}
  
  if($result){
 
    $check=true;
    
  }
  
  
}


require "upload.php";






?>





<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student marks form </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css">
</head>
  <body>
    <?php
    $no=1;
    require "partials/navbar.php";
    ?>    
   <div class="container mt-4">
       <form action="index.php" method="POST">
         <?php
         for($row=0;$row<$_SESSION['count'];$row++){
           echo "
               <div class='sectionmain' style='
               background-color: #ffdfb6;
               padding: 20px;
           '>
       
                    <h3>Student  ".$no++."</h3>

               <div class='mb-3'>
               <label for='regno ' class='form-label'>Regno :</label>
               <input type='number' class='form-control' id='regno' name='regno[]' aria-describedby='emailHelp'>
               
               
       
               <label for='name' class='form-label'>Name :</label>
          <input type='text' class='form-control' id='name' name='name[]' aria-describedby='emailHelp'>
         
          <label for='class' class='form-label'>Class</label>
          <input type='text' class='form-control' id='class' name='class[]' aria-describedby='emailHelp'>
          
          <h4>Enter marks</h4>
          
          <label for='marks' class='form-label'>Maths</label>
          <input type='number' class='form-control' id='maths' name='maths[]' aria-describedby='emailHelp' multiple>
         
          <label for='marks' class='form-label'>Physics</label>
          <input type='number' class='form-control' id='physics' name='physics[]'aria-describedby='emailHelp'>
          
          <label for='marks' class='form-label'>chemisty</label>
          <input type='number' class='form-control' id='chemisty ' name='chemistry[]' aria-describedby='emailHelp'>
        </div>
        </div>
        ";
      
        }
               ?>
    <button type="submit" class="btn btn-primary">Submit All</button>
    <a href="welcome.php">
        <button type="button" class="btn btn-primary">
New form
      </button>
    </a>
      </form>

   </div>

   <div class="show mt-5" id="resulttt">
    <h3> Student details are  here :</h3>
    
   

    <div class="tablefetch">
<table border="1" class="table">
    <thead>
      <td>SNO          </td>
      <td>Regno          </td>
      <td>Name          </td>
      <td>Class         </td>
      <td>Maths          </td>
      <td>Physics         </td>
      <td>Chemisty         </td>
      <td>Action</td>
       </thead>
     
    <?php
   

        
            $sqll="SELECT * FROM `marks`,`user` WHERE `user`.`student_reg`=`marks`.`student_reg`;";
            $selresult=mysqli_query($con,$sqll);
             $snoooo=1;
            while($row=mysqli_fetch_assoc($selresult)){
                echo " <tr>
            <td>". $snoooo++ . " </td>
            <td>". $row['student_reg'] . " </td>
            <td>". $row['student_name'] . " </td>
            <td> ". $row['student_class'] . " </td>
            <td> ". $row['maths'] . " </td>
            <td>". $row['physics'] . " </td>
            <td>". $row['chemistry'] . " </td>
            
            <td> <button type='button' class='btn btn-primary editing' data-bs-toggle='modal' id=".$row['sno'] ." data-bs-target='#exampleModal'>
            Edit
            </button></td>
            <td> <button class='btn btn-primary deleting' id =".$row['sno'] .">Delete</button></td>
            </tr>";
            }
               
?>


</table>

</div>
</div>







<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal1">
  Select and Delete
</button>


<button type="submit" id ="delete-all" class="btn btn-primary mt-5">Delete ALL</button>


    






<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Select</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="operations.php" method="POST">

          <div class="divide">
              <input type="hidden" name="none" id ="none" value="1">
              <label for="hobby" class="label">Select:</label>
              <?php
                  $sqll="SELECT * FROM `marks`,`user` WHERE `user`.`student_reg`=`marks`.`student_reg`;";
                  $selresult=mysqli_query($con,$sqll);
                  
                  while($row=mysqli_fetch_assoc($selresult)){
                     echo"  <input type='checkbox' name='select[]' id='checkone' value=" .$row['student_reg'].">" .$row['student_reg']." ".$row['student_name']." ";
                  }
               ?>
               
                </div>
                
                
                <button type="submit" class="btn btn-primary">Delete</button>
                
                
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>





<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
          <form action="operations.php" method="POST">
     
              
            <input type="hidden" name="sno" id="sno">
            <input type="hidden" name="sno2" id="sno2">
            <div class="mb-3">
                <label for="regno " class="form-label">Regno :</label>
            <input type="number" class="form-control" id="editregno" name="editregno" aria-describedby="emailHelp">
       
            
       
          <label for="name" class="form-label">Name :</label>
          <input type="text" class="form-control" id="editname" name="editname" aria-describedby="emailHelp">
          
          <label for="class" class="form-label">Class</label>
          <input type="text" class="form-control" id="editclass" name="editclass" aria-describedby="emailHelp">
          
          <h4>Enter marks</h4>
          
          <label for="marks" class="form-label">Maths</label>
          <input type="number" class="form-control" id="editmaths" name="editmaths" aria-describedby="emailHelp" >
         
          <label for="marks" class="form-label">Physics</label>
          <input type="number" class="form-control" id="editphysics" name="editphysics" aria-describedby="emailHelp">
          
          <label for="marks" class="form-label">Chemisty</label>
          <input type="number" class="form-control" id="editchem" name="editchemistry" aria-describedby="emailHelp">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        
    </form>
      
    
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>


 <script script src="script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
</div>