<?php
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

            <form action="PSignUPConfirm.php" method="POST" class="my-5">
                <div class="mb-3">
                    <label for="" class="form-label">Company Name</label>
                    <input type="text" name="CName" class="form-control">
                    <div id="emailHelp" class="form-text"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="PassWord" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Confirm Password</label>
                    <input type="password" name="CPassWord" class="form-control" id="exampleInputPassword1">
                </div>
             
                <div class="d-flex justify-content-center">
                <button type="submit" name="register" value="register" class="btn btn-primary">Submit</button>
                    </div>
               
           </form>

          
        </div>
      </section>


      <?php
  
  if (isset($_POST['register'])) {
    $CName = $_POST['CName'];
    $Password = $_POST['Password'];
    $CPassword = $_POST['CPassword'];
    if($Password==$CPassWord){
        $hash = password_hash($Password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO prosignup(CName, Password) VALUES ('$CName','$hash')";
        $result = $conn->query($sql);

    }
   
   
    if ($result == TRUE) {
      header('Location: ProducerLogIN.php');
    }else{
      echo "Error:". $sql . "<br>". $conn->error;
    }
    $conn->close();
  }
?>


    </body>
</html>