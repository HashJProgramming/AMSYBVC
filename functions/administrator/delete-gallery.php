<?php
$image = $_POST['id'];
unlink('../images/gallery/'.basename($image));
header("Location: ../../administrator/gallery.php?type=success&message=Photo deleted successfully.");