<?php

$sql="SELECT * FROM `marks`,`user` WHERE `user`.`student_reg`=`marks`.`student_reg`;";
$res=mysqli_query($con,$sql);
$num=mysqli_num_rows($res);
$storearr=array();

while($row=mysqli_fetch_assoc($res)){

    $reg=$row['student_reg'];
    $name=$row['student_name'];
    $class=$row['student_class'];
    $maths=$row['maths'];
    $physics=$row['physics'];
    $chem=$row['chemistry'];

    $new=array($reg,$name,$class,$maths,$physics,$chem);
    array_push($storearr,$new);
}




$header=array("regno","name","class","maths","physics","chemistry");
$open=fopen("store.csv","w");
fputcsv($open,$header);
foreach($storearr as $data){
  fputcsv($open,$data);
}

fclose($open);
?>