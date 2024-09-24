<?php
require 'config.php';
require 'user.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User($conn);
    $user->register($username, $password);
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="en">

<form action="" method="post">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" value="Register" name="register">
</form>
</html>