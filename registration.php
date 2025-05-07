<?php require "header.php"; ?>
<main class="dev-crud-main">
    <div class="container my-5">

        <h2 class="text-center my-5">Registration</h2>

        <form action="" method="POST" class="w-50 mx-auto text-center">
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="username" class="form-label me-2">Username</label>
                <input type="username" class="form-control" id="dev-crud-username" name="username" required>
            </div>
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="password" class="form-label me-2">Password</label>
                <input type="password" class="form-control" id="dev-crud-password" name="password" required>
            </div>
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="confirm_password" class="form-label me-2">Confirm Password</label>
                <input type="password" class="form-control" id="dev-crud-confirm-password" name="confirm_password" required>
            </div>
            <button type="submit" id="dev-crud-register-submit" name="register_submit" class="btn btn-primary">Submit</button>
        </form>
        <?php dev_crud_register_new_user(); ?>

    </div>
</main>
<?php require "footer.php"; ?>