<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Members</h1>
<p class="muted">All non-admin users currently in the system.</p>
<div class="card">
    <h2 style="margin-top:0;">Add New User</h2>
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/admin/members') ?>">
        <div class="row">
            <div>
                <label>Username</label>
                <input name="user_name" required>
            </div>
            <div>
                <label>Full Name</label>
                <input name="fullname" required>
            </div>
            <div>
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div>
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            <div>
                <label>Role</label>
                <select name="role">
                    <option value="customer">Customer</option>
                    <option value="employee">Employee</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
        </div>
        <div class="actions">
            <button type="submit">Create User</button>
        </div>
    </form>
</div>
<table>
    <thead><tr><th>ID</th><th>Username</th><th>Full Name</th><th>Email</th><th>Role Flag</th><th>Actions</th></tr></thead>
    <tbody>
    <?php foreach ($members as $member): ?>
        <tr>
            <td><?= (int) $member['user_id'] ?></td>
            <td><?= htmlspecialchars((string) $member['user_name']) ?></td>
            <td><?= htmlspecialchars((string) $member['Fullname']) ?></td>
            <td><?= htmlspecialchars((string) $member['user_email']) ?></td>
            <td><?= htmlspecialchars((string) $member['stat']) ?></td>
            <td>
                <div class="actions">
                    <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/admin/members/' . (int) $member['user_id'] . '/edit') ?>">Edit</a>
                    <?php if ((int) $member['user_id'] !== (int) (\App\Core\Auth::user()['user_id'] ?? 0)): ?>
                        <form method="post" action="<?= htmlspecialchars($baseUrl . '/admin/members/' . (int) $member['user_id'] . '/delete') ?>" style="display:inline;">
                            <button type="submit" class="btn btn-secondary" onclick="return confirm('Delete this user?')">Delete</button>
                        </form>
                    <?php endif; ?>
                </div>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
