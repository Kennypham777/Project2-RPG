<?php
session_start();

// Ensure the user is logged in
if (!isset($_SESSION['username'])) {
    die("Error: You need to log in to view this page. <a href='login.php'>Log in</a>");
}

// Retrieve user information from session
$username = $_SESSION['username'];
$hearts = $_SESSION['hearts'];
$goodEndings = $_SESSION['good_endings'];
$badEndings = $_SESSION['bad_endings'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Ending</title>
    <link rel="stylesheet" href="css/char1ending.css"><!--link to css in href-->
</head>
<body>
<audio autoplay>
        <source src="audio/leaderboardmusic.mp3" type="audio/mp3">
        Your browser does not support the audio element.
    </audio>
<div class="game-end">Game End</div>
    <div class="endscreen"> <!--Can be styled with a class-->
        
        <h1>Leaderboard</h1>
        <!--display stats of current user-->
        <p><strong>User:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Good Endings:</strong> <span><?php echo $goodEndings; ?></span></p>
        <p><strong>Bad Endings:</strong> <span><?php echo $badEndings; ?></span></p>

        
        <!-- Determine and display the ending status -->
        <?php if (isset($_SESSION['ending_status']) && $_SESSION['ending_status'] === 'bad'): ?>
            <p>You were subdued by bandits and have reached a bad ending.</p>
        <?php else: ?>
            <p>You and Ariel set off to whatever adventure awaits you next. Good ending!</p>
        <?php endif; ?>

        <?php unset($_SESSION['ending_status']); // Clear the ending status after displaying ?>
    </div>
    
    <div class="options">
        <form action="char1route.php" method="post">
            <button type="submit">Restart</button>
            <audio src="buttonsound.mp3" preload="auto"></audio>
        </form>
        <form action="home.php" method="get">
            <button type="submit">Go Back to Selection</button>
            <audio src="buttonsound.mp3" preload="auto"></audio>
        </form>
    </div>
</body>
</html>
