<?php
require 'config.php';
require 'user.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new user($conn);
    if ($user->login($username, $password)) {
        session_start();
        $_SESSION['username'] = $username;
        header('Location: index.php');
    } else {
        echo 'Invalid username or password';
    }
}
?>

<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Login" name="login">
</form>