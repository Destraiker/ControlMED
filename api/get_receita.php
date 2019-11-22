<?php

include __DIR__ . '/../control/Receita.php';

$receitaControl = new ReceitaControl();

header('Content-Type: application/json');

echo json_encode($receitaControl->findAll());
?>