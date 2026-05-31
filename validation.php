<?php include "navbar.php"; ?>
<script src="script.js"></script>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Validation - Learnova</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
</head>
<body>

<main class="container auth-page">

  <div class="auth-card">

    <h1 class="auth-title">Form Validation</h1>

    <p class="auth-subtitle">
      Enter your information to test JavaScript validation.
    </p>

    <form
      name="myForm"
      class="auth-form"
      onsubmit="return validateForm()"
    >

      <div class="field">
        <label>Full Name</label>
        <input type="text" id="name">
      </div>

      <div class="field">
        <label>Email</label>
        <input type="email" id="email">
      </div>

      <div class="field">
        <label>Password</label>
        <input type="password" id="password">
      </div>

      <button type="submit" class="btn auth-btn">
        Submit
      </button>

    </form>

  </div>

</main>

<footer class="footer">
  <div class="container">
    <p>© 2026 Learnova. All rights reserved.</p>
  </div>
</footer>

<script src="script.js"></script>
<script src="script.js"></script>
</body>
</html>