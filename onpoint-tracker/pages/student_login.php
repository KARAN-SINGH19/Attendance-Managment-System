<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Screen</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../inc/login.css">
    <script src="../inc/password_script.js"></script>
</head>

<body>
    <?php require_once("../inc/nav.php"); ?>
    <div class="container">
        <div class="form">
            <h1>Login</h1>
            <form action="loginscript.php" method="post">
                <div class="input-container">
                    <i class='bx bxs-user'></i>
                    <input type="text" name="email" id="email" placeholder="Email" autofocus><br>
                </div>
                <div class="input-container">
                    <i class='bx bxs-lock-alt'></i>
                    <input type="password" name="pass" id="password" placeholder="Password" md5>
                    <span class="password-icon">
                        <i class="bi bi-eye-slash-fill" id="eye" onclick="toggle()"></i>
                    </span>
                </div>
                <button type="submit" class="login-btn" name="Login">Login</button>
                <p>Please contact the admin if you forgot your password</p>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>

</html>