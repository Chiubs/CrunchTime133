<?php
//eventForm.php
session_start();

$connect = new PDO('mysql:host=localhost;dbname=time_crunch_planner', 'root', '');

if (isset($_POST["eventName"])) {
    $start = $_SESSION['start'];
    $end = $_SESSION['end'];

    $ID = $_SESSION['userID']; //user id to divide calendar functions by user 

    $title = $_POST['eventName'];
    $start_time = $_POST['event_time']; //taking event_time from post
    $end_time = $_POST['event_time_end'];

    $event = date('Y-m-d H:i:s', strtotime("$start $start_time")); //adding times to the date, allowing time of event to be set
    $event_end = date('Y-m-d H:i:s', strtotime("$start $end_time"));

    $query = "
                   INSERT INTO events
                   (date, end, userID, eventName)
                   VALUES ('$event', '$event_end', '$ID', '$title')
                   ";

    $statement = $connect->query($query);

    header('Location: /homepage.php'); //redirect
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Add Event Form</title>

    <link rel="stylesheet" href="eventFormStyle.css" />

</head>

<body>
    <!--Contact Form-->
    <div>
        <form class="contact-form" action="eventForm.php" id="contact-form" method="post" enctype="multipart/form-data">
            <h1>Create New Event</h1>

            <div>
                <div>
                    <label>Event Name: </label>
                </div>
                <div>
                    <input type="text" name="eventName" class="inputBox" />
                </div>
            </div>
            <div class="Time">
                <div>
                </div>
                <h1>
                    <! Time inputs need styling>
                        <label for="event_time">Start time:</label>
                        <input type="time" id="time_id" name="event_time">
                </h1>
            </div>
            <div class="Time">
                <div>
                </div>
                <h2>
                    <label for="event_time_end">End time:</label>
                    <input type="time" id="time_id" name="event_time_end">
                </h2>
            </div>
            <div>
                <div>
                    <! Remove?>
                        <label>Comments (Optional):
                </div>
                <div>
                    <textarea id="message" name="comment" class="inputBox"></textarea>
                </div>
            </div>
            <div>
                <input type="submit" id="send" name="reate" value="Create" class="btn" />
            </div>
        </form>
    </div>
</body>

</html>