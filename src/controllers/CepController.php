<?php
require_once __DIR__ . '/../services/CepService.php';

class CepController
{
    public function getCep($cep)
    {
        $cepService = new CepService();
        $result = $cepService->fetchCepData($cep);
        header('Content-Type: application/json');
        echo json_encode($result);
    }

    public function getRandomCep()
    {
        $cepService = new CepService();
        $randomCepData = $cepService->randomCep();
        header('Content-Type: application/json');
        echo json_encode($randomCepData);
    }

}
