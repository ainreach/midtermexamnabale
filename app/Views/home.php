<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Homepage</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="container py-3 d-flex align-items-center justify-content-between">
    <div>
      <a href="<?= site_url('announcements') ?>" class="me-3">Home</a>
      <a href="<?= site_url('about') ?>" class="me-3">About</a>
      <a href="<?= site_url('contact') ?>" class="me-3">Contact</a>
    </div>
    <div>
      <?php if (session('isLoggedIn')): ?>
        <a class="btn btn-outline-danger btn-sm" href="<?= site_url('logout') ?>">Logout</a>
      <?php else: ?>
        <a class="btn btn-primary btn-sm" href="<?= site_url('login') ?>">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <main class="container">
    <h1 class="mb-2">Homepage</h1>
    <p class="text-muted mb-4">Welcome to the homepage.</p>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
