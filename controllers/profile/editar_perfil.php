<?php
session_start();
include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_SESSION['id'])) {

        $usuarioLogado = $_SESSION['usuario'];
        $novoNome = trim($_POST['nome']);
        $novoUsuario = trim($_POST['usuario']);

        if (empty($novoNome) || empty($novoUsuario)) {
            echo json_encode(array("message" => "Todos os campos devem ser preenchidos."));
            exit();
        }

        try {

            // Verifica se o novo usuário já existe no banco (exceto se for o mesmo usuário logado)
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = :novoUsuario AND usuario != :usuarioLogado");
            $stmt->bindParam(':novoUsuario', $novoUsuario);
            $stmt->bindParam(':usuarioLogado', $usuarioLogado);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo json_encode(array("message" => "Este usuário já está em uso. Escolha outro."));
                exit();
            }

            // Atualiza nome e/ou usuário na tabela de usuários
            $stmt = $pdo->prepare("UPDATE usuarios SET nome = :novoNome, usuario = :novoUsuario WHERE usuario = :usuarioLogado");
            $stmt->bindParam(':novoNome', $novoNome);
            $stmt->bindParam(':novoUsuario', $novoUsuario);
            $stmt->bindParam(':usuarioLogado', $usuarioLogado);
            $stmt->execute();

            // Verifica se houve alteração bem-sucedida
            if ($stmt->rowCount() > 0) {
                $_SESSION['usuario'] = $novoUsuario;
                $_SESSION['nome'] = $novoNome;
                echo json_encode(array("message" => "success", "sessionNome" => $novoNome));
            } else {
                echo json_encode(array("message" => "Nenhuma alteração realizada no perfil."));
            }
        } catch (PDOException $e) {
            echo json_encode(array("message" => "Erro ao atualizar perfil: " . $e->getMessage()));
        }
    } else {
        echo json_encode(array("message" => "Usuário não autenticado."));
    }
} else {
    echo json_encode(array("message" => "Requisição inválida."));
}
