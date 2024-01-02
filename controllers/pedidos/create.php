<?php

session_start();
include_once('../../database/db_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $message = trim($_POST["message"]);
    $nome = trim($_POST["pedidoInputNome"]);
    $end = trim($_POST["pedidoInputEnd"]);
    $wpp = trim($_POST["pedidoInput"]);

    try {

        $recebido_em = date("Y-m-d H:i:s");

        $sql = "INSERT INTO pedidos (descricao, nome, endereco, whatsapp, recebido_em) VALUES (:descricao, :nome, :endereco, :whatsapp, :recebido_em)";

        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':descricao', $message);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':endereco', $end);
        $stmt->bindParam(':whatsapp', $wpp);
        $stmt->bindParam(':recebido_em', $recebido_em);


        $stmt->execute();

        echo "success";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
