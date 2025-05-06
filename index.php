<?php require "header.php"; ?>
<main class="dev-crud-main">
    <div class="container">
        <div class="row mt-5">
            <?php for ($i = 0; $i < 12; $i++) { ?>
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card m-2">
                        <img src="demo.jpg" class="card-img-top" alt="image">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-success">Go somewhere</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</main>
<?php require "footer.php"; ?>