<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower store</title>

    <!-------font awesome cdn link-------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--------custom css file link----------->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>

    <header>
        <input type="checkbox" name="" id="toggler">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="#home" class="logo">Fulwari<span></span></a>
        <!-- we have created a navbar using nav tag. -->
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#about">about</a>
            <a href="#products">products</a>
            <a href="#reviews">reviews</a>
            <a href="#contacts">contacts</a>
        </nav>
        <!-- to show login, logout, cart and wishlist icons we are checking that user is logged into his account or not by using session variables. -->
        <div class="icons">
            <?php
			session_start();
			if($_SESSION['loggedin']){
				echo '<a href="wishlist.php" class="fas fa-heart"></a>
				<a href="cart.php" class="fas fa-shopping-cart"></a>
				<a href="logout.php" class="fas fa-sign-out"> </a>';
			}
			else{
				echo '<a href="../html/login.html" class="fas fa-sign-in"> </a>';
			}
			?>
        </div>
    </header>
    <!--------home section starts------->
    <section class="home" id="home">
        <div class="content">
            <h3>Fresh Flowers</h3>
            <span> natural & beautiful flowers </span>
            <p>Welcome to Fulwari, your one-stop online shop for beautiful and fresh flowers! </p>
            <a href="index.php#products" class="btn">shop now</a>
        </div>
    </section>

    <!--------home section ends------------->

    <!----------about section start---------->
    <!-- here we have embeded a video using video tag and we have kept video on autoplay and mute -->
    <section class="about" id="about">
        <h1 class="heading"> <span> About </span> Us</h1>

        <div class="row">
            <div class="video-container">
                <video src="../images/about-vid.mp4" loop autoplay muted></video>
                <h3>
                    best flower sellers
                </h3>
            </div>

            <div class="content">
                <h3>why choose us? </h3>
                <p>At Fulwari, we offer fresh and beautiful flowers, a wide selection of arrangements for all occasions,
                    easy ordering and delivery, customer satisfaction, and competitive prices. Our flowers are sourced
                    from the best farms and nurseries, ensuring the highest quality and freshness.
                </p>
                <p>We provide fast and
                    reliable delivery options, with same-day delivery available. Our expert florists create unique and
                    personalized arrangements that convey the perfect sentiment. We take pride in our work and are
                    committed to making every customer happy.</p>
                <a href="#" class="btn">learn more </a>
            </div>

        </div>
    </section>

    <!-------------icons section start----------->
    <section class="icons-containers">
        <div class="icons">
            <img src="../images/icon-1.png" alt="">
            <div class="info">
                <h3>free delivery</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons">
            <img src="../images/icon-2.png" alt="">
            <div class="info">
                <h3>10 days return offer</h3>
                <span>moneyback guaranty!</span>
            </div>
        </div>

        <div class="icons">
            <img src="../images/icon-3.png" alt="">
            <div class="info">
                <h3>offer & gifts</h3>
                <span>on all orders</span>
            </div>
        </div>

        <div class="icons">
            <img src="../images/icon-4.png" alt="">
            <div class="info">
                <h3>secure payment</h3>
                <span>protected by paypal</span>
            </div>
        </div>
        <!-------------icons sections ends----------->


        <!----------products sections starts----------->
        <!-- here as you can see all the products are comig through backend dynamically. -->
        <!-- here we are checking if user is logginto his account then we are showing him products. -->
        <!-- all products are saved in table named flowers-->
        <section class="products" id="products">

            <h1 class="heading">latest <span>products</span></h1>
            <div class="box-container">
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
			if($_SESSION['loggedin']){
			$sql = "SELECT * FROM `Flowers`";
			$result = mysqli_query($conn, $sql);
			$usr = $_SESSION['user'];
			while($row = mysqli_fetch_assoc($result)){
				echo '<div class="box">
				<span class="discount">'.$row['discount'].'%</span>
				<div class="images">
					<img src="../images/img-'.$row['s.no.'].'.jpg" alt="">';
					$fid = $row['s.no.'];
					$sql2 = "SELECT * FROM `Cart` WHERE `user_id` = '$usr' AND `fid` = $fid";
					$result2 = mysqli_query($conn, $sql2);
					$numr = mysqli_num_rows($result2);
					if($_SESSION['loggedin']){
						if($numr==0){
						echo '<div class="icons">
						<a href="addwishlist.php?user='.$_SESSION['user'].'&flowerno='.$row['s.no.'].'" class="fas fa-heart "></a>
						<a href="addcart.php?user='.$_SESSION['user'].'&flowerno='.$row['s.no.'].'" class="cart-btn"> Add to cart</a>
					</div>';}
					else{
						echo '<div class="icons">
						<a href="addwishlist.php?user='.$_SESSION['user'].'&flowerno='.$row['s.no.'].'" class="fas fa-heart"></a>
						<a href="cart.php" class="cart-btn"> Go to cart</a>
					</div>';
					}
				}
				echo '</div>
				<div class="content">
					<h3>'.$row['Name'].'</h3>
					<div class="price">$'.$row['price'].' <span>'.$row['aprice'].'</span></div>
				</div>
			</div>';
			}
		}
		else{
			echo '<a href = "../html/login.html" style = "font-size: 30px;">Login</a><h4  style = "font-size: 30px;">to see Products</h4>';
		}
			?>
            </div>
        </section>

        <!----------products sections ends----------->


        <!----------review section starts----------->

        <section class="reviews" id="reviews">
            <h1 class="heading"> customer's <span>review</span></h1>

            <div class="box-container">


                <div class="box">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>I ordered a beautiful bouquet of flowers for my mother's birthday from Fulwari and was very
                        impressed with the quality and freshness of the flowers. The ordering process was easy, and the
                        delivery was prompt. My mother was thrilled with the arrangement, and I would definitely use
                        Fulwari again!</p>
                    <div class="user">
                        <img src="../images/pic-1.png" alt="">
                        <div class="user-info">
                            <h3>john carter</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <span class="fas fa-quote-right"></span>
                </div>

                <div class="box">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>I had a wonderful experience with Fulwari. I ordered flowers for my friend's wedding, and they
                        arrived on time and looked stunning. The florists did an excellent job with the arrangement, and
                        the flowers lasted for days. I highly recommend Fulwari for any special occasion</p>
                    <div class="user">
                        <img src="../images/pic-2.png" alt="">
                        <div class="user-info">
                            <h3>bella martins</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <span class="fas fa-quote-right"></span>

                </div>

                <div class="box">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>I was looking for a unique and personalized floral arrangement for my anniversary, and Fulwari
                        delivered beyond my expectations. The arrangement was beautifully crafted and conveyed the
                        perfect sentiment. The ordering process was straightforward, and the delivery was prompt. I will
                        definitely use Fulwari again for any future floral needs.</p>
                    <div class="user">
                        <img src="../images/pic-3.png" alt="">
                        <div class="user-info">
                            <h3>blosom greet</h3>
                            <span>happy customer</span>
                        </div>
                    </div>
                    <span class="fas fa-quote-right"></span>

                </div>

            </div>

        </section>

        <!------- contact section starts  ---------->

        <section class="contacts" id="contacts">

            <h1 class="heading"> <span>contact </span> us </h1>

            <div class="row">

                <form action="contact.php" method='post'>
                    <input name="name" type="text" placeholder="name" class="box">
                    <input name="email" type="email" placeholder="email" class="box">
                    <input name="number" type="number" placeholder="number" class="box">
                    <textarea name="message" class="box" placeholder="message" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="send message" class="btn">
                </form>

                <div class="images">
                    <img src="../images/contact-img.svg" alt="">
                </div>

            </div>
            <!------- contact section ends ---------->

            <!----------- footer section starts-------->
            <section class="footer">
                <div class="box-container">
                    <div class="box">
                        <h3>quick links </h3>
                        <a href="#">home</a>
                        <a href="#">about</a>
                        <a href="#">products</a>
                        <a href="#">reviews</a>
                        <a href="#">contacts</a>
                    </div>
                    <div class="box">
                        <h3>Extra links </h3>
                        <a href="#">Cart</a>
                        <a href="#">Wishlist</a>
                    </div>
                    <div class="box">
                        <h3>Locations </h3>
                        <a href="#">Greater Noida</a>
                        <a href="#">Delhi</a>
                        <a href="#">Bihar</a>
                        <a href="#">Rajasthan</a>
                    </div>
                    <div class="box">
                        <h3>Contacts info </h3>
                        <a href="#">+91-6376854945</a>
                        <a href="mailto:itxjharsh1729@gmail.com">itxjharsh1729@gmail.com</a>
                        <a href="#">Bennett University, Greater Noida</a>
                        <a href="#">reviews</a>
                        <img src="../images/payment.png" alt="">
                    </div>
                </div>

                <div class="credit"> created by <span>Harsh Jain</span> | all right reserved </div>
            </section>
            
</body>

</html>