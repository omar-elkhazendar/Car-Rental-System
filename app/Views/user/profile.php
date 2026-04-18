<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>My Profile</h1>
<?php if ($user): ?>
    <?php
    $role = 'customer';
    if ((int) $user['user_group_id'] === 1 || (string) $user['stat'] === 'A') {
        $role = 'admin';
    } elseif ((string) $user['stat'] === 'E') {
        $role = 'employee';
    }
    ?>
    <div class="card">
        <p><strong>Username:</strong> <?= htmlspecialchars((string) $user['user_name']) ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($role) ?></p>
    </div>

    <div class="card">
        <h2 style="margin-top:0;">Update My Information</h2>
        <form method="post" action="<?= htmlspecialchars($baseUrl . '/profile') ?>">
            <div class="row">
                <div>
                    <label>Full Name</label>
                    <input name="fullname" value="<?= htmlspecialchars((string) $user['Fullname']) ?>" required>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars((string) $user['user_email']) ?>" required>
                </div>
                <div>
                    <label>New Password (optional)</label>
                    <input type="password" name="password" placeholder="Leave empty to keep current password">
                </div>
            </div>
            <div class="actions">
                <button type="submit">Save Profile</button>
            </div>
        </form>
    </div>
<?php endif; ?>
