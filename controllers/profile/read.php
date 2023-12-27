<?php

include_once('../database/db_connection.php');

if (isset($_SESSION['id'])) {

    $usuarioLogado = $_SESSION['usuario'];

    try {

        $stmt = $pdo->prepare("SELECT nome, usuario FROM usuarios WHERE usuario = :usuarioLogado");
        $stmt->bindParam(':usuarioLogado', $usuarioLogado);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        $nome = $usuario['nome'];
        $usuario = $usuario['usuario'];
    } catch (PDOException $e) {

        echo "Erro ao buscar dados do usuário: " . $e->getMessage();
    }
} else {
    exit();
}
