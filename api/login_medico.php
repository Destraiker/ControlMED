<?php

include __DIR__ .'/../control/Medico.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

if (!empty($data)) {
    try {
        $medicoControl = new MedicoControl();
        echo $medicoControl->login($obj);   
    } catch (PDOException $e) {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
?>