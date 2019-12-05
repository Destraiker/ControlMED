<?php

include __DIR__ .'/../control/Farmacia.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

if (!empty($data)) {
    try {
        $FarmaciaControl = new FarmaciaControl();
        echo $FarmaciaControl->login($obj);   
    } catch (PDOException $e) {
        http_response_code(400);
        echo json_encode(array("mensagem" => "Parâmetros Inválidos"));
    }
} else {
    http_response_code(400);
    echo json_encode(array("mensagem" => "Não foram enviados parâmetros"));
}
?>