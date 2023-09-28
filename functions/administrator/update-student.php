<?php
include_once '../connection.php';
$id = $_POST['id'];
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$birthdate = $_POST['birthdate'];
$email = $_POST['email'];
$course = $_POST['course'];
$civil = $_POST['civil'];
$graduated = $_POST['graduated'];
$children = $_POST['children'];
$phone = $_POST['phone'];
$present_address = $_POST['present_address'];
$work_address = $_POST['work_address'];
$status = 'pending';

$sql = "SELECT * FROM `users` WHERE `username` = :username AND `id` != :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->bindParam(':id', $id);
$stmt->execute();
if ($stmt->rowCount() > 0) {
    header('Location: ../../administrator/alumni.php?type=error&message=' . $username . ' is already exist');
    exit;
}
    if (isset($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    } else {
        $sql = "SELECT * FROM `users` WHERE `id` = :id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $password = $user['password'];
    }

    $sql = "UPDATE `users` SET `username` = :username, `password` = :password WHERE `id` = :id";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    

    $sql = "UPDATE `students` SET `firstname` = :firstname, `lastname` = :lastname, `birthdate` = :birthdate, `email` = :email, `course` = :course, `civil` = :civil, `graduated` = :graduated, `children` = :children, `phone` = :phone, `present_address` = :present_address, `work_address` = :work_address WHERE `user_id` = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id', $id);
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':birthdate', $birthdate);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':course', $course);
        $stmt->bindParam(':civil', $civil);
        $stmt->bindParam(':graduated', $graduated);
        $stmt->bindParam(':children', $children);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':present_address', $present_address);
        $stmt->bindParam(':work_address', $work_address);
        $stmt->execute();
        header('Location: ../../administrator/alumni.php?type=success&message=Successfully Updated');