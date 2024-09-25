<?php

require('connection.php');

if(isset($_POST['order_btn'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $number = mysqli_real_escape_string($conn, $_POST['number']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $method = mysqli_real_escape_string($conn, $_POST['method']);
   $flat = mysqli_real_escape_string($conn, $_POST['flat']);
   $street = mysqli_real_escape_string($conn, $_POST['street']);
   $city = mysqli_real_escape_string($conn, $_POST['city']);
   $pin_code = mysqli_real_escape_string($conn, $_POST['pin_code']);

   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $product_name = [];

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = htmlspecialchars($product_item['name']) . ' (' . intval($product_item['quantity']) . ') ';
         $product_price = floatval($product_item['price']) * intval($product_item['quantity']);  // Ensure $product_price is a numeric value
         $price_total += $product_price;  // This will now add a proper numeric value to $price_total
      }
   }

   $total_product = implode(', ', $product_name);
   $price_total_formatted = number_format($price_total, 2);  // Formatting only when displaying

   // Prepared statement for secure database insertion
   $stmt = $conn->prepare("INSERT INTO `order` (name, number, email, method, flat, street, city, pin_code, total_products, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
   $stmt->bind_param("sssssssssd", $name, $number, $email, $method, $flat, $street, $city, $pin_code, $total_product, $price_total);

   if($stmt->execute()){
      echo "
      <div class='order-message-container'>
         <div class='message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
               <span>{$total_product}</span>
               <span class='total'> Total : \${$price_total_formatted}/-  </span>
            </div>
            <div class='customer-details'>
               <p> Your name : <span>{$name}</span> </p>
               <p> Your number : <span>{$number}</span> </p>
               <p> Your email : <span>{$email}</span> </p>
               <p> Your address : <span>{$flat}, {$street}, {$city}, - {$pin_code}</span> </p>
               <p> Your payment mode : <span>{$method}</span> </p>
               <p>(*pay when product arrives*)</p>
            </div>
            <a href='shop.php' class='btn'>Continue shopping</a>
         </div>
      </div>";
   } else {
      echo "<div class='error-message'>Order submission failed. Please try again.</div>";
   }

   $stmt->close();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>checkout</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="style.css">

</head>
<body>

<?php include 'header.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">complete your order</h1>

   <form action="" method="post">

   <div class="display-order">
    <?php
               $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
               $total = 0;
               $grand_total = 0;

               if(mysqli_num_rows($select_cart) > 0){
                  while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                     // Ensure price and quantity are numeric
                     $price = is_numeric($fetch_cart['price']) ? $fetch_cart['price'] : 0;
                     $quantity = is_numeric($fetch_cart['quantity']) ? $fetch_cart['quantity'] : 0;

                     // Calculate total price
                     $total_price = $price * $quantity;

                     // Update grand total
                     $total += $total_price;
                     $grand_total = $total;

                     // Format total price for display
                     $formatted_total_price = number_format($total_price, 2);
               ?>
            <span><img src="images/<?php echo htmlspecialchars($fetch_cart['image']); ?>" height="40" alt=""><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
      <?php
            }
         } else {
            echo "<div class='display-order'><span>your cart is empty!</span></div>";
         }
      ?>

      <span class="grand-total"> grand total : $<?= $grand_total; ?>/- </span>
   </div>

      <div class="flex">
         <div class="inputBox">
            <span>your name</span>
            <input type="text" placeholder="enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>your number</span>
            <input type="number" placeholder="enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>your email</span>
            <input type="email" placeholder="enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>payment method</span>
            <select name="method">
               <option value="cash on delivery" selected>cash on devlivery</option>
               <option value="credit cart">credit cart</option>
               <option value="paypal">paypal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>address line 1</span>
            <input type="text" placeholder="e.g. flat no." name="flat" required>
         </div>
         <div class="inputBox">
            <span>address line 2</span>
            <input type="text" placeholder="e.g. street name" name="street" required>
         </div>
         <div class="inputBox">
            <span>city</span>
            <input type="text" placeholder="e.g. Dhaka" name="city" required>
         </div>
        
         <div class="inputBox">
            <span>pin code</span>
            <input type="text" placeholder="e.g. 123456" name="pin_code" required>
         </div>
      </div>
      <input type="submit" value="order now" name="order_btn" class="btn">
   </form>

</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>
   
</body>
</html>