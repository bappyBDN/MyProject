

<?php
  require('connection.php');
?>

  <!DOCTYPE html>

  <html>
    <head>
        <title>Producer SIGN UP </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>

    

                <div class="container "><!--start Container-->
                  <div class="container-folid bg-light border-bottom border-success"><!--topbar-->
                      <div class="row">
                      <h2 class="text-success text-center p-2">Sign UP</h2>

                      </div>

                      <div class="container-folid border-top broder-success">
              
                          <form action="ProducerSignUP.php" method="POST" enctype="multipart/form-data" class="row g-3">
                            <div class="col-md-4">
                              <label for="validationDefault01" class="form-label">Company name</label>
                              <input type="text" name="CName" class="form-control" id="validationDefault01" value="X" required>
                            </div>
                            <div class="col-md-4">
                              <label for="validationDefault02" class="form-label">Company ID</label>
                              <input type="number" name="P_ID" class="form-control" id="validationDefault02" value="000" required>
                            </div>
                            <div class="col-md-4">
                              <label for="validationDefaultUsername" class="form-label">Trade Lisence No</label>
                              <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend2"></span>
                                <input type="number" name="TLN" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="formFileMultiple" class="form-label">Uplode trade lisence & others documents</label>
                              <input class="form-control" type="file" name="Files" id="formFileMultiple validationDefault02" multiple  required>
                            </div>
                            <div class="col-md-6">
                              <label for="validationDefault03" class="form-label">City</label>
                              <input type="text" name="City" class="form-control" id="validationDefault03" required>
                            </div>
                            <div class="col-md-3">
                              <label for="validationDefault05" class="form-label">Zip</label>
                              <input type="text" name="Zip" class="form-control" id="validationDefault05" required>
                            </div>
                            </div>
                            
                            <div class="col-12">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                  Agree to terms and conditions
                                </label>
                              </div>
                            </div>
                            <div class="col-12">
                              <button class="btn btn-primary" type="submit" name="submit" >Submit form</button>
                            </div>
                          </form>
             
                      </div>

      
             </div>





     <?php 
      if(isset($_POST['submit']))
      {
       // echo "Clicked";
      
       $CName=$_POST['CName'];
       $P_ID=$_POST['P_ID'];
       $TLN=$_POST['TLN'];
       //$Files=$_POST['Files'];
       $City=$_POST['City'];
       $Zip=$_POST['Zip'];

       if(isset($_POST['Files']))
       {

        $Files=$_POST[''];

      }
      

        if(isset($_FILES['Files']['name']))
        {
            $Files=$_FILES['Files']['name'];

            $source_path = $_FILES['Files']['tmp_name'];

            $destination_path ="Files/$Files";
            
            $uplode = move_uploaded_file($source_path,$destination_path);

            if($uplode==false)
            {
                echo "Uplode failed";
            }

        }
        else{

            $Files="";
        }
     $sql = "insert into producersup (P_ID,CName,TLN,Files,City,Zip)
     values('$P_ID','$CName','$TLN','$Files','$City','$Zip')";

     $res = mysqli_query($conn, $sql);
        
     
     
     if ($conn->query($sql) === TRUE) {
         echo "New record created successfully";
       
       }
       if ($res == TRUE) {
        header('Location: PSignUPConfirm.php');
       }//else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
     // }
      
     // $conn->close();
    }

  ?>


       

     </body>

  </html>

