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
      <div class="ten columns" style="margin-top: 15%">
        <h1>Ask the Community</h1>

        <form method="post" action="allqa.php" enctype="multipart/form-data">

          <label for="title">Question</label>
          <input id="title" name="post_title" class="u-full-width" placeholder="&quot;What type of bug is this?&quot;" type="text">

          <label for="question">Message</label>
          <textarea id="question" name="post_question" class="u-full-width" placeholder="&quot;Has a smooth outer shell and 10 legs on abdomen.&quot;"></textarea>

          <label for="exampleLocation">Location &#40;Opt.&#41;</label>
          <input name="post_location" id="location" class="u-full-width" placeholder="&quot;Des Plaines Forest Preserve&#44; Des Plaines&#44; IL&quot;" type="text">

            <input class="u-full-width" type="file" name="userpic" accept="image/*">
            <input class="button" name="upload_image" value="Upload" type="submit">
          <input class="button-primary" value="submit" type="submit" name="submit">
        </form>
      </div>
    </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
