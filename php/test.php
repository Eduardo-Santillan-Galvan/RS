
<?php	
session_start(); // Starting Session

include("connection.php");
include_once("usefulScripts.php");



if(isset($_SESSION['login_user'])){
	echo "Sesión iniciada.";
	echo "Hello " . $_SESSION['login_user'];
echo '<h3><a href="logout.php">Click here to log out</a></h3>';
}else{
	echo "No hay una sesión iniciada.<br>";
}

if (isset($_POST['submit'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];

    $_SESSION['login_user'] = $_POST['username'];
    header("location: /"); // Redirecting To Other Page
}

//echo $_POST['username'] . " - " . $_POST['password'] . "<br>";
	
	$connection = Connect2DB();
	consoleLog("Before Query");
	$query = "SELECT * FROM users";
	$result = $connection->query($query);

//fetch tha data from the database
while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
   
   echo "<br> id:". $row['id'] . " | user: " . $row['username'];
	//echo "u";

}

?>


<html>
 <head>
  <title>Prueba de PHP</title>


  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

  <link rel="stylesheet" href="../css/styles.css" >

  <!-- Latest compiled and minified JavaScript -->
  <script src="../js/jquery-3.2.1.js"></script>
  <script src="../bootstrap/bootstrap.min.js"></script>


 </head>
 <body>

<form action="<?=$_SERVER['PHP_SELF']?>" class="form-signin" method="POST">
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
 </body>
</html>