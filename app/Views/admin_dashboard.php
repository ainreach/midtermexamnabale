<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="container py-3 d-flex align-items-center justify-content-between">
    <div>
      <a href="<?= site_url('admin/dashboard') ?>" class="me-3">Home</a>
      <a href="<?= site_url('admin/dashboard') ?>" class="me-3">Admin Dashboard</a>
    </div>
    <div>
      <?php if (session('isLoggedIn')): ?>
        <a class="btn btn-outline-danger btn-sm" href="<?= site_url('logout') ?>">Logout</a>
      <?php else: ?>
        <a class="btn btn-primary btn-sm" href="<?= site_url('login') ?>">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <main class="container py-3">
    <h1>Welcome, Admin!</h1>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
