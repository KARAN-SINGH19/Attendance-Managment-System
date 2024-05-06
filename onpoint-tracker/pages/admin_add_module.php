<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Module</title>
    <link rel="stylesheet" href="../inc/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php require_once('..\inc\head.php'); ?>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

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

        .buttons {

            display: flex;
            gap: 10px;
            justify-content: center;






        }

        .button {
            border: none;

            border-radius: 10px;
            padding-left: 500px;
            padding-right: 500px;
            color: white;




        }

        h1 {
            text-align: center;
        }

        .blue {
            background-color: #003DB2;




        }

        /* .red {
            background-color: #FF0000;

        }
        .yellow {
            background-color: yellow;
           
        } */
        .container {
            /* padding-left: 400px; */
            box-shadow: 0 0 50px 0 rgba(0, 0, 0, .1);
            width: 70%;
            margin: 100px 100px 100px 500px;
            height: 50vh;
            padding: 50px 50px 50px 50px;
        }

        .textbox {
            padding-left: 200px;
            gap: 50px;
            margin-left: 200px;


        }

        .box {
            border: 2px solid;
            border-radius: 10px;
            padding-left: 5px;
            height: 40px;
            width: 350px;
        }

        .box2 {
            width: 100%;
        }

        .btn-primary {
            background-color: #003DB2;
            width: 50%;
            margin: 1px;
            text-align: center;
            border-radius: 10px;
        }
    </style>
</head>

<body>



    <?php
    require_once("../inc/nav.php");
    ?>
    <?php require_once('../inc/new_sidebar_admin.php'); ?>

    <?php
    session_start();
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        if ($_SESSION["role_name"] == "Administrator") {
    ?>

            <section class="container">

                <h1 class="mb-5">Add Module</h1>
                <form action="../pages/admin_addmodule_script.php" method="post">
                    <div class="row">
                        <div>
                            <label for=""> Module name</label><br>
                            <input class="box box2" placeholder="eg: SWE6202 - Agile Programming" name="modulename">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label for=""> Module Course </label> <br>
                            <select class="box" name="module_course">
                                <?php
                                require("../inc/connection.php");
                                $qry = "Select course_id, course_name from course";
                                $execute = mysqli_query($conn, $qry);
                                $final = mysqli_num_rows($execute);
                                if ($final > 0) {
                                    while ($row = mysqli_fetch_array($execute)) {
                                        $id = $row['course_id'];
                                        $name = $row['course_name'];
                                        echo "<option value='$id'>$name</option>";
                                    }
                                } else {
                                    echo "<script> The table is empty </script>";
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col">
                            <label> Module Tutor </label> <br>
                            <select class="box box2" name="module_tutor">
                                <?php
                                require("../inc/connection.php");
                                $qry = "Select user_id, user_fname, user_lname from user where user_role_id=3";
                                $execute = mysqli_query($conn, $qry);
                                $final = mysqli_num_rows($execute);
                                if ($final > 0) {
                                    while ($row = mysqli_fetch_array($execute)) {
                                        $id = $row['user_id'];
                                        $fname = $row['user_fname'];
                                        $lname = $row['user_lname'];
                                        echo "<option value='$id'>$fname $lname</option>";
                                    }
                                } else {
                                    echo "<script> The table is empty </script>";
                                }
                                ?>

                            </select>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <button class="btn btn-primary" name="addmodule">
                            Add Module
                        </button>
                    </div>
                </form>
            </section>
    <?php
        } else {
            header("Location:index.php");
        }
    } else {
        header("Location:index.php");
    }
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>