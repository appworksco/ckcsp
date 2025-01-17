<?php

include realpath(__DIR__ . '/app/layout/header.php');

if (isset($_POST['create_account'])) {
    $userRole = isset($_POST['user_role']) ? $_POST['user_role'] : '';
    $firstName = isset($_POST['first_name']) ? $_POST['first_name'] : '';
    $lastName = isset($_POST['last_name']) ? $_POST['last_name'] : '';
    $email = isset($_POST['institutional_email']) ? $_POST['institutional_email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $confirmPassword = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : '';

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
        // Verify account first if IE already exist
        $verifyEmail = $usersFacade->verifyEmail($email);
        if ($verifyEmail > 0) {
            array_push($invalid, "Institutional Email already exist.");
        } else {
            $createAccount = $usersFacade->createAccount($userRole, $firstName, $lastName, $email, $password);
            if ($createAccount) {
                array_push($success, "You have created an account successfully");
            }
        }
    }
}

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');

    body {
        background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.3)), url('./public/img/ckc-bg.jpg');
        background-size: cover;
        background-position: center;
    }

    .card-custom {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .input-icon {
        position: relative;
    }

    .input-icon i {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .input-icon input {
        padding-left: 30px;
    }

    .archivo-black-regular {
        font-family: "Archivo Black", sans-serif;
    }
</style>

<div class="container py-lg-0" style="padding: 120px 0 120px 0;">
    <div class="row">
        <div class="col-lg-7 d-none d-lg-flex align-items-center justify-content-center" style="height: 100vh;">
            <div class="text-center">
                <img src="./public/img/ckc-logo-colored.png" class="mb-3" alt="CKC Logo" style="width: 45%;">
                <h1 class="display-6 text-light archivo-black-regular">Christ the King College <br> Student Portal</h1>
            </div>
        </div>
        <div class="col-lg-5 d-flex align-items-center justify-content-center" style="height: 100vh;">
            <div>
                <div class="text-center d-lg-none d-flex">
                    <div>
                        <img src="./public/img/ckc-logo-colored.png" class="mb-3" alt="CKC Logo" style="width: 30%;">
                        <h3 class="text-light archivo-black-regular">Christ the King College <br> Student Portal</h3>
                    </div>
                </div>
                <div class="card card-custom">
                    <div class="card-body py-5">
                        <form action="create-account.php" method="post">
                            <h1 class="h3 mb-3 fw-normal text-light">Create your account</h1>
                            <?php include realpath(__DIR__ . '/errors.php'); ?>
                            <select class="form-select" name="user_role">
                                <option value="0">Student</option>
                                <option value="1">Faculty</option>
                            </select>
                            <div class="row mt-1">
                                <div class="col-lg-6 pe-sm-1">
                                    <div class="input-icon mb-1">
                                        <i class="bi bi-person"></i>
                                        <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                    </div>
                                </div>
                                <div class="col-lg-6 ps-sm-0">
                                    <div class="input-icon mb-1">
                                        <i class="bi bi-person"></i>
                                        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                    </div>
                                </div>
                            </div>
                            <div class="input-icon mb-1">
                                <i class="bi bi-person"></i>
                                <input type="text" class="form-control" name="institutional_email" placeholder="Institutional Email">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 pe-sm-1 mb-1">
                                    <div class="input-icon">
                                        <i class="bi bi-lock"></i>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <div class="col-lg-6 ps-sm-0">
                                    <div class="input-icon">
                                        <i class="bi bi-lock"></i>
                                        <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 mt-1" name="create_account">Create Account</button>
                        </form>
                        <hr class="text-light">
                        <h1 class="h5 fw-normal text-light mt-3 mb-2">Already had an account?</h1>
                        <a href="login.php" class="btn btn-info w-100 text-light">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/app/layout/footer.php') ?>