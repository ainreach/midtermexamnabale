<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Announcements</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#f5f6fa }
  </style>
  </head>
<body>
  <nav class="container py-3 d-flex align-items-center justify-content-between">
    <div>
      <a href="<?= site_url('announcements') ?>" class="me-3">Home</a>
      <a href="<?= site_url('announcements') ?>" class="me-3">Announcements</a>
    </div>
    <div>
      <?php if (session('isLoggedIn')): ?>
        <a class="btn btn-outline-danger btn-sm" href="<?= site_url('logout') ?>">Logout</a>
      <?php else: ?>
        <a class="btn btn-primary btn-sm" href="<?= site_url('login') ?>">Login</a>
      <?php endif; ?>
    </div>
  </nav>

  <div class="container py-2">
    <h1 class="mb-4">Announcements</h1>

    <?php if (session('error')): ?>
      <div class="alert alert-danger" role="alert">
        <?= esc(session('error')) ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($announcements)): ?>
      <div class="list-group">
        <?php foreach ($announcements as $a): ?>
          <div class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"><?= esc($a['title'] ?? '') ?></h5>
              <small class="text-muted"><?= esc(date('M d, Y h:i A', strtotime($a['created_at'] ?? 'now'))) ?></small>
            </div>
            <p class="mb-1"><?= nl2br(esc($a['content'] ?? '')) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    <?php else: ?>
      <div class="alert alert-info">No announcements yet.</div>
    <?php endif; ?>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
