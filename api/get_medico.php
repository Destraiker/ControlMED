<?php

include __DIR__ . '/../control/Medico.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

if (!empty($data)) {
    try {
        $medicoControl = new MedicoControl();
        $medicoControl->find($data->crm);
        http_response_code(200);
        echo json_encode($obj);
    } catch (PDOException $e) {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
    }
} else {
    $medicoControl = new MedicoControl();

    header('Content-Type: application/json');

    echo json_encode($medicoControl->findAll());


}
