<?php

include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    try {
        // Contagem de pedidos
        $sql_count_pedidos = "SELECT COUNT(*) AS total_pedidos FROM pedidos";
        $stmt_count_pedidos = $pdo->prepare($sql_count_pedidos);
        $stmt_count_pedidos->execute();
        $total_pedidos = $stmt_count_pedidos->fetch(PDO::FETCH_ASSOC)['total_pedidos'];

        // Contagem de pedidos pendentes
        $sql_count_pedidos_pendentes = "SELECT COUNT(*) AS total_pedidos_pendentes FROM pedidos WHERE situacao = 0";
        $stmt_count_pedidos_pendentes = $pdo->prepare($sql_count_pedidos_pendentes);
        $stmt_count_pedidos_pendentes->execute();
        $total_pedidos_pendentes = $stmt_count_pedidos_pendentes->fetch(PDO::FETCH_ASSOC)['total_pedidos_pendentes'];

        // Contagem de pedidos concluidos
        $sql_count_pedidos_concluidos = "SELECT COUNT(*) AS total_pedidos_concluidos FROM pedidos WHERE situacao = 1";
        $stmt_count_pedidos_concluidos = $pdo->prepare($sql_count_pedidos_concluidos);
        $stmt_count_pedidos_concluidos->execute();
        $total_pedidos_concluidos = $stmt_count_pedidos_concluidos->fetch(PDO::FETCH_ASSOC)['total_pedidos_concluidos'];

        // Contagem de pedidos cancelados
        $sql_count_pedidos_cancelados = "SELECT COUNT(*) AS total_pedidos_cancelados FROM pedidos WHERE situacao = 2";
        $stmt_count_pedidos_cancelados = $pdo->prepare($sql_count_pedidos_cancelados);
        $stmt_count_pedidos_cancelados->execute();
        $total_pedidos_cancelados = $stmt_count_pedidos_cancelados->fetch(PDO::FETCH_ASSOC)['total_pedidos_cancelados'];

        

        $response = [
            'total_pedidos' => $total_pedidos,
            'total_pedidos_pendentes' => $total_pedidos_pendentes,
            'total_pedidos_concluidos' => $total_pedidos_concluidos,
            'total_pedidos_cancelados' => $total_pedidos_cancelados
        ];

        echo json_encode($response);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'error' => 'Erro ao obter contagem: ' . $e->getMessage()]);
    }
}
