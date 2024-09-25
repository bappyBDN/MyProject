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


if(isset($_POST['update_update_btn'])){
   $update_value = intval($_POST['update_quantity']);
   $update_id = intval($_POST['update_quantity_id']);
   
   $stmt = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE Cart_ID = ? ");
   $stmt->bind_param("ii", $update_value, $update_id);
   
   if($stmt->execute()){
      header('Location: cart.php');
      exit();
   }
   $stmt->close();
}

if(isset($_GET['remove'])){
   $remove_id = intval($_GET['remove']);
   
   $stmt = $conn->prepare("DELETE FROM `cart` WHERE Cart_ID = ?  ");
   $stmt->bind_param("i", $remove_id);
   $stmt->execute();
   $stmt->close();
   
   header('Location: cart.php');
   exit();
}

if(isset($_GET['delete_all'])){
   $stmt = $conn->prepare("DELETE FROM `cart` WHERE User_Email = ? ");
   $stmt->bind_param("s", $userEmail);

   $stmt->execute();
   $stmt->close();
   
   header('Location: cart.php');
   exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="CSS/style.css">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">
   
</head>
<body>
<?php include 'header.php'; ?>

<div class="container">
<section class="shopping-cart">
   <h1 class="heading">Shopping Cart</h1>
   <table>
      <thead>
         <th>Image</th>
         <th>Name</th>
         <th>Price</th>
         <th>Quantity</th>
         <th>Total Price</th>
         <th>Action</th>
      </thead>
      <tbody>
      <?php
// ... (previous code)

$grand_total = 0;

// Prepare the SQL statement to fetch cart items for the logged-in user
$stmt = $conn->prepare("SELECT * FROM `cart` WHERE User_Email = ?");
$stmt->bind_param("s", $userEmail);
$stmt->execute();
$select_cart = $stmt->get_result();

if($select_cart->num_rows > 0){
    while($fetch_cart = $select_cart->fetch_assoc()){
        $price = floatval($fetch_cart['price']);
        $quantity = intval($fetch_cart['quantity']);
        $sub_total = $price * $quantity;
        ?>
        <tr>
            <td><img src="images/<?php echo htmlspecialchars($fetch_cart['image']); ?>" height="100" alt=""></td>
            <td><?php echo htmlspecialchars($fetch_cart['name']); ?></td>
            <td>$<?php echo number_format($price, 2); ?>/-</td>
            <td>
                <form action="" method="post">
                    <input type="hidden" name="update_quantity_id" value="<?php echo intval($fetch_cart['Cart_ID']); ?>" >
                    <input type="number" name="update_quantity" min="1" value="<?php echo $quantity; ?>" >
                    <input type="submit" value="Update" name="update_update_btn">
                </form>   
            </td>
            <td>$<?php echo number_format($sub_total, 2); ?>/-</td>
            <td><a href="cart.php?remove=<?php echo intval($fetch_cart['Cart_ID']); ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> Remove</a></td>
        </tr>
        <?php
        $grand_total += $sub_total;  
    }
} else {
    echo "<tr><td colspan='6'>Your cart is empty</td></tr>";
}
$stmt->close();
?>

         <tr class="table-bottom">
            <td><a href="shop.php" class="option-btn" style="margin-top: 0;">Shopping</a></td>
            <td colspan="3">Grand Total</td>
            <td>$<?php echo number_format($grand_total, 2); ?>/-</td>
            <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
         </tr>
      </tbody>
   </table>
   <div class="checkout-btn">
      <a href="checkout.php" class="btn <?= ($grand_total > 1) ? '' : 'disabled'; ?>">Proceed to Checkout</a>
   </div>
</section>
</div>
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
<!-- custom js file link  -->
<script src="js/script.js"></script>
</body>
</html>
