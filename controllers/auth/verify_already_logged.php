<?php
session_set_cookie_params(86400);
session_start();

if (isset($_SESSION['id'])) {
    header("Location: ./");
    exit();
}
