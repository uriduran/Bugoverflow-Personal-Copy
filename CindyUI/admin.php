<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>BugOverflow</title>
  <meta name="Stackoverflow reverse engineered for bugs!" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/overflow.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <script type="text/javascript" src="faker.js/build/build/faker.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<body>
  <!-- Load in Navbar
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <?php
  include_once('navbar.php');
  ?>
  <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="container">
    <div class="row">
      <div class="one-half column" style="margin-top: 10%">

      <h4>Admin Page</h4>

      <form method="post" action="?" enctype="multipart/form-data">
      <h5>Read-Only Mode:<?php
      include("configAdmin.php");
      $sql ="SELECT readonly FROM adminsettings WHERE root='root'";

      if ($result = mysqli_query($db, $sql)){
        while($row=mysqli_fetch_assoc($result)){
          if($row['readonly']==1){
            echo " On";
          }else{
            echo " Off";
          };
        }

      }
      ?>
      </h5>
      <input class="button-primary" value="ON" type="submit" name="ON">
      <input class="button-primary" value="OFF" type="submit" name="OFF">
      </form>
      <?php
      if (isset($_POST['ON'])){
         include("configAdmin.php"); //MAKES WEBSITE READ ONLY
         $on = "REVOKE INSERT ON *.* FROM 'root'@'localhost'";
                 if ($db->query($on)===TRUE){
                   echo "<script type= 'text/javascript'>Read-Only Mode Activated('Question was succesfully posted');</script>";
                 } else {
                   echo "<script type= 'text/javascript'>alert('Error: ERROR');</script>";
                 }
        $updateOn = "UPDATE adminsettings SET readonly=1 WHERE root='root'";
        $db->query($updateOn);
        Header('Location: admin.php');
      }
      if(isset($_POST['OFF'])){
        include("configAdmin.php");
        $on = "GRANT INSERT ON *.* TO 'root'@'localhost'";
                if ($db->query($on)===TRUE){
                  echo "<script type= 'text/javascript'>Read-Only Mode Activated('Question was succesfully posted');</script>";
                } else {
                  echo "<script type= 'text/javascript'>alert('Error: ERROR');</script>";
                }
        $updateOff = "UPDATE adminsettings SET readonly=0 WHERE root='root'";
        $db->query($updateOff);
        Header('Location: admin.php');
      }
       ?>

       <form method="post" action="?" enctype="multipart/form-data">
       <h5>Map Feature:<?php
       include("configAdmin.php");
       $sql ="SELECT mapaccess FROM adminsettings WHERE root='root'";

       if ($result = mysqli_query($db, $sql)){
         while($row=mysqli_fetch_assoc($result)){
           if($row['mapaccess']==1){
             echo " On";
           }else{
             echo " Off";
           };
         }

       }
       ?>
       </h5>
       <input class="button-primary" value="ON" type="submit" name="ONM">
       <input class="button-primary" value="OFF" type="submit" name="OFFM">
       </form>
       <?php
       if (isset($_POST['ONM'])){
          include("configAdmin.php"); //MAKES WEBSITE READ ONLY
         $updateOnM = "UPDATE adminsettings SET mapaccess=1 WHERE root='root'";
         $db->query($updateOnM);
         Header('Location: admin.php');
       }
       if(isset($_POST['OFFM'])){
         include("configAdmin.php");
         $updateOffM = "UPDATE adminsettings SET mapaccess=0 WHERE root='root'";
         $db->query($updateOffM);
         Header('Location: admin.php');
       }
        ?>
        <form method="post" action="?" enctype="multipart/form-data">
        <h5>Login In:<?php
        include("configAdmin.php");
        $sqlL ="SELECT login FROM adminsettings WHERE root='root'";

        if ($resultL = mysqli_query($db, $sqlL)){
          while($rowL=mysqli_fetch_assoc($resultL)){
            if($rowL['login']==1){
              echo " On";
            }else{
              echo " Off";
            };
          }

        }
        ?>
        </h5>
        <input class="button-primary" value="ON" type="submit" name="ONL">
        <input class="button-primary" value="OFF" type="submit" name="OFFL">
        </form>
        <?php
        if (isset($_POST['ONL'])){
           include("configAdmin.php"); //MAKES WEBSITE READ ONLY
          $updateOnL = "UPDATE adminsettings SET login=1 WHERE root='root'";
          $db->query($updateOnL);
          Header('Location: admin.php');
        }
        if(isset($_POST['OFFL'])){
          include("configAdmin.php");
          $updateOffL = "UPDATE adminsettings SET login=0 WHERE root='root'";
          $db->query($updateOffL);
          Header('Location: admin.php');
        }
         ?>

      </div>
    </div>
  </div>

<!-- End Document–––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
