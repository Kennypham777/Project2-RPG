<?php
// Include common session handling and class definitions
include 'common.php'; 

//setup of nodes (each node can have different stuff based on its construction)
$startNode = new Node("", "You've arrived at the front gates of the city of Firstia.", "img/city1gate.png", "");
$node2 = new Node("", "You decide it's best to greet the guards at the front gate.", "img/city1gate.png", "");
$node3 = new Node("Firstia Guard", "Halt, Before you can enter this city, I must first see some identification.", "img/city1gate.png", "img/city1guard.png");
$node4 = new Node("", "You show the guard the medallion given to you by the adventurers guild", "img/city1gate.png", "img/city1guard.png");
$node5 = new Node("", "The guard examines your medallion, checking your credentials as well as your current rank in the adventurers guild.", "img/city1gate.png", "img/city1guard.png");
$node6 = new Node("Firstia Guard", "Alright, you are free to enter.", "img/city1gate.png", "img/city1guard.png");
$node7 = new Node("", "You've entered the city of Firstia and take in the scenery. You have two decisions before you. Do you wish to visit the Guild hall or wander the city?", "img/city1.png", "");

$guild1 = new Node("", "You decide to visit the guild hall. You notice a feminine figure in armor staring intently at one of the commissions on the board", "img/city1guild.png", "");
$guild2 = new Node("You", "Hey, uh... I noticed you staring very intently. Is something up with this commission?", "img/city1guild.png", "");
$guild3 = new Node("", "She turns to you, a little startled at first, but then explains why she was so focused", "img/city1guild.png", "img/char1.png");
$guild4 = new Node("???", "Oh! Didn't notice you there. This commission is about slaying a dragon that has been terrorizing a village.", "img/city1guild.png", "img/char1.png");
$guild5 = new Node("???", "It's just... the village its terrorizing is my home village, but I don't think I can take it on by myself", "img/city1guild.png", "img/char1.png");
$guild6 = new Node("You", "I can help you with that.", "img/city1guild.png", "img/char1.png");
$guild7 = new Node("", "She seems delighted to have company and wishes to depart immediately. Afterall, it IS her home village.", "img/city1guild.png", "img/char1.png");
$guild8 = new Node("Ariel", "Oh almost forgot, The name's Ariel. Nice to be acquainted with you", "img/city1guild.png", "img/char1.png");
$guild9 = new Node("", "You and Ariel depart the guild hall and leave to find the dragon", "img/city1.png", "");

$explore1 = new Node("", "You decide to wander the city. As you were wandering around, a guard bumps into you", "img/city1.png", "", -1);
$explore2 = new Node("", "The guard, who believes you are in the wrong due to his authority, blames you for bumping into him", "img/city1.png", "img/city1guard.png");
$explore3 = new Node("Arrogant Guard", "Hey you! You think you can just bump into people and not apoligize for it?!", "img/city1.png", "img/city1guard.png");
$explore4 = new Node("You", "Apologize to me right now! You were the one who bumped into me!", "img/city1.png", "img/city1guard.png");
    $kick1 = new Node("Arrogant Guard", "Oh yeah?! How about this then!", "img/city1.png", "img/city1guard.png");
    $kick2 = new Node("", "The guard kicks you out of the city", "img/city1gate.png", "", -2);
    $kick3 = new Node("", "As you were kicked out of Firstia, you decide to head to a different city,", "img/path.png", "");
    $kick4 = new Node("", "Unfortunately, a group of bandits ambushed you on your way.", "img/path.png", "img/bandits.png");
    $kick5 = new Node("", "You were subdued by bandits", "img/path.png", "img/bandits.png", -2);
$explore5 = new Node("", "You apologize to the guard and hand him 5 gold coins to appease him", "img/city1.png", "img/city1guard.png");
$explore6 = new Node("Arrogant Guard", "At least you know your place. I'll forgive you for this transgression this time.", "img/city1.png", "img/city1guard.png");
$explore7 = new Node("", "You are relieved of that stressful moment and decide to check up on the guild hall aferall.", "img/city1.png", "", +1);

$dragon1 = new Node("", "After some time, you and Ariel managed to deduce where the dragon's lair is and are about to confront it.", "img/dragonlair.png", "img/char1.png");
$dragon2 = new Node("", "The Dragon awakes and engages you and Ariel in fierce battle.", "img/dragonlair.png", "img/dragon.png");
$dragon3 = new Node("", "The Dragon is extremely fearsome and has dealt a major blow to you.", "img/dragonlair.png", "img/dragon.png", -3);
    $flee1 = new Node("", "You decide to flee, leaving Ariel to fend the dragon by herself.", "img/dragonlair.png", "");
    $flee2 = new Node("", "After exiting the lair, you decide to follow a path to another city.", "img/path.png", "");
$dragon4 = new Node("", "You continue to fight the dragon along side Ariel.", "img/dragonlair.png", "img/dragon.png");
$dragon5 = new Node("", "After an intense battle, you and Ariel manage to slew the dragon. However, the fight was not without injury.", "img/dragonlair.png", "img/dragon.png", -1);
$dragon6 = new Node("Ariel", "Are you alright? You didn't have to push yourslef so hard!", "img/dragonlair.png", "img/char1.png");
$dragon7 = new Node("You", "It's normal to be this injured after attempting to fight a dragon with a party of two.", "img/dragonlair.png", "img/char1.png");
$dragon8 = new Node("", "Ariel wipes away some worried tears. You noticed that she is also injured but not as severely due to your efforts.", "img/dragonlair.png", "img/char1.png");
$dragon9 = new Node("", "You and Ariel help each other back up and exit the lair", "img/path.png", "img/char1.png");
$dragon10 = new Node("", "You guys decide to head back to the guild to report and rest up", "img/path.png", "img/char1.png");

$guild10 = new Node("", "After some time resting up, you awoke and noticed Ariel sitting beside you, relieved that you have recovered.", "img/city1guild.png", "img/char1.png", +4);
$guild11 = new Node("Ariel", "I'm so glad you are okay, and... thank you for your help yesterday.", "img/city1guild.png", "img/char1.png");
$guild12 = new Node("Ariel", "Y'know... It was kind of fun adventuring with you. We should form a party together and go on more adventures!", "img/city1guild.png", "img/char1.png");
$guild13 = new Node("You", "Sure, it was fun adventuring with you too! But... let's stick to some less dangerous commissions for now.", "img/city1guild.png", "img/char1.png");
$guild14 = new Node("", "You set off to whatever adventure awaits you next.", "img/city1guild.png", "img/char1.png");

// Adding options to nodes
$startNode->addOption("Next", $node2);
$node2->addOption("Next", $node3);
$node3->addOption("Show identification", $node4);
$node4->addOption("Next", $node5);
$node5->addOption("Next", $node6);
$node6->addOption("Next", $node7);

$node7->addOption("Visit Guild Hall", $guild1);
$node7->addOption("Wander City", $explore1);

$guild1->addOption("Talk to her", $guild2);
$guild2->addOption("Next", $guild3);
$guild3->addOption("Next", $guild4);
$guild4->addOption("Next", $guild5);
$guild5->addOption("Offer your assistance", $guild6);
$guild6->addOption("Next", $guild7);
$guild7->addOption("Next", $guild8);
$guild8->addOption("Nice to be acquainted with you too", $guild9);
$guild9->addOption("Next", $dragon1);

$dragon1->addOption("Confront Dragon", $dragon2);
$dragon2->addOption("Fight it", $dragon3);
$dragon3->addOption("Continue fighting it", $dragon4);
$dragon3->addOption("Run", $flee1);
$flee1->addOption("Head to a different city", $flee2);
$flee2->addOption("Next", $kick4);
$dragon4->addOption("Next", $dragon5);
$dragon5->addOption("Next", $dragon6);
$dragon6->addOption("I'm fine", $dragon7);
$dragon7->addOption("Next", $dragon8);
$dragon8->addOption("Next", $dragon9);
$dragon9->addOption("Head to guild to recover", $dragon10);
$dragon10->addOption("Next", $guild10);
$guild10->addOption("Next", $guild11);
$guild11->addOption("No problem", $guild12);
$guild12->addOption("Sure", $guild13);
$guild13->addOption("Next", $guild14);
$guild14->addOption("End", null);

$explore1->addOption("Next", $explore2);
$explore2->addOption("Next", $explore3);
$explore3->addOption("Apologize", $explore4);
$explore3->addOption("Hand over 5 gold to appease him", $explore5);

$explore4->addOption("Next", $kick1);
$kick1->addOption("Next", $kick2);
$kick2->addOption("Head to different city", $kick3);
$kick3->addOption("Next", $kick4);
$kick4->addOption("Try to fight back", $kick5);
$kick5->addOption("Next", null);

$explore5->addOption("Next", $explore6);
$explore6->addOption("Next", $explore7);
$explore7->addOption("Head to Guild hall", $guild1);




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
