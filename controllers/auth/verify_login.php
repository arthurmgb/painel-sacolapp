<?php

$pathToInclude = 'path.php';
include_once(__DIR__ . '/../' . $pathToInclude);
session_set_cookie_params(86400);
session_start();

$path = $url . "login";

if (!isset($_SESSION['id'])) {
    header("Location: $path");
    exit();
}
