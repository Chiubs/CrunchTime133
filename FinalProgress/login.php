<?php
$errorMessage = "";
$conn = mysqli_connect("localhost", "root", "", "time_crunch_planner");
if (isset($_POST["username"]) && isset($_POST["password"])){
      if(isset($_SESSION['username'])){ //if the login is broken, check that this didn't break it
            session_start();
            session_unset();
            session_destroy();
      }

      if(!$conn){
          die("Connection failed" . mysqli_connect_error());
      }

      $username = $_POST['username'];
      $pin = $_POST['password'];

      if (empty($username) || empty($pin)){
            echo "variables empty";
            exit();
      }
      else {
            $sql = "SELECT * FROM useraccounts WHERE username=?;";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)) {
                  echo "first if error";
                  exit();
            }
            else{
                  //mysqli_stmt_bind_param($stmt, "si", $username, $username);
                  mysqli_stmt_bind_param($stmt, "s", $username);
                  mysqli_stmt_execute($stmt);
                  $result = mysqli_stmt_get_result($stmt);

                  if ($row = mysqli_fetch_assoc($result)){
                        $pwdCheck = password_verify($pin, $row['pin']);
                        if(!($pin == $row['pin'])){
                              $errorMessage = "<b>Error:</b> Sign in failed. Incorrect username or password.";
                        }
                        else{
                              session_start();
                              $_SESSION['userID']= $row['userID'];
                              $_SESSION['fname']= $row['fname'];
                              $_SESSION['lname']= $row['lname'];
                              $_SESSION['username']= $row['username'];
                              $_SESSION['email']= $row['email'];

                              //echo "Success! Logged in as " .$_SESSION['fname']. " " .$_SESSION['lname']. ". Your user ID is " .$_SESSION['userID']. " and your email is " .$_SESSION['email']. ".";

                              //header('Location: /test_userpage.php');
                              /*NOTE: Use the above line to redirect to the page needed, i.e. Location: /homepage.php*/
                        }
                  }
                  else{
                        $errorMessage = "Error: Sign in failed. User entered does not have an account.";
                  }
            }
      }
}
else {
      echo ""; //will remove this once I figure some stuff out
}
?>

<html lang="en" dir="ltr">
  <head>
        
    <meta charset="utf-8">
    <title>Login</title>
    <link rel ="stylesheet" type = "text/css" href = "style.css">
</head>
<link rel ="stylesheet" type = "text/css" href = "style.css">
    <body>
    <div class = titleFont>
    <h2> Time </h2>
    <h3> Crunch </h3>
    <h4> Planner </h4>
    </div>
          <div class = "loginbox">
                <img src = "CalendarMark.jpg" class = "avatar">
                         <h1>Login</h1>
                              <p style = "color: red; text-align: center;" ><?php echo $errorMessage ?></p>
                            <form action = "login.php" method="post">
                                    <p><input type= "text" name = "username" placeholder = "username" required></p>
                                    <p><input type= "password" name = "password" placeholder = "pin" required></p>
                              <p><button type = "submit" name= "login-submit" class = "btn" >Login</button></p>
                              </form>
                              <button onclick="document.location='register.php'" class = "btn" >Register here</button>
                        </div>
            </div>
      </body>
