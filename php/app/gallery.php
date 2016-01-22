<?php
include("config/layout.php");

$page = new layout();
$page->page_title = "Főoldal - Kisbadacsony-dűlői Baráti Egyesület";
$page->do_header();
$page->do_content();
$page->do_navbar();

$imgdir = "images/pince";
if (!file_exists($imgdir)) {
  echo "Directory [".$imgdir."] does not exist!<br>";
} else {
  $myImages = scandir($imgdir);
  foreach ($myImages as $file) {
    if ( $file[0] == "." ) { continue; }
    echo '<img src="'.$imgdir."/".$file.'" class="img-thumbnail" alt="'.$file.'" width="300" height="300">';
  }
}
$page->end_content();
?>
