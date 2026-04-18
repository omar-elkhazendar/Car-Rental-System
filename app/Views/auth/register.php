<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Register</h1>
<?php if (!empty($error)): ?>
    <p class="error"><?= htmlspecialchars((string) $error) ?></p>
<?php endif; ?>
<div class="card">
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/register') ?>">
        <label>Username</label>
        <input name="username" value="<?= htmlspecialchars((string) ($old['user_name'] ?? '')) ?>" required>
        <label>Full Name</label>
        <input name="fullname" value="<?= htmlspecialchars((string) ($old['fullname'] ?? '')) ?>" required>
        <label>Email</label>
        <input type="email" name="email" value="<?= htmlspecialchars((string) ($old['email'] ?? '')) ?>" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <div class="actions">
            <button type="submit">Create account</button>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/login') ?>">Already have account</a>
        </div>
    </form>
</div>
