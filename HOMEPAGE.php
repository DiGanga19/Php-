<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<style>
td{
    padding:10px;

}
</style>
<body>
<div class="container-fluid">
<div class="row">
          <div class="col-xs-offset-2 col-sm-4 form-group">
          <br>
          <div class="row">
          <div class="col-sm-12 form-group">
          <div class="card">
        <div class="card-body text-white bg-primary p-1">
            <h4 class="text-center">ADD RECORD</h4>
        </div>
        </div>
        </div>
        </div>

          <form action="" method="POST" enctype="multipart/form-data">
   
   <div class="form-group">
    <label for="phone">Phone No.</label>
    <input type="number" class="form-control" id="phone" name="t1">
     
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="t2">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" name="t3">
  </div>
  <div class="form-group">
    <label for="image">Upload Image</label>
    <br>
    <input type="file"  id="image" name="file">
  </div>

  
    
    <input class=" btn btn-primary"type="submit" name="b1" value="Add Record">
    
    
   </form> 



<?php

include_once 'connection.php';

if(isset($_POST['b1']))
{
    $phone = $_POST['t1'];

    $name = $_POST['t2'];

    $email = $_POST['t3'];

     $file = $_FILES['file']['name'];
    
     $upload = "upload/".$file;
    
    
     (move_uploaded_file($_FILES['file']['tmp_name'],$upload));

    if($phone!="" and $name!="" && $email!="")
    {

        $query="INSERT INTO `secetable`(`phone`, `name`, `email`, `image`) VALUES ('$phone','$name','$email','$upload')";
    //$query = "insert into secetable values('$phone','$name','$email','$upload')";


    //"INSERT INTO `secbtable`(`rollno`, `name`, `class`) VALUES (110,'manish kumar','3B')


    $data = mysqli_query($conn,$query);

        if($data)
        {
            echo "<p style='color:green'>Record Inserted Succesfully <a href='http://localhost/phpcode/jaspro/HOMEPAGE.php'>Click this to see updated Records</a>";
        }
        else
        {
            echo "Data not Inserted";
        }

}
else{
    echo "<p style='color:red'> All Fields are required</p>";
}

}


?>
          </div>
          <div class="col-sm-8 form-group">
          <br>
          <div class="card mb-2">
        <div class="card-body text-white bg-primary p-1">
            <h4 class="text-center">Records Present In The Database</h4>
        </div>
    </div>
    

        


<?php
include 'connection.php';

$query = "SELECT * FROM secetable";

$data = mysqli_query($conn,$query);

$totRec = mysqli_num_rows($data);








// echo $totRec;

if($totRec!=0)
{
    ?>
    
<table class="table table-striped">
  <thead class="thead-dark">
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>PhoneNo.</th> 
            <th class="text-center">Action</th>
        </tr>
</thead>
       
    

    <?php
    $c=0;

     while($result = mysqli_fetch_assoc($data))
     {
        $c+=1;
        echo "
        <tr>
            <td>".$c."</td>
            <td><a href='".$result['image']."'><img src='".$result['image']."' width='50'></a></td>
            <td>".$result['name']."</td>
            <td>".$result['email']."</td>
            <td>".$result['phone']."</td>
            <td class='text-center'><h4><a class='badge badge-warning' href='Details.php?rn=$result[phone]&nm=$result[name]&cl=$result[email]&pic=$result[image]'>Details</a> | 
            <a class='badge badge-danger'  href='delete.php?rn=$result[phone]' onclick = 'return DeleteRecord()'>Delete</a> |
            <a class='badge badge-primary' href='update.php?rn=$result[phone]&nm=$result[name]&cl=$result[email]'>Edit</a></h4></td>
        </tr>
        ";
         
     }
}
else
{
    echo "No Records found";
}




?>
</table>


          </div>
    </div>
</div>

<script>
    function DeleteRecord()
    {
        return confirm("Do u want to delete");
    }
</script>
</body>
</html>