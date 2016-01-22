<?php

function is_active($site) {
    if ($_SERVER["PHP_SELF"] == "/".$site) {
        echo ' class="active"';
    }
}

