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
  <div id ="questionDiv" class="container">
    <div class="row">
      <div class="one column" style="margin-top: 5%">
      </div>
    <div class="eleven columns" style="margin-top: 5%">

      <h1>BugOverflow</h1>
      <h4>Top Questions</h4>

      <?php
      include('config.php');

      $sql = "SELECT * FROM questions";
      $result = $db->query($sql);

      ?>
      <table class"u-full-width">
        <thead>
          <tr>
            <th>Question</th>
            <th>Description</th>
            <th>User</th>

          </tr>
        </thead>
        <tbody>
          <tr>
          <?php if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {

            $id=$row['QuestionId'];
            $title= $row['Title'];
            //Input Question string into a variable.
            $Question = $row['Question'];
            //Break up all words in the string into array
            $breakUp = explode(' ', $Question);
            //Select the first 10 words and store that as a variable to later print.
            $firstWords = array_slice($breakUp, 0, 10);

            echo "<tr>";
            echo '<td>'.'<a href="showQuestion.php?id=' . $id . '">' . $title . '</a>'.'</td>';
            echo "<td>" . implode(' ',$firstWords) . "..." . "</td>";
            $sql2 = "SELECT UserName FROM users WHERE UserId = $row[UserId]";
            $username = $db->query($sql2);
            $row2 = $username->fetch_assoc();
            echo "<td>" . $row2["UserName"] . "</td>";
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
