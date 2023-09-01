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
$sql = "SELECT * FROM `User` WHERE `user_id` = '$mail'";
$result = mysqli_query($conn, $sql);
$numrow = mysqli_num_rows($result);
if($numrow == 1){
    while($row=mysqli_fetch_assoc($result)){
        if($pass==$row['password']){
            $_SESSION['loggedin']=true;
            $_SESSION['user'] = $mail;
            header('Location: index.php');
        }
    }
}

?>