<?php

include realpath(__DIR__ . '/app/layout/header.php');

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
}
if (isset($_SESSION['user_role'])) {
    $userRole = $_SESSION['user_role'];
}
if (isset($_SESSION['first_name'])) {
    $firstName = $_SESSION['first_name'];
}
if (isset($_SESSION['last_name'])) {
    $lastName = $_SESSION['last_name'];
}
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
if (isset($_SESSION['is_admin'])) {
    $isAdmin = $_SESSION['is_admin'];
}

if ($userId == 0) {
    header('Location: login-student.php');
}

?>

<style>
    body {
        background-color: #f8f8f8;
    }

    .container {
        max-width: 1250px;
        width: 100%;
        margin: 0 auto;
    }
</style>

<div class="header">
    <img src="./public/img/ckc-banner.png" class="w-100" alt="CKC Banner">
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <?php if ($userRole === 'Student') { ?>
                        <p class="text-light text-center m-0">Student</p>
                    <?php } else { ?>
                        <p class="text-light text-center m-0">Faculty</p>
                    <?php } ?>
                </div>
                <div class="card-body text-center">
                    <i class="bi bi-person-bounding-box" style="font-size: 150px;"></i>
                    <h6 class="text-uppercase m-0"><?= $firstName . ' ' . $lastName ?></h6>
                    <p class="small"><?= $email ?></p>
                </div>
            </div>

            <?php

            if ($userRole === 0) {
                // Student Sidebar
                include realpath(__DIR__ . '/app/layout/student-sidebar.php');
            } else {
                // Faculty Sidebar
                include realpath(__DIR__ . '/app/layout/faculty-sidebar.php');
            }

            ?>
        </div>
        <div class="col-lg-9 bg-white" style="height: 100vh;">
            <p>asdas</p>
        </div>
    </div>
</div>


<?php include realpath(__DIR__ . '/app/layout/footer.php') ?>
<?php include realpath(__DIR__ . '/app/modals/activate-account-modal.php') ?>