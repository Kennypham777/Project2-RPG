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

// Determine if the ending was good or bad
$isBadEnding = $hearts <= 0; // True if hearts are 0 or less

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game Ending</title>
    <link rel="stylesheet" href=""> <!--link to css in href-->
</head>
<body>
    <div class=""> <!--Can be styled with a class-->
        <h1>Game Ending</h1>
        <!--display stats of current user-->
        <p><strong>User:</strong> <?php echo htmlspecialchars($username); ?></p>
        <p><strong>Good Endings:</strong> <?php echo $goodEndings; ?></p>
        <p><strong>Bad Endings:</strong> <?php echo $badEndings; ?></p>
        
        <?php if ($isBadEnding): ?>
            <p class="ending-status">You reached a bad ending.</p>
        <?php else: ?>
            <p class="ending-status">You reached a good ending!</p>
        <?php endif; ?>
    </div>
    
    <div class="options">
        <form action="char1route.php" method="post">
            <button type="submit">Restart</button>
        </form>
        <form action="home.php" method="get">
            <button type="submit">Go Back to Selection</button>
        </form>
    </div>
</body>
</html>