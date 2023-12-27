<?php

include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id = trim($_POST["id"]);

    if (empty($id)) {
        echo "Erro! ID não fornecido.";
        exit();
    }

    try {

        $sql = "UPDATE pedidos SET situacao = 1 WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        echo "success";
    } catch (PDOException $e) {
        echo "Erro ao concluir pedido: " . $e->getMessage();
    }
}
