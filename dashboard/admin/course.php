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

if (isset($_GET["create"])) {
    $create = "Course has been created successfully.";
    array_push($success, $create);
}

if (isset($_GET["update"])) {
    $update = "Course has been updated successfully.";
    array_push($success, $update);
}

if (isset($_GET["restore"])) {
    $restore = "Course has been restored successfully.";
    array_push($success, $restore);
}

if (isset($_POST["delete_course"])) {
    $courseId = $_POST["course_id"];

    $deleteCourse = $courseFacade->deleteCourse($courseId);
    if ($deleteCourse) {
        array_push($success, "Course has been deleted successfully.");
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
            <h3>Course</h3>
            <?php include realpath(__DIR__ . '/../../errors.php'); ?>
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h6 class="card-title m-0">Overview</h6>
                    <a href="add-course.php" class="btn btn-warning text-light">Add Course</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Course Code</th>
                                    <th>Course Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fetchCourse = $courseFacade->fetchCourse();
                                foreach ($fetchCourse as $course) { ?>
                                    <tr>
                                        <?php if ($course['is_deleted'] == 0) { ?>
                                            <td><?= $course["course_code"] ?></td>
                                            <td><?= $course["course_description"] ?></td>
                                        <?php } else { ?>
                                            <td><?= $course["course_code"] ?> - This data has been archived.</td>
                                            <td></td>
                                        <?php } ?>
                                        <td>
                                            <?php if ($course['is_deleted'] == 0) { ?>
                                                <a href="update-course.php?course_id=<?= $course["id"] ?>" class="btn btn-primary text-light">Update</a>
                                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $course["id"] ?>">Delete</button>
                                            <?php } else { ?>
                                                <a href="restore-course.php?course_id=<?= $course["id"] ?>" class="btn btn-success text-light">Restore</a>
                                            <?php } ?>
                                        </td>

                                        <!-- Modal for each course -->
                                        <div class="modal fade" id="deleteModal<?= $course["id"] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Delete Course</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete the course "<?= htmlspecialchars($course["course_code"]) ?>"? Any related data will no longer be available.
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <form action="course.php" class="m-0" method="POST" style="display:inline-block;">
                                                            <input type="hidden" name="course_id" value="<?= $course["id"] ?>">
                                                            <button type="submit" class="btn btn-danger" name="delete_course">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include realpath(__DIR__ . '/../../app/layout/footer.php') ?>