<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Announcements</title>
    <?php
    require_once("../inc/head.php");
    ?>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        .container-5 {
            color: black;
            padding: 50px 50px 50px 50px;
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
            max-width: 1100px;
            text-align: left;
            height: auto;
            margin: auto;
            margin-top: 50px;
        }

        .order-form-label {
            margin: 8px 0 0 0;
            font-size: 14px;
            font-weight: bold;
        }

        .btn-submit:hover {
            background-color: #0D47A1 !important;
            color: black;
        }

        body {
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        td,
        th {
            text-align: center;
        }

        td,
        th {
            padding: 12px;
        }

        .btn-primary {
            background-color: #003DB2;
        }

        .btn-primary:hover {
            background-color: #fff;
            color: black;
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <?php
    require_once("../inc/nav.php");
    ?>

    <?php
    require_once('../pages/student_sidebar.php');
    ?>

    <?php
    session_start();
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        if ($_SESSION["role_name"] == "Student") {
    ?>

            <div class="order-form m-4">
                <div class="container-5 pt-4">
                    <div class="row">
                        <div class="col-12 px-4">
                            <h1 style="text-align: center;text-transform: uppercase;">Announcements</h1>
                        </div>
                        <div>
                            <div>
                                <div>
                                    <table class="table table-striped table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">MESSAGE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require("../inc/conn.php");
                                            $qry = "SELECT * FROM notification ORDER BY notification_id DESC;";
                                            $result = mysqli_query($conn, $qry);
                                            $final = mysqli_num_rows($result);
                                            if ($final > 0) {
                                                while ($row = mysqli_fetch_array($result)) {
                                                    $id = $row['notification_id'];
                                                    $message = $row['notification_messsage'];
                                                    echo "<tr>
                                                    <td>$id</td>
                                                    <td style='text-align: left;'>$message</zd>
                                                    </tr>";
                                                }
                                            } else {
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }
    ?>
</body>

</html>