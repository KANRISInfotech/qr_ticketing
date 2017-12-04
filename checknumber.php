<?php
include('dbconnection.php');
$conn=getConnection();

//Checking connection
$number=$_GET['number'];
if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}
$count=0;

$result=mysqli_query($conn,"SELECT `id` FROM `next` WHERE `number`='$number'");
$num_rows = mysqli_num_rows($result);

if($num_rows>0){	
    /* fetch associative array */
echo "1";
}else{
echo "0";
}
?>