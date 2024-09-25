<?php 
  require('connection.php');

  if (isset($_GET['register'])) {
    $U_FName  = $_GET['U_FName'];
    $U_Email  = $_GET['U_Email'];
    $U_password = $_GET['U_password'];

    // Insert the plain password into the database (not recommended for production)
    $sql = "INSERT INTO user_login (U_FName, U_Email, U_password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $U_FName, $U_Email, $U_password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
      header('Location: userlogin.php');
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
  }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="CSS/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
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

<div class="container mt-5">
  <div class="container-fluid bg-white shadow p-5 rounded">
    <div class="row">
      <h2 class="text-success text-center p-2">Sign Up</h2>
    </div>
    <div class="container-fluid border-top border-success">
      <form action="usersignup.php" method="GET">
        <div class="row m-3">
          <div class="col">
            <label for="" class="form-label">Name:</label>
            <input type="text" class="form-control" placeholder="Enter Name" name="U_FName" required>
          </div>
        </div>
        <div class="row m-3">
          <div class="col">
            <label for="" class="form-label">Email:</label>
            <input type="email" class="form-control" placeholder="Enter email" name="U_Email" required>
          </div>
        </div>
        <div class="row m-3">
          <div class="col">
            <label for="" class="form-label">Password:</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="U_password" required>
          </div>
        </div>
        <div class="d-flex justify-content-center my-4">
          <button type="submit" name="register" value="register" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</div>
</body>
</html>
