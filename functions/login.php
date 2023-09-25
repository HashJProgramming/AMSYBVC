<?php
require_once 'connection.php';
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE username = ? AND `status` = 'approved'";
$stmt = $db->prepare($sql);
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user) {
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['id'] = $user['id'];
        $_SESSION['type'] = $user['type'];
        if ($user['type'] === 'student') {
            header('location: ../student/');
        } else if ($user['type'] === 'administrator') {
            header('location: ../administrator/');
        }
    }else{
        header('location: ../index.php?type=error&message=Invalid Username or Password - Maybe your account still pending');
    }
} else {
    header('location: ../index.php?type=error&message=Invalid Username or Password - Maybe your account still pending');
}
