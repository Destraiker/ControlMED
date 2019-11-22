<?php

include __DIR__ .'/../control/Medico.php';

$medicoControl = new MedicoControl();

header('Content-Type: application/json');

echo json_encode($medicoControl->findAll());
?>