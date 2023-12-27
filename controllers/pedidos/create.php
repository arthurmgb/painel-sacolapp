<?php

session_start();
include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $message = trim($_POST["message"]);
    $wpp = trim($_POST["pedidoInput"]);

    try {

        $recebido_em = date("Y-m-d H:i:s");

        $sql = "INSERT INTO pedidos (descricao, whatsapp, recebido_em) VALUES (:descricao, :whatsapp, :recebido_em)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':descricao', $message);
        $stmt->bindParam(':whatsapp', $wpp);
        $stmt->bindParam(':recebido_em', $recebido_em);


        $stmt->execute();

        echo "success";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
