<?php require "header.php"; ?>
<main class="dev-crud-main">
    <div class="container my-5">

        <h2 class="text-center my-5">Login</h2>
        
        <form action="" method="POST" class="w-50 mx-auto text-center">
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="dev_crud_username" class="form-label me-2">Username</label>
                <input type="text" class="form-control" id="dev-crud-username" name="dev_crud_username" >
            </div>
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="dev_crud_password" class="form-label me-2">Password</label>
                <input type="password" class="form-control" id="dev-crud-password" name="dev_crud_password">
            </div>
            <button type="submit" id="dev-crud-login-submit" name="login_submit" class="btn btn-primary">Submit</button>
        </form>
        <?php dev_crud_user_login();?>
    </div>
</main>
<?php require "footer.php"; ?>