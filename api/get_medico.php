<?php

include __DIR__ . '/../control/MedicoControl.php';

$medicoControl = new MedicoControl();

header('Content-Type: application/json');

echo json_encode($medicoControl->findAll());
?>