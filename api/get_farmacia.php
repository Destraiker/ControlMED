<?php

include __DIR__ . '/../control/FarmaciaControl.php';

$farmaciaControl = new FarmaciaControl();

header('Content-Type: application/json');

echo json_encode($farmaciaControl->findAll());
?>