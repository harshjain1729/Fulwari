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
$fid = $_GET['fid'];
$usr = $_GET['user'];
// echo $fid;
$sql = "SELECT * FROM `Cart` WHERE `fid` = '$fid' and `user_id`='$usr'";
$result = mysqli_query($conn, $sql);
// echo var_dump($result);
while($row=mysqli_fetch_assoc($result)){
    $finquan = $row['quan'] + 1;
    echo $finquan;
    $sql2 = "UPDATE `Cart` SET `quan` = '$finquan' WHERE `fid` = $fid  and `user_id`='$usr'";
    $result2 = mysqli_query($conn, $sql2);
    if($result2){
        header('Location: cart.php');
        echo "true";
    }
}

?>