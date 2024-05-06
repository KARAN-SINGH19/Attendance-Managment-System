<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Annoucement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <?php
    require("../inc/head.php");
    ?>
    <style>
        body {
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        header {
            color: black;
            padding: 10px;
            text-align: center;
            margin: 30px 0;
        }

        .form-tag {
            max-width: 700px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .label-tag {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .text {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .button{
            margin: 5px 240px;
        }
    </style>
</head>

<body>
    <?php
    require("../inc/nav.php");
    require("../inc/new_sidebar_admin.php");
    ?>
    <header>
        <h1>Make Announcement</h1>
    </header>
    <form action="../pages/admin_make_announcement_script.php" method="post" class="form-tag">
        <label for="" class="label-tag">Annoucement Title</label>
        <input type="text" name="title" id="" class="text" required>
        <label for="" class="label-tag">Write a Message</label>
        <textarea name="message" id="" class="text" rows="5" required></textarea>
        <input type="submit" value="Upload Notification" name="Upload_Announcement" class="btn btn-primary button" style="padding: 8px;">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>