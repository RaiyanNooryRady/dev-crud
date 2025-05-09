<?php require "header.php";

if (!is_user_logged_in()) {
    header("Location: login.php");
    exit;
} else {
    ?>
    <main class="dev-crud-main" id="dev-crud-dashboard">

        <!-- Mobile Navbar -->
        <nav class="navbar navbar-dark bg-dark d-md-none">
            <div class="container-fluid">
                <button class="btn btn-dark" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                    ☰
                </button>
                <span class="navbar-text text-white">Dashboard</span>
            </div>
        </nav>

        <!-- Sidebar for desktop -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 d-none d-md-block sidebar">
                    <h4 class="p-3">Menu</h4>
                    <a href="#">Dashboard</a>
                    <a href="#">Profile</a>
                    <a href="#">Settings</a>
                    <a href="logout.php">Logout</a>
                </div>

                <div class="col-md-10 col-12 p-4">
                    <h1>Welcome, <?php echo $_SESSION['loggedin_user']; ?>!</h1>
                    <p>This is your dashboard content area.</p>
                </div>
            </div>
        </div>

        <!-- Offcanvas Sidebar for mobile -->
        <div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="mobileSidebar">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title">Menu</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
            </div>
            <div class="offcanvas-body sidebar">
                <a href="#">Dashboard</a>
                <a href="#">Profile</a>
                <a href="#">Settings</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </main>
<?php }
require "footer.php"; ?>