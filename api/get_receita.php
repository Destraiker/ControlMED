<?php

include __DIR__ . '/../control/ReceitaControl.php';

$receitaControl = new ReceitaControl();

header('Content-Type: application/json');

echo json_encode($receitaControl->findAll());
?>