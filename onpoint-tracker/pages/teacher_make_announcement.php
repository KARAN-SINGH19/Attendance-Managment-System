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
                <h1>Make an Announcement</h1>
                <form class="form-group d-flex flex-column gap-3" method="post" action="../functions/make_announcement.php">
                    <div class="form-group d-flex flex-column">
                        <label for="title">Announcement Title</label>
                        <input type="text" class="form-control" name="title" id="" aria-describedby="helpId" placeholder="" required>
                    </div>
                    <div class="form-group d-flex flex-column">
                        <label for="message">Write a message</label>
                        <textarea style="resize: none; padding:5px" class="form-control" name="message" cols="2" rows="3" required></textarea>
                    </div>
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Make Announcement</button>
                </form>
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