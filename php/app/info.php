<?php
include("config/layout.php");

$page = new layout();
$page->page_title = "Információ - Kisbadacsony-dűlői Baráti Egyesület";
$page->do_header();
$page->do_content();
$page->do_navbar();
?>
  <div class="container">
    <div class="page-header">
      <h1>Közérdekű információk</h1>
      <p class="lead">Hasznos információk a társaságról, rendezvényekről</p>
    </div>
    <h3>Info1 cim</h3>
    <p>Info 1 tartalom</p>
    
    <h3>Info2 cim</h3>
    <p>Info 2 tartalom</p>
  </div>
<?php
$page->end_content();
?>
