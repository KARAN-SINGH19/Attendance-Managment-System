<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onpoint Tracker</title>
    <link rel="stylesheet" href="../inc/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@^3"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@^2"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@^1"></script>

    <?php
    if (isset($_GET["module_id"])) {
        require_once('..\inc\head.php'); ?>
        <style>
            .navbar {
                padding: 10px
            }

            .navbar-nav .active a {
                font-weight: bold;
            }

            .name {
                background-color: #B3BFB8;
                display: flex;
                gap: 20px;
                padding: 10px;
                border-radius: 10px;
                margin-bottom: 10px;
            }

            .box {
                border-radius: 10px;
                height: 40px;
                width: 450px;
                padding: 0 10px;
            }

            .btn-outline-primary,
            .btn-outline-primary:active,
            .btn-outline-primary:visited {
                border-color: #003DB2 !important;
                color: #003DB2 !important;
            }

            .btn-outline-primary:hover {
                color: #FFFFFF !important;
                background-color: #004ED2 !important;
            }

            .btn-primary,
            .btn-primary:active,
            .btn-primary:visited {
                background-color: #003DB2 !important;
            }

            .btn-primary:hover {
                background-color: #004ED2 !important;
            }

            .container {
                padding-left: 20%;
            }

            .container-fluid {
                top: 0;
                position: fixed;
                z-index: 1000;
            }
        </style>
</head>

<body>
    <div class="container-fluid">
        <?php require_once('..\inc\nav.php'); ?>
    </div>
    <?php require_once('..\inc\teacher_sidebar.php');
        if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
            if ($_SESSION["role_name"] == "Teacher") {
    ?>

            <main class="container">
                <?php
                $module_id = $_GET["module_id"];
                $module_name = "";
                if ($result = mysqli_query($conn, "SELECT module_name from module where module_id=$module_id")) {
                    $row = mysqli_fetch_assoc($result);
                    $module_name = $row["module_name"];
                }

                ?>
                <h1 class="mb-5">
                    <?php echo $module_name; ?> Attendance Graph
                </h1>
                <canvas id="attendanceChart" width="400" height="200"></canvas>

                <section id="all-classes-section">
                    <h3 class="mt-5">All Classes for <?php echo $module_name ?></h3>
                    <table class="table">
                        <thead>
                            <tr class="table-primary">
                                <th scope="col">
                                    Class Date
                                </th>
                                <th scope="col">
                                    Class Time
                                </th>
                                <th scope="col">
                                    Class Name
                                </th>
                                <th scope="col">
                                    Class Location
                                </th>
                                <th scope="col">
                                    Present
                                </th>
                                <th scope="col">
                                    Late
                                </th>
                                <th scope="col">
                                    Absent
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $select_query = "SELECT
                    class.class_id,
                    class.class_date,
                    class.class_time,
                    class.class_name,
                    class.class_location,
                    SUM(attendance_status='P') as present,
                    SUM(attendance_status='L') as late,
                    SUM(attendance_status='A') as absent,
                    class.class_module_id
                 FROM
                 class
                 JOIN
                     attendance
                 WHERE attendance.attendance_class_id=class.class_id
                 AND class.class_module_id=$module_id
                 GROUP BY
                     attendance_class_id
                 ORDER BY
                     class.class_date ASC;";
                            $get_query = mysqli_query($conn, $select_query);
                            if ($get_query) {
                                $result = mysqli_fetch_all($get_query);
                                foreach ($result as $attendance) {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo date('d-m-Y', strtotime($attendance[1])); ?>
                                        </td>
                                        <td>
                                            <?php echo date('h:i A', strtotime($attendance[2])); ?>
                                        </td>
                                        <td>
                                            <?php echo $attendance[3]; ?>
                                        </td>
                                        <td>
                                            <?php echo $attendance[4]; ?>
                                        </td>
                                        <td>
                                            <?php echo $attendance[5]; ?>
                                        </td>
                                        <td>
                                            <?php echo $attendance[6]; ?>
                                        </td>
                                        <td>
                                            <?php echo $attendance[7]; ?>
                                        </td>
                                    </tr>
                        <?php
                                }
                            }
                        } else {
                            header("Location:index.php");
                        }
                        ?>

                        </tbody>
                    </table>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            // Extract data from PHP to JavaScript
                            const classDates = <?php echo json_encode(array_column($result, 1)); ?>;
                            const presentCounts = <?php echo json_encode(array_map('intval', array_column($result, 5))); ?>;
                            const lateCounts = <?php echo json_encode(array_map('intval', array_column($result, 6))); ?>;
                            const absentCounts = <?php echo json_encode(array_map('intval', array_column($result, 7))); ?>;

                            // Create a line chart
                            const ctx = document.getElementById('attendanceChart').getContext('2d');
                            const myChart = new Chart(ctx, {
                                type: 'line',
                                data: {
                                    labels: classDates,
                                    datasets: [{
                                            label: 'Present',
                                            data: presentCounts,
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1,
                                            fill: false
                                        },
                                        {
                                            label: 'Late',
                                            data: lateCounts,
                                            borderColor: 'rgba(255, 205, 86, 1)',
                                            borderWidth: 1,
                                            fill: false
                                        },
                                        {
                                            label: 'Absent',
                                            data: absentCounts,
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 1,
                                            fill: false
                                        }
                                    ]
                                },
                                options: {
                                    plugins: {
                                        legend: {
                                            labels: {
                                                font: {
                                                    size: 20
                                                }
                                            },
                                            scales: {
                                                xAxes: [{
                                                    ticks: {
                                                        font: {
                                                            size: 30
                                                        }
                                                    }
                                                }]
                                            }
                                        }
                                    },
                                    scales: {
                                        x: {
                                            type: 'time',
                                            time: {
                                                unit: 'day',
                                                displayFormats: {
                                                    day: 'DD-MM-YYYY'
                                                }
                                            },
                                            title: {
                                                display: true,
                                                text: 'Class Date',
                                                font: {
                                                    size: 20
                                                }
                                            },
                                            ticks: {
                                                font: {
                                                    size: 12 // Adjust the font size as needed
                                                }
                                            }
                                        },
                                        y: {
                                            beginAtZero: true, // Start the axis at zero
                                            title: {
                                                display: true,
                                                text: 'Attendance Count',
                                                font: {
                                                    size: 20
                                                }
                                            },
                                            ticks: {
                                                stepSize: 1, // Use whole numbers (integer values)
                                                beginAtZero: true,
                                                precision: 0,
                                                font: {
                                                    size: 15 // Adjust the font size as needed
                                                }
                                            }
                                        }
                                    },

                                }
                            });
                        });
                    </script>
                </section>
            </main>
    <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>