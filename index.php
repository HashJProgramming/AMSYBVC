<?php 
require_once 'functions/connection.php';
include_once 'functions/get-data.php';
include_once 'functions/get-announcement.php';
if (session_start() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['username'])) {
   if ($_SESSION['type'] === 'administrator') {
        header('location: administrator');
   } else {
        header('location: student');
   }
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" id="bg-animate" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Alumni Management System for Yllana Bay View College</title>
    <meta name="twitter:image" content="assets/img/logo3.webp">
    <meta name="description" content="Web-Based Alumni Management System for Yllana Bay View College">
    <link rel="icon" type="image/webp" sizes="450x450" href="assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="assets/img/logo3.webp" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/webp" sizes="450x450" href="assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="assets/img/logo3.webp" media="(prefers-color-scheme: dark)">
    <link rel="icon" type="image/webp" sizes="450x450" href="assets/img/logo3.webp">
    <link rel="icon" type="image/webp" sizes="450x450" href="assets/img/logo3.webp">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel="stylesheet" href="assets/css/datatables.min.css">
    <link rel="stylesheet" href="assets/css/Hero-Clean-images.css">
    <link rel="stylesheet" href="assets/css/Lightbox-Gallery-baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic-icons.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-expand-md bg-body shadow">
        <div class="container-fluid"><a href="#"><img src="assets/img/blue.png" style="width: 10em;"></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link link-primary" data-bss-hover-animate="pulse" href="index.php#">Home</a></li>
                    <li class="nav-item"><a class="nav-link link-primary" data-bss-hover-animate="pulse" href="index.php#announcement">Announcement</a></li>
                    <li class="nav-item"><a class="nav-link link-primary" data-bss-hover-animate="pulse" href="index.php#contact">Contact Us</a></li>
                </ul><button class="btn rounded-3 ms-auto shadow-sm" data-bss-hover-animate="pulse" type="button" data-bs-target="#login" data-bs-toggle="modal"><i class="fas fa-lock"></i>&nbsp;Sign In</button>
            </div>
        </div>
    </nav>
    <div class="d-flex flex-column" id="content-wrapper">
        <div id="content">
            <div class="container py-4 py-xl-5">
                <div class="row gy-4 gy-md-0">
                    <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center bg-white rounded-3 shadow-sm">
                        <div class="text-dark mb-3" style="max-width: 550px;">
                            <h2 class="text-uppercase fw-bold mt-2"><span style="color: rgb(78, 115, 223);">WELCOME</span> <span style="font-weight: normal !important;">YBVC ALUMNI ASSOCIATION</span></h2>
                            <h3 class="text-uppercase fw-bold mt-2">The Builder of future leaders</h3>
                            <p class="my-3">Address: RCFM+Q3R, R.T.Lim St, Pagadian City, Zamboanga del Sur<br><br>Email : ybvc2008@gmail.com | 2154176</p><button class="btn btn-primary btn-lg me-2" type="button" data-bs-target="#login" data-bs-toggle="modal">Sign In</button><button class="btn btn-outline-primary btn-lg" type="button" data-bs-target="#register" data-bs-toggle="modal">Sign up</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div><a href="#">
                            <img class="rounded img-fluid w-100 fit-auto rounded-3 shadow-lg" src="assets/img/logo3.webp"></a>
                        </div>
                    </div>
                </div>
            </div>
            <section id="announcement" class="py-4 py-xl-5">
                <div class="container">
                    <div class="text-dark bg-light border rounded border-0 border-light d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5 shadow-sm" data-bs-theme="light">
                        <div class="text-center text-lg-start py-3 py-lg-1">
                            <h2 class="fw-bold mb-2">Announcement</h2>
                            <p class="mb-0">YBVC ALUMNI ASSOCIATION -
"THE BUILDER OF FUTURE LEADERS"</p>
                        </div>
                    </div>
                </div>
                <div class="container py-4 py-xl-5">
                    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                        <?php get_announcement(); ?>
                    </div>
                </div>
            </section>
            <section id="contact" class="py-4 py-xl-5">
                <div class="container">
                    <div class="text-dark bg-light border rounded border-0 border-light d-flex flex-column justify-content-between align-items-center flex-lg-row p-4 p-lg-5 shadow-sm" data-bs-theme="light">
                        <div class="text-center text-lg-start py-3 py-lg-1">
                            <h2 class="fw-bold mb-2">Contact Us</h2>
                            <p class="mb-0">Alumni Management System - Yllana Bay View College</p>
                        </div>
                    </div>
                </div>
            </section>
            <section class="position-relative py-4 py-xl-5">
                <div class="container position-relative">
                    <div class="row d-flex justify-content-center">
                        <div class="col-md-6 col-lg-4 col-xl-4">
                            <div class="font-monospace d-flex flex-column justify-content-center align-items-start h-100">
                                <div class="d-flex align-items-center p-3">
                                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary-light d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone">
                                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                                        </svg></div>
                                    <div class="px-2">
                                        <h6 class="mb-0">Phone</h6>
                                        <p class="mb-0">+123456789</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-3">
                                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary-light d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-envelope">
                                            <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                        </svg></div>
                                    <div class="px-2">
                                        <h6 class="mb-0">Email</h6>
                                        <p class="mb-0">ybvc2008@gmail.com</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center p-3">
                                    <div class="bs-icon-md bs-icon-rounded bs-icon-primary-light d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin">
                                            <path d="M4.146.146A.5.5 0 0 1 4.5 0h7a.5.5 0 0 1 .5.5c0 .68-.342 1.174-.646 1.479-.126.125-.25.224-.354.298v4.431l.078.048c.203.127.476.314.751.555C12.36 7.775 13 8.527 13 9.5a.5.5 0 0 1-.5.5h-4v4.5c0 .276-.224 1.5-.5 1.5s-.5-1.224-.5-1.5V10h-4a.5.5 0 0 1-.5-.5c0-.973.64-1.725 1.17-2.189A5.921 5.921 0 0 1 5 6.708V2.277a2.77 2.77 0 0 1-.354-.298C4.342 1.674 4 1.179 4 .5a.5.5 0 0 1 .146-.354zm1.58 1.408-.002-.001.002.001zm-.002-.001.002.001A.5.5 0 0 1 6 2v5a.5.5 0 0 1-.276.447h-.002l-.012.007-.054.03a4.922 4.922 0 0 0-.827.58c-.318.278-.585.596-.725.936h7.792c-.14-.34-.407-.658-.725-.936a4.915 4.915 0 0 0-.881-.61l-.012-.006h-.002A.5.5 0 0 1 10 7V2a.5.5 0 0 1 .295-.458 1.775 1.775 0 0 0 .351-.271c.08-.08.155-.17.214-.271H5.14c.06.1.133.191.214.271a1.78 1.78 0 0 0 .37.282z"></path>
                                        </svg></div>
                                    <div class="px-2">
                                        <h6 class="mb-0">Location</h6>
                                        <p class="mb-0">RCFM+Q3R, R.T.Lim St, Pagadian City, Zamboanga del Sur</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-5 col-xl-4">
                            <div class="text-center mt-5 mb-5"><img src="assets/img/logo3.webp" style="width: 10em;"></div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="bg-white sticky-footer shadow-sm shadow-sm">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>Copyright © Alumni Management System for Yllana Bay View College 2023</span></div>
            </div>
        </footer>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="login">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header"><img src="assets/img/blue.png" style="width: 10em;"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <div class="d-flex flex-column align-items-center mb-4"><img class="mb-3 rounded-circle" src="assets/img/logo3.webp" style="width: 5em;">
                        <h2 class="text-center"><span style="color: rgb(78, 115, 223);">WELCOME&nbsp;</span>YBVC ALUMNI ASSOCIATION</h2>
                    </div>
                    <form action="functions/login.php" method="post">
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="username" placeholder="Username"><label class="form-label" for="floatingInput">Username : </label></div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="password" name="password" placeholder="Password"><label class="form-label" for="floatingInput">Password : </label></div><button class="btn btn-primary w-100 mb-3" role="button" type="submit">Sign In</button>
                        <div class="d-flex flex-column align-items-center mb-4"><a href="#" data-bs-target="#register" data-bs-toggle="modal">Create Account</a></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="register">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header"><img src="assets/img/blue.png" style="width: 10em;"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button></div>
                <div class="modal-body">
                    <form class="needs-validation" action="functions/student/register.php" method="post" method="post" novalidate>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="username" placeholder="Username" required><label class="form-label" for="floatingInput">Username : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="password" name="password" placeholder="Password" required><label class="form-label" for="floatingInput">Password : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="firstname" placeholder="Firstname" required><label class="form-label" for="floatingInput">Firstname : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="lastname" placeholder="Lastname" required><label class="form-label" for="floatingInput">Lastname : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" name="birthdate" type="date" required><label class="form-label" for="floatingInput">Birthdate : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="email" name="email" placeholder="Email" required><label class="form-label" for="floatingInput">Email : </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><select class="form-select" required name="course">
                                        <optgroup label="Course">
                                            <?php get_courses(); ?>
                                        </optgroup>
                                    </select><label class="form-label" for="floatingInput">Course :&nbsp;</label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><select class="form-select" required name="civil">
                                        <optgroup label="Status">
                                            <option value="Signle" selected="">Single</option>
                                            <option value="Married">Married</option>
                                            <option value="Widow">Widow</option>
                                        </optgroup>
                                    </select><label class="form-label" for="floatingInput">Civil Status : </label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="date" name="graduated" placeholder="graudate" required><label class="form-label" for="floatingInput">Graduated at: </label></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="number" name="children" placeholder="children"><label class="form-label" for="floatingInput">No. Children:</label></div>
                            </div>
                            <div class="col">
                                <div class="form-floating mb-3"><input class="form-control form-control" type="tel" name="phone" placeholder="phone" required><label class="form-label" for="floatingInput">Contact #: </label></div>
                            </div>
                        </div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="present_address" placeholder="Present Address" required><label class="form-label" for="floatingInput">Present Address : </label></div>
                        <div class="form-floating mb-3"><input class="form-control form-control" type="text" name="work_address" placeholder="Present Address"><label class="form-label" for="floatingInput">Work Address : </label></div><button class="btn btn-primary w-100 mb-3" type="submit">Sign up</button>
                        <div class="d-flex flex-column align-items-center mb-4"></div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button></div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/three.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/Lightbox-Gallery.js"></script>
    <script src="assets/js/Lightbox-Gallery-baguetteBox.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/vanta.fog.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>