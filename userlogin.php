
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
      <section id="header">
      <h4>Fasion World</h4>
      <!-- <a href ="#"><img src="images/logo.png" class="logo" alt=" "> </a>-->
        <div>
            <ul id="navber">
                <li><a  href="index.php">Home</a></li>
                <li><a  href="shop.php">Shop</a></li>
                <li><a  href="blog.php">Blog</a></li>
                <li><a  href="about.php">About</a></li>
                <li><a class="active" href="contact.php">Contact</a></li>
                <li><a href="cart.php"><i class="fal fa-shopping-cart"> </i>></i></a></li>
            </ul>
        </div>
      </section>
     

      <section id="contact-details"  class ="section-p1">
        <div class="container bg-light">

            <form class="my-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <div class="row">
                        <div class="col-10">
                        <a href="#">Forget Password</a> 
                        </div>
                        <div class="col-2">
                        <h4><a href="usersignup.php">Sign UP</a></h4> 
                        </div>
                    </div>
                   
                </div>
                <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               
           </form>

          
        </div>
      </section>


    </body>
</html>