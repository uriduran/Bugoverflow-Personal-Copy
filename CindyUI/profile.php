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
      <div class="eleven columns" style="margin-top: 25%">

              <h1>Hello, <?php echo $_SESSION['UserName']?></h1>
              <h4>Your Questions</h4>

              <?php
              include('config.php');

              $sql = "SELECT * FROM questions WHERE UserId = $_SESSION[UserID]";
              $result = $db->query($sql);
              ?>
              <table class"u-full-width">
                <thead>
                  <tr>
                    <th>Question</th>
                    <th>Description</th>

                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <?php if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $id=$row['QuestionId'];
                    $title= $row['Title'];
                    echo "<tr>";
                    echo '<td>'.'<a href="showQuestion.php?id=' . $id . '">' . $title . '</a>'.'</td>';
                    echo "<td>" . $row["Question"] . "</td>";
                    echo "</tr>";
                  }
                  } else {
                    echo "0 results";
                  }
                  $db->close();
                ?>
                </tr>
              </tbody>
              </table>


      </div>
    </div>
  </div>



<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
