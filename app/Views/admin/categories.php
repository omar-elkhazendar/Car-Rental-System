<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Categories</h1>
<div class="card">
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/admin/categories') ?>">
        <label>Name</label>
        <input name="category_name" required>
        <label>Description</label>
        <textarea name="description" required></textarea>
        <label>Ordering</label>
        <input name="ordering" type="number" value="0">
        <div class="actions">
            <button type="submit">Add Category</button>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/admin') ?>">Back to Dashboard</a>
        </div>
    </form>
</div>

<table>
    <thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Ordering</th></tr></thead>
    <tbody>
    <?php foreach ($categories as $cat): ?>
        <tr>
            <td><?= (int) $cat['category_id'] ?></td>
            <td><?= htmlspecialchars((string) $cat['category_name']) ?></td>
            <td><?= htmlspecialchars((string) $cat['description']) ?></td>
            <td><?= (int) $cat['ordering'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
