<?php

include __DIR__ . '/../control/FarmaciaControl.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$cnpj = $obj->cnpj;

if (!$cnpj) {
    http_response_code(400);
    echo json_encode(array("mensagem" => "É necessário um ID para atualização"));
} else {
    if (!empty($data)) {
        $farmaciaControl = new FarmaciaControl();
        $farmaciaControl->update($obj, $cnpj);
    }
}
?>