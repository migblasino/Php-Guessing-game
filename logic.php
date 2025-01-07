<?php
// Start the session
session_start();

// Initialize game variables
if (!isset($_SESSION['target_number'])) {
    $_SESSION['target_number'] = rand(1, 100); // Set a random number between 1 and 100
    $_SESSION['attempts'] = 0; // Track the number of attempts
}

$feedback = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['guess'])) {
        $guess = (int) $_POST['guess'];
        $_SESSION['attempts']++;

        // Check the guess
        if ($guess === $_SESSION['target_number']) {
            $feedback = "Congratulations! You guessed the number in {$_SESSION['attempts']} attempts.";
        } else {
            // Provide feedback and shuffle the correct answer
            $feedback = ($guess < $_SESSION['target_number']) 
                ? "Too low! The correct number has been shuffled." 
                : "Too high! The correct number has been shuffled.";
            $_SESSION['target_number'] = rand(1, 100); // Shuffle the target number
        }
    } elseif (isset($_POST['restart'])) {
        // Reset the game
        session_unset();
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>
