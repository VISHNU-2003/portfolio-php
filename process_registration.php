<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = filter_var($_POST['username']);
    $password = filter_var($_POST['password']);

     $db_host = 'localhost';   
    $db_user = 'root';        
    $db_password = '';        
    $db_name = 'project';  

     $conn = new mysqli($db_host, $db_user, $db_password, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

     $insertQuery = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param('ss', $username, $password); // Warning: Password is stored in plain text here
    $stmt->execute();

     $stmt->close();
    $conn->close();

    header('Location: registration_success.php');
    exit;
}
?>
