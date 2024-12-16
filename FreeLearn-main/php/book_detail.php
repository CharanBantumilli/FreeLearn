<?php
// Start the session
session_start();

// DB Connection
$host = 'localhost';
$dbname = 'course_book_store';
$username = 'root';
$password = '';

// Establishing the connection to the database
$conn = new mysqli($host, $username, $password, $dbname);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get book ID from the URL
$book_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the book details based on the book ID
$sql = "SELECT * FROM books WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $book_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $book = $result->fetch_assoc();
} else {
    die("Book not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($book['title']); ?> - Book Details</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Book Details</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>

    <div class="book-detail">
        <h2><?php echo htmlspecialchars($book['title']); ?></h2>
        <p><strong>Author:</strong> <?php echo htmlspecialchars($book['author']); ?></p>
        <p><strong>Price:</strong> $<?php echo number_format($book['price'], 2); ?></p>
        <?php if (!empty($book['image_url'])): ?>
            <img src="<?php echo htmlspecialchars($book['image_url']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" />
        <?php endif; ?>
    </div>
</body>
</html>
