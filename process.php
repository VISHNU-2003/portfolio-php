<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $recipient_email = $_POST['recipient_email']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];


    if (!filter_var($recipient_email, FILTER_VALIDATE_EMAIL)) {
        echo 'Invalid recipient email address';
        exit;
    }

    if (empty($name) || empty($email) || empty($message)) {
        echo 'Name, email, and message are required fields';
        exit;
    }

   
    $db = new mysqli('localhost', 'root', '', 'project');
    if ($db->connect_error) {
        die('Database connection failed: ' . $db->connect_error);
    }

    $sql = "INSERT INTO details (name, email, phone, message) VALUES (?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    if ($stmt->execute()) {
        
        $to = $recipient_email;
        $subject = 'New message from your website';
        $message = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
        $headers = 'From: vishnuvardhanalapati62@gmail.com';

        mail($to, $subject, $message, $headers);

        $stmt->close();
        $db->close();

        header('Location: thank_you.html');
    } else {
        echo 'Error: ' . $stmt->error;
    }
} else {
    echo 'Invalid request';
}
?>
