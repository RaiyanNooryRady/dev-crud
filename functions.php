<?php
function dev_crud_register_new_user(){
    if($_SERVER["REQUEST_METHOD"]== "POST" && isset($_POST["register_submit"])){
        $username= $_POST["username"];
        $password= $_POST["password"];
        $hashed_password= password_hash($password, PASSWORD_DEFAULT);

        //prepare insert query
        global $conn;
        $stmt= $conn->prepare("INSERT INTO dc_users(username, password) VALUES(?, ?)");
        $stmt->bind_param("ss", $username, $hashed_password);
        //execute
        if($stmt->execute()){
            echo"user created successfully <br>";
        }

        else{
            echo "Error: " . $stmt->error;
            print_r("error!!!");
        }
        
        
        $stmt->close();
        $conn->close();
    }
    else{
        echo "error";
    }
}