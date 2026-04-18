<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Login</h1>
<?php if (!empty($error)): ?>
    <p class="error"><?= htmlspecialchars((string) $error) ?></p>
<?php endif; ?>
<div class="card">
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/login') ?>">
        <label>Username</label>
        <input name="username" required>
        <label>Password</label>
        <input type="password" name="password" required>
        <div class="actions">
            <button type="submit">Sign in</button>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/register') ?>">Create account</a>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl) ?>">Back to Home</a>
        </div>
    </form>
</div>
