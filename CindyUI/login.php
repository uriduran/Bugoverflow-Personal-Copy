<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>Bugoverflow</title>
  <meta name="Stackoverflow reverse engineered for bugs!" content="">
  <meta name="author" content="">

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width,initial-scale=1"/>

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS/JS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/overflow.css">
  <link rel="stylesheet" href="css/skeleton.css">
  <link rel="stylesheet" href="css/custom.css">
  <script type="text/javascript" src="faker.js/build/build/faker.js"></script>

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/ladyicon.png">

</head>
<body>
  <!--Loads in navbar.html-->
  <!--If you need to change the navbar just change the navbar.php-->
<?php
include_once('navbar.php');
include_once('config.php');

//Login checking DB
  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = mysqli_real_escape_string($db,$_POST['username']);
    $password = mysqli_real_escape_string($db,$_POST['password']);

    //Looking to see if username and pass are in the DB
    $sql = "SELECT * FROM users WHERE UserName = '$username' and Password = '$password'";
    $result = mysqli_query($db,$sql);
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //if user and pass are in DB then the returned rows will equal 1
    $count = mysqli_num_rows($result);


    if($count ==1){//if one row is returned set sessions
      //Store username in session
      $_SESSION['UserName'] = $username;
      //Store admin count if 1 = admin if 0 = not admin
      $_SESSION['IsAdmin'] = (int) $row['IsAdmin'];
      $_SESSION['UserID'] = (int) $row['UserId'];


      header("location: index.php");
    }else {
      $message = "Username or Password is incorrect.";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }

  }

  var_dump($_SESSION);
?>

  <!-- Primary Page Layout–––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">
  <div class="row">
    <div class="six columns" style="margin-top: 25%">
      <h2 class="loginTitle">BugOverflow</h2>
      <h4 class="loginIntro">Welcome back to BugOverflow, part of the NatureOverflow network.</h4>
        <a href="signup.php">Not a member?</a>
    </div>

    <div id="marginLogin" class="six columns">

      <form action "" method = "post">
      <label for="exampleEmailInput">Username</label>
        <input name="username" class="u-full-width" placeholder = "Username" type="text"  id="exampleEmailInput">
          <label for="password">Password</label>
        <input name="password" class="u-full-width" type="password" value="" placeholder="SuperSecretPassword" id="password">
          <input class="button-primary" type="submit" value="Submit">

        </form>
    </div>
  </div>
</div>




<!-- End Document
Welcome back to Bug Overflow, part of the Nature Overflow network.
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
