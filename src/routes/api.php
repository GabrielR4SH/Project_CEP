<?php
require_once __DIR__ . '/../controllers/CepController.php';

// Definir a rota para buscar CEP
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/^\/api\/cep\/(\d{8})$/', $_SERVER['REQUEST_URI'], $matches)) {
    $cep = $matches[1];
    $controller = new CepController();
    $controller->getCep($cep);
}
