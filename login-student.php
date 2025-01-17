<?php

include realpath(__DIR__ . '/app/layout/header.php');

// if (isset($_POST['login'])) {
//     $email = isset($_POST['institutional_email']) ? $_POST['institutional_email'] : '';
//     $password = isset($_POST['password']) ? $_POST['password'] : '';

//     if (empty($email)) {
//         array_push($invalid, "Institutional Email should not be empty.");
//     } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         array_push($invalid, "Invalid email format.");
//     } elseif (strpos($email, '@ckcgingoog.edu.ph') === false) {
//         array_push($invalid, "Please use your @ckcgingoog.edu.ph email.");
//     }
//     if (empty($password)) {
//         array_push($invalid, "Password should not be empty.");
//     }

//     if (empty($invalid)) {
//         $verifyEmailPassword = $usersFacade->verifyEmailPassword($email, $password);
//         $login = $usersFacade->login($email, $password);
//         if ($verifyEmailPassword > 0) {
//             while ($user = $login->fetch(PDO::FETCH_ASSOC)) {
//                 $_SESSION['user_id'] = $user['id'];
//                 $_SESSION['user_role'] = $user['user_role'];
//                 $_SESSION['first_name'] = $user['first_name'];
//                 $_SESSION['last_name'] = $user['last_name'];
//                 $_SESSION['email'] = $user['email'];
//                 $_SESSION['is_activated'] = $user['is_activated'];
//                 header("Location: index.php");
//             }
//         }
//     }
// }

?>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');

    body {
        background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(13, 110, 253, 0.3)), url('./public/img/ckc-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
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

<div class="container py-5 py-lg-0">
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
                        <h1 class="h3 mb-3 fw-normal text-light">Login to your account</h1>
                        <div class="d-flex">
                            <a href="login-student.php" class="btn btn-primary w-50 mb-3 me-1">Student</a>
                            <a href="login-faculty.php" class="btn btn-outline-primary w-50 mb-3 me-1">Faculty</a>
                            <a href="login-admin.php" class="btn btn-outline-primary mb-3"><i class="bi bi-person"></i></a>
                        </div>
                        <form action="login-student.php" method="post">
                            <?php include realpath(__DIR__ . '/errors.php'); ?>
                            <div class="input-icon">
                                <i class="bi bi-person"></i>
                                <input type="email" class="form-control" name="institutional_email" placeholder="Institutional Email">
                            </div>
                            <div class="input-icon my-1">
                                <i class="bi bi-lock"></i>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                            </div>
                            <div class="row">
                                <div class="col-lg-6 d-flex align-items-center">
                                    <div class="text-light">
                                        <input type="checkbox" value="remember-me"> Remember Me
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-1">
                                    <button type="submit" class="btn btn-primary w-100" name="login">Login</button>
                                </div>
                            </div>
                        </form>
                        <hr class="text-light">
                        <h1 class="h5 fw-normal text-light mt-3 m-0">Forgot your password?</h1>
                        <p class="text-light">No worries, Kindly visit the IT Department for password retrieval.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/app/layout/footer.php') ?>