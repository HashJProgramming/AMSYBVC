<?php
require_once '../connection.php';
$id = $_POST['id'];
$name = $_POST["name"];
$description = $_POST["description"];

$targetDirectory = "../images/announcements/"; 
$targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);

if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
    $imagePath = basename($_FILES["photo"]["name"]);
    $sql = "UPDATE `announcements` SET `name` = :name, `description` = :description, `image` = :image WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':image', $imagePath);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: ../../administrator/announcement.php?type=success&message=Announcement added successfully.");
    exit();
} else {
    $imagePath = basename($_FILES["photo"]["name"]);
    $sql = "UPDATE `announcements` SET `name` = :name, `description` = :description WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    header("Location: ../../administrator/announcement.php?type=success&message=Announcement added successfully.");
    exit();
}
