<?php
//init session
session_start();
?>

<ul class="topnav" id="nav">
  <li><a href="index.php">Home</a></li>
  <?php

  //Check to see if $_Sessions if empty. If yes shows login page.
  if(!isset($_SESSION['UserID'])){//If no sessoin is set
    echo '<li><a href="signup.php">Sign Up</a></li>'; //show signup page

    include("configAdmin.php");

    $sql ="SELECT login FROM adminsettings WHERE root='root'";
    if ($result = mysqli_query($db, $sql)){
      while($row=mysqli_fetch_assoc($result)){
        if($row['login']==1){//turn in on off the login feature
          echo '<li><a href="login.php">Log In</a></li>';
        }else{
        };
      }
    }
  }else{//Display these if signed in.
    $admin = $_SESSION['IsAdmin'];
    if($admin == 1){
      echo '<li><a href="admin.php">Admin</a></li>';
    }else {

    }
    echo '<li><a href="profile.php">Profile</a></li>';
    echo '<li id="logout"><a href="logout.php">Log Out</a></li>';
  }
  //Check if user is admin. If user is admin then show Admin panel
  ?>
  <li><a href="qa.php">Ask</a></li>
  <li id="searchbar"><input placeholder="Search" type="search" maxlength=50 name=Search></li>
</ul>

<!-- Script that highlights the tab on the navbar that you are currently on. -->
<script>
function setActive() {
  /*Looks for ID = nav and then looks through the list for tags "a" */
  aObj = document.getElementById('nav').getElementsByTagName('a');
  for(i=0;i<aObj.length;i++) {
    if(document.location.href.indexOf(aObj[i].href)>=0) {
      aObj[i].className='active';
    }
  }
}

window.onload = setActive;
</script>
