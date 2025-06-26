<?php
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validEmail = "emmanuelmichaelpk3@gmail.com";
    $validPassword = "Pk123456789@";

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($email === $validEmail && $password === $validPassword) {
        $_SESSION['user_email'] = $email;
        header("Location: dashboardForm.php");
        exit();
    }

    $errorMessage = "Invalid email or password.";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f7f8;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .login-container {
            background: white;
            padding: 30px 40px;
            border-radius: 8px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            width: 320px;
        }

        h2 {
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #555;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px 14px;
            margin-bottom: 20px;
            border: 1.5px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
            box-sizing: border-box;
            transition: border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.25);
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007BFF;
            color: white;
            font-weight: 600;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        .error-message {
            background-color: #fdd;
            border: 1px solid #f99;
            color: #900;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 6px;
            text-align: center;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <h2>Login</h2>

        <?php if ($errorMessage): ?>
            <div class="error-message"><?php echo htmlspecialchars($errorMessage); ?></div>
        <?php endif; ?>

        <form action="" method="POST" novalidate>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="you@example.com" required />

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Your password" required />

            <button type="submit">Log In</button>
        </form>
    </div>

</body>

</html>