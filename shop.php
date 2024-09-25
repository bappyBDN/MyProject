<?php
  require('connection.php');

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

  if(isset($_POST['add_to_cart'])){
    $product_Id  = $_POST['product_Id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = 1;
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND User_Email= '$userEmail' ");
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'product already added to cart';
    }else{
       $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity,IG_ID,User_Email)
        VALUES('$product_name', '$product_price', '$product_image', '$product_quantity','$product_Id', '$userEmail')");
       $message[] = 'product added to cart succesfully';
    }
 
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
    <?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

        <script scr="script.js">

        </script>
       
        <!-- Navbar start-->
      
        <?php include 'header.php'; ?>

      <section class="shop-hader">
       
        <h2>Let's Shop</h2>
        <p>save money</p>
       

      </section>
     

      <section id="product1" class="section-p1">
    <div class="pro-container">

        <?php 
        $sql = "SELECT * FROM product_img WHERE IG_Action='Yes' AND IG_Feature='Yes'";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            $count = mysqli_num_rows($res);

            if ($count > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
                    $IG_ID = $row['IG_ID'];
                    $IG_Title = $row['IG_Title'];
                    $IG_CName = $row['IG_CName'];
                    $IG_Price = $row['IG_Price'];
                    $IG_Name  = $row['IG_Name'];
        ?>
          
            <div class="pro">
            <form action="" method="post">
                <?php
                if($IG_Name=="")
                {
                    echo "Image not availavale";
                }
                else{
                    ?>
                     <img src="images/<?php echo $IG_Name; ?>" alt="">
                     <?php
                }
                ?>
               
                <div class="des">
                    <h3><?php echo $IG_ID; ?></h3>
                    <span><?php echo $IG_CName; ?></span>
                    <h6><?php echo $IG_Title; ?></h6>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h3><?php echo $IG_Price; ?></h3>
                </div>
                <input type="submit" class="btn" value="add to cart" name="add_to_cart">

               <!-- <a href="#?IG_ID=<?php echo $IG_ID; ?>"><i class="fal fa-shopping-cart cart"></i></a> -->
             </div>
             <input type="hidden" name="product_Id" value="<?php echo $IG_ID; ?>">
             <input type="hidden" name="product_name" value="<?php echo $IG_CName; ?>">
            <input type="hidden" name="product_price" value="<?php echo $IG_Price; ?>">
            <input type="hidden" name="product_image" value="<?php echo $IG_Name; ?>">
            
         </form>
      
        <?php
                }
            } else {
                echo "<div class='error'>Product not available.</div>";
            }
        } else {
            echo "<div class='error'>Failed to execute query: " . mysqli_error($conn) . "</div>";
        }
        ?>
     </div>

    </section>

      <section id="pagination" class="section-p1">
       <a href="#">1</a>
       <a href="#">2</a>
       <a href="#">3</a>
       <a href="#">4</a>
       <a href="#"><i class="fal fa-long-arrow-alt-right"></i></a>

      </section>



      <section id="banar1" class="section-p1">
        <div  class="newstext">
            <h4>Sign Up For Newslatter</h4>
            <p>Get Email updates about our latest shop and <span>Special offers.</span></p>

        </div>
        <div class="form">
            <input type="text" placeholder="Your Emaill address">
            <button class="normal">Sign Up</button>
        </div>
            
        
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
            <a href="aboutus.php"> About Us </a>
            <a href="deliveryinfo.php"> Delivery Information </a>
            <a href="#"> Privacy Policy </a>
            <a href="#"> Terms and Conditions </a>
            <a href="contact.php"> Contuct Us </a>
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