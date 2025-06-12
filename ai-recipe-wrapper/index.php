<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AI Recept Generator</title>
</head>
<body>
    <div class="container">
        <h1>AI Recept Generator</h1>
        <p>Voer hieronder je ingredienten in en ontvang een recept</p>

        <form action="process.php" method="post">
            <div class="form-group">
                <label for="ingredients">Ingredienten (gescheiden door komma's):</label>
                <textarea id="ingredients" name="ingredients" rows="4" required
                placeholder="bijv. ui, knoflook, tomaat, pasta"></textarea>
            </div>
            <button type="submit">Genereer Recept</button>
        </form>

        <?php if (isset($_GET['message'])): ?>
            <div class="message">
                <?php echo htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>