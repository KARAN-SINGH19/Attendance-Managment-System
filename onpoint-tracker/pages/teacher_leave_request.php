<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Onpoint Tracker</title>
    <link rel="stylesheet" href="../inc/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    require_once('..\inc\head.php'); ?>
    <style>
        .navbar {
            padding: 10px
        }

        .navbar-nav .active a {
            font-weight: bold;
        }

        .container {
            padding-left: 25%;
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
                <h1>Leave Requests</h1>
                <?php
                $tutor_id = $_SESSION["user_id"];
                $select_query  = "SELECT 
        leave_id,leave_reason,leave_date,leave_status,user_fname,user_lname,module_name
        FROM leave_request
        JOIN user,module
        WHERE leave_request.leave_student_id = user.user_id
        AND leave_request.leave_module_id=module.module_id
        AND module.module_tutor_id = $tutor_id
        ORDER BY leave_id
        ";
                $result = mysqli_query($conn, $select_query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $requests = mysqli_fetch_all($result);
                    foreach ($requests as $request) {
                        $leave_bg_class = "alert-primary";
                        switch ($request[3]) {
                            case 'A':
                                $leave_bg_class = "alert-success";
                                break;
                            case 'R':
                                $leave_bg_class = "alert-warning";
                                break;

                            default:
                                $leave_bg_class = "alert-primary";
                                break;
                        }
                ?>
                        <form class="form-group d-flex flex-column gap-3" method="post" action="../functions/handle_leave_request.php">
                            <div class="<?php echo "alert" . " " . $leave_bg_class ?>" role="alert">
                                <input type="hidden" value="<?php echo $request[0] ?>" name="leave_id">
                                <p><b>Leave Request from:</b> <?php echo $request[4], " " . $request[5] ?></p>
                                <p><b>Leave Module:</b> <?php echo $request[6] ?></p>
                                <p><b>Leave Date:</b> <?php echo date('d/m/Y', strtotime($request[2])) ?></p>
                                <p><b>Reason:</b> <?php echo $request[1] ?></p>
                                <?php if ($request[3] == 'P') { ?>
                                    <button type="submit" name="approve" value="A" class="btn btn-primary" btn-lg btn-block">Approve Request</button>
                                    <button type="submit" name="reject" value="R" class="btn btn-danger" btn-lg btn-block">Reject Request</button>
                                <?php } else { ?>
                                    <p><b>Status:</b>
                                        <?php echo ($request[3] == 'A') ? 'Approved ' : 'Rejected' ?></p>
                                <?php
                                }
                                ?>
                            </div>
                        </form>
                <?php
                    }
                } else {
                    echo "<h1>No leave requests found </h1>";
                }
                ?>
        <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    } ?>
            </main>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
            </script>

</body>

</html>