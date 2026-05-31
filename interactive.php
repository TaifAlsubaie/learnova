<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive - Learnova</title>

<link rel="stylesheet" href="style/style.css">
</head>

<body>

<section class="interactive-section">

  <div class="interactive-card">

    <div class="interactive-content">

      <h1 id="welcomeText">Welcome to Learnova Interactive Page</h1>

      <p id="dateTime"></p>

      <div class="interactive-buttons">
        <button class="btn" onclick="changeText()">
          Change Welcome Message
        </button>

        <button class="btn" onclick="toggleTheme()">
          Toggle Dark Mode
        </button>
      </div>

      <button class="btn" onclick="changeImage()">
        Change Image
      </button>

      <div
        id="colorBox"
        class="interactive-box"
        onmouseover="changeColor()"
      >
        Hover Over Me
      </div>

    </div>

    <div class="interactive-image">
      <img
        id="courseImage"
        src="images/DevOps.jpg"
        alt="Course"
      >
    </div>

  </div>

</section>

<script src="script.js"></script>

</body>
</html>