<?php
require_once '../connection.php';
$id = $_POST['id'];

$sql = 'DELETE FROM `announcements` WHERE `id` = :id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
header('Location: ../../administrator/announcement.php?type=success&message=Successfully Deleted');

