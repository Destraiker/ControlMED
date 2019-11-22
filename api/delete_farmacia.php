<?php

include __DIR__ . '/../control/Farmacia.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$cnpj = $obj->cnpj;

if (!empty($data)) {
    $farmaciaControl = new FarmaciaControl();
    $farmaciaControl->delete($obj, $cnpj);
    header('Location:index.php');
}
?>