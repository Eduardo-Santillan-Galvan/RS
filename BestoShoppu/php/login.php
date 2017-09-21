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
  
  $log = "Intento de inicio de sesión. \n";
  $log .= "Usuario: " . $username . " - Contraseña: " . $password . "\n";

  $connection = Connect2DB();
  
  $query = "SELECT * FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
  $result = $connection->query($query);

  fwrite($logfile, $log);

  $rows = $result->num_rows;
  if ($rows == 1) {
    $_SESSION['login_user']=$username; // Initializing Session
    fwrite($logfile, "Sesión iniciada.\n\n");
    header("location: ../"); // Redirecting To Other Page
  } else {
    $error = "Username or Password is invalid";
    consoleLog("No dice");
    fwrite($logfile, "Error en los datos.\n\n");
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
  <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Iniciar Sesión</button>
  <a class="btn btn-lg btn-primary btn-block" href="./php/register.php">Crear Cuenta</a>
</form>