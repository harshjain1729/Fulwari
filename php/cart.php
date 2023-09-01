<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style1.css">
</head>

<body>
    <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="index.php#home" class="logo">Fulwari<span></span></a>

        <nav class="navbar">
            <a href="index.php#home">home</a>
            <a href="index.php#about">about</a>
            <a href="index.php#products">products</a>
            <a href="index.php#reviews">reviews</a>
            <a href="index.php#contacts">contacts</a>
        </nav>

        <div class="icons">
            <a href="wishlist.php" class="fas fa-heart"></a>
            <a href="logout.php" class="fas fa-sign-out"> </a>
        </div>
    </header>
    <!-- here is the cart we are showing our cart items from dataase which are stored in table named cart. users can access the cart only after they logged into their account -->
    <!-- for increasing and decreasing the quantity of products we have created a php files - addonecart.php and minusonecart.php which is updating the quantity in our database -->
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                        </div>
                    </div>
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
                    $usr = $_SESSION['user'];
					$sql = "SELECT * FROM `Cart` where `user_id` = '$usr'";
					$result = mysqli_query($conn,$sql);
					$input = "'input[type=number]'";
					while($row=mysqli_fetch_assoc($result)){
						echo '<div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img src="../images/img-'.$row['fid'].'.jpg"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">'.$row['flower_name'].'</p>
                                    
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <a class = "px-2"href = "minusonecart.php?fid='.$row['fid'].'&user='.$_SESSION['user'].'">
                                        <i class="fas fa-minus"></i>
                                    </a>

                                    <h5 class="ml-1 mr-1 mb-2">'.$row['quan'].'</h5>

                                    <a class = "px-2"href = "addonecart.php?fid='.$row['fid'].'&user='.$_SESSION['user'].'">
                                    <i class="fas fa-plus"></i>
                                </a>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">$'.$row['quan']*$row['price'].'</h5>
                                </div>
                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="deletecart.php?user='.$_SESSION['user'].'&flowerno='.$row['fid'].'" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>';}
					?>
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>