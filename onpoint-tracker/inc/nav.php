<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', 1);
session_start();
?>

<style>
    .navbar {
        padding: 10px;
        position: sticky;
        top: 0;
        height: 8vh;
        z-index: 100;
    }

    .navbar-nav .active a {
        font-weight: bold;
    }

    .vertical-line {
        border-left: 2px solid gainsboro;
        height: 70px;
        margin-left: 5px;
        margin-right: 10px;
    }

    .btn-primary {
        padding: 8px 20px 8px 20px;
        letter-spacing: 1px;
    }

    .btn-danger {
        padding: 8px 15px 8px 15px;
        letter-spacing: 1px;
        margin-right: 5px;
    }

    .bi-person-circle {
        color: black;
    }

    .navbar-brand {
        margin-left: 50px;
    }
</style>

<?php
function generate_nav()
{
?>
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php' style=" margin-left: 0px;">Onpoint Tracker</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage==' index.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='index.php'>Home</a>
                </li>
            </ul>
        </div>
        <div class='d-flex align-items-center gap-3'>
            <span class='navbar-text' style='color: #003DB2; font-weight: bold;'>
            </span>
            <form class='form-inline'>
                <a href=" ../pages/login.php" class="btn btn-primary">Login</a>
                    </form>
        </div>
    </nav>
<?php
}
?>

<?php
function generate_common_nav()
{
?>
    <nav class='navbar navbar-expand-lg navbar-light bg-light'>
        <a class='navbar-brand' href='index.php'>Onpoint Tracker</a>
        <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarNav' aria-controls='navbarNav' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse justify-content-end' id='navbarNav'>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage == ' index.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='index.php'>Home</a>
                </li>
            </ul>
<?php
}
?>

<?php
function generate_user_details()
{
?>
    <div class='d-flex align-items-center gap-3'>
        <i class=" bi bi-person-circle" style="font-size: 2rem;"></i>
                    <span class='navbar-text' style='color: #003DB2; font-weight: bold;'>
                        <?php
                        echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'];
                        echo "<br>";
                        echo $_SESSION['role_name'] . "</span>";
                        ?>
                    </span>
                    <form class='form-inline' action="../pages/logout.php">
                        <input type="submit" value="Logout" class="btn btn-danger">
                    </form>
        </div>
    <?php
}
    ?>

    <?php
    $currentPage = basename($_SERVER['PHP_SELF']);
    if (($currentPage == 'index.php' || $currentPage == 'login.php') && !isset($_SESSION['logged_in'])) { ?>
        <?php generate_nav(); ?>
    <?php
    } ?>

    <?php
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) {
    ?>
        <?php generate_common_nav(); ?>
        <?php
        if ($_SESSION['role_name'] == 'Administrator') { ?>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage==' admin_dashboard.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='admin_dashboard.php'><b>Admin Dashboard</b></a>
                </li>
            </ul>
            <div class=" vertical-line">
                    </div>
                    </div>
                    <?php generate_user_details(); ?>
    </nav>
<?php
        } else if ($_SESSION['role_name'] == 'Student') { ?>
    <ul class='navbar-nav ml-auto'>
        <li class='nav-item " . ($currentPage==' student_dashboard.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='student_dashboard.php'><b>Student Dashboard</b></a>
                </li>
            </ul>
            <div class=" vertical-line">
            </div>
            </div>
            <?php generate_user_details(); ?>
            </nav>
        <?php
        } else if ($_SESSION['role_name'] == 'Teacher') { ?>
            <ul class='navbar-nav ml-auto'>
                <li class='nav-item " . ($currentPage==' teacher_dashboard.php' ? 'active' : '' ) . "'>
                    <a class='nav-link active' href='teacher_dashboard.php'><b>Teacher Dashboard</b></a>
                </li>
            </ul>
            <div class=" vertical-line">
                    </div>
                    </div>
                    <?php generate_user_details(); ?>
                    </nav>
                <?php
            }
                ?>
            <?php
        }
            ?>
            <script src=" https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">