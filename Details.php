<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" ">
</head>
<body>
    
</body>
</html>



<?php
include_once 'connection.php';
$phone=$_GET['rn'];
$name=$_GET['nm'];
$email=$_GET['cl'];

$query = "select * from secetable";

$data = mysqli_query($conn,$query);

$totRec = mysqli_num_rows($data);


if($totRec!=0)
{
    ?>
<div class="container">
<table class="table table-striped">
  <thead class="thead-dark">
        <tr>
            <th>Phone</th>
            <th>Name</th>
            <th>Email</th>
            <!-- <th class="text-center" colspan='2' >Operations</th> -->
        </tr>
</thead>

    <?php

    while($result = mysqli_fetch_assoc($data))

    echo "
        <tr>
            <td>".$result['phone']."</td>
            <td>".$result['name']."</td>
            <td>".$result['email']."</td>
    
            
        </tr>
    
    
    ";


}
else
{
    echo "No  records found";
}



?>

</table>



</div>