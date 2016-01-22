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
       <h2 class="form-signin-heading">Belépés</h2>
       <label for="inputEmail" class="sr-only">Email cím</label>
       <input type="email" id="inputEmail" class="form-control" placeholder="Email cím" required autofocus>
       <label for="inputPassword" class="sr-only">Jelszó</label>
       <input type="password" id="inputPassword" class="form-control" placeholder="Jelszó" required>
       <div class="checkbox">
         <label>
           <input type="checkbox" value="remember-me"> Emlékezz rám!
         </label>
       </div>
       <button class="btn btn-lg btn-primary btn-block" type="submit">Belépés</button>
     </form>
  </div> <!-- /container -->
<?php
$page->end_content();
?>
