<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Admin Dashboard</h1>
<div class="grid-4">
    <div class="card"><div class="muted">Users</div><div class="stat"><?= (int) $counts['users'] ?></div></div>
    <div class="card"><div class="muted">Categories</div><div class="stat"><?= (int) $counts['categories'] ?></div></div>
    <div class="card"><div class="muted">Cars</div><div class="stat"><?= (int) $counts['cars'] ?></div></div>
    <div class="card"><div class="muted">Reservations</div><div class="stat"><?= (int) $counts['reservations'] ?></div></div>
</div>
<div class="actions">
    <a class="btn" href="<?= htmlspecialchars($baseUrl . '/admin/members') ?>">Members</a>
    <a class="btn" href="<?= htmlspecialchars($baseUrl . '/admin/categories') ?>">Categories</a>
    <a class="btn" href="<?= htmlspecialchars($baseUrl . '/admin/items') ?>">Cars</a>
    <a class="btn" href="<?= htmlspecialchars($baseUrl . '/admin/offices') ?>">Offices</a>
    <a class="btn" href="<?= htmlspecialchars($baseUrl . '/admin/payments') ?>">Reservations</a>
</div>
