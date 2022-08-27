<?php
require "partials/connection.php";

if(isset($_GET['deleteall'])){

$sql="SELECT * FROM `marks`,`user` WHERE `user`.`student_reg`=`marks`.`student_reg`;";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);

while($row=mysqli_fetch_assoc($res)){

    $reg=$row['student_reg'];
    $name=$row['student_name'];
    $class=$row['student_class'];
    $maths=$row['maths'];
    $physics=$row['physics'];
    $chem=$row['chemistry'];



  $sqli="INSERT INTO `trash` (`student_reg`, `student_name`, `student_class`, `maths`, `physics`, `chemistry`) VALUES ( '$reg', '$name', '$class', '$maths', '$physics', '$chem');";
  $result=mysqli_query($con,$sqli);
  
}

$delsql="TRUNCATE TABLE `final`.`user`;";
$delsql1="TRUNCATE TABLE `final`.`marks`;";
$res=mysqli_query($con,$delsql);
$res2=mysqli_query($con,$delsql1);
   header("location:index.php");
  }

  
  if(($_SERVER['REQUEST_METHOD']=='POST')){
    if(isset($_POST['none'])){

      $class=$_POST['select'];
      $chk=array();
      foreach($class as $chk1)  
      {  
       array_push($chk,$chk1);
             
     } 

   for ($row1=0;$row1<count($chk);$row1++){
      $val= $chk[$row1];
 
     
     $sqli="SELECT * FROM `marks`,`user` WHERE `marks`.`student_reg`=`user`.`student_reg` AND `marks`.`student_reg`='$chk[$row1]';";
     $result=mysqli_query($con,$sqli);
     $row=mysqli_fetch_assoc($result);

      $reg=$row['student_reg'];
      $name=$row['student_name'];
      $class=$row['student_class'];
      $maths=$row['maths'];
      $physics=$row['physics'];
      $chem=$row['chemistry'];
  
  
  
    $sqli="INSERT INTO `trash` (`student_reg`, `student_name`, `student_class`, `maths`, `physics`, `chemistry`) VALUES ( '$reg', '$name', '$class', '$maths', '$physics', '$chem');";
    $result=mysqli_query($con,$sqli);

   $delsql="DELETE FROM `user` WHERE `user`.`student_reg` = '$val';";
   $delsql1="DELETE FROM `marks` WHERE `marks`.`student_reg` = '$val';";
  $res=mysqli_query($con,$delsql);
  $res2=mysqli_query($con,$delsql1);
 
  
}
 
}



     
  }



  if(($_SERVER['REQUEST_METHOD']=='POST')){
    if(isset($_POST['sno'])){
      $sno=$_POST['sno'];
      $sno2=$_POST['sno2'];
      // update the
  
      $reg=$_POST['editregno'];
      $name=$_POST['editname'];
      $class=$_POST['editclass'];
      $maths=$_POST['editmaths'];
      $physics=$_POST['editphysics'];
      $chem=$_POST['editchemistry'];
  
   
    $sql="UPDATE `user` SET `student_reg` = '$reg' ,`student_name` = '$name',`student_class` = '$class' WHERE `user`.`sno` = '$sno';";
    $sql2="UPDATE `marks` SET `student_reg` = '$reg' ,`maths`='$maths',`physics` = '$physics',`chemistry`='$chem' WHERE `marks`.`student_reg` = '$sno2';";
       $result=mysqli_query($con,$sql);
       $result1=mysqli_query($con,$sql2);
  }
  
}

if(isset($_GET['deleteone'])){
  $delemail=$_GET['deleteone'];

  $sqltrash="SELECT * FROM `marks`,`user` WHERE `marks`.`student_reg`=`user`.`student_reg` AND `marks`.`student_reg`='$delemail';";

  $res=mysqli_query($con,$sqltrash);
$num=mysqli_num_rows($res);

while($row=mysqli_fetch_assoc($res)){

    $reg=$row['student_reg'];
    $name=$row['student_name'];
    $class=$row['student_class'];
    $maths=$row['maths'];
    $physics=$row['physics'];
    $chem=$row['chemistry'];



  $sqli="INSERT INTO `trash` (`student_reg`, `student_name`, `student_class`, `maths`, `physics`, `chemistry`) VALUES ( '$reg', '$name', '$class', '$maths', '$physics', '$chem');";
  $result=mysqli_query($con,$sqli);
}


  $delsql="DELETE FROM user WHERE `user`.`student_reg` = '$delemail';";
  $res1=mysqli_query($con,$delsql);
  $delsql1="DELETE FROM marks WHERE `marks`.`student_reg` = '$delemail';";
  $res2=mysqli_query($con,$delsql1);

}













session_start();
$_SESSION['count']=1;
require "upload.php";
header("location:index.php");



?>




