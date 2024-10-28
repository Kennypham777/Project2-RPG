<?php
session_start();

// Initialize or update session variables
if (!isset($_SESSION['username'])) {
    die("Error: You need to log in to play the game. <a href='login.php'>Log in</a>");
}

if (!isset($_SESSION['hearts'])) {
    $_SESSION['hearts'] = 5; // Start with 5 hearts
}

if (!isset($_SESSION['good_endings'])) {
    $_SESSION['good_endings'] = 0; // Track good endings
}

if (!isset($_SESSION['bad_endings'])) {
    $_SESSION['bad_endings'] = 0; // Track bad endings
}

// Placeholder for character name and dialogue
$characterName = "Character"; // Placeholder for character name
$dialogue = "Example Dialogue"; // Placeholder for dialogue

?>


