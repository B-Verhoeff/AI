<?php
class AIWrapper {
    private $ingredients = [];
    private $response = '';
    private $apiKey;
    private $model;
    private $apiUrl = 'https://api.openai.com/v1/chat/completions';

    public function processInput($ingredients) {
        if (empty($ingredients)) {
            throw new Exception("Gene ingredienten opgegeven");
        }
        $this->ingredients = $ingredients;
        //Later hier API aanroepen
        return true;
    }

    public function getResponse() {
        // Voorlopig een standaard bericht teruggeven
        $ingredientsList = implode(', ', $this->ingredients);
        $this->response = "Recept met $ingredientsList wordt verwerkt";
        return $this->response;
    }

    public function __construct($apiKey, $model = 'gpt-3.5-turbo') {
        $this->apiKey = $apiKey;
        $this->model = $model;
    }

    public function makeApiRequests($prompt) {
        $data = [
            'model' => $this->model,
            'messages' => [
                ['role' => 'system', 'content' => 'Je bent een expert chef.'],
                ['role' => 'user', 'content' => $prompt]
            ],
            'temperature' => 0.7
        ];
    }
}