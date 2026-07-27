<?php

include "db.php";

if(isset($_POST['certificate_code']))
{
    $certificate_code = trim($_POST['certificate_code']);
    $query = "SELECT * FROM certificates WHERE certificate_code = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $certificate_code);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Certificate Verified | CertPro</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
<link rel="stylesheet" href="/certification-style.css">
<link rel="stylesheet" href="/style.css">
<link rel="shortcut icon" href="/assets/favicon.jpeg" type="image/x-icon">
</head>
<body class="bg-dark-theme text-white">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top glass-nav">
    <div class="container">
        <a class="navbar-brand" href="https://education.countryedu.com/certification/">
            <img src="/assets/logo-course.png" alt="CertPro Logo" height="40" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 hover-opacity-100" href="https://education.countryedu.com/certification/#certifications">Certifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 hover-opacity-100" href="https://education.countryedu.com/certification/#benefits">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 hover-opacity-100" href="https://education.countryedu.com/certification/#testimonials">Testimonials</a>
                </li>
                <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                    <a href="https://education.countryedu.com/pages/contact.html" class="btn btn-primary-theme px-4 py-2 fw-medium rounded-pill shadow-sm">Contact us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="overlay"></div>

<main class="verifier-main">
<div class="result-card success">

<h2>&#10004; Certificate Verified</h2>

<table>

<tr>
<td>Certificate Code</td>
<td><?php echo htmlspecialchars($row['certificate_code']); ?></td>
</tr>

<tr>
<td>Name</td>
<td><?php echo htmlspecialchars($row['student_name']); ?></td>
</tr>

<tr>
<td>Program</td>
<td><?php echo htmlspecialchars($row['program_name']); ?></td>
</tr>

<tr>
<td>Duration</td>
<td><?php echo htmlspecialchars($row['duration'] ?? '-'); ?></td>
</tr>

<tr>
<td>Issue Date</td>
<td><?php echo $row['issue_date'] ? date('d M Y', strtotime($row['issue_date'])) : '—'; ?></td>
</tr>

<tr>
<td>Grade</td>
<td><?php echo htmlspecialchars($row['grade'] ?? '-'); ?></td>
</tr>

</table>

<br>

<a href="/">
Back
</a>

</div>
</main>

<footer class="footer bg-dark-theme pt-5 pb-4 border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <a class="navbar-brand d-inline-block mb-3" href="https://education.countryedu.com/certification/">
                    <img src="/assets/logo-course.png" alt="CertPro Logo" height="40" class="d-inline-block align-text-top">
                </a>
                <p class="text-secondary-light small pe-lg-4" style="line-height: 1.6">
                    Premium certification programs designed to bridge the gap between
                    academic learning and industry requirements.
                </p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-4 fs-6">Quick Links</h6>
                <ul class="list-unstyled footer-links small d-flex flex-column gap-3">
                    <li><a href="https://education.countryedu.com/certification/#certifications">Certifications</a></li>
                    <li><a href="https://education.countryedu.com/pages/about.html">About Us</a></li>
                    <li><a href="https://education.countryedu.com/pages/contact.html">Contact</a></li>
                    <li><a href="https://education.countryedu.com/pages/workshops.html">Workshops</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 fs-6"></h6>
                <ul class="list-unstyled footer-links small d-flex flex-column gap-3">
                    <li><a href="#">Frontend Development</a></li>
                    <li><a href="#">Backend Development</a></li>
                    <li><a href="#">Data Science</a></li>
                    <li><a href="#">AI & Machine Learning</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 fs-6">Connect With Us</h6>
                <div class="d-flex gap-2 social-icons">
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="border-top border-secondary border-opacity-25 pt-4 mt-2 text-center small text-secondary-light">
            <p class="mb-0">&copy; 2026 CertPro. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
}
else
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Invalid Certificate | CertPro</title>
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" />
<link rel="stylesheet" href="/certification-style.css">
<link rel="stylesheet" href="/style.css">
<link rel="shortcut icon" href="/assets/favicon.jpeg" type="image/x-icon">
</head>
<body class="bg-dark-theme text-white">

<nav class="navbar navbar-expand-lg navbar-dark sticky-top glass-nav">
    <div class="container">
        <a class="navbar-brand" href="https://education.countryedu.com/certification/">
            <img src="/assets/logo-course.png" alt="CertPro Logo" height="40" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 hover-opacity-100" href="https://education.countryedu.com/certification/#certifications">Certifications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 hover-opacity-100" href="https://education.countryedu.com/certification/#benefits">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white opacity-75 hover-opacity-100" href="https://education.countryedu.com/certification/#testimonials">Testimonials</a>
                </li>
                <li class="nav-item ms-lg-4 mt-3 mt-lg-0">
                    <a href="https://education.countryedu.com/pages/contact.html" class="btn btn-primary-theme px-4 py-2 fw-medium rounded-pill shadow-sm">Contact us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="overlay"></div>

<main class="verifier-main">
<div class="result-card error">

<h2>&#10060; Certificate Not Found</h2>

<p>
The entered certificate code
does not exist in our records.
</p>

<a href="/">
Try Again
</a>

</div>
</main>

<footer class="footer bg-dark-theme pt-5 pb-4 border-top border-secondary border-opacity-25">
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4 col-md-6">
                <a class="navbar-brand d-inline-block mb-3" href="https://education.countryedu.com/certification/">
                    <img src="/assets/logo-course.png" alt="CertPro Logo" height="40" class="d-inline-block align-text-top">
                </a>
                <p class="text-secondary-light small pe-lg-4" style="line-height: 1.6">
                    Premium certification programs designed to bridge the gap between
                    academic learning and industry requirements.
                </p>
            </div>
            <div class="col-lg-2 col-md-6">
                <h6 class="fw-bold mb-4 fs-6">Quick Links</h6>
                <ul class="list-unstyled footer-links small d-flex flex-column gap-3">
                    <li><a href="https://education.countryedu.com/certification/#certifications">Certifications</a></li>
                    <li><a href="https://education.countryedu.com/pages/about.html">About Us</a></li>
                    <li><a href="https://education.countryedu.com/pages/contact.html">Contact</a></li>
                    <li><a href="https://education.countryedu.com/pages/workshops.html">Workshops</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 fs-6"></h6>
                <ul class="list-unstyled footer-links small d-flex flex-column gap-3">
                    <li><a href="#">Frontend Development</a></li>
                    <li><a href="#">Backend Development</a></li>
                    <li><a href="#">Data Science</a></li>
                    <li><a href="#">AI & Machine Learning</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6">
                <h6 class="fw-bold mb-4 fs-6">Connect With Us</h6>
                <div class="d-flex gap-2 social-icons">
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-twitter-x"></i></a>
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-linkedin"></i></a>
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="btn btn-sm rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="border-top border-secondary border-opacity-25 pt-4 mt-2 text-center small text-secondary-light">
            <p class="mb-0">&copy; 2026 CertPro. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
}
}
?>
