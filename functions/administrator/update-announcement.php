<?php
require_once '../connection.php';
$id = $_POST['id'];
$description = $_POST["description"];

$sql = "UPDATE `announcements` SET `description` = :description WHERE `id` = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':description', $description);
$stmt->bindParam(':id', $id);
$stmt->execute();
header("Location: ../../administrator/announcement.php?type=success&message=Announcement added successfully.");
exit();