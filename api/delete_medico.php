<?php

include __DIR__ . '/../control/MedicoControl.php';

$data = file_get_contents('php://input');
$obj = json_decode($data);

$crm = $obj->crm;

if (!empty($data)) {
    $medicoControl = new MedicoControl();
    $medicoControl->delete($obj, crm);
    header('Location:index.php');
}
?>