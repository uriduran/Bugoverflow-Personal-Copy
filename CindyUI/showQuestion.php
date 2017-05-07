<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <title>BugOverflow</title>
  <meta name="Stackoverflow reverse engineered for bugs!" content="">
  <meta name="author" content="">

  <!-- Scripts for Geolocation/Map ---------------------->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>
    <script type="text/javascript" src="js/map.js"></script>
    <script src="jquery.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAw7fjiCqJxwIDVreAidefZjS0wbdOLzQo&callback=initMap"
    type="text/javascript"></script>

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

  <!-- Favicon–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="images/ladyicon.png">

</head>
<body>
  <!-- Load in Navbar–––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <?php
  include_once('navbar.php');
  include('config.php');

//Gets the ID value from the URL to display the right page.
$id = $_GET['id'];
//Query to select everything from the question where it matches the ID
  $QuestionsQuery = "SELECT * FROM questions WHERE QuestionId=$id";
  $QuestionsResult = $db->query($QuestionsQuery);
$db->close();//Close connection
?>

  <!--Primary Page Layout–––––––––––––––––––––––––––––––––––––––––––––––-->
  <div class="container">
    <div class="row">
      <div class="twelve columns"  id="questionDiv" style="margin-top: 0%">
        <h1>The Community Has Spoken</h1>
           <tr>
            <td><h2>Question:</h2></td>
           </tr>

           <?php //Display the contents of the query in table form.
            if ($QuestionsResult->num_rows > 0) {
           // output data of each row
           while($QuestionRow = $QuestionsResult->fetch_assoc()) {
             echo "<td><h5>" . $QuestionRow['Title'] . "</h5></td>";
             echo "<tr>";
             echo "<td><h4>Description:</h4></td>";
             echo '<td>' . $QuestionRow["Question"] . '</td>';
             echo "</tr>";
             echo "<td><h4>Location:</h4></td>";

             include("configAdmin.php");
             $sqlM ="SELECT mapaccess FROM adminsettings WHERE root='root'";

             if ($resultM = mysqli_query($db, $sqlM)){
               while($rowM=mysqli_fetch_assoc($resultM)){
                 if($rowM['mapaccess']==1){
                   echo "
                                  <td>
                                    <div id='map-div'></div>
                                  </td>";


                 }else{
                   echo "Maps has been temporarily disabled.";
                 };
               }

             }



             echo "</br>";
           }
           } else {
             echo "0 results";
           }
     ?>

          <form class="reply" action="submit.php" method="post" enctype="multipart/form-data">
            <label for="question"> Post Answer </label>
            <textarea id="question" name="post_answer" class="u-full-width" placeholder="&quot;Type here&quot;"></textarea>

            <!--Could not figure out how to pass the url ID. $_GET was not working so I am passing the ID value via a hidden form.
                This will submit the ID and the next page will retrieve via $_POST or $_REQUEST -->
            <textarea style="display:none;" id="question" name="post_id" class="u-full-width" placeholder="&quot;Type here&quot;"><?php echo $id; ?></textarea>

            <input class="button-primary" value="submit" type="submit" name="submit">

            </form>
          <table class"u-full-width">
          <thead>
            <tr>
              <th>User</th>
              <th>Answer</th>
            </tr>
          </thead>
              <tbody>

            <!--HERE LIES THE CODE TO DISPLAY THE ANSWERS-->
              <?php
              include('config.php');

              //Query to get all answers for that question
              $AnswersQuery = "SELECT * FROM answers WHERE QuestionId=$id";
              $AnswersResult = $db->query($AnswersQuery);

              if ($AnswersResult->num_rows > 0) {
              // output data of each row
              while($AnswersRow = $AnswersResult->fetch_assoc()) {

                $id=$AnswersRow['UserId'];//Sets $id to equal current user ID

                //Query to find users username that posted comment
                $UsersQuery = "SELECT UserName FROM users WHERE UserId = $id";
                $username = $db->query($UsersQuery);
                $UsersRow = $username->fetch_assoc();

                echo "<tr>";
                echo '<td>'.'<a href="profile.php?id=' . $id . '">' . $UsersRow['UserName'] . '</a>'.'</td>';
                echo "<td>" . $AnswersRow['Answer'] . "</td>";

              }
              } else {
                echo "No Answer Yet.";
              }

          ?>
        </tbody>
      </table>
      </div>
    </div>
  </div>



<!-- End Document –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
