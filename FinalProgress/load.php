<?php

//load.php
session_start();
$connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

$data = array();

$ID = $_SESSION['userID'];

$query = "SELECT * FROM events WHERE userID='$ID' ORDER BY eventNum";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'start'   => $row["date"],
  'end'   => $row["end"],
  'id'   => $row["eventNum"],
  'title'   => $row["eventName"]
 );
}

echo json_encode($data);

?>
