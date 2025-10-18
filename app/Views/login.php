<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f5f6fa; }
    .login-card { max-width: 420px; }
  </style>
</head>
<body>
  <div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="card shadow login-card w-100">
      <div class="card-body p-4">
        <h3 class="card-title mb-3 text-center">Login</h3>
        <p class="text-muted text-center mb-4">Enter your credentials to continue.</p>

        <?php if (session('error')): ?>
          <div class="alert alert-danger" role="alert">
            <?= esc(session('error')) ?>
          </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login') ?>" class="d-grid gap-3">
          <?= csrf_field() ?>
          <div>
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" class="form-control" required autofocus>
          </div>
          <div>
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
