<?php
include("config/layout.php");

$page = new layout();
$page->page_title = "Főoldal - Kisbadacsony-dűlői Baráti Egyesület";
$page->do_header();
$page->do_content();
$page->do_navbar();
?>
  <div class="jumbotron">
    <div class="container">
      <p class="text-right">Üdvözöljük a</p>
      <h1 class="text-right">Kisbadacsony-dűlői<br>Baráti Egyesület</h1>
      <p class="text-right">honlapján</p>
    </div>
  </div>
<?php
$page->end_content();
?>
