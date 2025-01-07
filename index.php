<?php require 'logic.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Guessing Game</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Guess the Number</h1>
        <p>Try to guess the number between 1 and 100! If you're wrong, the correct number will shuffle.</p>

        <form method="POST">
            <input type="number" name="guess" placeholder="Enter your guess" required>
            <button type="submit">Submit Guess</button>
            <button type="submit" name="restart" class="restart">Restart Game</button>
        </form>

        <div class="feedback"><?= htmlspecialchars($feedback) ?></div>
    </div>
</body>
</html>
