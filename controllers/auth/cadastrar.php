<?php

include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $usuario = trim($_POST["usuario"]);
    $senha = trim($_POST["senha"]);

    if (empty($nome) || empty($usuario) || empty($senha)) {
        echo "Todos os campos devem ser preenchidos.";
        exit();
    }

    try {

        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "Este usuário já está em uso. Escolha outro.";
            exit();
        }

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $criado_em = date("Y-m-d H:i:s");

        $sql = "INSERT INTO usuarios (nome, usuario, senha, criado_em) VALUES (:nome, :usuario, :senha, :criado_em)";
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':usuario', $usuario);
        $stmt->bindParam(':senha', $senhaHash);
        $stmt->bindParam(':criado_em', $criado_em);

        $stmt->execute();

        echo "success";
    } catch (PDOException $e) {
        echo "Erro ao cadastrar usuário: " . $e->getMessage();
    }
}
