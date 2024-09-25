<?php
session_start();
require('connection.php'); // Ensure this is correctly pointing to your database connection script

if (isset($_POST['login'])) {
    $U_Email = $_POST['U_Email'];
    $U_password = $_POST['U_password'];

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM user_login WHERE U_Email = ? AND U_password = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("ss", $U_Email, $U_password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Password is correct, store user info in session
            $_SESSION['U_FName'] = $row['U_FName'];
            $_SESSION['U_Email'] = $row['U_Email'];

            // Redirect to the homepage
            header('Location: user.php');
            exit();
        } else {
            // No user found with that email and password combination
            echo "<script>alert('Invalid email or password.');</script>";
        }

        $stmt->close();
    } else {
        // Query preparation failed
        echo "<script>alert('Database query failed. Please try again later.');</script>";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shop</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <script src="script.js"></script>
    <nav class="navbar navbar-expand-lg p-3 fs-6 navbar-primary .bg-green">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><h4>Fashion World</h4></a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="" href="logout.php" aria-expanded="false">
               <h4> Logout </h4>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <section id="contact-details" class="section-p1">
        <div class="container bg-light">
            <form class="my-5" action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="U_Email" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="U_password" required>
                </div>
                <div class="mb-3 form-check">
                    <div class="row">
                        <div class="col-10">
                            <a href="#">Forget Password</a>
                        </div>
                        <div class="col-2">
                            <h4><a href="usersignup.php">Sign Up</a></h4>
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
