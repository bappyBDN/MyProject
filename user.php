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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Fashion World</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .profile-img {
            width: 200px; /* Increased size for the circular image */
            height: 200px; /* Increased size for the circular image */
            object-fit: cover; /* Ensures the image covers the box without distortion */
            border-radius: 50%; /* Makes the image circular */
            border: 3px solid #dee2e6; /* Optional border for better visibility */
        }
        .card-custom {
            min-height: 350px; /* Ensures both cards are of equal height */
        }
    </style>
</head>
<body>

<?php include 'header.php'; ?>

<div class="container mt-5">
    <div class="row">
        <!-- User Info Card -->
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-header">
                   <h1> User Information </h1>
                </div>
                <div class="card-body text-center">
                    <!-- Profile Image -->
                    <img src="images/f1.png" alt="Profile Image" class="profile-img mb-3">
                    <h3 class="card-title">Welcome, <?php echo htmlspecialchars($userName); ?>!</h3>
                    <p class="card-text">Your email: <?php echo htmlspecialchars($userEmail); ?></p>
                </div>
            </div>
        </div>

        <!-- Update Info Card -->
        <div class="col-md-6">
            <div class="card card-custom">
                <div class="card-header">
                   <h1> Update Information </h1>
                </div>
                <div class="card-body">
                    <form action="update_info.php" method="post">
                        <div class="mb-3">
                            <label for="newName" class="form-label"><h3>New Name</h3></label>
                            <input type="text" class="form-control" id="newName" name="newName" required>
                        </div>
                        <div class="mb-3">
                            <label for="newEmail" class="form-label"><h3>New Email</h3></label>
                            <input type="email" class="form-control" id="newEmail" name="newEmail" required>
                        </div>
                        <button type="submit" class="btn btn-primary"><h3>Update</h3></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-9A6Uu2D0b6J8HpJ4/3AdzFfKfSkxXT9y4y2f5rM2VzjD1IO2mX7Jv7RtP0HTpZbY" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-c6M2T9z72g3r7E4Y7H8WgJW5rj6p7P5c5wZ6FdO4Jf/4D5T6f8B9+HfBoZs4mWVo" crossorigin="anonymous"></script>

</body>
</html>

