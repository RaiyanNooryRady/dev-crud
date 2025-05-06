<?php require "header.php"; ?>
<main class="dev-crud-main">
    <div class="container my-5">

        <h2 class="text-center my-5">Login</h2>
        
        <form action="" class="w-50 mx-auto text-center">
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="username" class="form-label me-2">Username</label>
                <input type="username" class="form-control" id="dev-crud-username" name="username" >
            </div>
            <div class="mb-3 d-flex flex-row justify-content-center align-items-center">
                <label for="password" class="form-label me-2">Password</label>
                <input type="password" class="form-control" id="dev-crud-password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</main>
<?php require "footer.php"; ?>