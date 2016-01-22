<?php
include("config/layout.php");

$page = new layout();
$page->page_title = "Belépés - Kisbadacsony-dűlői Baráti Egyesület";
$page->custom_styles = '<link href="css/signin.css" rel="stylesheet">';
$page->do_header();
$page->do_content();
$page->do_navbar();
?>
  <div class="container">
    <form class="form-signin">
      <h2 class="form-signin-heading">Regisztráció</h2>
      <label for="inputUserName" class="sr-only">Felhasználónév</label>
      <input type="text" id="inputUserName" class="form-control" placeholder="Felhasználónév" required autofocus>
      <label for="inputSurName" class="sr-only">Vezetéknév</label>
      <input type="text" id="inputSurName" class="form-control" placeholder="Vezetéknév" required>
      <label for="inputFirstName" class="sr-only">Keresztnév</label>
      <input type="text" id="inputFirstName" class="form-control" placeholder="Keresztnév" required>
      <label for="inputEmail" class="sr-only">Email cím</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email cím" required>
      <label for="inputPassword" class="sr-only">Jelszó</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Jelszó" required>
      <label for="inputPassword" class="sr-only">Jelszó még egyszer</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Jelszó még egyszer" required>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Regisztráció</button>
    </form>
  </div> <!-- /container -->
<?php
$page->end_content();
?>
