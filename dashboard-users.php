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
                    <h1>Users List</h1>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addUserModal">Add New User</button>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Profile Photo</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            global $conn;
                            $users= $conn->query("SELECT * FROM dc_users");
                            foreach ($users as $user) {
                                ?>
                                <tr>
                                    <td><?php echo $user['username']; ?></td>
                                <td><img src="demo.jpg" class="dev-crud-user-photo img-fluid" alt="" srcset=""></td>
                                <td><a href="dashboard-users.php?id=<?php echo $user['id']; ?>" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a href="dashboard-users.php?id=<?php echo $user['id']; ?>" class="btn btn-danger"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php require "dashboard-offcanvas.php"; ?>
    </main>
<?php }
require "footer.php"; ?>