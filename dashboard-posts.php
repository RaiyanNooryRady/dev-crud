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
                    <h1>Posts List</h1>
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                        data-bs-target="#addPostModal">
                        <i class="bi bi-plus-circle"></i> Add New Post
                    </button>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Post Id</th>
                                            <th>Post Title</th>
                                            <th>Featured Image</th>
                                            <th>Post Content</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        global $conn;
                                        $posts = $conn->query("SELECT * FROM dc_posts");
                                        foreach ($users as $user) {
                                            ?>
                                            <tr>
                                                <th><?php echo htmlspecialchars($post['id']); ?></th>
                                                <td><?php echo htmlspecialchars($post['title']); ?></td>
                                                <td><img src="<?php echo $post['featured_image']; ?>"
                                                        class="rounded-circle dev-crud-user-photo" alt="Profile Picture"></td>
                                                <td><?php echo htmlspecialchars($post['content']); ?></td>
                                                <td><a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editPostModal<?php echo $user['id']; ?>"><i
                                                            class="bi bi-pencil-square"></i></a></td>
                                                <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deletePostModal<?php echo $user['id']; ?>"><i
                                                            class="bi bi-trash"></i></a></td>
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
        <?php require "dashboard-offcanvas.php"; ?>
    </main>
<?php }
require "footer.php"; ?>