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
session_start();
$mail = $_POST['mail'];
$pass = $_POST['pass'];
$cpass = $_POST['cpass'];
if($pass==$cpass){
    $sql = "INSERT INTO `User` (`user_id`, `password`) VALUES ('$mail', '$pass')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header('Location: login.html');
    }

}
?>