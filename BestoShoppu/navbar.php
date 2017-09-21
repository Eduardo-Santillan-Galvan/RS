<?php 

include("./php/connection.php");
include_once("./php/usefulScripts.php");

// This will be replaced, depending if session has started or not
$navbarFragment = "";


session_start(); // Starting Session

if(isset($_SESSION['login_user'])){
  consoleLog("Sesión iniciada.");
  $navbarFragment = '<li class="dropdown">'
  .'<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'
  ."Bienvenido, " . $_SESSION['login_user'] . "!" //Logged user name
  .'<span class="caret"></span></a>'
  .'<ul class="dropdown-menu">'
  .'<li id="profile"><a href="#">Profile</a></li>'
  .'<li role="separator" class="divider"></li>'
  .'<li><a href="./php/logout.php">Log out</a></li>' //Log out option
  .'</ul>'
  .'</li>';
}else{
  $navbarFragment = '<a href="./php/login.php">Iniciar sesión</a>';
}

?>

<head>
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1"> 
	<title></title>
	<!-- Default libraries -->
	<script src="./js/jquery-3.2.1.js"></script>
	<script src="./bootstrap/jsbootstrap.min.js"></script>
	<link rel="stylesheet" href="./bootstrap/bootstrap.min.css">

	<!-- Personal styles -->
	<link rel="stylesheet" href="./css/styles.css">
  <!-- Personal scripts -->
  <script src="./js/navbar.js"></script>

</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top menu">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./">Besto Shoppu</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      

      <ul class="nav navbar-nav">
        <li><a href="#">Otro</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Artículos<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li id="all-items"><a href="#">Todos</a></li>
          </ul>
        </li>
      </ul>
      

      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      

      <ul class="nav navbar-nav navbar-right">
        <li><?php echo $navbarFragment;?>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>