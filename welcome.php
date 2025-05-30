<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags for proper rendering and touch-zooming -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome</title>

    <!-- Bootstrap 5 CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    
    <!-- ========= Custom CSS ========= -->
    <style>
        /* Make each carousel image fill the entire viewport height
           and keep its aspect ratio without distortion. */
        .carousel-img {
            height: 100vh;          /* 100% of the viewport height           */
            object-fit: cover;      /* Crop image to cover the container     */
            object-position: center;/* Center the cropped portion            */
        }
    </style>
</head>

<!-- Use flexbox so the footer can stick to the bottom on short pages -->
<body class="d-flex flex-column min-vh-100">

<!-- ========== NAVBAR ========== -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <!-- Website / company name (left side) -->
    <a class="navbar-brand fw-bold" href="#"><i class="bi bi-person-badge-fill"></i> NIELIT ROPAR</a

    <!-- Hamburger button for small screens -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarLinks" aria-controls="navbarLinks"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- Collapsible links (right side) -->
    <div class="collapse navbar-collapse" id="navbarLinks">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" href="#">Home</a> <!-- Active page -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view.php">View</a> <!-- Link to view page -->
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Log Out</a> <!-- Log-out link -->
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- ===== END NAVBAR ===== -->

<!-- ========== MAIN CONTENT ========== -->
<main class="flex-grow-1 d-flex flex-column align-items-center justify-content-center text-center w-100">

    <!-- ===== Bootstrap Carousel (auto-playing slideshow) ===== -->
    <!--  data-bs-ride="carousel"  : enables the JS component
          data-bs-interval="2000"  : 2-second delay between slides -->
    <div id="carouselExampleAutoplaying" class="carousel slide w-100"
         data-bs-ride="carousel" data-bs-interval="2000">
        
        <div class="carousel-inner">
            <!-- ----- Slide 1 (starts as active) ----- -->
            <div class="carousel-item active">
                <img src="NIELIT ROPAR ADMIN.jpg" class="d-block w-100 carousel-img"
                     alt="Campus administration building">
            </div>

        

        <!-- Carousel navigation buttons -->
        <button class="carousel-control-prev" type="button"
                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span> <!-- For screen readers -->
        </button>

        <button class="carousel-control-next" type="button"
                data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div><!-- /carousel -->
</main>
<!-- ===== END MAIN ===== -->

<!-- ========== FOOTER ========== -->
<footer class="bg-light text-center text-muted py-3 mt-auto">
  <!-- Display current year dynamically via PHP -->
  &copy; <?php echo date("Y"); ?> MySite. All rights reserved.
</footer>

<!-- Bootstrap JS bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
