<?php

include __DIR__ . '/../control/Receita.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$id_receita = $obj->id_receita;

if (!empty($data)) {
    $receitaControl = new ReceitaControl();
    $receitaControl->delete($obj, $id_receita);
    header('Location:index.php');
}
?>