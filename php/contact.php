<?php
// Start the session
session_start();

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Email details
    $to = "22jr5a4404@gmail.com"; // Your email address
    $subject = "Contact Form Submission from $name";
    $messageBody = "
        <html>
        <head>
            <title>Contact Form Message</title>
        </head>
        <body>
            <h2>New message from $name</h2>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
    ";

    // Set content type header for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n"; // Sender's email

    // Send the email
    if (mail($to, $subject, $messageBody, $headers)) {
        $response = "Thank you for reaching out! We will get back to you soon.";
    } else {
        $response = "There was an issue sending your message. Please try again later.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="assets/js/validation.js" defer></script>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        </nav>
    </header>

    <div class="container">
        <h2>Get in Touch</h2>

        <?php if (isset($response)): ?>
            <p><?php echo $response; ?></p>
        <?php endif; ?>

        <form method="POST" onsubmit="return validateContactForm()">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>

            <label for="message">Your Message</label>
            <textarea id="message" name="message" required rows="6"></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2024 FreeLearn</p>
    </footer>
</body>
</html>
