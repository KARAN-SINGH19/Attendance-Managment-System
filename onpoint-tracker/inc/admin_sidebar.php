<style>
    .sidebar {
        height: 130vh;
        width: 25%;
        padding: 5px;
        background-color: #003DB2;
        float: left;
        position: sticky;
    }

    .sidebar a {
        display: block;
        box-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        padding: 8px 16px;
        text-align: center;
        text-decoration: none;
        background-color: #ffffff;
        color: #003DB2;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .sidebar a:hover {
        background-color: #e9ecef;
    }
</style>
<div class="sidebar">
    <a href="../pages/admin_dashboard.php">Home</a>
    <a href="../pages/admin_registeration.php">Add New User</a>
    <a href="../pages/admin_manage_users.php">Manage Users</a>
    <a href="../pages/admin_add_course.php">Add New Courses</a>
    <a href="../pages/admin_add_module.php">Add New Modules</a>
    <a href="../pages/admin_manage_courses.php">Manage Courses</a>
    <a href="../pages/admin_view_course.php">Correct Attendance</a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>