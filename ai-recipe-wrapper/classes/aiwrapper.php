<?php
class AIWrapper {
    private $ingredients = [];
    private $response = '';

    public function __construct() {
        //controleer of config beschikbaar is
        if (!defined("API_KEY")) {
            require_once __DIR__ . '/../config/config.php';
        }
    }

    public function processIngredients($ingredients) {
        if (empty($ingredients)) {
            throw new Exception("Geen ingrediënten gevonden");
        }

        $this->ingredients = $ingredients;
        // Later hier API aanroepen
        return true;
    }

    public function getResponse() {
        //voorlopig een standaard bericht teruggeven
        $ingredientlist = implode(", ", $this->ingredients);
        $this->response = "Recept met: $ingredientslist wordt verwerkt";
        return $this->response;
    }
} 
