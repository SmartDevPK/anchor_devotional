<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set("display_errors", 1);

$errorMessage = '';
$successMessage = '';

// Process form only when it's submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection parameters
    $host = "localhost";
    $port = 3307;
    $username = "root";
    $password = "";
    $database = "prayer_db";

    // Create connection
    $conn = new mysqli($host, $username, $password, $database, $port);

    // Check connection
    if ($conn->connect_error) {
        $errorMessage = "Connection failed: " . $conn->connect_error;
    } else {
        // Get form inputs safely
        $topic = $_POST['topic'] ?? '';
        $date = $_POST['date'] ?? '';

        // File upload directory
        $uploadDir = "uploads";

        // Create uploads directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            if (!mkdir($uploadDir, 0755, true)) {
                $errorMessage = "Failed to create upload directory.";
            }
        }

        if (!$errorMessage) {
            // Handle file uploads
            $timestamp = time();
            $imagePath = "$uploadDir/devotion_cover_" . $timestamp . ".jpg";

            if (move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
                $pdfPath = null;

                $stmt = $conn->prepare("INSERT INTO devotion (image_path, topic, date, pdf_path) VALUES (?, ?, ?, ?)");
                $stmt->bind_param("ssss", $imagePath, $topic, $date, $pdfPath);

                if ($stmt->execute()) {
                    $successMessage = "Devotion uploaded successfully!";
                } else {
                    $errorMessage = "Database error: " . $stmt->error;
                }

                $stmt->close();
            } else {
                $errorMessage = "Image upload failed.";
            }
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard - Upload Devotion</title>
    <style>
        .message {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            width: 400px;
        }

        .error {
            background-color: #fdd;
            border: 1px solid #f99;
            color: #900;
        }

        .success {
            background-color: #dfd;
            border: 1px solid #9c9;
            color: #060;
        }
    </style>
</head>

<body>
    <h2>Upload Devotion</h2>

    <?php if ($errorMessage): ?>
        <div class="message error"><?php echo htmlspecialchars($errorMessage); ?></div>
    <?php elseif ($successMessage): ?>
        <div class="message success"><?php echo htmlspecialchars($successMessage); ?></div>
    <?php endif; ?>

    <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
        <label>Devotion Topic:</label><br />
        <input type="text" name="topic" required /><br /><br />

        <label>Date:</label><br />
        <input type="date" name="date" required /><br /><br />

        <label>Devotion Cover Image:</label><br />
        <input type="file" name="image" accept="image/*" required /><br /><br />

        <button type="submit">Upload Devotion</button>
    </form>
</body>

</html>