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
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        <i class="bi bi-plus-circle"></i> Add New User
                    </button>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Profile Photo</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        global $conn;
                                        $users = $conn->query("SELECT * FROM dc_users");
                                        foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($user['username']); ?></td>
                                                <td><?php echo htmlspecialchars(($user['password'])); ?></td>
                                                <td><img src="demo.jpg" class="rounded-circle" style="width: 50px; height: 50px; object-fit: cover;" alt="Profile Picture"></td>
                                                <td><a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo $user['id']; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                                <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteUserModal<?php echo $user['id']; ?>"><i class="bi bi-trash"></i></a></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add User Modal -->
        <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add New User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="mb-3">
                                <label for="profile_picture" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Edit User Modals -->
        <?php foreach ($users as $user) { ?>
        <div class="modal fade" id="editUserModal<?php echo $user['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User: <?php echo htmlspecialchars($user['username']); ?></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="edit_username<?php echo $user['id']; ?>" class="form-label">Username</label>
                                <input type="text" class="form-control" id="edit_username<?php echo $user['id']; ?>" name="edit_username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="edit_profile_picture<?php echo $user['id']; ?>" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" id="edit_profile_picture<?php echo $user['id']; ?>" name="edit_profile_picture">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="edit_user" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete User Modal -->
        <div class="modal fade" id="deleteUserModal<?php echo $user['id']; ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete user "<?php echo htmlspecialchars($user['username']); ?>"?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <form action="" method="POST" style="display: inline;">
                            <input type="hidden" name="delete_user_id" value="<?php echo $user['id']; ?>">
                            <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <?php require "dashboard-offcanvas.php"; ?>
    </main>
<?php }
require "footer.php"; ?>