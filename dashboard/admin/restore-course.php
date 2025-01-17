<?php

include realpath(__DIR__ . '/../../app/layout/header.php');

if (isset($_SESSION["user_id"])) {
    $userId = $_SESSION["user_id"];
}
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
}

if (isset($_GET["course_id"])) {
    $courseId = $_GET["course_id"];
}

if ($userId == 0) {
    header("Location: login-student.php");
}

$restoreCourse = $courseFacade->restoreCourse($courseId);
if ($restoreCourse) {
    header("Location: course.php?restore");
}
