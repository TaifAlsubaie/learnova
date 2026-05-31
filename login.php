<?php
session_start();
include "db.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // 🔐 Admin
    if ($email == "admin@site.com" && $password == "123") {

        $_SESSION['admin'] = true;
        header("Location: view.php");
        exit();
    }

    // 🔍 تحقق إذا المستخدم موجود
    $checkUser = $conn->query("SELECT * FROM students WHERE email='$email'");

    if ($checkUser->num_rows == 0) {

        // ❌ ما عنده حساب
        $error = "You don't have an account. Please register first.";

    } else {

        // 🔐 تحقق من كلمة المرور
        $login = $conn->query("SELECT * FROM students WHERE email='$email' AND password='$password'");

        if ($login->num_rows > 0) {

            $user = $login->fetch_assoc();
            $_SESSION['user'] = $user['id'];

            header("Location: index.php");
            exit();

        } else {

            $error = "Wrong password. Please try again.";
        }
    }
}
?>
<?php include "navbar.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login - Learnova</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style/style.css">
</head>

<body>



<!-- LOGIN -->
<main class="container auth-page">

<div class="auth-card">

    <h1 class="auth-title">Welcome Back</h1>
    <p class="auth-subtitle">Sign in to continue your learning journey.</p>

    <?php if ($error != "") { ?>
    <p style="color:red; text-align:center; margin-bottom:12px; font-weight:600;">
        <?= $error ?>
    </p>
<?php } ?>

    <form class="auth-form" method="post">

        <div class="field">
            <label>Email</label>
            <input name="email" type="email" placeholder="you@example.com" required>
        </div>

        <div class="field">
            <label>Password</label>
            <input name="password" type="password" placeholder="••••••••" required>
        </div>

        <button type="submit" class="btn auth-btn">Sign In</button>

        <p class="auth-hint">
            Don’t have an account?
            <a href="register.php" class="auth-link">Register</a>
        </p>

    </form>

</div>

</main>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <p>© 2026 Learnova. All rights reserved.</p>
    </div>
</footer>
<script src="script.js"></script>
</body>
</html>