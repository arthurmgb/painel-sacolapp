<?php

include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    try {
        $stmt = $pdo->prepare("SELECT * FROM pedidos");
        $stmt->execute();
        $pedidos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Retorna os pedidos como JSON
        echo json_encode($pedidos);
    } catch (PDOException $e) {
        echo "Erro ao obter a lista de pedidos: " . $e->getMessage();
    }
}
