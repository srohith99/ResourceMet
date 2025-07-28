<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("Your server name", "username", "password", "databasename"); //fill the fields
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $message = $conn->real_escape_string($_POST["message"]);

    $sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";
    $success = $conn->query($sql);
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us | ResourceMate</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Segoe UI', sans-serif;
    }

    body {
      background: linear-gradient(to right, #e0eafc, #cfdef3);
      min-height: 100vh;
      color: #333;
      display: flex;
      flex-direction: column;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background: linear-gradient(to right, #171a1fff, #c71f1fff);
      color: white;
    }

    .nav-links a {
      margin-left: 1rem;
      text-decoration: none;
      color: #e9f4ffff;
      font-weight: 600;
      transition: color 0.3s ease;
    }

    .nav-links a:hover {
      color: #007bff;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: bold;
    }

    .contact-section {
      padding: 2rem;
      max-width: 600px;
      margin: 0 auto;
      text-align: center;
    }

    .contact-section h1 {
      font-size: 2.2rem;
      margin-bottom: 1rem;
      color: #222;
    }

    .contact-section p {
      font-size: 1rem;
      margin-bottom: 2rem;
      color: #555;
    }

    form {
      background: #fff;
      padding: 2rem;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    input, textarea {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
    }

    button {
      padding: 12px 25px;
      border: none;
      background: #007bff;
      color: #fff;
      font-weight: bold;
      font-size: 1rem;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background: #0056b3;
    }

    .success-msg {
      background: #d4edda;
      color: #155724;
      padding: 12px;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #c3e6cb;
    }

    @media (max-width: 600px) {
      .contact-section h1 { font-size: 1.8rem; }
    }
  </style>
</head>
<body>

  <div class="navbar">
    <div class="logo">ResourceMate</div>
    <div class="nav-links">
      <a href="index.php">Return to Home</a>
    </div>
  </div>

  <div class="contact-section">
    <h1>Contact Us</h1>
    <p>Have questions or feedback? We'd love to hear from you.</p>

    <?php if (!empty($success)): ?>
      <div class="success-msg">Thank you! Your message has been sent.</div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" rows="5" placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>
<script src="assets/bg-animation.js"></script>
</body>
</html>

