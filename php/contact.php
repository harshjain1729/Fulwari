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
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$message = $_POST['message'];
$sql = "INSERT INTO `contact` (`Name`, `Email`, `Phone`, `message`) VALUES ('$name', '$email', '$number', '$message');";
$result = mysqli_query($conn, $sql);
if($result){
    header('Location: index.php');
}
?>