<?php
      //insert.php
      session_start();
      $connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

      if(isset($_POST["start"]))
      {
            //only used to set session variables, which we will use in our Event Form 
            $_SESSION['start']= $_POST['start'];
            $_SESSION['end']= $_POST['end'];
      }
?>
