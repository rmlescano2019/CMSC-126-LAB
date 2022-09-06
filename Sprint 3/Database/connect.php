<?php
    $fullName = $_POST['fullName'];
    $comments = $_POST['comments'];

    //Database connection
    $conn = new mysqli('localhost', 'root', '', 'portfolio');
    if($conn->connect_error) {
        die('Connection Failed : '.$conn->connect_error);
    }
    else {
        $stmt = $conn->prepare("insert into registration(fullName, comments) values(?, ?)");
        $stmt->bind_param("ss", $fullName, $comments);
        $stmt->execute();
        $stmt->close();
        $conn->close();

        header("Location: index.html");
    }
?>