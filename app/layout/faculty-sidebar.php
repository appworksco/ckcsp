<!-- Faculty Sidebar -->
<div class="sidebar">
    <ul class="list-unstyled mt-2">
        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'index.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="index.php" class="text-decoration-none d-block w-100"><i class="bi bi-house-door-fill me-2"></i> Home</a>
        </li>

        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'faculty-class.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="faculty-class.php" class="text-decoration-none d-block w-100"><i class="bi bi-card-heading me-2"></i> My Class</a>
        </li>

        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'schedule.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="#" class="text-decoration-none d-block w-100"><i class="bi bi-list-task me-2"></i> My Schedule</a>
        </li>

        <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'change-password.php') !== false) ? 'sidebar-active' : ''; ?>">
            <a href="#" class="text-decoration-none d-block w-100"><i class="bi bi-eye-fill me-2"></i> Change Password</a>
        </li>

        <li><a href="logout.php" class="text-decoration-none d-block w-100"><i class="bi bi-arrow-left me-2"></i> Logout</a></li>
    </ul>

    <!-- Admin Sidebar -->
    <?php if ($isAdmin === 1) { ?>
        <span class="badge bg-dark w-100">Administrator</span>
        <ul class="list-unstyled mt-2">
            <li class="<?php echo (strpos($_SERVER['REQUEST_URI'], 'admin-faculty.php') !== false) ? 'sidebar-active' : ''; ?>">
                <a href="admin-faculty.php" class="text-decoration-none d-block w-100"><i class="bi bi-person-fill me-2"></i> Faculty</a>
            </li>
            <li><a href="#" class="text-decoration-none d-block w-100"><i class="bi bi-person-fill me-2"></i> Students</a></li>
            <li><a href="#" class="text-decoration-none d-block w-100"><i class="bi bi-person-fill me-2"></i> Course</a></li>
        </ul>
    <?php } ?>
</div>