<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}?>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$currentPage = basename($_SERVER['PHP_SELF']);
?>
<header class="navbar">
  <div class="container">

    <div class="logo">Learnova</div>

    <nav class="nav-links">

      <a href="index.php" class="<?= ($currentPage == 'index.php') ? 'active' : '' ?>">Home</a>

<a href="courses.php" class="<?= ($currentPage == 'courses.php') ? 'active' : '' ?>">Courses</a>

<a href="about.php" class="<?= ($currentPage == 'about.php') ? 'active' : '' ?>">About</a>

<a href="services.php" class="<?= ($currentPage == 'services.php') ? 'active' : '' ?>">Services</a>

<a href="contact.php" class="<?= ($currentPage == 'contact.php') ? 'active' : '' ?>">Contact</a>

<a href="interactive.php" class="<?= ($currentPage == 'interactive.php') ? 'active' : '' ?>">Interactive</a>

<a href="validation.php" class="<?= ($currentPage == 'validation.php') ? 'active' : '' ?>">Validation</a>
      <?php if (isset($_SESSION['user'])) { ?>

          <!-- 👇 المستخدم مسجل دخول -->

          <a href="my-learning.php"
   class="<?= ($currentPage == 'my-learning.php') ? 'active' : '' ?>">
   My Learning
</a>

          <!-- 👤 Profile Icon -->
           <a href="profile.php"
   class="icon-link <?= ($currentPage == 'profile.php') ? 'active' : '' ?>"
   title="Profile">
              <svg class="icon" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                  <circle cx="12" cy="7" r="4"/>
              </svg>
          </a>

      <?php } elseif (isset($_SESSION['admin'])) { ?>

          <!-- 👇 الأدمن -->
          <a href="view.php"
   class="<?= ($currentPage == 'view.php') ? 'active' : '' ?>">
   Dashboard
</a>

         

      <?php } else { ?>

          <!-- 👇 الزائر -->

          <!-- 🔐 Login Icon -->
          <a href="login.php"
   class="icon-link <?= ($currentPage == 'login.php') ? 'active' : '' ?>"
   title="Login">
              <svg class="icon" viewBox="0 0 24 24" fill="none"
                  stroke="currentColor" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                  <circle cx="12" cy="7" r="4"/>
              </svg>
          </a>

      <?php } ?>
<button class="dark-btn" onclick="toggleTheme()">
  🌙
</button>
    </nav>

  </div>
</header>