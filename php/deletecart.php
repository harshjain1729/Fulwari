<?php
$server = "localhost";
$user  = "root";
$pass = "";
$db = "Fulwari";
$conn = mysqli_connect($server,$user,$pass,$db);
if(!$conn){
    die("could't connect to database due to this error-->".mysqli_connect_error($conn));
}
// else{
//     echo "connected successfully";
//     echo "<br>";
// }
$fid = $_GET['flowerno'];
$usr = $_GET['user'];
$sql = "DELETE FROM `Cart` WHERE `fid` = '$fid' and `user_id`='$usr'";
$result = mysqli_query($conn,$sql);
if($result){
    echo "delete success";
    header('Location: cart.php');
}
?>