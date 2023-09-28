<?php
require_once '../connection.php';

$description = $_POST["description"];
$imagePath = basename($_FILES["photo"]["name"]);
$sql = "INSERT INTO `announcements` (`description`) VALUES (:description)";
$stmt = $db->prepare($sql);
$stmt->bindParam(':description', $description);
$stmt->execute();
header("Location: ../../administrator/announcement.php?type=success&message=Announcement added successfully.");
