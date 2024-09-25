<?php
  session_start();

  // Check if the user is logged in
  if (isset($_SESSION['U_Email'])) {
      $userName = $_SESSION['U_FName'];
      $userEmail = $_SESSION['U_Email'];
  } else {
      // Redirect to login page if not logged in
      header('Location: login.php');
      exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" contant = "width=device-width,initial-scale=1.0">
        <title> Onlinr Shop</title>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
        <link rel="stylesheet" href="CSS/style.css">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <script scr="script.js">

        </script>
       
        <!-- Navbar start-->
        <?php include 'header.php'; ?>
      
      <section id="us" >
        <h3>ABOUT US</h1>
        <p>Cara, the trendiest fashion brand from Bangladesh, is mostly distinguished for its true international quality designs and fabrics. We are inspired by our customers- souls full of unconventional fashion senses. As a retailer of our parent brand BEXIMCO, we started our journey in 2004 and now we have 19 stores across Bangladesh and a 24/7 online store. Since origin, we have been offering world class designs at amazing value price. Our product line includes a wide range of fashion clothing, fragrance, and accessories for men, women and children; textiles for home decoration; avant-garde ceramic items; paintings; books; and many more.

            Explore Cara and look through our windows for contemporary global fashion trends.</p>
      </section>


      

     

    

      <footer class ="section-p1">
        <div class="col">
        <h4>Fasion World</h4>
        <!-- <a href ="#"><img src="images/logo.png" class="logo" alt=" "> </a>-->
            <h4>Contuct</h4>
            <p><strong>Address:</strong> Dhanmondi9/A,Dhaka,Bangladesh</p>
            <p><strong>Phone:</strong> 01797127296,01973336948</p>
            <p><strong>Address:</strong> 8.00-22:00, Fri-sat</p>
            <div class="follow">
                <h3>Follow Us</h3>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>



        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#"> About Us </a>
            <a href="#"> Delivery Information </a>
            <a href="#"> Privacy Policy </a>
            <a href="#"> Terms and Conditions </a>
            <a href="#"> Contuct Us </a>
        </div>
        <div class="col">
            <h4>My Account</h4>
            <a href="userlogin.php"> Sign In </a>
            <a href="#">View Cart</a>
            <a href="#"> My points </a>
            <a href="#"> Track in Order </a>
            <a href="#"> Help </a>
        </div>
        <div class="col install">
           <h4>Payment Method</h4> 
           <img src="images/pay.png" alt="">

        </div>


      </footer>


      

      

      


    </body>
</html>