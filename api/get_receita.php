<?php

include __DIR__ . '/../control/Receita.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

if (!empty($data)) {
    try {
        $receitaControl = new ReceitaControl();
        $result=$receitaControl->find($obj);
        echo json_encode($result);
    } catch (PDOException $e) {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
    }
} else {
    $receitaControl = new ReceitaControl();

    header('Content-Type: application/json');

    echo json_encode($receitaControl->findAll());
}
