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

// Initialize variables
$id = $_GET['id'] ?? null;
$topic = $date = $image_path = $pdf_path = "";
$error = "";
$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize POST data
    $id = $_POST['id'] ?? null;
    $topic = trim($_POST['topic'] ?? "");
    $date = trim($_POST['date'] ?? "");
    $image_path = trim($_POST['image_path'] ?? "");
    $pdf_path = trim($_POST['pdf_path'] ?? "");

    if (!$id) {
        $error = "Invalid ID.";
    } elseif (empty($topic) || empty($date)) {
        $error = "Topic and Date are required.";
    } else {
        // Prepare UPDATE statement
        $stmt = $conn->prepare("UPDATE devotion SET topic = ?, date = ?, image_path = ?, pdf_path = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $topic, $date, $image_path, $pdf_path, $id);

        if ($stmt->execute()) {
            $success = "Devotion updated successfully.";
            // Optional: Redirect after update to avoid form resubmission
            header("Location: devotion.php"); // or wherever you want to redirect
            exit;
        } else {
            $error = "Failed to update devotion: " . $conn->error;
        }
        $stmt->close();
    }
}

// If not POST, fetch existing devotion data for the form
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    if (!$id) {
        die("Invalid ID.");
    }

    $stmt = $conn->prepare("SELECT * FROM devotion WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Devotion not found.");
    }

    $row = $result->fetch_assoc();

    $topic = $row['topic'];
    $date = $row['date'];
    $image_path = $row['image_path'];
    $pdf_path = $row['pdf_path'];

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Update Devotion</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9f9f9;
            padding: 40px;
            margin: 0;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            margin-top: 25px;
            padding: 12px 20px;
            background-color: #007BFF;
            border: none;
            border-radius: 6px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            margin: 15px 0;
            padding: 12px;
            border-radius: 5px;
        }

        .error {
            background-color: #f8d7da;
            color: #842029;
        }

        .success {
            background-color: #d1e7dd;
            color: #0f5132;
        }

        a.back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007BFF;
            font-weight: 600;
        }

        a.back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Devotion</h1>

        <?php if ($error): ?>
            <div class="message error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="message success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form method="POST" action="update_devotion.php">
            <input type="hidden" name="id" value="<?= htmlspecialchars($id) ?>" />

            <label for="topic">Topic</label>
            <input type="text" id="topic" name="topic" value="<?= htmlspecialchars($topic) ?>" required />

            <label for="date">Date</label>
            <input type="date" id="date" name="date" value="<?= htmlspecialchars($date) ?>" required />

            <label for="image_path">Image Path (URL or file path)</label>
            <input type="text" id="image_path" name="image_path" value="<?= htmlspecialchars($image_path) ?>" />

            <label for="pdf_path">PDF Path (URL or file path)</label>
            <input type="text" id="pdf_path" name="pdf_path" value="<?= htmlspecialchars($pdf_path) ?>" />

            <button type="submit">Update Devotion</button>
        </form>

        <a class="back-link" href="index.php">← Back to Devotions</a>
    </div>
</body>

</html>