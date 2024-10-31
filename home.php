<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon's Veil</title>
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <audio autoplay>
        <source src="audio/background.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
    <div class="button">
        <!--click then sound will play-->
        <a href="char1route.php" onclick="document.getElementById('select-sound').play();"><img class="select" src="img/select.png" alt="select"></a>
        <div class="char-container">
            <img class="char" src="img/char1.png" alt="female">
        </div>
    </div>
    <div class="game-rule">
        <div class="rule">
            <h2>Welcome to Dragon's Veil</h2>
            <h3>Overview</h3>
            <p>
                This is  a rpg game with interactive decision making, with different characters routes and ending. You the main characters 
                will be going through the routes with choosing different choices, and at the end you will either get a good or bad ending 
                and it will be displayed on the leaderboard. 
                <br>
                You will selects which characters you want to start the game with the female main character or the male. <br>
                There are hearts on the top-right of the screen which indicate how much life you have left before you get a bad ending. <br>
                There are chances to re-gains hearts when you lose hearts but you have to make the right decision. <br>
                Once you reached the good or end ending, you will be redirected to the leaderboard and you can either replay a different 
                characters or the same character again for different ending. 
            </p>
        </div>
    </div>
    <div class="button">
        <a href="char2route.php" onclick="document.getElementById('select-sound').play();"><img class="select" src="img/select.png" alt="select"></a>
        <div class="char-container ">
            <img class="char" src="img/char2.png" alt="male">
        </div>
    </div>
<!--php code for when select button is click it when play a sound-->
    <?php
        $audioPath = "audio/select.wav"; 
        echo "<audio id='select-sound' src='$audioPath'></audio>";
    ?>

</body>
</html>
