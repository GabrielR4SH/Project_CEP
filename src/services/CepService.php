<?php
class CepService
{
    public function fetchCepData($cep)
    {
        $url = "https://viacep.com.br/ws/{$cep}/json/";
        $response = file_get_contents($url);

        // Verificar se a resposta é JSON válido
        $cepData = json_decode($response, true);

        // Se a resposta não for JSON ou contiver erro, retornar null ou mensagem padrão
        if (json_last_error() !== JSON_ERROR_NONE || isset($cepData['erro'])) {
            return null; 
        }

        return $cepData;
    }

    public function randomCep()
    {
        // Gera um número aleatório de 8 dígitos para formar um CEP fictício
        $cep = str_pad(rand(1000000, 99999999), 8, '0', STR_PAD_LEFT);

        // Busca os dados do CEP usando a função fetchCepData
        $cepData = $this->fetchCepData($cep);

        // Se o CEP não existir (a API ViaCEP pode retornar um erro), tente novamente
        while ($cepData === null) {
            // Gera um novo CEP
            $cep = str_pad(rand(1000000, 99999999), 8, '0', STR_PAD_LEFT);
            $cepData = $this->fetchCepData($cep);
        }

        return $cepData;
    }
}
