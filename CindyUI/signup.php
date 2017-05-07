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
  <link rel="icon" type="image/png" href="images/ladyicon.png">

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
      <div class="seven columns" style="margin-top: 25%">
        <h1>Join BugOverflow</h1>
        <h4>Signup to be able to ask all the bug questions you've ever wanted to.</h4>
        <code>Do ladybugs sleep?</code> <code>Is this spider venomous?</code><br>
        <code>What insect has the worst bite?</code><code>What is a surot?</code>
        <h5>We know you have many more.</h5>
        <a href="login.php">Already a member? Log in here!</a>  
      </div>
      <div class="five columns" style="margin-top: 25%">
        <label for="exampleEmailInput1">Username</label>
        <input class="u-full-width" type="text" placeholder="ilovebugz12" id="exampleEmailInput1">
        <label for="exampleEmailInput2">Email</label>
        <input class="u-full-width" type="email" placeholder="email@email.com" id="exampleEmailInput2">
        <label for="exampleEmailInput3">Password</label>
        <input class="u-full-width" type="password" placeholder="supersecretpassword" id="exampleEmailInput3">
        <input class="button-primary" value="Submit" type="submit">
      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
