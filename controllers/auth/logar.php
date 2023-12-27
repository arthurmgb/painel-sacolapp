<?php
session_set_cookie_params(86400);
session_start();
include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]);
    $senha = trim($_POST["senha"]);

    if (empty($usuario) || empty($senha)) {
        echo "Todos os campos devem ser preenchidos.";
        exit();
    }

    try {
        $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :usuario");
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch();
            if (password_verify($senha, $row['senha'])) {
                // Senha correta, inicia a sessão e redireciona para a página protegida
                $_SESSION['id'] = $row['id'];
                $_SESSION['nome'] = $row['nome'];
                $_SESSION['usuario'] = $row['usuario'];
                $_SESSION['is_admin'] = $row['is_admin'];
                echo 'success';
                exit();
            }
        }

        // Se chegou aqui, usuário ou senha incorretos
        echo "Usuário ou senha incorretos.";
        exit();
    } catch (PDOException $e) {
        echo "Erro ao tentar fazer login.";
    }
}
