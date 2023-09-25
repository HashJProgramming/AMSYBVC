<?php
require_once '../connection.php';

$name = $_POST["name"];
$description = $_POST["description"];

$targetDirectory = "../images/announcements/"; 
$targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
    $imagePath = basename($_FILES["photo"]["name"]);
    $sql = "INSERT INTO `announcements` (`name`, `description`, `image`) VALUES (:name, :description, :image)";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $imagePath);
    $stmt->execute();
    header("Location: ../../administrator/announcement.php?type=success&message=Announcement added successfully.");
    exit();
} else {
    echo "Error uploading image.";
}