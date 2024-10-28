<?php
session_start();
require 'char1routelogic.php'; // Include the route logic

// Apply hearts change directly in char1route.php
if (isset($heartsChange)) {
    // Modify hearts while ensuring they stay within the limits
    $_SESSION['hearts'] += $heartsChange;

    // Ensure hearts do not exceed 5
    if ($_SESSION['hearts'] > 5) {
        $_SESSION['hearts'] = 5;
    }
    
    // Ensure hearts do not go below 0
    if ($_SESSION['hearts'] <= 0) {
        $_SESSION['bad_endings']++;

        unset($_SESSION['currentNode']); // Remove the session variable
        $_SESSION['hearts'] = 5; // Reset hearts
        header('Location: char1ending.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dialogue - RPG Game</title>
    <link rel="stylesheet" href="css/route.css">
    <style>
        /* Dynamic background and foreground styles */
        body {
            background-image: url('<?php echo $background; ?>');
            background-size: cover;
            z-index: 1;
        }
        .foreground {
            width: auto; /* Automatically adjust width */
            height: 75vh; /* Set height to 75% of viewport height */
            position: absolute;
            bottom: 0; /* Align the bottom edge of the image with the bottom of the viewport */
            left: 5%; /* Adjust left positioning */
            z-index: 2;
        }

    </style>
</head>
<body>

<div class="scoreboard">
    <span class="hearts">
        <?php 
        // Display hearts dynamically based on session hearts
        for ($i = 0; $i < $_SESSION['hearts']; $i++) {
            echo "❤️";
        }
        ?>
    </span>
    <br>
    User: <?php echo $_SESSION['username']; ?><br>
</div>

<div class="dialogue-box">
    <fieldset>
        <legend><?php echo $characterName; ?></legend>
        <p><?php echo $dialogue; ?></p>
    </fieldset>
    <!-- Display the options as buttons with the option text -->
    <form method="POST">
        <div class="button-container">
            <?php foreach ($currentNode->options as $index => $option) : ?>
                <button type="submit" name="choice" value="<?php echo $index; ?>">
                    <?php echo $option['text']; ?>
                </button>
            <?php endforeach; ?>
        </div>
    </form>
</div>

<!-- Display the character image -->
<?php if ($foreground): ?>
    <img class="foreground" src="<?php echo $foreground; ?>" alt="<?php echo $characterName; ?> Image">
<?php endif; ?>

</body>
</html>
