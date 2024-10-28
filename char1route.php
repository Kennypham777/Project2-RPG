<?php
session_start();
require 'route-logic.php'; // Include the route logic
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dialogue - RPG Game</title>
    <link rel="stylesheet" href="css/route.css">
</head>
<body>

<div class="scoreboard">
    <span class="hearts">❤️❤️❤️❤️❤️</span> <!-- Display hearts dynamically -->
    <br>
    User: <?php echo $_SESSION['username']; ?><br>
</div>

<div class="dialogue-box">
    <fieldset>
        <legend><?php echo $characterName; ?></legend>
        <p><?php echo $dialogue; ?></p>
    </fieldset>
</div>

</body>
</html>
