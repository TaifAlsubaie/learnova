<?php
session_start();
include "db.php";

/* ===== CHECK ADMIN ===== */
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

/* ===== LOGOUT ===== */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

/* ===== DELETE ===== */
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM students WHERE id=$id");
    header("Location: view.php");
    exit();
}

/* ===== EDIT LOAD ===== */
$editData = null;

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $res = $conn->query("SELECT * FROM students WHERE id=$id");
    $editData = $res->fetch_assoc();
}

/* ===== UPDATE ===== */
if (isset($_POST['update'])) {
    $id = $_POST['id'];

    $conn->query("UPDATE students SET 
        name='{$_POST['name']}',
        email='{$_POST['email']}',
        gender='{$_POST['gender']}',
        courses='{$_POST['courses']}',
        level='{$_POST['level']}',
        comments='{$_POST['comments']}'
        WHERE id=$id
    ");

    header("Location: view.php");
    exit();
}

/* ===== DATA ===== */
$result = $conn->query("SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style/style.css">
</head>

<body>
<?php include "navbar.php"; ?>

<!-- TITLE -->
<section class="hero">
  <div class="container">
    <h1 id="main-title">Admin Dashboard</h1>
    <p>Manage students, edit and delete records easily.</p>
  </div>
</section>

<div class="container">
<div style="display:flex; justify-content:flex-end; margin-bottom:20px;">
    <a href="view.php?logout=1" class="btn" style="background:#e74c3c;">
        Logout
    </a>
</div>
<!-- TABLE -->
<section>
  <div class="card">

    <h2>Students Table</h2>

    <table class="statistics-table">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Gender</th>
        <th>Courses</th>
        <th>Level</th>
        <th>Comments</th>
        <th>Actions</th>
      </tr>

      <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['courses'] ?></td>
        <td><?= $row['level'] ?></td>
        <td><?= $row['comments'] ?></td>

        <td>
          <a href="?edit=<?= $row['id'] ?>" class="btn">Edit</a>
          <a href="?delete=<?= $row['id'] ?>" class="btn" style="background:#e74c3c;"
             onclick="return confirm('Delete this student?')">Delete</a>
        </td>
      </tr>
      <?php } ?>

    </table>

  </div>
</section>

<!-- FORM -->
<section class="auth-page">

  <div class="auth-card">

    <h2 class="auth-title">
      <?= $editData ? "Edit Student" : "Select Student" ?>
    </h2>

    <p class="auth-subtitle">
      <?= $editData ? "Update student information" : "Click edit to load data" ?>
    </p>

    <form method="POST" class="auth-form">

      <input type="hidden" name="id" value="<?= $editData['id'] ?? '' ?>">

      <div class="field">
        <label>Name</label>
        <input type="text" name="name" value="<?= $editData['name'] ?? '' ?>" required>
      </div>

      <div class="field">
        <label>Email</label>
        <input type="email" name="email" value="<?= $editData['email'] ?? '' ?>" required>
      </div>

      <div class="field">
        <label>Gender</label>
        <input type="text" name="gender" value="<?= $editData['gender'] ?? '' ?>" required>
      </div>

      <div class="field">
        <label>Courses</label>
        <input type="text" name="courses" value="<?= $editData['courses'] ?? '' ?>" required>
      </div>

      <div class="field">
        <label>Level</label>
        <input type="text" name="level" value="<?= $editData['level'] ?? '' ?>" required>
      </div>

      <div class="field">
        <label>Comments</label>
        <textarea name="comments"><?= $editData['comments'] ?? '' ?></textarea>
      </div>

      <?php if ($editData): ?>
        <button type="submit" name="update" class="btn auth-btn">Update</button>
      <?php endif; ?>

    </form>

  </div>

</section>

</div>

<!-- FOOTER -->
<footer class="footer">
  <div class="container">
    <p>© 2026 Learnova Admin Panel</p>
  </div>
</footer>

</body>
</html>