<?php
$servername='localhost';
$username='root';
$password='';
$dbname='crud';
$conn=mysqli_connect($servername,$username,$password,$dbname);
if($conn){
    //echo "Connected";
}
else{
    die("Connection Not Created Due To :".mysqli_connect_error());
}


?>