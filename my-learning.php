<?php
session_start();
include "db.php";

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user'];
$user = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

/* تحويل الكورسات إلى array */
$courses = explode(",", $user['courses']);
?>

<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>My Learning</title>
<link rel="stylesheet" href="style/style.css">
</head>

<body>

<section class="hero">
  <div class="container">
    <h1>My Learning</h1>
    <p>Courses you are currently enrolled in</p>
  </div>
</section>

<div class="container">

<div class="cards">

<?php foreach ($courses as $c) { ?>

    <?php if (!empty($c)) { ?>
        <div class="card">
            <h3><?= htmlspecialchars($c) ?></h3>
            <p>Continue learning <?= htmlspecialchars($c) ?></p>
        </div>
    <?php } ?>

<?php } ?>

</div>

</div>
<script src="script.js"></script>
</body>
</html>