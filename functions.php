<?php
function dev_crud_register_new_user()
{
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register_submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $confirm_password = $_POST["confirm_password"];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);



        //prepare insert query
        global $conn;

        //check if username already exists

        $checkstmt = $conn->prepare("SELECT id from dc_users WHERE username= ?");
        $checkstmt->bind_param("s", $username);
        $checkstmt->execute();
        $checkstmt->store_result();
        if ($checkstmt->num_rows > 0) {
            echo "username already exists!";
        } else {

            $stmt = $conn->prepare("INSERT INTO dc_users(username, password) VALUES(?, ?)");
            $stmt->bind_param("ss", $username, $hashed_password);

            //execute

            if ($password === $confirm_password) {
                if ($stmt->execute()) {
                    echo "user created successfully <br>";
                } else {
                    echo "error creating user!";
                }

            } else {
                echo "password didn't match!";
            }


            $stmt->close();

        }



        $checkstmt->close();
        $conn->close();
    } else {
        echo "error";
    }
}
function dev_crud_user_login() {
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["login_submit"])){
        session_start();
        $username = $_POST["dev_crud_username"];
        $password = $_POST["dev_crud_password"];
        global $conn;
        $check_username= $conn->prepare("SELECT password from dc_users WHERE username=?");
        $check_username->bind_param("s", $username);
        $check_username->execute();
        $check_username->bind_result($hashedPassword);
        if($check_username->fetch() && password_verify($password,$hashedPassword)){
            //  Set session variable
            $_SESSION['loggedin_user'] = $username;
            $_SESSION['loggedin_password'] = $password;
            echo "logged in successfully! ";
            header("Location: user-dashboard.php");
            exit();
        }
        else{
            echo "Error logging in";
        }
        $check_username->close();
        $conn->close();
    }
    else{
        echo "Error!";
    }
}

function is_user_logged_in(){
    if(session_status()==PHP_SESSION_NONE){
        session_start();
    }
    return isset($_SESSION['loggedin_user']);
}

function dev_crud_change_username(){
    if($_SERVER["REQUEST_METHOD"]=="POST" && isset($_POST["dev_crud_username_submit"])){
        $new_username = $_POST["dev_crud_username"];
        global $conn;
        $check_username = $conn->prepare("SELECT id from dc_users WHERE username=?");
        $check_username->bind_param("s", $new_username);
        $check_username->execute();
        $check_username->store_result();
        if($check_username->num_rows > 0){
            echo "username already exists!";
        }
        else{
            $update_username = $conn->prepare("UPDATE dc_users SET username=? WHERE username=?");
            $update_username->bind_param("ss", $new_username, $_SESSION['loggedin_user']);
            if($update_username->execute()){
                $_SESSION['loggedin_user'] = $new_username;
                echo "username updated successfully!";
            }
            
        }
        
    }
}