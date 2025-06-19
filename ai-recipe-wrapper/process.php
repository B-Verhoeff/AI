<?php
// Inclusief de AIWrapper klasse
require_once 'classes/AIWrapper.php';
require_once 'config/config.php';

//Controleer of het formulier is verzonden
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ingredients'])) {
    try {
        //valideer en verwerk ingredienten
        $ingredientsInput = trim($_POST['ingredients']);
        if (empty($ingredientsInput)) {
            throw new Exception("Geen ingredienten opgegeven");
        }

        // Splits de ingredienten op komma's en verwijder witruimte
        $ingredients = array_map('trim', explode(',', $ingredientsInput));

        // Maak een nieuwe instantie van de AIWrapper
        $wrapper = new AIWrapper(API_KEY);

        // Verwerk de ingredienten
        $wrapper->processInput($ingredients);

        // Maak een prompt voor het recept
        $ingredientsList = implode(', ', $ingredients);
        $prompt = "Maak een volledig recept met de volgende ingrediënten: $ingredientsList. Geef een titel, ingrediëntenlijst en stapsgewijze instructies.";

        // Haal het AI-antwoord op
        $response = $wrapper->makeApiRequests($prompt);

        // Stuur terug naar index met het AI-antwoord
        header('Location: index.php?message=: ' . urlencode($response));
        exit;
    } catch (Exception $e) {
        // Stuur terug naar index met een foutmelding
        header('Location: index.php?message=Fout: ' . urlencode($e->getMessage()));
        exit;
    }
} else {
    // Als het formulier niet correct is verzonden
    header('Location: index.php?message=Ongeldig verzoek');
    exit;
}
?>