<?php
// Database configuration
$host = 'localhost';       // Database host (usually localhost)
$dbname = 'course_book_store';  // Name of your database
$username = 'root';        // Your MySQL username
$password = '';            // Your MySQL password (leave empty if no password set)

// Create a new PDO connection
try {
    // PDO (PHP Data Objects) is a safer and more flexible way to connect to a database.
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    // Set PDO error mode to exception to catch any errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // If connected successfully, you can optionally echo a success message
    // echo "Connected successfully"; 
} catch (PDOException $e) {
    // If connection fails, it will display the error message
    echo "Connection failed: " . $e->getMessage();
    exit(); // Stop the script execution if the connection fails
}
?>
