<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Offices</h1>
<div class="card">
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/admin/offices') ?>">
        <label>Office Name</label>
        <input name="office_name" required>
        <label>Location</label>
        <input name="location" required>
        <label>Manager</label>
        <select name="mgr_ssn">
            <?php foreach ($members as $m): ?>
                <option value="<?= (int) $m['user_id'] ?>"><?= htmlspecialchars((string) $m['user_name']) ?></option>
            <?php endforeach; ?>
        </select>
        <div class="actions">
            <button type="submit">Add Office</button>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/admin') ?>">Back to Dashboard</a>
        </div>
    </form>
</div>

<table>
    <thead><tr><th>ID</th><th>Name</th><th>Location</th><th>Manager</th></tr></thead>
    <tbody>
    <?php foreach ($offices as $office): ?>
        <tr>
            <td><?= (int) $office['office_id'] ?></td>
            <td><?= htmlspecialchars((string) $office['office_name']) ?></td>
            <td><?= htmlspecialchars((string) $office['location']) ?></td>
            <td><?= htmlspecialchars((string) ($office['manager_name'] ?? '')) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
