<?php
// Include common session handling and class definitions
include 'common.php';

//setup of nodes (each node can have different stuff based on its construction)
$startNode = new Node("", "You've have just turned from the battle field.", "img/city1.png", "");
$node1 = new Node("", "You are heading to the imperial palace.", "img/city1gate.png", "");
$node2 = new Node("", "You have decided to either meet the king or the prince first.", "img/city1gate.png", "");

$king = new Node("", "Head to the throne room to greet the king.", "img/throneroom.png", "");
$king1 = new Node("You", "Greeting, your majesty.", "img/throneroom.png", "img/char2.png");
$king2 = new Node("King", "Glad you came back alive, warrior.", "img/throneroom.png", "img/char2.png");
$king3 = new Node("You", "Thank you, your majesty. It is my honor to fight for my kingdom.", "img/throneroom.png", "img/char2.png");
$king4 = new Node("King", "Hahaha, good good. Well, there shall be ball this events and you have to come warrior.", "img/throneroom.png", "img/char2.png");
$king5 = new Node("You", "It will my honor, your majesty.", "img/throneroom.png", "img/char2.png");

$prince = new Node("", "Head to meet the prince in the graden.", "img/graden.png", "");
$prince1 = new Node("You", "Greeting, your highness.", "img/graden.png", "img/prince.png");
$prince2 = new Node("Prince", "Greeting, warrior!", "img/graden.png", "img/prince.png");
$prince3 = new Node("You", "How have you been, your highness?", "img/graden.png", "img/prince.png");
$prince4 = new Node("Prince", "You looking rather lively even after the war.", "img/graden.png", "img/prince.png");
$prince5 = new Node("You", "Thank you? Your highness.", "img/graden.png", "img/prince.png");
$prince6 = new Node("Prince", "Well, warrior shall we have a duel?", "img/graden.png", "img/prince.png");
$prince7 = new Node("You", "As you wish, your highness.", "img/graden.png", "img/prince.png");

$duel = new Node("", "Head to the arena.", "img/duelarena.png", "");
$duel1 = new Node("", "Pick your weapon.", "img/duelarena.png", "");
$duel2 = new Node("Prince", "Are you ready, warrior?", "img/duelarena.png", "img/prince.png");
$duel3 = new Node("You", "Yes, your highness.", "img/duelarena.png", "img/prince.png");
$duel4 = new Node("", "You start dueling the prince.", "img/duelarena.png", "", -1);

$lose = new Node("", "You have lose the duel.", "img/duelarena.png", "img/prince.png", +1);
$lose1 = new Node("Prince", "Well, warrior you are not strong as I thought you were.", "img/duelarena.png", "img/prince.png");
$lose2 = new Node("", "The prince walk away laughing.", "img/duelarena.png", "img/prince.png");

$win = new Node("", "You have won the duel.", "img/duelarena.png", "img/prince.png", -2);
$win1 = new Node("Prince", "You are strong, aren't you warrior.", "img/duelarena.png", "img/prince.png");
$win2 = new Node("You", "Thank you, your highness! It was a good duel.", "img/duelarena.png", "img/prince.png");
$win3 = new Node("Prince", "Yes, a good duel indeed.", "img/duelarena.png", "img/prince.png");
$win4 = new Node("", "The prince walk away in anrgy.", "img/duelarena.png", "");

$ball = new Node("", "Head to the ball room.", "img/ballroom.png", "");
$ball1 = new Node("", "Pick to dance with the King or Prince", "img/ballroom.png", "");
$ball2 = new Node("", "Go to the ball and dance with the king.", "img/ballroom.png", "img/char2.png");

$king6 = new Node("King", "So, warrior how are you liking the ball?", "img/ballroom.png", "img/char2.png", +2);
$king7 = new Node("You", "It is wonderful, your majesty.", "img/ballroom.png", "img/char2.png");
$king8 = new Node("King", "Don't you get tired of calling me your majesty all time the time? My name is Aaron, warrior.", "img/ballroom.png", "img/char2.png");
$king9 = new Node("You", "Well, it is good to dance with you Aaron.", "img/ballroom.png", "img/char2.png");

$ball3 = new Node("", "Aaron smile and you two start to talk more and more. A lot time than passes.", "img/ballroom.png", "img/char2.png");

$prince8 = new Node("Prince", "You look great, warrior", "img/ballroom.png", "img/prince.png");
$prince9 = new Node("You", "Thank you, your highness.", "img/ballroom.png", "img/prince.png");
$prince10 = new Node("", "You accidentally set on the prince foot during the dance.", "img/ballroom.png", "img/prince.png");
$prince11 = new Node("Prince", "Ow, How dare you!", "img/ballroom.png", "img/prince.png");
$prince12 = new Node("You", "I'm sorry, your highness. I swear it wasn't my intentional.", "img/ballroom.png", "img/prince.png");
$prince13 = new Node("Prince", "Not intentional?! Like I would believe that guard put this warrior in prison!", "img/ballroom.png", "img/prince.png");
$prince14 = new Node("", "You were drag out of the ballroom and was put in prison.", "img/ballroom.png", "img/city1guard.pngg", -3);

// Adding options to nodes
$startNode->addOption("Next", $node1);
$node1->addOption("Next", $node2);

$node2->addOption("Head to the king", $king);
$node2->addOption("Head to the Prince", $prince);

$king->addOption("Next", $king1);
$king1->addOption("Next", $king2);
$king2->addOption("Next", $king3);
$king3->addOption("Next", $king4);
$king4->addOption("Next", $king5);
$king5->addOption("Next", $ball2);

$prince->addOption("Next", $prince1);
$prince1->addOption("Next", $prince2);
$prince2->addOption("Next", $prince3);
$prince3->addOption("Next", $prince4);
$prince4->addOption("Next", $prince5);
$prince5->addOption("Next", $prince6);
$prince6->addOption("Next", $prince7);
$prince7->addOption("Next", $duel);

$duel->addOption("Next", $duel1);
$duel1->addOption("Sword", $duel2);
$duel1->addOption("Axe", $duel2);
$duel1->addOption("Bow", $duel2);
$duel2->addOption("Next", $duel3);

$duel3->addOption("Lose the battle on purpose", $lose);
$duel3->addOption("Win the battle", $win);

$lose->addOption("Next", $lose1);
$lose1->addOption("Next", $lose2);
$lose2->addOption("Next", $king);

$win->addOption("Next", $win1);
$win1->addOption("Next", $win2);
$win2->addOption("Next", $win3);
$win3->addOption("Next", $win4);
$win4->addOption("Next", $ball);

$ball->addOption("Next", $ball1);
$ball1->addOption("Dance with the king", $king6);
$ball1->addOption("Dance with the Prince", $prince8);
$ball2->addOption("Next", $king6);

$king6->addOption("Next", $king7);
$king7->addOption("Next", $king8);
$king8->addOption("Next", $ball3);
$ball3->addOption("End", null);

$prince8->addOption("Next", $prince9);
$prince9->addOption("Next", $prince10);
$prince10->addOption("Next", $prince11);
$prince11->addOption("Next", $prince12);
$prince12->addOption("Next", $prince13);
$prince13->addOption("Next", $prince14);
$prince14->addOption("Next", null);




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
            
            header('Location: char2ending.php');
            unset($_SESSION['currentNode']); // Remove the session variable
            $_SESSION['hearts'] = 5; // Reset hearts
            exit();  // Ensure the script doesn't continue executing
        } else {
            $_SESSION['currentNode'] = serialize($nextNode); // Save the next node to the session
            $currentNode = $nextNode; // Move to the next node
        }
    }
}

// Variables to pass to char2route.php
$characterName = $currentNode->characterName;
$dialogue = $currentNode->dialogue;
$background = $currentNode->background;
$foreground = $currentNode->foreground;
$heartsChange = $currentNode->heartsChange; // Pass this value to char2route.php
?>

