<?php

include realpath(__DIR__ . '/../../app/layout/header.php');

if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
}
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}

if ($userId == 0) {
    header("Location: login-student.php");
}

if (isset($_POST['add_faculty'])) {
    $idNumber = $_POST['id_number'];
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if (empty($idNumber)) {
        array_push($invalid, "ID Number should not be empty.");
    }
    if (empty($firstName)) {
        array_push($invalid, "First Name should not be empty.");
    }
    if (empty($lastName)) {
        array_push($invalid, "Last Name should not be empty.");
    }
    if (empty($email)) {
        array_push($invalid, "Institutional Email should not be empty.");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($invalid, "Invalid email format.");
    } elseif (strpos($email, '@ckcgingoog.edu.ph') === false) {
        array_push($invalid, "Please use your @ckcgingoog.edu.ph email.");
    }
    if (empty($password)) {
        array_push($invalid, "Password should not be empty.");
    }
    if ($password != $confirmPassword) {
        array_push($invalid, "Password does not be match.");
    }

    if (empty($invalid)) {
        $addFaculty = $usersFacade->addFaculty($idNumber, $firstName, $lastName, $email, $password);
        if ($addFaculty) {
            header("Location: faculty.php?create");
        }
    }
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
    <img src="../.././public/img/ckc-banner.png" class="w-100" alt="CKC Banner">
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="card">
                <div class="card-header bg-primary">
                    <p class="text-light text-center m-0">Administrator</p>
                </div>
                <div class="card-body text-center">
                    <i class="bi bi-person-bounding-box" style="font-size: 150px;"></i>
                    <p class="small"><?= $email ?></p>
                </div>
            </div>

            <?php include realpath(__DIR__ . '/../../app/layout/admin-sidebar.php'); ?>

        </div>
        <div class="col-lg-9 bg-white py-3" style="height: 100vh;">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="card-title m-0">Faculty</h6>
                </div>
                <div class="card-body">
                    <form action="add-faculty.php" method="post">
                        <?php include realpath(__DIR__ . '/../../errors.php'); ?>
                        <div class="mb-2">
                            <label for="idNumber" class="form-label">ID Number</label>
                            <input type="text" class="form-control" id="idNumber" name="id_number">
                        </div>
                        <div class="mb-2 d-flex justify-content-between">
                            <div class="w-100 me-2">
                                <label for="firstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name">
                            </div>
                            <div class="w-100">
                                <label for="lastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastName" name="last_name">
                            </div>
                        </div>
                        <div class="mb-2">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-2">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" name="confirm_password">
                        </div>
                        <button class="btn btn-warning text-light w-100" name="add_faculty">Add Faculty</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/../../app/layout/footer.php') ?>