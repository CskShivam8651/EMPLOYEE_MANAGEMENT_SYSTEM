<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Signup</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #f6d365, #fda085);
      overflow-x: hidden;
    }

    .glitter-background {
      position: fixed;
      top: 0; left: 0; right: 0; bottom: 0;
      pointer-events: none;
      z-index: 0;
      overflow: hidden;
      background: transparent;
    }

    .glitter-background span {
      position: absolute;
      background: #ffd700;
      border-radius: 50%;
      opacity: 0.95;
      box-shadow: 0 0 15px 8px #ffd700;
      animation: sparkle 3s infinite ease-in-out;
      filter: drop-shadow(0 0 2px #ffaa00);
    }

    .glitter-background span:nth-child(1) { width: 14px; height: 14px; top: 5%; left: 10%; animation-delay: 0s; }
    .glitter-background span:nth-child(2) { width: 10px; height: 10px; top: 15%; left: 25%; animation-delay: 0.4s; }
    .glitter-background span:nth-child(3) { width: 16px; height: 16px; top: 20%; left: 55%; animation-delay: 0.8s; }
    .glitter-background span:nth-child(4) { width: 12px; height: 12px; top: 30%; left: 75%; animation-delay: 1.1s; }
    .glitter-background span:nth-child(5) { width: 14px; height: 14px; top: 40%; left: 15%; animation-delay: 1.5s; }
    .glitter-background span:nth-child(6) { width: 11px; height: 11px; top: 50%; left: 40%; animation-delay: 1.9s; }
    .glitter-background span:nth-child(7) { width: 15px; height: 15px; top: 55%; left: 70%; animation-delay: 2.3s; }
    .glitter-background span:nth-child(8) { width: 13px; height: 13px; top: 65%; left: 20%; animation-delay: 2.6s; }
    .glitter-background span:nth-child(9) { width: 12px; height: 12px; top: 75%; left: 50%; animation-delay: 3s; }
    .glitter-background span:nth-child(10) { width: 14px; height: 14px; top: 80%; left: 80%; animation-delay: 3.4s; }
    .glitter-background span:nth-child(11) { width: 16px; height: 16px; top: 10%; left: 80%; animation-delay: 3.8s; }
    .glitter-background span:nth-child(12) { width: 10px; height: 10px; top: 35%; left: 60%; animation-delay: 4.2s; }
    .glitter-background span:nth-child(13) { width: 14px; height: 14px; top: 60%; left: 30%; animation-delay: 4.6s; }
    .glitter-background span:nth-child(14) { width: 15px; height: 15px; top: 85%; left: 40%; animation-delay: 5s; }
    .glitter-background span:nth-child(15) { width: 13px; height: 13px; top: 25%; left: 5%; animation-delay: 5.4s; }

    @keyframes sparkle {
      0%, 100% {
        opacity: 0.95;
        transform: scale(1);
        filter: drop-shadow(0 0 5px #ffd700);
      }
      50% {
        opacity: 0;
        transform: scale(1.8);
        filter: drop-shadow(0 0 12px #ffcc33);
      }
    }

    .card {
      position: relative;
      z-index: 1;
      backdrop-filter: blur(14px);
      background-color: rgba(255, 255, 240, 0.9);
      border-radius: 1rem;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.18);
      max-width: 400px;
      width: 100%;
      padding: 2rem;
      margin: 2rem;
    }

    .navbar {
      z-index: 2;
      position: relative;
      box-shadow: 0 2px 6px rgba(0,0,0,0.12);
      background: #b8860b;
    }

    footer {
      background-color: rgba(255, 255, 240, 0.7);
      backdrop-filter: blur(8px);
      z-index: 2;
      position: relative;
      color: #5a3e00;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100">

  <!-- Glitter Background -->
  <div class="glitter-background">
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
    <span></span><span></span><span></span><span></span><span></span>
  </div>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">NIELIT ROPAR</a>
    </div>
  </nav>

  <!-- Main content -->
  <main class="flex-grow-1 d-flex align-items-center justify-content-center">
    <div class="card">
      <h3 class="text-center mb-4 fw-bold">Signup Form</h3>
      <form method="POST" action="signup_process.php">
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" name="username" id="username" class="form-control" required autofocus />
        </div>
        <div class="mb-4">
          <label for="password" class="form-label">Password:</label>
          <div class="position-relative">
            <input type="password" name="password" id="password" class="form-control pe-5" required />
            <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword()">
              <i class="bi bi-eye-slash" id="toggleIcon"></i>
            </span>
          </div>
        </div>
        <button type="submit" class="btn btn-warning w-100 fw-bold">Register</button>
      </form>
      <p class="mt-3 text-center text-dark fw-semibold">
        Already have an account? <a href="login.php" class="text-decoration-underline text-warning">Login here</a>
      </p>
    </div>
  </main>

  <!-- Footer -->
  <footer class="text-center text-muted py-3 mt-auto">
    &copy; <?php echo date("Y"); ?> NIELIT ROPAR. All rights reserved.
  </footer>

  <!-- Bootstrap JS Bundle CDN -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Password toggle script -->
  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      const icon = document.getElementById('toggleIcon');
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      }
    }
  </script>
</body>
</html>