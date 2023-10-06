<?php
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username'])) {
    header('location: administrator/index.php');
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animate" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Student Announcement - Alumni Management System for Yllana Bay View College</title>
    <meta name="twitter:image" content="../assets/img/logo3.webp">
    <meta name="description" content="Web-Based Alumni Management System for Yllana Bay View College">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="../assets/img/logo3.webp">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/Nunito.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/css/animate.min.css">
    <link rel="stylesheet" href="../assets/css/datatables.min.css">
    <link rel="stylesheet" href="../assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="../assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="../assets/css/Login-Form-Basic-icons.css">
</head>

<body id="page-top">
        <?php include_once '../functions/student/navbar-menu.php'; ?>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <section id="announcement" class="py-4 py-xl-5">
                <div class="container">
                    <div class="text-dark bg-light border rounded border-0 border-light d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5 shadow-sm" data-bs-theme="light">
                        <div class="text-center text-lg-start py-3 py-lg-1">
                            <h2 class="fw-bold mb-2">Announcement - Comments</h2>
                        </div>
                    </div>
                </div>
                <div class="container py-4 py-xl-5">
                    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                        <?php include_once '../functions/student/get-comments.php';?>
                    </div>
                </div>
                <section class="position-relative py-4 py-xl-5">
                    <div class="container position-relative">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 col-lg-6 col-xl-7 col-xxl-4">
                                <div class="card mb-5">
                                    <div class="card-body p-sm-5">
                                        <h2 class="text-center mb-4">Comment</h2>
                                        <form action="../functions/student/add-comment.php" method="post">
                                            <div class="mb-3"><input type="hidden" name="announcement_id" value="<?php echo $_GET['id']?>"></div>
                                            <div class="mb-3"><textarea class="form-control" name="comment" rows="6" placeholder="Comment"></textarea></div>
                                            <div><button class="btn btn-primary d-block w-100" type="submit">Send </button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
        <footer class="bg-white sticky-footer shadow-sm shadow-sm">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Alumni Management System for Yllana Bay View College 2023</span></div>
            </div>
        </footer>
        <div class="modal fade" role="dialog" tabindex="-1" id="sign-out">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Sign out</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to sign out?</p>
                    </div>
                    <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-danger" type="button" href="../functions/logout.php">Sign out</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/bs-init.js"></script>
    <script src="../assets/js/datatables.min.js"></script>
    <script src="../assets/js/three.min.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/Lightbox-Gallery.js"></script>
    <script src="../assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="../assets/js/sweetalert2.all.min.js"></script>
    <script src="../assets/js/vanta.fog.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>