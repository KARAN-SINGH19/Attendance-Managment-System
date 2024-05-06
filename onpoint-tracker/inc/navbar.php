<style>
    .navbar {
        padding: 10px;
        position: sticky;
    }

    .navbar-nav .active a {
        font-weight: bold;
    }
</style>
<?php
session_start();
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<nav class='navbar navbar-expand-lg navbar-light bg-light'>
    <a class='navbar-brand' href='index.php'>Onpoint Tracker</a>
    <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
        <span class='navbar-toggler-icon'></span>
    </button>

    <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
        <ul class='navbar-nav ml-auto'>
            <li class="<?php echo 'nav-item ' . ($currentPage == 'index.php' ? 'active' : '') ?>">
                <a class='nav-link' href='index.php'>Home</a>
            </li>
            <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) { ?>
                <li class="<?php echo 'nav-item ' . (str_contains($currentPage, "_dashboard.php") ? 'active' : ''); ?>">
                    <?php
                    $dashboard_link = "";
                    switch ($_SESSION["role_name"]) {
                        case "Administrator":
                            $dashboard_link = "admin_dashboard.php";
                            break;
                        case "Teacher":
                            $dashboard_link = "teacher_dashboard.php";
                            break;
                        case "Student":
                            $dashboard_link = "student_dashboard.php";
                            break;
                        default:
                            $dashboard_link = "index.php";
                            break;
                    }
                    ?>
                    <a class='nav-link' href="<?php echo $dashboard_link; ?>">Dashboard</a>
                </li>
            <?php } else { ?>
                <li class="<?php echo 'nav-item ' . ($currentPage == 'login.php' ? 'active' : ''); ?>">
                    <a class='nav-link' href='login.php'>Login</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class='d-flex align-items-center gap-4 px-4'>
        <?php if (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]) { ?>
            <i class=" bi bi-person-circle" style="font-size: 2rem;"></i>
            <div class="d-flex flex-column align-items-start" style="color: #003DB2; font-weight: bold;">
                <?php
                $user_fullname = $_SESSION["first_name"] . " " . $_SESSION["last_name"];
                $user_role_name = $_SESSION["role_name"];
                echo "<p style='margin:0'>$user_fullname</p>";
                echo "<p style='margin:0'>$user_role_name</p>";
                ?>
            </div>
            <form class='form-inline' action="logout.php">
                <button class='btn btn-danger' type='submit'>Logout</button>
            </form>
        <?php } ?>
    </div>
</nav>



<script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">