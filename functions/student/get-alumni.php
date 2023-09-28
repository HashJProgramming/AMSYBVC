<?php
$id = $_SESSION['id'];
$sql = "SELECT * FROM `students` WHERE `user_id` = :id";
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$student = $stmt->fetch(PDO::FETCH_ASSOC);

$graduated = $student['graduated'];
$course = $student['course'];

$sql = "SELECT s.*, u.status as `status` FROM `students` s 
        LEFT JOIN `users` u ON u.id = s.user_id
        WHERE `graduated` = :graduated AND `course` = :course AND u.status = 'approved'
";
$stmt = $db->prepare($sql);
$stmt->bindParam(':graduated', $graduated);
$stmt->bindParam(':course', $course);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
    $year =  date_diff(date_create($student['graduated']), date_create('now'))->y;
    ?>
    <tr>
        <td><?php echo $row['firstname'].' '.$row['lastname']?></td>
        <td><?php echo $row['graduated']?></td>
    </tr>
    <?php
}