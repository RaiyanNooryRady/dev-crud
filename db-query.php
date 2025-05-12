<?php
//sql to create users table
$create_users_table = "CREATE TABLE IF NOT EXISTS dc_users (
id INT AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL UNIQUE,
password VARCHAR(255) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if ($conn->query($create_users_table)) {
    //echo "users table created successfully <br>";
    echo " ";
} else {
    echo "error!";
}
//sql to create posts table
$create_posts_table = "CREATE TABLE IF NOT EXISTS dc_posts(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    featured_image VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    author VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
if ($conn->query($create_posts_table)) {
    echo "posts table created successfully <br>";
} else {
    echo "error!";
}

