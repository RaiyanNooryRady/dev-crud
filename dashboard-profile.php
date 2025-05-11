<?php require "header.php";

if (!is_user_logged_in()) {
    header("Location: login.php");
    exit;
} else {
    ?>
    <main class="dev-crud-main" id="dev-crud-dashboard">

        <?php require "dashboard-mobile-navbar.php"; ?>
        <!-- Sidebar for desktop -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-lg-2 d-none d-md-block sidebar">
                    <?php include "menu-items.php"; ?>
                </div>

                <div class="col-md-9 col-lg-10 col-12 p-4">
                    <div class="card">
                        <div class="card-header">
                            <h5>Profile Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <img src="demo.jpg" alt="Profile Picture" class="img-fluid rounded-circle dev-crud-profile-picture">
                            </div>
                            <p>Username: <?php echo $_SESSION['loggedin_user']; ?></p>
                            <p>Password: <?php echo $_SESSION['loggedin_password']; ?></p>

                            <small>Change your profile picture here</small>
                            <form class="form-group d-flex flex-row flex-wrap" action="">
                                <div class="flex-grow-1 mb-2 me-2">
                                    <input type="file" class="form-control" name="dev_crud_profile_picture">
                                </div>
                                <button type="submit" class="form-control btn btn-success mb-2" style="width: auto;" name="dev_crud_profile_picture_submit">Change Profile Picture</button>
                            </form>

                            <small>Change your username here</small>
                            <form class="form-group d-flex flex-row flex-wrap" action="">
                                <div class="flex-grow-1 mb-2 me-2">
                                    <input type="text" class="form-control" name="dev_crud_username" value="<?php echo $_SESSION['loggedin_user']; ?>">
                                </div>
                                <button type="submit" class="form-control btn btn-success mb-2" style="width: auto;" name="dev_crud_username_submit">Change Username</button>
                            </form>
                            <small>Change your password here</small>
                            <form class="form-group d-flex flex-row flex-wrap" action="">
                                <div class="flex-grow-1 mb-2 me-2">
                                    <input type="password" class="form-control" name="dev_crud_password" value="<?php echo $_SESSION['loggedin_password']; ?>">
                                </div>
                                <button type="submit" class="form-control btn btn-success mb-2" style="width: auto;" name="dev_crud_password_submit">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require "dashboard-offcanvas.php"; ?>
    </main>
<?php }
require "footer.php"; ?>