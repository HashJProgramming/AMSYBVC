<?php
$sql = "SELECT c.id AS course_id, c.name AS course_name, s.graduated,
 CONCAT(s.firstname, ' ', s.lastname) AS student_name
FROM
 courses c
JOIN
 students s ON c.id = s.course
GROUP BY
 c.id,
 s.graduated
ORDER BY
 c.id,
 s.graduated;
";

$stmt = $db->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($result as $row) {
  $courseName = $row['course_name'];
  $batchYear = $row['graduated'];
  echo '<div class="col">';
  echo '<div class="card">';
  echo '<div class="card-body shadow-sm">';
  echo '<h3 class="text-center card-title">' . $courseName . ' (' . $batchYear . ')' . '</h3>';
  echo '<div class="table-responsive">';
  echo '<table class="table table-hover table-sm">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>Fullname</th>';
  echo '<th>Year Graduated</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  $sql2 = "SELECT
 CONCAT(s.firstname, ' ', s.lastname) AS student_name
FROM
  students s,
  users u
WHERE
  s.course = :course_id
AND
  s.graduated = :batch_year
AND
  s.user_id = u.id
AND
  u.status = 'approved'
ORDER BY
 student_name ASC";

  $stmt2 = $db->prepare($sql2);
  $stmt2->bindValue(':course_id', $row['course_id']);
  $stmt2->bindValue(':batch_year', $row['graduated']);
  $stmt2->execute();
  $students = $stmt2->fetchAll(PDO::FETCH_ASSOC);

  foreach ($students as $student) {
    echo '<tr>';
    echo '<td>' . $student['student_name'] . '</td>';
    echo '<td>' . $row['graduated'] . '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
}
