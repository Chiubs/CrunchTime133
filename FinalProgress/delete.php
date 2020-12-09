<?php
      session_start();
      //delete.php

      if(isset($_POST["id"]))
      {
            $connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

             $id = $_POST['id'];

             $query = "
             DELETE from events WHERE eventNum='$id'
             ";

             $statement = $connect->query($query);

      }

?>
