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
$sql = "SELECT * FROM `Flowers` WHERE `s.no.` = $fid";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name = $row['Name'];
    echo $name;
    $price = $row['price'];
    $sql2 = "INSERT INTO `wishlist` (`user_id`, `flower_id`, `price`, `fname`) VALUES ('$usr', '$fid', '$price', '$name');";
    $result2 = mysqli_query($conn,$sql2);
    header('Location:wishlist.php');
    
}
?>