<?php
$NAME='localhost';
$USER='root';
$PASSWORD='';
$DATABASE='login_db';

$con=mysqli_connect($NAME, $USER, $PASSWORD, $DATABASE);
if($con){
    echo "Connection Successfull";
}
else{
    die(mysqli_error($con));
    
}
?>