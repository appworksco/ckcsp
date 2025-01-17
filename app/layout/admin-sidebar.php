<!-- Faculty Sidebar -->
<div class="sidebar">
    <ul class="list-unstyled mt-2">
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="index.php" class="text-decoration-none d-block w-100"><i class="bi bi-bar-chart-line me-2"></i> Dashboard</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'course.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="course.php" class="text-decoration-none d-block w-100"><i class="bi bi-bank me-2"></i> Course</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'faculty.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="faculty.php" class="text-decoration-none d-block w-100"><i class="bi bi-person-fill me-2"></i> Faculty</a>
        </li>
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'student.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="student.php" class="text-decoration-none d-block w-100"><i class="bi bi-person-fill me-2"></i> Students</a>
        </li>
    </ul>
</div>