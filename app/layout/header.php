<?php

// Start session management and output buffering
session_start();
ob_start();

// Array to store messages
$invalid = array();
$success = array();
$warning = array();
$info = array();

$message = NULL;

// Include necessary files for database connectivity and facade classes
include(__DIR__ . '/../../config/db/connector.php');
include(__DIR__ . '/../../app/models/users-facade.php');
include(__DIR__ . '/../../app/models/course-facade.php');

$usersFacade = new UsersFacade;
$courseFacade = new CourseFacade;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Appworks Co.">
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="../../public/css/dashboard.css">
    <title>CKC | Student Portal</title>
</head>

<body>