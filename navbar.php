<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>
<header class="navbar">
  <div class="container">

    <div class="logo">Learnova</div>

    <nav class="nav-links">

      <a href="index.php">Home</a>
      <a href="courses.php">Courses</a>
      <a href="about.php">About</a>
      <a href="services.php">Services</a>
      <a href="contact.php">Contact</a>

      <?php if (isset($_SESSION['user'])) { ?>

          <!-- 👇 المستخدم مسجل دخول -->

          <a href="my-learning.php">My Learning</a>

          <!-- 👤 Profile Icon -->
          <a href="profile.php" class="icon-link" title="Profile">
              <svg class="icon" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                  <circle cx="12" cy="7" r="4"/>
              </svg>
          </a>

      <?php } elseif (isset($_SESSION['admin'])) { ?>

          <!-- 👇 الأدمن -->
          <a href="view.php">Dashboard</a>

         

      <?php } else { ?>

          <!-- 👇 الزائر -->

          <!-- 🔐 Login Icon -->
          <a href="login.php" class="icon-link" title="Login">
              <svg class="icon" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                  <circle cx="12" cy="7" r="4"/>
              </svg>
          </a>

      <?php } ?>

    </nav>

  </div>
</header>