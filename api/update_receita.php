<?php

include __DIR__ . '/../control/ReceitaControl.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$id_receita = $obj->id_receita;

if (!$id_receita) {
    http_response_code(400);
    echo json_encode(array("mensagem" => "É necessário um ID para atualização"));
} else {
    if (!empty($data)) {
        $receitaControl = new ReceitaControl();
        $receitaControl->update($obj, $id_receita);
    }
}
?>