<?php
include('dbconnection.php');
$conn=getConnection();

//Checking connection

if($conn->connect_error){
 die("Connection failed:" . $conn->connect_error);
}
$count=0;

$result=mysqli_query($conn,"SELECT `no_tick` FROM `next` WHERE 1");
$num_rows = mysqli_num_rows($result);

if($num_rows>0){	
    /* fetch associative array */
while ($row = mysqli_fetch_assoc($result)) {
$count = $count + $row['no_tick'];
    }
}
echo $count;
?>