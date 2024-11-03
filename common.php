<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    die("Error: You need to log in to play the game. <a href='login.php'>Log in</a>");
}

// Check if the session has expired (after 1 day) also destroys any sessions after a day
if (isset($_SESSION['created'])) {
    if (time() - $_SESSION['created'] > 86400) { // 86400 seconds in a day
        session_unset(); // Remove all session variables
        session_destroy(); // Destroy the session
        die("Session expired. Please <a href='login.php'>log in</a> again.");
    }
} else {
    $_SESSION['created'] = time(); // Store the current time
}

// Initialize session variables for hearts, endings, etc.
if (!isset($_SESSION['hearts'])) {
    $_SESSION['hearts'] = 5; // Start with 5 hearts
}
if (!isset($_SESSION['good_endings'])) {
    $_SESSION['good_endings'] = 0;
}
if (!isset($_SESSION['bad_endings'])) {
    $_SESSION['bad_endings'] = 0;
}

// Define the Node class for branching routes
class Node {
    public $dialogue;
    public $characterName;
    public $options = [];
    public $background;
    public $foreground;
    public $heartsChange;
    public $audioFile;

    // Constructor for nodes/branches, NOTE the order of things
    public function __construct($characterName, $dialogue, $audioFile, $background, $foreground, $heartsChange = 0, ) {
        $this->characterName = $characterName;
        $this->dialogue = $dialogue;
        $this->audioFile = $audioFile;
        $this->background = $background;
        $this->foreground = $foreground;
        $this->heartsChange = $heartsChange;
       
       
    }

    // Add options (choices) to the node
    public function addOption($text, $nextNode) {
        $this->options[] = ["text" => $text, "nextNode" => $nextNode];
    }
}
?>