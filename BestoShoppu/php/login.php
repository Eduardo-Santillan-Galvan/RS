<?PHP
session_start(); // Starting Session

include("connection.php");
include_once("usefulScripts.php");

$logfile = fopen("../log.txt", "a");

$log = 'a';
$error='a'; // Variable To Store Error Message

if(isset($_SESSION['login_user'])){
  header("location: ./profile.php");
  consoleLog("Sesión iniciada.");
}


if (isset($_POST['submit'])) {
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];
  
  $log = "Session try. \n";
  $log .= "username: " . $username . " - password: " . $password . "\n";
  //file_put_contents('./log.txt', $log, FILE_APPEND);

  $connection = Connect2DB();
  
  $query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
  $result = $connection->query($query);
  consoleLog("$result->num_rows");
  //fetch tha data from the database
  consoleLog("$query");

  while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
    $log .= "user:". $row['username'] . " \t pwd: " . $row['password'] . "\n";
    
  //echo "u";
  }

  fwrite($logfile, $log);

  $rows = $result->num_rows;
  if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    consoleLog("Login succesful");
    fwrite($logfile, "Success.\n\n");
    header("location: /"); // Redirecting To Other Page
  } else {
    $error = "Username or Password is invalid";
    consoleLog("No dice");
    fwrite($logfile, "Failed.\n\n");
  }

    $connection->close(); // Closing Connection
    fclose($logfile);
}


?>

<head>      
  <!-- Default libraries -->
  <script src="../js/jquery-3.2.1.js"></script>
  <script src="../bootstrap/jsbootstrap.min.js"></script>
  <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">

  <!-- Personal styles -->
  <link rel="stylesheet" href="../css/styles.css">

</head>


<form action="" class="form-signin" method="POST">
  <h2 class="form-signin-heading">Please Login</h2>
  <div class="input-group">
    <span class="input-group-addon" id="basic-addon1">@</span>

    <input type="text" name="username" class="form-control" placeholder="Username" required>

  </div>
  <label for="password" class="sr-only">Password</label>

  <input type="password" name="password" class="form-control" placeholder="Password" required>

  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>
  <a class="btn btn-lg btn-primary btn-block" href="./php/register.php">Register</a>
</form>