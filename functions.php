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