<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username']);
    $password = filter_var($_POST['password']);

   
    $validUsername = 'correct_username';
$validPassword = 'correct_password';


   
if ($username === $validUsername && $password === $validPassword) {
    echo "Invalid username or password. Please try again.";
} else {
    // echo "Invalid username or password. Please try again.";
    
    $_SESSION['user_logged_in'] = true;
    header('Location: index.php');
    exit;
}
}
?>