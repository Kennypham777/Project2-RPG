<?php
// Include common session handling and class definitions
include 'common.php'; 

// Example setup of nodes (each node can have different stuff based on its construction)
$startNode = new Node("Character1", "This is the beginning dialogue", "img/selection.png", "img/char1.png");
$node2 = new Node("Character1", "This dialogue is giving you 2 options", "img/selection.png", "img/char1.png");
$node3 = new Node("Character2", "You chose option 1. Nothing happens.", "", "img/char2.png", 0);
$node4 = new Node("Character2", "You chose option 2. You lose 2 hearts.", "", "img/char2.png", -2);
$node6 = new Node("Character3", "This dialogue is giving you 3 options", "", "img/char1.png");
$node7 = new Node("Character3", "You chose to lose 3 hearts", "", "img/char1.png", -3);
$node8 = new Node("Character3", "You chose to lose 1 heart", "", "img/char1.png", -1);
$node9 = new Node("Character3", "You chose to gain 1 heart", "", "img/char1.png", +1);
$node5 = new Node("Character1", "End route?", "", "img/char1.png");

// Adding options to nodes
$startNode->addOption("Go to the next scene", $node2);

$node2->addOption("Option 1: Do nothing", $node3);
$node2->addOption("Option 2: Lose hearts", $node4);

$node3->addOption("next", $node6);
$node4->addOption("next", $node6);

$node6->addOption("Gain a heart", $node9);
$node6->addOption("lose 3 hearts", $node7);
$node6->addOption("lose 1 heart", $node8);

$node7->addOption("next", $node5);
$node8->addOption("next", $node5);
$node9->addOption("next", $node5);

$node5->addOption("Finish Route", null); // Null indicates that this is the final choice




// Retrieve the current node from the session, or start at the beginning
if (!isset($_SESSION['currentNode'])) {
    $_SESSION['currentNode'] = serialize($startNode);
    $currentNode = $startNode;  // Set it to the start node if session is empty
} else {
    $currentNode = unserialize($_SESSION['currentNode']);  // Load the current node from the session
}

// Handle button clicks to move to the next node
if (isset($_POST['choice'])) {
    $chosenOption = (int)$_POST['choice'];
    
    if (isset($currentNode->options[$chosenOption])) {
        $nextNode = $currentNode->options[$chosenOption]['nextNode'];
        
        if ($nextNode === null) {
            // If the next node is null, this is the end of the route
            $_SESSION['good_endings']++;
            
            header('Location: char1ending.php');
            unset($_SESSION['currentNode']); // Remove the session variable
            $_SESSION['hearts'] = 5; // Reset hearts
            exit();  // Ensure the script doesn't continue executing
        } else {
            $_SESSION['currentNode'] = serialize($nextNode); // Save the next node to the session
            $currentNode = $nextNode; // Move to the next node
        }
    }
}

// Variables to pass to char1route.php
$characterName = $currentNode->characterName;
$dialogue = $currentNode->dialogue;
$background = $currentNode->background;
$foreground = $currentNode->foreground;
$heartsChange = $currentNode->heartsChange; // Pass this value to char1route.php
?>
