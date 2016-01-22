<?php

include("functions.php");

class layout {
    var $page_title = "";
    var $site_title = "Kisbadacsony-dűlői baráti egyesület";

    function __construct() {
        global $site_title;
        $this->site_title = $site_title;
    }
// -------------------------------------
// Header
// -------------------------------------
    function do_header() {
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
<?php if (isset($this->page_title)) {
    echo $this->page_title;
} else {
    echo $this->site_title."talaldki";
} ?>
	</title>
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/rendek.css">
<?php if (isset($this->custom_styles)) { ?>
        <!-- Custom styles for this template -->
<?php   echo $this->custom_styles;
      }
?>
    </head>
<?php
    }
// end header

// -------------------------------------
// Content
// -------------------------------------

    function do_content() {
?>
    <body>
<?php
    }

    function end_content() {
?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    </body>
</html>
<?php
    }
// end content

// -------------------------------------
// Navbar
// -------------------------------------
    function do_navbar() {
?>
  <nav class="navbar navbar-default">
    <div class="container">
      <ul class="nav navbar-nav">
        <li<?php is_active("home.php"); ?>><a href="home.php">Kezdőlap</a></li>
        <li<?php is_active("info.php"); ?>><a href="info.php">Közérdekű Információ</a></li>
        <li<?php is_active("gallery.php"); ?>><a href="gallery.php">Galéria</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right" role="login">
        <li<?php is_active("login.php"); ?>><a href="login.php">Belépés</a></li>
        <li<?php is_active("register.php"); ?>><a href="register.php">Regisztráció</a></li>
    </div>
  </nav>
<?php
    }
// end navbar

}
