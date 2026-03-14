<?php

$title = 'Internet Joke Database';

ob_start();
// aqui ocurre el reder del partial
include "../templates/home.html.php";
$output = ob_get_clean();


include "../templates/layout.html.php";