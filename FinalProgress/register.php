<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Sign up</title>

  <link rel="stylesheet" type = "text/css" href="stylesregister.css">
</head>

<body>
  </div>
  <div class = titleFont>
    <h2> Time </h2>
    <h3> Crunch </h3>
    <h4> Planner </h4>
    </div>
  <div class="registerBox">
    <img src="CalendarMark.jpg" class="avatar">
    <h1>Registration</h1>
    <div id="form">
      <form action="register.php" method="post">
        <div class="form-group">
          <label for="First name"> First name:</label>
          <input name="fname" type="text" placeholder = "First Name">
        </div>
        <div class="form-group">
          <label for="Last name"> Last name: </label>
          <input name="lname" type="text" placeholder = "Last Name">
        </div>
        <div class="form-group">
          <label for="Username"> Username: </label>
          <input name="username" type="text" placeholder = "User Name">
        </div>
        <div class="form-group">
          <label for="Pin"> PIN: </label>
          <input name="pin" type="password" placeholder = "PIN Number">
        </div>

        <!--div class = "form-group">
        <label for ="Password">Password: </label>
        <input type ="password" name="password">
      </div-->
        <div class="form-group">
          <label for="Email"> Email: </label>
          <input name="email" type="text" placeholder = "Email">
        </div>
        <input type="submit" name="submit" id="submit"></input>
       
      </form>
      <button onclick="document.location='login.php'" class = "btn">Have an account?</button>
    </div>
  </div>
  </div>
  <?php
  if (
    isset($_POST["fname"]) && isset($_POST["lname"]) && isset($_POST["username"])
    /*&& isset($_POST["password"])*/ && isset($_POST["pin"]) && isset($_POST["email"])
  ) {
    if (
      $_POST["fname"] && $_POST["lname"] && $_POST["username"] && /*$_POST["password"] &&*/ $_POST["pin"]
      && $_POST["email"]
    ) {

      $valid = TRUE;
      $userID = rand(100000, 199999); //expand random number range if needed
      $fname = $_POST["fname"];
      $fnameValidation = $_POST["fname"];
      if (!preg_match("/^[a-zA-Z ]*$/", $fnameValidation)) {
        $nameErr = "Only letters and white space allowed";
        die("Only letters and white space allowed in first name");
      }

      $lname = $_POST["lname"];
      $lnameValidation = $_POST["lname"];
      if (!preg_match("/^[a-zA-Z ]*$/", $lnameValidation)) {
        $nameErr = "Only letters and white space allowed";
        die("Only letters and white space allowed in last name");
      }

      $username = $_POST["username"];
      //$password = $_POST["password"]; //Commented out password just in case

      $pin = $_POST["pin"];
      $pinValidation = $_POST["pin"];
      if (!preg_match("/^[0-9]*$/", $pinValidation)) {
        $nameErr = "Only letters and white space allowed";
        die("only numbers are allowed into pin ");
      }
      /*
    pin input validation
    if it not a number it is invalid
    */

      $email = $_POST["email"];
      $emailValidation = $_POST["email"];
      if (!filter_var($emailValidation, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
        die("invalid email");
      }
      /*
    email input validation
    if it does not have the @ and the . in emails, it will be invalid
    */
      //$acctnum = rand(100000,199999);


      //Create connection
      $conn = mysqli_connect("localhost", "root", "", "time_crunch_planner"); //change "time_crunch_planner" based on database name

      //Check connection
      if (!$conn) {
        die("Connection failed" . mysqli_connect_error());
      }

      $validation = "SELECT username, email FROM useraccounts";

      $valresult = $conn->query($validation);

      if ($valresult->num_rows > 0) {
        while ($valrow = $valresult->fetch_assoc()) {
          if ($valrow["username"] == $username) {      //if there's already an acct with that name
            $valid = FALSE;
          } else if ($valrow["email"] == $email) {
            $valid = FALSE;
          }
        }
      }
      if ($valid) {
        //Register user
        $sql = "INSERT INTO useraccounts (userID, fname, lname, username, /*password,*/ pin, email) VALUES
                        ('$userID','$fname','$lname','$username','$pin','$email')";
        //$sql2 = "INSERT INTO accounts (userID) VALUES ('$userID')";


        // echo $sql;
        $results = mysqli_query($conn, $sql);


        /*if ($results) {
                    $accounts = "SELECT * FROM accounts";
                    $initialize = mysqli_query($conn, $accounts);
                    /*BEGIN: initializing the checking and savings accounts*/

        if ($results) {
          echo "Registered."; //As a toast message
          $sql2 = "INSERT INTO accounts (userID, acctname, balance) VALUES
                            ('$userID','Savings','0.00')"; //starting balance in each account is zero
          $message = "Success! Account registered.";
          $results2 = mysqli_query($conn, $sql2);
          echo "<meta http-equiv='refresh' content='0'>";
          //header('Location: login.php');
          //Change location based on where project folder is saved.
        } else {
          echo mysqli_error($conn);
          echo "Error.";
        }

        mysqli_close($conn);
      } else {
        echo "Error: that username or email is already in use.";
      }
    } else {
      echo "A field is empty."; //Also as a toast message
    }
  }
  /*else {
      echo "Form was not submitted.";
    }*/
  ?>
</body>

</html>