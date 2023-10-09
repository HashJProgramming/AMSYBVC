<?php
include_once '../connection.php';
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}

$comment = $_POST['comment'];
$announcement_id = $_POST['announcement_id'];
$user_id = $_SESSION['id'];

$sql = "INSERT INTO `comments` (`comment`, `announcement_id`, `user_id`) VALUES (:comment, :announcement_id, :user_id)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':comment', $comment);
$stmt->bindParam(':announcement_id', $announcement_id);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

header("Location: ../../administrator/comment.php?id=$announcement_id&type=success&message=Comment deleted successfully.");
