<?php
session_start();
$UserID = $_SESSION['UserID'];
//$answer = $_POST['post_answer'];
//echo $answer;
 include("config.php");
$random = rand(0,100000000);
$answer = $db->real_escape_string($_REQUEST['post_answer']);
$id = $db->real_escape_string($_REQUEST['post_id']);

     $sql = "INSERT INTO answers (QuestionId,UserId,Answer, AnswerId)
             VALUES ('$id','$UserID','$answer','$random')";
             if ($db->query($sql)===TRUE){
               echo "<script type= 'text/javascript'>alert('Question was succesfully posted');</script>";
             } else {
               echo "<script type= 'text/javascript'>alert('Error: ERROR');</script>";
             }
header("Location: showQuestion.php?id=".$id);

    ?>
