<?php

include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = trim($_GET["id"]);

    if (empty($id)) {
        echo "Erro! ID não fornecido.";
        exit();
    }

    try {
        // Busca as informações do pedido
        $sql_pedido = "SELECT * FROM pedidos WHERE id = :id";
        $stmt_pedido = $pdo->prepare($sql_pedido);
        $stmt_pedido->bindParam(':id', $id);
        $stmt_pedido->execute();
        $pedido = $stmt_pedido->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($pedido);
    } catch (PDOException $e) {
        echo "Erro ao obter informações: " . $e->getMessage();
    }
}
