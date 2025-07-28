<?php
$subjectCode = $_GET['sub'] ?? 'UNKNOWN';
$subjectNames = [
  'CSY' => 'Cyber Security',
  'MLG' => 'Machine Learning',
  'CRY' => 'Cryptography',
  'UNP' => 'UNIX & Network Programming',
  'RMI' => 'Research Methodologies & IPR',
  'BDA' => 'Big Data Analytics',
];

$subjectName = $subjectNames[$subjectCode] ?? 'Unknown Subject';
$resourceDir = "uploads/$subjectCode/";
$files = [];

if (is_dir($resourceDir)) {
    $files = array_diff(scandir($resourceDir), ['.', '..']);
}

// Dummy YouTube links unit-wise
$youtubeLinks = [
    'Unit 1' => 'https://youtube.com/playlist?list=UNIT1_LINK',
    'Unit 2' => 'https://youtube.com/playlist?list=UNIT2_LINK',
    'Unit 3' => 'https://youtube.com/playlist?list=UNIT3_LINK',
    'Unit 4' => 'https://youtube.com/playlist?list=UNIT4_LINK',
    'Unit 5' => 'https://youtube.com/playlist?list=UNIT5_LINK',
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $subjectName ?> | StudyHub</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(130deg, #af0811ff, #fda085);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
    }

    .container {
      width: 100%;
      max-width: 1200px;
      padding: 0 16px;
    }

    .header {
      text-align: center;
      padding: 40px 0 20px;
      color: #fff;
      animation: floatIn 0.7s ease-out forwards;
    }

    .header h1 {
      font-size: 2.8em;
      margin-bottom: 10px;
      background: -webkit-linear-gradient(#fff, #d0fffc);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
    }

    .header p {
      font-size: 1.2em;
      opacity: 0.9;
    }

    .back-link {
      margin: 15px auto;
      display: inline-block;
      padding: 10px 18px;
      background: #fff;
      border-radius: 12px;
      text-decoration: none;
      color: #000;
      font-weight: bold;
      transition: background 0.3s ease;
    }

    .back-link:hover {
      background: #ffe6cc;
    }

    .card-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
      width: 100%;
      padding: 20px 0 40px;
    }

    .card {
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(15px);
      border-radius: 16px;
      padding: 20px;
      color: #fff;
      text-align: center;
      transition: transform 0.3s ease, background 0.3s;
      box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
      word-wrap: break-word;
    }

    .card:hover {
      transform: translateY(-5px);
      background: rgba(255, 255, 255, 0.35);
      color: #000;
    }

    .card-icon {
      font-size: 2.2em;
      margin-bottom: 10px;
    }

    .card-title {
      font-size: 1em;
      margin-bottom: 6px;
      font-weight: bold;
    }

    .card-meta {
      font-size: 0.9em;
      color: #eee;
      margin-bottom: 10px;
    }

    .card a {
      display: inline-block;
      margin-top: 5px;
      padding: 6px 12px;
      background: #fff;
      color: #000;
      border-radius: 8px;
      text-decoration: none;
      font-size: 0.9em;
      font-weight: bold;
    }

    .footer {
      text-align: center;
      padding: 20px;
      font-size: 14px;
      color: #22080898; 
      background: #f1f1f1;
      margin-top: 60px;
    }

    @keyframes floatIn {
      from { opacity: 0; transform: translateY(-30px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    /* Mobile Optimizations */
    @media (max-width: 768px) {
      .header h1 { font-size: 2em; }
      .header p { font-size: 1em; }
      .card-title { font-size: 0.9em; }
      .card-meta { font-size: 0.8em; }
      .card-icon { font-size: 1.8em; }
      .card a { font-size: 0.85em; }
    }

    @media (max-width: 480px) {
      .header h1 { font-size: 1.7em; }
      .card-grid {
        grid-template-columns: 1fr;
        padding: 10px 0;
      }
      .card { padding: 15px; }
    }
  </style>
</head>
<body>

  <div class="container">
  <div class="header">
    <h1><?= $subjectName ?> Resources</h1>
    <p>All your files organized by magic ✨</p>
    <a href="index.php" class="back-link">← Back to Home</a>
  </div>

  <!-- Section 1: Notes & PYQs -->
  <h2 style="color:white; margin-bottom: 1rem;">📚 Notes, PYQs & Syllabus</h2>
  <div class="card-grid">
    <?php if (empty($files)): ?>
      <p style="color:white;">No resources found for this subject.</p>
    <?php else: ?>
      <?php foreach ($files as $file):
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $fileLower = strtolower($file);
        $icon = "📄";
        $tag = "Document";

        if (str_contains($fileLower, 'video') || $ext === 'mp4') continue;
        if (str_contains($fileLower, 'question') || str_contains($fileLower, 'cie')) {
          $icon = "📝"; $tag = "QP / CIE";
        } elseif (str_contains($fileLower, 'textbook')) {
          $icon = "📘"; $tag = "Textbook";
        }

        $size = filesize($resourceDir . $file);
        $sizeMB = round($size / 1024 / 1024, 2) . ' MB';
        $filename = htmlspecialchars($file);
        $url = $resourceDir . $file;
      ?>
        <div class="card">
          <div class="card-icon"><?= $icon ?></div>
          <div class="card-title"><?= $filename ?></div>
          <div class="card-meta"><?= $tag ?> | 🗂️ <?= $sizeMB ?></div>
          <a href="<?= $url ?>" target="_blank">View</a>
        </div>
      <?php endforeach; ?>
    <?php endif; ?>
  </div>

  <!-- Section 2: YouTube Unit Links -->
  <h2 style="color:white; margin-top: 40px; margin-bottom: 1rem;">🎥 YouTube Videos (Unit-wise)</h2>
  <div class="card-grid">
    <?php foreach ($youtubeLinks as $unit => $ytUrl): ?>
      <div class="card">
        <div class="card-icon">🎬</div>
        <div class="card-title"><?= $unit ?></div>
        <div class="card-meta">YouTube Playlist</div>
        <a href="" target="_blank">SOON!!</a>
      </div>
    <?php endforeach; ?>
  </div>
</div>

<div class="footer">
    Developed & Managed by S Rohith
</div>

          <script src="assets/bg-animation.js"></script>
</body>
</html>
