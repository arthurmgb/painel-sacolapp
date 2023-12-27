<?php
session_start();
include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['id'])) {

        $usuarioLogado = $_SESSION['usuario'];
        $senhaAtual = trim($_POST['senha_atual']);
        $novaSenha = trim($_POST['nova_senha']);

        if (empty($senhaAtual) || empty($novaSenha)) {
            echo json_encode(array("message" => "Todos os campos devem ser preenchidos."));
            exit();
        }

        try {
            // Verifica a senha atual do usuário
            $stmt = $pdo->prepare("SELECT senha FROM usuarios WHERE usuario = :usuarioLogado");
            $stmt->bindParam(':usuarioLogado', $usuarioLogado);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($resultado && password_verify($senhaAtual, $resultado['senha'])) {
                // Atualiza a senha
                $novaSenhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);
                $updateStmt = $pdo->prepare("UPDATE usuarios SET senha = :novaSenhaHash WHERE usuario = :usuarioLogado");
                $updateStmt->bindParam(':novaSenhaHash', $novaSenhaHash);
                $updateStmt->bindParam(':usuarioLogado', $usuarioLogado);
                $updateStmt->execute();

                if ($updateStmt->rowCount() > 0) {
                    echo json_encode(array("message" => "success"));
                } else {
                    echo json_encode(array("message" => "Nenhuma alteração realizada na senha."));
                }
            } else {
                echo json_encode(array("message" => "Senha atual incorreta."));
            }
        } catch (PDOException $e) {
            echo json_encode(array("message" => "Erro ao atualizar a senha: " . $e->getMessage()));
        }
    } else {
        echo json_encode(array("message" => "Usuário não autenticado."));
    }
} else {
    echo json_encode(array("message" => "Requisição inválida."));
}
