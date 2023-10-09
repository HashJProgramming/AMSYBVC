<?php
require_once '../functions/connection.php';
$sql = "SELECT c.*, s.firstname, s.lastname
FROM comments c
LEFT JOIN students s ON c.user_id = s.user_id
WHERE `announcement_id` = :announcement_id
ORDER BY `created_at` DESC;
";
$stmt = $db->prepare($sql);
$stmt->bindParam(':announcement_id', $_GET['id']);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    ?>
    <div class="col">
        <div class="card">
            <div class="card-body p-4">
                <div class="bs-icon-md bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center d-inline-block mb-3 bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-plus">
                        <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                        <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"></path>
                    </svg></div>
                    <h5 class="card-title"><?php if(strlen($row['firstname']) > 0){echo 'Student: '; } else {echo 'Administrator '; }?><?php echo $row['firstname'].' '.$row['lastname']?></h5>
                <p class="card-text">Comment: <?php echo $row['comment'] ?></p>
                <p class="card-text">Date: <?php echo $row['created_at'] ?></p>
                <form action="../functions/administrator/delete-comment.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <input type="hidden" name="announcement_id" value="<?php echo $_GET['id'] ?>">
                    <?php
                        if ($_SESSION['id'] == $row['user_id']) {
                            ?>
                           <button class="btn btn-danger w-100 mb-4" type="submit">Delete Comments</button>
                            <?php
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <?php
}