<?php
session_start();
  require('connection.php');
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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        <script scr="script.js">

        </script>
       
        <!-- Navbar start-->
      
        <nav class="navbar navbar-expand-lg p-3 fs-6 navbar-primary .bg-green">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h4>Fasion World</h4></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- Account Dropdown -->
        <li class="nav-item dropdown">
          <a class="" href="logout.php"  aria-expanded="false">
           <h4> Logout </h4>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

      <section id="contact-details"  class ="section-p1">
        <div class="container bg-light">

            <form  action="ProducerLogIN.php" method="POST"  class="my-5">
                
                <div>
                <label for="exampleInputEmail1" class="form-label">Company Name</label>
                    <input type="text" name ="CName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Give us valid Name</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="Password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <div class="row">
                        <div class="col-10">
                        <a href="#">Forget Password</a> 
                        </div>
                        <div class="col-2">
                        <h4><a href="ProducerSignUP.php">Sign UP</a></h4> 
                        </div>
                    </div>
                   
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" name="login" value="login" class="btn btn-primary">Submit</button>
                    </div>
               
           </form>

          
        </div>
      </section>
      
    </body>
</html>


<?php

 // Ensure this is correctly pointing to your database connection script

if (isset($_POST['login'])) {
    $U_Email = $_POST['CName'];
    $U_password = $_POST['Password'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM prosignup WHERE CName = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $U_Email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password = $row['Password'];

            // Verify the password
           
                // Password is correct, store user info in session
                $_SESSION['CName'] = $row['CName'];
                //$_SESSION['U_Email'] = $row['U_Email'];

                // Redirect to the homepage
                header('Location: Add_ProductIMG.php');
                exit();
           
        } else {
            // No user found with that email
            echo "<script>alert('No user found with that email.');</script>";
        }

        $stmt->close();
    } else {
        // Query preparation failed
        echo "<script>alert('Database query failed. Please try again later.');</script>";
    }

    $conn->close();
}
?>



