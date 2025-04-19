<?php
include("connection.php");



$id = $_POST['id'];

$buy= mysqli_query($con,"SELECT * FROM purchase WHERE id=$id");
$rowb = mysqli_fetch_array($buy);


$gmail = mysqli_query($con,"SELECT * FROM gmail");

if(mysqli_num_rows($gmail) == 0){
   $rowg['name'] = 'There is no name yet';
}else {
   $rowg = mysqli_fetch_array($gmail);
}




$sells = mysqli_query($con,"SELECT * FROM sells WHERE id=$id");
$rows = mysqli_fetch_array($sells);