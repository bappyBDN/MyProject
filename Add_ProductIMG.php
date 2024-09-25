<?php
  require('connection.php');
  
  session_start();

// Check if the user is logged in
if (isset($_SESSION['CName'])) {
    $userName = $_SESSION['CName'];
    
} else {
    // Redirect to login page if not logged in
    header('Location: ProducerLogIN.php');
    exit();
}
?>

<?php
//session_start();

// Check if the user is logged in
//if (!isset($_SESSION['CName'])) {
    //header("Location: ProducerLogIN.php");
  //  exit();
//}
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>ADD COMPANY </title>
        <link rel="stylesheet" href="CSS/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
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

    <div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Add IMG of products</h2>

                      </div>
                    </div>

                      <div class="container-folid border-top broder-success">
                        <form action="Add_ProductIMG.php" method="Post" enctype="multipart/form-data">
                            <table class="table">

                            <tr>
                                    <td>Company Name:</td>
                                     <td>
                                        <input type="text" name="IG_CName" placeholder="Company Name">

                                     </td>

                                    </tr>


                                <tr>
                                    <td>Title:</td>
                                     <td>
                                        <input type="text" name="IG_Title" placeholder="Product Title">

                                     </td>

                                    </tr>



                                    <tr>
                                        <td>Select Image:</td>
                                        <td>
                                            <input type="file" name="IG_Name">
                                            </td>

                                    </tr>
                                    <tr>
                                    <td>Price:</td>
                                     <td>
                                        <input type="number" name="IG_Price" placeholder="Product Price">

                                     </td>

                                    </tr>


                                    <tr>
                                    <td>Feature:</td>
                                     <td>
                                        <input type="radio" name="IG_Feature" value="Yes">Yes
                                        <input type="radio" name="IG_Feature" value="No">No
                                        
                                        
                                     </td>

                                    </tr>
                                    <tr>
                                    <td>Action:</td>
                                     <td>
                                        <input type="radio" name="IG_Actio" value="Yes">Yes
                                        <input type="radio" name="	IG_Actio" value="No">No
                                        
                                        
                                     </td>

                                    </tr>

                                    <tr>
                                        <td colspan="2">
                                            <input type="submit" name="submit" value="Add Category" class="btn-secondary">
                                        </td>
                                    </tr>
                            </form>

                       </div>
                 



    </div>

    <?php 
      if(isset($_POST['submit']))
      {
       // echo "Clicked";
      
       $IG_Title=$_POST['IG_Title'];
       $IG_CName=$_POST['IG_CName'];
       $IG_Price=$_POST['IG_Price'];
       //$IG_Name=$_POST['IG_Name'];

       if(isset($_POST['IG_Feature']))
       {

        $IG_Feature=$_POST['IG_Feature'];

      }
      else{
        $IG_Featur = "NO";

      }

      if(isset($_POST['IG_Action']))
      {

       $IG_Action=$_POST['IG_Action'];

     }
     else{
       $IG_Action = "NO";

     }



        if(isset($_FILES['IG_Name']['name']))
        {
            $IG_Name=$_FILES['IG_Name']['name'];

            $source_path = $_FILES['IG_Name']['tmp_name'];

            $destination_path ="images/$IG_Name";
            
            $uplode = move_uploaded_file($source_path,$destination_path);

            if($uplode==false)
            {
                echo "Uplode failed";
            }

        }
        else{

            $IG_Name="";
        }

     


     $sql = "insert into product_img (IG_Title,IG_CName, IG_Name,IG_Price,IG_Feature,IG_Action)
     values('$IG_Title','$IG_CName','$IG_Name','$IG_Price','$IG_Feature','$IG_Action')";

     $res = mysqli_query($conn, $sql);
     
     if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
       }else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      //$conn->close();
    }

    ?>


  
     </body>

  </html>


