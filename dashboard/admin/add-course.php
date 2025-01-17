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

if (isset($_POST['add_course'])) {
    $courseCode = $_POST['course_code'];
    $courseDescription = $_POST['course_description'];

    if (empty($courseCode)) {
        array_push($invalid, "Course Code should not be empty.");
    }
    if (empty($courseDescription)) {
        array_push($invalid, "Course Description should not be empty.");
    }

    if (empty($invalid)) {
        $addCourse = $courseFacade->addCourse($courseCode, $courseDescription);
        if ($addCourse) {
            header("Location: course.php?create");
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
            <h3>Add Course</h3>
            <?php include realpath(__DIR__ . '/../../errors.php'); ?>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="card-title m-0">Course</h6>
                </div>
                <div class="card-body">
                    <form action="add-course.php" method="post">
                        <div class="mb-2">
                            <label for="courseCode" class="form-label">Course Code</label>
                            <input type="text" class="form-control" id="courseCode" name="course_code">
                        </div>
                        <div class="mb-2">
                            <label for="courseDescription" class="form-label">Course Description</label>
                            <input type="text" class="form-control" id="courseDescription" name="course_description">
                        </div>
                        <button class="btn btn-warning text-light w-100" name="add_course">Add Course</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/../../app/layout/footer.php') ?>