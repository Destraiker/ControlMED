<?php

include __DIR__ . '/../control/Medico.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$crm = $obj->crm;

if (!$crm) {
    http_response_code(400);
    echo json_encode(array("mensagem" => "É necessário um ID para atualização"));
} else {
    if (!empty($data)) {
        $medicoControl = new MedicoControl();
        $medicoControl->update($obj, $crm);
    }
}
?>