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

// Get course ID from the URL
$course_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch the course details based on the course ID
$sql = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $course_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $course = $result->fetch_assoc();
} else {
    die("Course not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($course['title']); ?> - Course Details</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>Course Details</h1>
        <nav>
            <a href="index.php">Home</a>
        </nav>
    </header>

    <div class="course-detail">
        <h2><?php echo htmlspecialchars($course['title']); ?></h2>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($course['description']); ?></p>
        <p><strong>Price:</strong> $<?php echo number_format($course['price'], 2); ?></p>
        <?php if (!empty($course['image_url'])): ?>
            <img src="<?php echo htmlspecialchars($course['image_url']); ?>" alt="<?php echo htmlspecialchars($course['title']); ?>" />
        <?php endif; ?>
    </div>
</body>
</html>
