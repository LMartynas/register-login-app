<?php

    /* Attempt MySQL server connection. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    $link = mysqli_connect("localhost", "root", "");

    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myDB";

    // Create connection
    try {
        $conn = new mysqli($servername, $username, $password);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create database
        $sql = "CREATE DATABASE myDB";

        if ($conn->query($sql) === TRUE) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . $conn->error;
        }

        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Create table
        $sql = "CREATE TABLE users(
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            salt VARCHAR(8) NOT NULL
        )";

        // Check if users table created
        if ($conn->query($sql) === TRUE) {
            echo "Table 'Users' created successfully";
        } else {
            echo "Error creating table: " . $conn->error;
        }


//        $length = 10;
//        echo substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);

    } catch (Exception $exception) {
        echo $exception;
    }

    // Get user's inputs
    $username = $_POST['username'];
    $password = $_POST['password'];



    $conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
</head>
<body bgcolor = "#FFFFFF">
    <div align = "center">
        <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
            <div style = "margin:30px">
                <form action = "" method = "post">
                    <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                    <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                    <input type = "submit" value = " Submit "/><br />
                </form>
<!--                <div style = "font-size:11px; color:#cc0000; margin-top:10px">--><?php //echo $error; ?><!--</div>-->
            </div>
        </div>
    </div>
</body>
</html>