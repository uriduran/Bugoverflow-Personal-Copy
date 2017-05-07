
<?php
  session_start();

  include("config.php");
  $title = $db->real_escape_string($_REQUEST['post_title']);
  $question = $db->real_escape_string($_REQUEST['post_question']);
  $location = $db->real_escape_string($_REQUEST['post_location']);
  $UserID = $_SESSION["UserID"];
  $random = rand(0,100000000);

  $sql = "INSERT INTO questions (Title, Question, UserId, location, QuestionId)
          VALUES ('$title','$question','$UserID','$location','$random')";
  if ($db->query($sql)===TRUE){
    echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
  } else {
    echo "<script type= 'text/javascript'>alert('Error: ERROR');</script>";
    }

    header("Location: showQuestion.php?id=".$random);
    ?>
