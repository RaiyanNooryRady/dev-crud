<?php require "header.php"; 
if(is_user_logged_in()){
    echo "logged in users";
    ?>
    <a href="logout.php">Logout</a>
    <?php
}
else{
    header("Location: login.php");
    exit;
}
?>
<?php require "footer.php"; ?>