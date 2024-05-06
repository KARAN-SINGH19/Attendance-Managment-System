<?php
require_once('..\inc\conn.php');

if (isset($_GET["class_id"])) {
    $class_id = $_GET["class_id"];
    $sql = "SELECT user_id, user_fname, user_lname, course_name,class_date,class_time,class_name, attendance_status,module_name
    FROM `attendance`
    JOIN user, course, class,module 
    WHERE attendance.attendance_student_id=user.user_id
    and user.user_course_id=course.course_id
    and attendance.attendance_class_id=$class_id
    and attendance.attendance_class_id=class.class_id
    and class.class_module_id=module.module_id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Output CSV headers
        header('Content-Type: text/csv');

        // Open output stream
        $output = fopen('php://output', 'w');

        // Output CSV headers
        fputcsv($output, ['ID', 'First Name', 'Last Name', 'Attendance', 'Course', 'Module Name', 'Class Date', 'Class Time', 'Class Name']);

        // Output data
        while ($attendance = mysqli_fetch_assoc($result)) {
            switch ($attendance['attendance_status']) {
                case 'P':
                    $attendance_status = "Present";
                    break;
                case 'L':
                    $attendance_status = "Late";
                    break;
                case 'A':
                    $attendance_status = "Absent";
                    break;
                default:
                    $attendance_status = "Absent";
                    break;
            }
            // echo var_export($attendance, true);
            fputcsv($output, [
                $attendance['user_id'],
                $attendance['user_fname'],
                $attendance['user_lname'],
                $attendance_status,
                $attendance['course_name'],
                $attendance['module_name'],
                $attendance['class_date'],
                $attendance['class_time'],
                $attendance['class_name'],
            ]);
            header('Content-Disposition: attachment; filename="Attendance_Report_' . $attendance["class_date"] . "_" . $attendance["module_name"] . "_" . $attendance["class_name"] . '.csv"');
        }

        header('Cache-Control: max-age=0');
        // Close output stream
        fclose($output);

        // Exit to prevent additional output
        exit();
    } else {
        echo "Error in the query";
    }
}
