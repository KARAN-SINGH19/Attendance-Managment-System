<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Attendance</title>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .container {
            width: 75%;
            padding-left: 25%;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <?php require_once('..\inc\nav.php'); ?>
    </div>
    <?php require_once('..\inc\Student_sidebar.php'); ?>

    <section class="container">
        <h1>Attendance Record</h1>
        <div class="grid mt-5">
            <table class="table">
                <thead>
                    <tr class="table-primary">
                        <th scope="col">
                            Date
                        </th>
                        <th scope="col">
                            First Name
                        </th>
                        <th scope="col">
                            Last Name
                        </th>
                        <th scope="col">
                            Time
                        </th>
                        <th scope="col">
                            Course
                        </th>
                        <th scope="col">
                            Attendance Status
                        </th>
                    </tr>
                </thead>
                <tbody>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>