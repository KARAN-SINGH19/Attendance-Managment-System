<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registeration Screen</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../inc/registeration.css">
    <script src="../inc/password_script.js"></script>
    <script>
        function hideCourse() {
            var x = document.getElementById('usercourse_label');
            var y = document.getElementById('usercourse');
            var z = document.getElementById('userrole');

            if (z.options[z.selectedIndex].text === "Teacher") {
                x.style.display = 'none';
                y.style.display = 'none';
            } else if (z.options[z.selectedIndex].text === "Administrator") {
                x.style.display = 'none';
                y.style.display = 'none';
            } else if (z.options[z.selectedIndex].text === "Student") {
                x.style.display = 'block';
                y.style.display = 'block';
            }
        }
    </script>
</head>



<body onload="hideCourse()">
    <?php
    require_once("../inc/nav.php");
    ?>
    <?php
     require_once('../inc/new_sidebar_admin.php');
    ?>

    <?php
    session_start();
    if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) {
        if ($_SESSION["role_name"] == "Administrator") {
    ?>

            <div class="container-1">

                <div class="reg-form">
                    <form action="../pages/admin_registeration_script.php" id="registrationForm" method="post">
                        <h1 id="heading">User Registeration</h1>

                        <div class="flex-container">
                            <div class="input-container">
                                <label for="">User Firstname:</label>
                                <input type="text" name="firstName" id="firstName" placeholder="eg: First Name" autofocus>
                            </div>

                            <div class="input-container">
                                <label for="">User Lastname:</label>
                                <input type="text" name="lastName" id="lastName" placeholder="eg: Last Name">
                            </div>
                        </div>

                        <div class="input-container">
                            <label for="">User Email:</label>
                            <input type="email" name="email" id="email" placeholder="eg: abc@gmail.com" class="email-input">
                        </div>


                        <div class="flex-container-2">
                            <div class="input-container">
                                <label for="">User Password:</label>
                                <input type="password" name="password" id="password" placeholder="eg: ********" md5>
                                <span class="password-icon">
                                    <i class='bx bx-low-vision' id="eye" onclick="toggle()"></i>
                                </span>
                            </div>

                            <div class="input-container">
                                <label for="">Confirm Password:</label>
                                <input type="password" name="" id="confmpass" placeholder="eg: ********" md5>
                                <span class="password-icon">
                                    <i class='bx bx-low-vision' id="eye2" onclick="toggle2()"></i>
                                </span>
                            </div>
                        </div>

                        <label for="">User Role: </label>
                        <select name="role" id="userrole" onchange="hideCourse()">
                            <?php
                            require("../inc/connection.php");
                            $qry = "Select * from role";
                            $execute = mysqli_query($conn, $qry);
                            $final = mysqli_num_rows($execute);
                            if ($final > 0) {
                                while ($row = mysqli_fetch_array($execute)) {
                                    $id = $row['role_id'];
                                    $name = $row['role_name'];
                                    echo "<option value='$id'>$name</option>";
                                }
                            } else {
                                echo "<script> The table is empty </script>";
                            }
                            ?>
                        </select>

                        <label for="" id="usercourse_label">User Course:</label>
                        <select name="course" id="usercourse">
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
                        <button type="submit" class="register-btn" name="Register">Register User</button>
                    </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>