<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

// Create connection
$conn = new mysqli($host, $username, $password, $database, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM prayer_requests";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Prayer Requests</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f0f4f8;
            padding: 40px;
            margin: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .prayer-request {
            background: #ffffff;
            border: 1px solid #ddd;
            padding: 20px 25px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            transition: box-shadow 0.3s ease;
        }

        .prayer-request:hover {
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
        }

        .prayer-request h3 {
            color: #007BFF;
            margin-bottom: 10px;
        }

        .prayer-request p {
            color: #444;
            line-height: 1.6;
        }

        .no-data {
            text-align: center;
            color: #999;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Prayer Requests</h1>

        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='prayer-request'>";
                echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
                echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
                echo "<p><strong>Prayer Request:</strong> " . nl2br(htmlspecialchars($row['prayer'])) . "</p>";
                $shared = isset($row['sharePublicly']) && $row['sharePublicly'] ? 'Yes' : 'No';
                echo "<p><strong>Shared Publicly:</strong> $shared</p>";
                echo "</div>";
            }
        } else {
            echo "<p class='no-data'>No prayer requests found.</p>";
        }

        $conn->close();
        ?>
    </div>

</body>

</html>