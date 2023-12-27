<?php
include_once('../path.php');

session_start();

// Remove todas as variáveis de sessão
$_SESSION = array();

// Invalida a sessão
session_destroy();
$path = $url . "login";

// Redireciona para a página de login ou qualquer outra página após o logout
header("Location: $path");
exit();
