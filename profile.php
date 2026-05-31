<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
/* ===== LOGOUT ===== */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
$id = $_SESSION['user'];

/* ===== UPDATE PROFILE (بدون كورسات) ===== */
if (isset($_POST['update'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $level = $_POST['level'];

    $conn->query("
        UPDATE students SET 
        name='$name',
        email='$email',
        level='$level'
        WHERE id=$id
    ");

    header("Location: profile.php");
    exit();
}

/* ===== USER DATA ===== */
$user = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

/* ===== COURSES ===== */
$courses = explode(",", $user['courses']);
?>

<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
<title>My Profile</title>
<link rel="stylesheet" href="style/style.css">
</head>

<body>

<section class="hero">
  <div class="container">
    <h1 id="main-title">My Profile</h1>
    <p>View and update your personal information</p>
  </div>
</section>

<div class="container auth-page">

<div class="auth-card">

<!-- ===== FORM ===== -->
<form method="POST" class="auth-form">

    <div class="field">
        <label>Name</label>
        <input type="text" name="name" value="<?= $user['name'] ?>" required>
    </div>

    <div class="field">
        <label>Email</label>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
    </div>

    <div class="field">
        <label>Level</label>
        <select name="level">
            <option <?= $user['level']=="Beginner"?"selected":"" ?>>Beginner</option>
            <option <?= $user['level']=="Intermediate"?"selected":"" ?>>Intermediate</option>
            <option <?= $user['level']=="Advanced"?"selected":"" ?>>Advanced</option>
        </select>
    </div>

    <button type="submit" name="update" class="btn auth-btn">
        Save Changes
    </button>

</form>

<hr style="margin:20px 0;">

<!-- ===== COURSES DISPLAY ===== -->
<h3>My Courses</h3>

<div class="cards">

<?php foreach ($courses as $c) { ?>
    <?php if (!empty(trim($c))) { ?>
        <div class="card">
            <h3><?= htmlspecialchars($c) ?></h3>
            <p>Enrolled course</p>
        </div>
    <?php } ?>
<?php } ?>

</div>

<!-- ===== LOGOUT ===== -->
<a href="profile.php?logout=1" class="btn" style="background:#e74c3c; margin-top:20px;">
    Logout
</a>

</div>

</div>
<script src="script.js"></script>
</body>
</html>