<?php
// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Capture form data and sanitize
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);
    
    // Validate that the username is alphanumeric, non-empty, and does not contain spaces
    if (empty($username) || !preg_match('/^[a-zA-Z0-9_]+$/', $username) || strpos($username, ' ') !== false) {
        die("Error: Invalid username. It must be alphanumeric and cannot contain spaces. <a href='signup.php'>Go back</a>");
    }

    // Validate that the password is non-empty and does not contain spaces
    if (empty($password) || strpos($password, ' ') !== false) {
        die("Error: Password cannot be empty or contain spaces. <a href='signup.php'>Go back</a>");
    }

    // Ensure the passwords match
    if ($password !== $confirm_password) {
        die("Error: Passwords do not match. <a href='signup.php'>Go back</a>");
    }

    // Check if the user already exists in users.txt
    $users_data = file('users.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($users_data as $line) {
        list($storedUsername, $storedPassword) = explode(', ', trim($line));
        if ($storedUsername === $username) {
            die("Error: User with this username already exists. <a href='signup.php'>Go back</a>");
        }
    }

    // Format new user data (username, password)
    $new_user = "\n$username, $password";

    // Write the new user data to users.txt
    file_put_contents("users.txt", $new_user, FILE_APPEND);

    // Redirect to the login page after successful signup
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - RPG Game</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

<div class="container">
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit">Sign Up</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</div>

</body>
</html>
