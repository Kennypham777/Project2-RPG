<?php
// Start session
session_start();

// Regex for basic username validation (only alphanumeric and underscores allowed)
$regex_username = '/^[a-zA-Z0-9_]+$/';
$loginError = "";

if (isset($_GET['username'])) {
    $username = htmlspecialchars($_GET['username']);
    $password = htmlspecialchars($_GET['password']);

    // Validate that the username is not empty and follows the pattern
    if (empty($username) || !preg_match($regex_username, $username)) {
        die("Error: Invalid or empty username. Please enter a valid username. <a href='login.php'>Go back</a>");
    }

    // Validate that the password is not empty
    if (empty($password)) {
        die("Error: Password cannot be empty. Please enter your password. <a href='login.php'>Go back</a>");
    }

    // Read user data from users.txt
    $users_data = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $user_data = [];

    // Retrieve user data from users.txt
    foreach ($users_data as $line) {
        list($storedUsername, $storedPassword) = explode(', ', trim($line));

        if ($storedUsername === $username) {
            $user_data = [$storedUsername, $storedPassword];
            break;
        }
    }

    // Check if the user was found
    if (empty($user_data)) {
        die("Error: No user found with that username. Please sign up first. <a href='signup.php'>Go back</a>");
    }

    // Check if the password matches
    if ($user_data[1] !== $password) {
        die("Error: Incorrect password. Please try again. <a href='login.php'>Go back</a>");
    }

    // Set session for the user and redirect
    $_SESSION['username'] = $username; // Store the username in session
    header('Location: char1route.php'); //home.php is temporary right now
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RPG Game</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">
    <h2>Login</h2>
    <form action="login.php" method="GET">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <p class="error"><?php echo $loginError; ?></p>
    <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
</div>

</body>
</html>
