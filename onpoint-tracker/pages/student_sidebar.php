<style>
    .sidebar {
        position: fixed;
        height: 100vh;
        width: 25%;
        padding: 5px;
        background-color: #003DB2;
        margin: right 500px;
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
        margin-bottom: 10px;
    }

    .sidebar a:hover {
        background-color: #e9ecef;
    }
</style>
<div class="sidebar">
    <a href="student_dashboard.php">Home</a>
    <a href="student_view_modules.php">Attendance History</a>
    <a href="student_leave_request.php">Request for Leave</a>
    <a href="student_fetch_annoucment.php">Important Announcement </a>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>