

<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD Product </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

      
    <?php
      
      if(isset($_GET['U_FName'])){

         $U_FName    =$_GET['U_FName'];
         $U_Lname  =$_GET['U_Lname'];
         $U_Email   =$_GET['U_Email'];
         $U_Address    =$_GET['U_Address'];
         $U_PNum  =$_GET['U_PNum'];
         $U_password   =$_GET['U_password'];


        $sql = "insert into user_login(U_FName,U_Lname,U_Email,U_Address,U_PNum,U_password )
        values('$U_FName','$U_Lname','$U_Email','$U_Address','$U_PNum','$U_password')";

            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
              } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
              }
              
              //$conn->close();


      }
      

       ?>

   

<div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Sign UP</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                        <form action="usersignup.php" method="GET">
                        <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Product ID:</label>
                        <input type="text" class="form-control" placeholder="Enter First Name" name="U_FName">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Products Name:</label>
                        <input type="text" class="form-control" placeholder="Enter last Name" name="U_Lname">
                        </div>
                 </div>
                 
                 <div class="row m-3">
                        <div class="col">
                        <label for="" class="form-label">Product Catagory:</label>
                        <input type="text" class="form-control" placeholder="Enter email" name="U_Email">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Company Name:</label>
                        <input type="text" class="form-control" placeholder="Enter Address" name="U_Address">
                        </div>
                 </div>
                 
                 <div class="row m-3">
                 <div class="col">
                 <label for="" class="form-label">Company ID:</label>
                        <input type="number" class="form-control" placeholder="Enter phonr no" name="U_PNum">
                        </div>
                        <div class="col">
                        <label for="" class="form-label">Price:</label>
                        <input type="password" class="form-control" placeholder="Proudet rate" name="U_password">
                        </div>
                 </div>
                <div class="d-flex justify-content-center my-4">
                <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                    </div>
                        </form>
             
                      </div>

      
             </div>


       

     </body>

  </html>

