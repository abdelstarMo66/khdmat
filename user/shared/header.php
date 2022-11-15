<?php
if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header('location:/khdmat/user/index.php');
}
?>
<!-- ======= Header ======= -->

<header id="header" class="fixed-top d-flex align-items-center header-transparent" style="background-color:#CECECE;">
  <div class="container d-flex align-items-center">
    <h1 class="logo me-auto"><a href="/khdmat/user/#hero"> Sanai3i 
      </a></h1> 
    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="nav-link scrollto active" href="/khdmat/user/#hero">Home</a></li>
        <li><a class="nav-link scrollto" href="/khdmat/user/#about">About us</a></li>
        <li><a class="nav-link scrollto" href="/khdmat/user/notes.php">Suggestions </a></li>
        <li><a class="nav-link scrollto" href="/khdmat/user/rating.php">Rateing </a></li>

        <li><a class="nav-link scrollto" href="/khdmat/user/trip.php">Technicians </a></li>
        <li><a class="nav-link scrollto" href="/khdmat/user/#footer">Contact Us</a></li>

      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

    <div class="social-links">
      <?php if (isset($_SESSION['user'])): ?>
        <form action="">
          <button name="logout" class="btn btn-info"> Log Out  </button>
        </form>
        <!-- <a class="btn btn-light p-3" href="/khdmat/user/orders.php"></a> -->
      <?php else: ?>
        <a href="/khdmat/user/user/add.php" class="btn btn-info p-3 "> Sign-up   </a>
        <a href="/khdmat/user/pages-login.php" class="btn btn-warning p-3"> Log-in</a>
      <?php endif; ?>
    </div>
  </div>
</header><!-- End Header -->