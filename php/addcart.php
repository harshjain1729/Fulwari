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
// echo $fid;
$sql = "SELECT * FROM `Flowers` WHERE `s.no.` = $fid";
$result = mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name = $row['Name'];
    $price = $row['price'];
    $aprice = $row['aprice'];
    echo $price;
    echo $name;
    $sql2 = "INSERT INTO `Cart` (`flower_name`, `price`, `aprice`,`user_id`,`fid`,`quan`) VALUES ('$name', '$price', '$aprice','$usr',$fid, 1);";
    $result2 = mysqli_query($conn, $sql2);
    echo var_dump($result2);
    if($result2){
        // echo "Inserted into cart successfully";
        header('Location: index.php#products');
    }
}
?>