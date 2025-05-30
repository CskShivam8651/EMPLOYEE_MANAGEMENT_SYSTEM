<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /> <!-- Set character encoding -->
  <meta name="viewport" content="width=device-width, initial-scale=1" /> <!-- Responsive design -->
  <title>Login</title> <!-- Page title -->

  <!-- Bootstrap CSS for styling -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- Bootstrap Icons for icons like eye/eye-slash -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <!-- Google Fonts for custom font style -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;700&display=swap" rel="stylesheet">

  <!-- Custom styles -->
  <style>
    body {
      font-family: 'Poppins', sans-serif; /* Use Poppins font */
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%); /* Gradient background */
      background-attachment: fixed;
      color: #333;
      transition: background 0.4s ease, color 0.4s ease;
    }

    .card {
      backdrop-filter: blur(10px); /* Blurred glass effect */
      background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white */
      border: none;
      border-radius: 1rem;
    }

    .form-label {
      font-weight: 500; /* Semi-bold labels */
    }

    .navbar {
      box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Light shadow under navbar */
    }

    .btn-primary {
      background-color: #007BFF; /* Custom blue */
      border: none;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #0056b3; /* Darker blue on hover */
    }

    footer {
      background-color: rgba(255, 255, 255, 0.6); /* Light footer background */
      backdrop-filter: blur(5px);
    }

    /* Dark Mode styles */
    body.dark-mode {
      background: #121212 !important;
      color: #f1f1f1 !important;
    }

    body.dark-mode .card {
      background-color: rgba(33, 33, 33, 0.95) !important;
      color: #f1f1f1;
    }

    body.dark-mode .form-label,
    body.dark-mode .form-control,
    body.dark-mode a,
    body.dark-mode p {
      color: #f1f1f1 !important;
    }

    body.dark-mode .form-control {
      background-color: #2b2b2b;
      border: 1px solid #555;
    }

    body.dark-mode .form-control::placeholder {
      color: #aaa;
    }

    body.dark-mode .navbar {
      background-color: #222 !important;
    }

    body.dark-mode footer {
      background-color: rgba(30, 30, 30, 0.8);
    }

    /* Style for toggle switch */
    .form-switch .form-check-input {
      width: 2.5em;
      height: 1.25em;
      cursor: pointer;
    }

    .form-switch {
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .form-switch label {
      margin-bottom: 0;
      color: white;
    }
  </style>
</head>
<body class="d-flex flex-column min-vh-100"> <!-- Flexbox layout, fills full height -->

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
  <div class="container-fluid d-flex justify-content-between align-items-center">
    <a class="navbar-brand" href="#">NIELIT ROPAR</a> <!-- Brand name -->
    <!-- Dark mode toggle switch -->
    <div class="form-switch">
      <label for="themeToggle" class="form-check-label">Dark Mode</label>
      <input class="form-check-input" type="checkbox" role="switch" id="themeToggle">
    </div>
  </div>
</nav>

<!-- Main content area -->
<main class="flex-grow-1 d-flex align-items-center justify-content-center px-3">
  <!-- Login card -->
  <div class="card shadow-lg p-4" style="min-width: 320px; max-width: 400px; width: 100%;">
    <h3 class="text-center mb-4 fw-bold">Login</h3>
    <form method="POST" action="login_process.php"> <!-- Form submission -->
      <div class="mb-3">
        <label for="username" class="form-label">Username</label> <!-- Username label -->
        <input type="text" name="username" id="username" class="form-control" required autofocus /> <!-- Username input -->
      </div>
      <div class="mb-4">
        <label for="password" class="form-label">Password</label> <!-- Password label -->
        <div class="position-relative">
          <input type="password" name="password" id="password" class="form-control pe-5" required /> <!-- Password input -->
          <!-- Eye icon to toggle password visibility -->
          <span class="position-absolute top-50 end-0 translate-middle-y me-3" style="cursor: pointer;" onclick="togglePassword()">
            <i class="bi bi-eye-slash" id="toggleIcon"></i>
          </span>
        </div>
      </div>
      <button type="submit" class="btn btn-primary w-100">Login</button> <!-- Submit button -->
    </form>
    <p class="mt-3 text-center">
      Don't have an account? <a href="signup.php">Sign up here</a> <!-- Link to sign-up page -->
    </p>
  </div>
</main>

<!-- Footer -->
<footer class="text-center text-muted py-3 mt-auto">
  &copy; <?php echo date("Y"); ?> NIELIT ROPAR. All rights reserved. <!-- Dynamic year in footer -->
</footer>

<!-- Bootstrap JS for components -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Custom JavaScript -->
<script>
  // Function to toggle password visibility
  function togglePassword() {
    const passwordInput = document.getElementById('password');
    const icon = document.getElementById('toggleIcon');
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text'; // Show password
      icon.classList.replace('bi-eye-slash', 'bi-eye'); // Change icon
    } else {
      passwordInput.type = 'password'; // Hide password
      icon.classList.replace('bi-eye', 'bi-eye-slash'); // Change icon
    }
  }

  // Dark Mode Toggle
  const toggle = document.getElementById('themeToggle'); // Checkbox
  const prefersDark = window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;

  // Apply saved theme or preferred OS setting
  if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && prefersDark)) {
    document.body.classList.add('dark-mode');
    toggle.checked = true;
  }

  // Save and toggle theme on checkbox change
  toggle.addEventListener('change', () => {
    if (toggle.checked) {
      document.body.classList.add('dark-mode');
      localStorage.setItem('theme', 'dark'); // Save to local storage
    } else {
      document.body.classList.remove('dark-mode');
      localStorage.setItem('theme', 'light'); // Save to local storage
    }
  });
</script>
</body>
</html>
