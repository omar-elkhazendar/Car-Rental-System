<?php $baseUrl = \App\Core\Url::base(); ?>
<?php
$role = 'customer';
if ((int) $member['user_group_id'] === 1 || (string) $member['stat'] === 'A') {
    $role = 'admin';
} elseif ((string) $member['stat'] === 'E') {
    $role = 'employee';
}
?>
<h1>Edit User</h1>
<div class="card">
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/admin/members/' . (int) $member['user_id'] . '/edit') ?>">
        <div class="row">
            <div>
                <label>Username</label>
                <input name="user_name" value="<?= htmlspecialchars((string) $member['user_name']) ?>" required>
            </div>
            <div>
                <label>Full Name</label>
                <input name="fullname" value="<?= htmlspecialchars((string) $member['Fullname']) ?>" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars((string) $member['user_email']) ?>" required>
            </div>
            <div>
                <label>New Password (optional)</label>
                <input type="password" name="password" placeholder="Leave empty to keep current password">
            </div>
            <div>
                <label>Role</label>
                <select name="role">
                    <option value="customer" <?= $role === 'customer' ? 'selected' : '' ?>>Customer</option>
                    <option value="employee" <?= $role === 'employee' ? 'selected' : '' ?>>Employee</option>
                    <option value="admin" <?= $role === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            </div>
        </div>
        <div class="actions">
            <button type="submit">Save Changes</button>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/admin/members') ?>">Cancel</a>
        </div>
    </form>
</div>
