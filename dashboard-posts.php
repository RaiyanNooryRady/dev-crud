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
                                            <th>Author</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        global $conn;
                                        $posts = $conn->query("SELECT * FROM dc_posts");
                                        foreach ($posts as $post) {
                                            ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($post['id']); ?></td>
                                                <td><?php echo htmlspecialchars($post['title']); ?></td>
                                                <td><img src="<?php echo $post['featured_image']; ?>"
                                                        class="rounded-circle dev-crud-user-photo" alt="Profile Picture"></td>
                                                <td><?php echo htmlspecialchars($post['content']); ?></td>
                                                <td><?php echo htmlspecialchars($post['author']); ?></td>
                                                <td><a href="#" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#editPostModal<?php echo $post['id']; ?>"><i
                                                            class="bi bi-pencil-square"></i></a></td>
                                                <td><a href="#" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                        data-bs-target="#deletePostModal<?php echo $post['id']; ?>"><i
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
        <!-- Add Post Modal -->
        <div class="modal fade" id="addPostModal" tabindex="-1" aria-labelledby="addPostModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addPostModalLabel">Add New Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="POST">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="featured_image" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" id="featured_image" name="featured_image" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" name="author"
                                    value="<?php echo $_SESSION['loggedin_user']; ?>" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="add_post_submit" class="btn btn-primary">Add Post</button>
                        </div>
                    </form>
                    <?php dev_crud_add_new_post(); ?>
                </div>
            </div>
        </div>
        <!-- Edit Post Modal -->
        <?php foreach ($posts as $post) { ?>
            <div class="modal fade" id="editPostModal<?php echo $post['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Post: <?php echo htmlspecialchars($post['title']); ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="" method="POST">
                            <div class="modal-body">
                                <input type="hidden" name="edit_post_id" value="<?php echo $post['id']; ?>">
                                <div class="mb-3">
                                    <label for="edit_title<?php echo $post['id']; ?>" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit_title<?php echo $post['id']; ?>"
                                        name="edit_title" value="<?php echo htmlspecialchars($post['title']); ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_featured_image<?php echo $post['id']; ?>" class="form-label">Featured
                                        Image</label>
                                    <input type="file" class="form-control" id="edit_featured_image<?php echo $post['id']; ?>"
                                        name="edit_featured_image">
                                </div>
                                <div class="mb-3">
                                    <label for="edit_content<?php echo $post['id']; ?>" class="form-label">Content</label>
                                    <textarea class="form-control" id="edit_content<?php echo $post['id']; ?>"
                                        name="edit_content"
                                        required><?php echo htmlspecialchars($post['content']); ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_author<?php echo $post['id']; ?>" class="form-label">Author</label>
                                    <input type="text" class="form-control" id="edit_author<?php echo $post['id']; ?>"
                                        name="edit_author" value="<?php echo htmlspecialchars($post['author']); ?>" readonly>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" name="edit_post_save" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                        <?php dev_crud_edit_post(); ?>
                    </div>
                </div>
            </div>

            <!-- Delete Post Modal -->
            <div class="modal fade" id="deletePostModal<?php echo $post['id']; ?>" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete post "<?php echo htmlspecialchars($post['title']); ?>"?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="" method="POST" style="display: inline;">
                                <input type="hidden" name="delete_post_id" value="<?php echo $post['id']; ?>">
                                <button type="submit" name="delete_post" class="btn btn-danger">Delete</button>
                            </form>
                            <?php dev_crud_delete_post(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>

        <?php require "dashboard-offcanvas.php"; ?>
    </main>
<?php }
require "footer.php"; ?>