<?php
include "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $gender = $_POST['gender'] ?? '';
    $level = $_POST['level'] ?? '';
    $comments = $_POST['comments'];

    // 🔥 courses (checkbox correct handling)
    $courses = "";
    if (isset($_POST['courses'])) {
        $courses = implode(",", $_POST['courses']);
    }

    // ❗ check if email exists
    $check = $conn->query("SELECT * FROM students WHERE email='$email'");

    if ($check->num_rows > 0) {
        $message = "Email already exists!";
    } else {

        $sql = "INSERT INTO students 
        (name, email, password, gender, courses, level, comments)
        VALUES 
        ('$name', '$email', '$password', '$gender', '$courses', '$level', '$comments')";

        if ($conn->query($sql)) {
            header("Location: login.php?msg=registered");
            exit();
        } else {
            $message = "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register - Learnova</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style/style.css">
</head>

<body>

<?php include "navbar.php"; ?>

<!-- REGISTER -->
<main class="container auth-page">

<div class="auth-card">

    <h1 class="auth-title">Create Account</h1>
    <p class="auth-subtitle">Join Learnova and start learning today.</p>

    <!-- MESSAGE -->
    <?php if ($message != "") { ?>
        <p style="color:red; text-align:center;">
            <?= $message ?>
        </p>
    <?php } ?>

    <form class="auth-form" method="post">

        <div class="field">
            <label>Full Name</label>
            <input type="text" name="name" required>
        </div>

        <div class="field">
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div class="field">
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <!-- Gender -->
        <div class="field">
            <label>Gender</label>
            <div class="option-group">
                <label class="option-item">
                    <input type="radio" name="gender" value="male" required> Male
                </label>
                <label class="option-item">
                    <input type="radio" name="gender" value="female"> Female
                </label>
            </div>
        </div>

        <!-- Courses (FIXED) -->
        <div class="field">
            <label>Courses</label>
            <div class="option-group">
                <label class="option-item">
                    <input type="checkbox" name="courses[]" value="web"> Web Development
                </label>
                <label class="option-item">
                    <input type="checkbox" name="courses[]" value="devops"> DevOps
                </label>
                <label class="option-item">
                    <input type="checkbox" name="courses[]" value="security"> Cybersecurity
                </label>
                <label class="option-item">
                    <input type="checkbox" name="courses[]" value="cloud"> Cloud Computing
                </label>
            </div>
        </div>

        <!-- Level -->
        <div class="field">
            <label>Level</label>
            <select name="level" required>
                <option value="">Select level</option>
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Advanced</option>
            </select>
        </div>

        <!-- Comments -->
        <div class="field">
            <label>Comments</label>
            <textarea name="comments" rows="4"></textarea>
        </div>

        <button type="submit" class="btn auth-btn">Register</button>

        <p class="auth-hint">
            Already have an account?
            <a href="login.php" class="auth-link">Sign In</a>
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

</body>
</html>