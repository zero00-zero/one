<?php
require 'config.php';
require 'User.php';

session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
}

$user = new User($conn);
$userData = $user->getUser($_SESSION['username']);

echo 'Welcome, ' . $userData['username'];
?>

<!-- Your inventory management system code here -->