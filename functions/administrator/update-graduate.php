<?php
include_once '../connection.php';
$id = $_POST['id'];
$fullname = $_POST['fullname'];
$course = $_POST['course'];
$graduated = $_POST['graduated'];

$sql = "UPDATE `graduates` SET `fullname` = :fullname, `course` = :course, `graduated` = :graduated WHERE `id` = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->bindParam(':fullname', $fullname);
$stmt->bindParam(':course', $course);
$stmt->bindParam(':graduated', $graduated);
$stmt->execute();

header('Location: ../../administrator/students.php?type=success&message=Successfully Updated');