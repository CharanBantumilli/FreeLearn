<?php
// Start the session to use session variables
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

// Fetch courses with prepared statements
$sql_courses = "SELECT * FROM courses";
$courses_result = $conn->query($sql_courses);
if (!$courses_result) {
    die("Query failed: " . $conn->error);
}

// Fetch books with prepared statements
$sql_books = "SELECT * FROM books";
$books_result = $conn->query($sql_books);
if (!$books_result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FreeLearn</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <h1>FreeLearn</h1>
        <nav>
            <a href="index.php">Home</a>
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
                <a href="contact.php">Contact</a>
                <a href="about.php">About</a>
            <?php else: ?>
                <a href="logout.php">Logout</a>
            <?php endif; ?>
        </nav>
    </header>

    <div class="content">
        <!-- Display Courses -->
        <div class="section">
            <h2>Courses</h2>
            <ul>
                <?php while ($course = $courses_result->fetch_assoc()): ?>
                    <li>
                        <h3><a href="course_detail.php?id=<?php echo $course['id']; ?>"><?php echo htmlspecialchars($course['title']); ?></a></h3>
                        <p><?php echo htmlspecialchars($course['description']); ?></p>
                        <p>Price: $<?php echo number_format($course['price'], 2); ?></p>
                        <?php if (!empty($course['image_url'])): ?>
                            <img src="<?php echo htmlspecialchars($course['image_url']); ?>" alt="<?php echo htmlspecialchars($course['title']); ?>" />
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>

        <!-- Display Books -->
        <div class="section">
            <h2>Books</h2>
            <ul>
                <?php while ($book = $books_result->fetch_assoc()): ?>
                    <li>
                        <h3><a href="book_detail.php?id=<?php echo $book['id']; ?>"><?php echo htmlspecialchars($book['title']); ?></a></h3>
                        <p>Author: <?php echo htmlspecialchars($book['author']); ?></p>
                        <p>Price: $<?php echo number_format($book['price'], 2); ?></p>
                        <?php if (!empty($book['image_url'])): ?>
                            <img src="<?php echo htmlspecialchars($book['image_url']); ?>" alt="<?php echo htmlspecialchars($book['title']); ?>" />
                        <?php endif; ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
</body>
</html>
