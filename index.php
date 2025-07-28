<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>ResourceMate</title>
  <link rel="stylesheet" href="assets/style.css" />
  <style>
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #c8fffaff;
      color: #333;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background: linear-gradient(to right, #171a1fff, #c71f1fff);
      color: white;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
    }

    .nav-links a {
      text-decoration: none;
      color: white;
      font-weight: 500;
      padding: 8px 12px;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .nav-links a:hover {
      background: rgba(255, 255, 255, 0.2);
    }

    .intro-section {
      text-align: center;
      padding: 20px 20px 30px;
    }

    .intro-section2 {
      text-align: center;
      padding:50px 20px;
    }

    .intro-section h1 {
      font-size: 36px;
      margin-bottom: 10px;
      color: #2c3e50;
    }

    .intro-section p {
      font-size: 16px;
      color: #555;
      max-width: 700px;
      margin: 0 auto;
      line-height: 1.6;
    }

    .subject-section {
      text-align: center;
      padding: 40px 20px;
    }

    .subject-section h1 {
      font-size: 28px;
      margin-bottom: 30px;
      color: #333;
    }

    .card-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
    }

    .card {
      background: white;
      padding: 20px 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      text-decoration: none;
      color: #333;
      font-weight: bold;
      transition: transform 0.3s ease, background 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      background: #dff6ff;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      color: #777;
      background: #f1f1f1;
      margin-top: 60px;
    }

    @media (max-width: 600px) {
      .card {
        width: 80%;
        text-align: center;
      }
    }
  </style>
</head>
<body>

  <nav class="navbar">
    <div class="logo">ResourceMate</div>
    <div class="nav-links">
      <a href="contactus.php">Contact Us ✉️</a>
    </div>
  </nav>

  <section class="intro-section2">
    <h1>Welcome to ResourceMate 👋</h1>
  </section>
  <!-- Intro Section -->
  <section class="intro-section">
    <p>
      <h4><br>Your one-stop destination for All study materials of 5th Semester  Notes, PDFs, PYQs, Youtube videos Suggestions Links !!</br></h4>
      Stay tuned as we bring Notes for all subjects, improved UI, and ai integrated features to help you thrive in your academics!
    </p>
  </section>

  <!-- Subject Selection -->
  <section class="subject-section">
    <h1>Select Your Subject</h1>
    <div class="card-container">
      <a href="subject.php?sub=CSY" class="card">Cyber Security</a>
      <a href="subject.php?sub=MLG" class="card">Machine Learning</a>
      <a href="subject.php?sub=CRY" class="card">Cryptography</a>
      <a href="subject.php?sub=UNP" class="card">UNIX & Networking</a>
      <a href="subject.php?sub=RMI" class="card">Research Methods & IPR</a>
      <a href="subject.php?sub=BDA" class="card">Big Data Analytics</a>
    </div>
  </section>

  <!-- Footer -->
  <div class="footer">
    Developed & Managed by S Rohith
  </div>

  <script src="assets/bg-animation.js"></script>
</body>
</html>
