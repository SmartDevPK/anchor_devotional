<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

// DB connection parameters
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Connect to DB
$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch devotions ordered by date descending
$sql = "SELECT * FROM devotion ORDER BY date DESC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Daily Devotions</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9f9f9;
            padding: 40px;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 40px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .devotion-card {
            background: #fff;
            border-radius: 8px;
            margin-bottom: 25px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            transition: transform 0.2s ease;
        }

        .devotion-card:hover {
            transform: scale(1.01);
        }

        .devotion-image {
            width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
            display: block;
        }

        .devotion-card h3 {
            color: #007BFF;
            margin-bottom: 10px;
        }

        .devotion-date {
            font-size: 14px;
            color: #888;
            margin-bottom: 15px;
        }

        .pdf-link {
            display: inline-block;
            margin-top: 10px;
            color: #28a745;
            text-decoration: none;
            font-weight: bold;
        }

        .pdf-link:hover {
            text-decoration: underline;
        }

        .no-data {
            text-align: center;
            color: #888;
            font-size: 18px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Daily Devotions</h1>

        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <div class="devotion-card">
                    <?php if (!empty($row['image_path'])): ?>
                        <img class="devotion-image" src="<?= htmlspecialchars($row['image_path']) ?>" alt="Devotion Image" />
                    <?php endif; ?>

                    <h3><?= htmlspecialchars($row['topic']) ?></h3>

                    <?php if (!empty($row['date'])): ?>
                        <div class="devotion-date"><?= htmlspecialchars(date("F j, Y", strtotime($row['date']))) ?></div>
                    <?php endif; ?>

                    <?php if (!empty($row['pdf_path'])): ?>
                        <a class="pdf-link" href="<?= htmlspecialchars($row['pdf_path']) ?>" target="_blank">
                            Download PDF &raquo;
                        </a>
                    <?php endif; ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p class="no-data">No devotions found.</p>
        <?php endif; ?>

        <?php $conn->close(); ?>
    </div>
</body>

</html>