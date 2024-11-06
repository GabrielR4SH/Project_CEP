<?php
class CepService
{
    public function fetchCepData($cep)
    {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
