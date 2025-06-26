<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

// DB connection
$host = "localhost";
$port = 3307;
$username = "root";
$password = "";
$database = "prayer_db";

$conn = new mysqli($host, $username, $password, $database, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$id = $_GET['id'] ?? null;
$title = $devotion_date = $image = $read_more_link = $excerpt = "";
$error = "";
$success = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? null;
    $title = trim($_POST['title'] ?? "");
    $devotion_date = trim($_POST['devotion_date'] ?? "");
    $image = trim($_POST['image'] ?? "");
    $read_more_link = trim($_POST['read_more_link'] ?? "");
    $excerpt = trim($_POST['excerpt'] ?? "");

    if (!$id) {
        $error = "Invalid ID.";
    } elseif (empty($title) || empty($devotion_date)) {
        $error = "Title and Date are required.";
    } else {
        $stmt = $conn->prepare("UPDATE devotions SET title = ?, devotion_date = ?, image = ?, read_more_link = ?, excerpt = ? WHERE id = ?");
        $stmt->bind_param("sssssi", $title, $devotion_date, $image, $read_more_link, $excerpt, $id);

        if ($stmt->execute()) {
            $success = "Devotion updated successfully.";
            header("Location:devotions.php"); // redirect to listing page
            exit;
        } else {
            $error = "Failed to update devotion: " . $conn->error;
        }
        $stmt->close();
    }
}

// If not POST, fetch existing data
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    if (!$id) {
        die("Invalid ID.");
    }

    $stmt = $conn->prepare("SELECT * FROM devotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        die("Devotion not found.");
    }

    $row = $result->fetch_assoc();
    $title = $row['title'];
    $devotion_date = $row['devotion_date'];
    $image = $row['image'];
    $read_more_link = $row['read_more_link'];
    $excerpt = $row['excerpt'];

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
            max-width: 700px;
            margin: auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 120px;
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

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007BFF;
            font-weight: 600;
            text-decoration: none;
        }

        .back-link:hover {
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

            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($title) ?>" required />

            <label for="devotion_date">Date</label>
            <input type="date" id="devotion_date" name="devotion_date" value="<?= htmlspecialchars($devotion_date) ?>"
                required />

            <label for="image">Image URL</label>
            <input type="text" id="image" name="image" value="<?= htmlspecialchars($image) ?>" />

            <label for="read_more_link">Read More Link (PDF or page)</label>
            <input type="text" id="read_more_link" name="read_more_link"
                value="<?= htmlspecialchars($read_more_link) ?>" />

            <label for="excerpt">Excerpt</label>
            <textarea id="excerpt" name="excerpt"><?= htmlspecialchars($excerpt) ?></textarea>

            <button type="submit">Update Devotion</button>
        </form>

        <a class="back-link" href="devotions.php">← Back to Devotions</a>
    </div>
</body>

</html>