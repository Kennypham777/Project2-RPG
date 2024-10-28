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
