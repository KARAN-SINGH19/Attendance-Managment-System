<?php
require_once('..\inc\conn.php');

if (isset($_GET["module_id"])) {
    $module_id = $_GET["module_id"];
    $dates_query = "SELECT class_id,class_date,class_time FROM class WHERE class_module_id=$module_id";
    $resultDateTime = mysqli_query($conn, $dates_query);

    $dateTimeColumns = "";
    while ($rowDateTime = mysqli_fetch_assoc($resultDateTime)) {
        $date = $rowDateTime['class_date'];
        $time = $rowDateTime['class_time'];
        $dateTimeColumns .= "MAX(CASE WHEN class.class_date = '$date' AND class.class_time = '$time' THEN attendance.attendance_status END) AS '$date $time', ";
    }

    // Remove trailing comma and space
    $dateTimeColumns = rtrim($dateTimeColumns, ', ');

    // Construct dynamic SQL query
    $moduleQuery = "SELECT module_name FROM module WHERE module_id = $module_id";
    $moduleResult = mysqli_query($conn, $moduleQuery);

    if ($moduleResult && mysqli_num_rows($moduleResult) > 0) {
        // Fetch module_name from the result
        $moduleRow = mysqli_fetch_assoc($moduleResult);
        $module_name = $moduleRow['module_name'];
    } else {
        // Handle the case where module_name is not found
        echo "Module name not found for the given module ID.";
        exit; // Exit the script
    }

    // Construct dynamic SQL query
    $sql = "
    SELECT 
        user_fname AS Firstname,
        user_lname AS Lastname,
        $dateTimeColumns
    FROM 
        user 
    LEFT JOIN 
        attendance ON user.user_id = attendance.attendance_student_id
    LEFT JOIN 
        class ON attendance.attendance_class_id = class.class_id
    WHERE class_module_id=$module_id
    GROUP BY 
        user.user_id
    ORDER BY 
        user.user_fname
    ";

    // Execute query
    $result = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Check if there is data
    if (!empty($data)) {
        // Set the response headers to make it a downloadable CSV file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="attendance_data_' . $module_name . '.csv"');

        // Open a temporary file pointer
        $output = fopen('php://output', 'w');

        // Output the column headings
        fputcsv($output, array_keys($data[0]));

        // Output the data
        foreach ($data as $row) {
            fputcsv($output, $row);
        }

        // Close the file pointer
        fclose($output);
    } else {
        echo "No data found for the given module ID.";
    }
} else {
    echo "Error in the query";
}
