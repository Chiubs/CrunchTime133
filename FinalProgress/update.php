<?php
session_start();
//update.php

$connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

if(isset($_POST["id"]))
{
 $query = "
 UPDATE events
 SET eventName=:title, date=:start_event, end=:end_event
 WHERE eventNum=:id
 ";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':title'  => $_POST['title'],
   ':start_event' => $_POST['start'],
   ':end_event' => $_POST['end'],
   ':id'   => $_POST['id']
  )
 );
}

?>
