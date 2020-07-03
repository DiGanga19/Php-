

<?php
include_once 'connection.php';
$phone = $_GET['rn'];
$query = "delete from secetable where phone='$phone '";

$data = mysqli_query($conn, $query);

if($data)
{
    echo "<script>alert('Record Deleted')</script>";
    ?>
    <meta http-equiv="refresh" content="0; url=http://localhost/phpcode/jaspro/HOMEPAGE.php">
    <?php
}
else
{
    echo " Delete Process Fail";
}

?>