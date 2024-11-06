<?php
require_once __DIR__ . '/../controllers/CepController.php';

// Definir a rota para buscar CEP
//http://localhost:8000/api/cep/
if ($_SERVER['REQUEST_METHOD'] === 'GET' && preg_match('/^\/api\/cep\/(\d{8})$/', $_SERVER['REQUEST_URI'], $matches)) {
    $cep = $matches[1];
    $controller = new CepController();
    $controller->getCep($cep);
}

// Definir a rota para buscar um CEP aleatório
//http://localhost:8000/api/random-cep
if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === '/api/random-cep') {
    $controller = new CepController();
    $controller->getRandomCep();
}

