<?php
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
    die('Connection failed : '.$conn->connect_error);
} else {
    // Prepare the SQL statement
    $stmt = $conn->prepare('INSERT INTO registration (username, email, password) VALUES (?, ?, ?)');
    
    // Bind parameters
    $stmt->bind_param('sss', $username, $email, $password);
    
    // Execute the query
    $stmt->execute();

    echo "Registration successful";
    
    // Close statement
    $stmt->close();
    
    // Close connection
    $conn->close();
}
?>
