<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Cars</h1>
<div class="card">
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/admin/items') ?>">
        <div class="row">
            <div><label>Model</label><input name="model" required></div>
            <div><label>Price</label><input type="number" name="price" required></div>
            <div><label>Status</label><input type="number" name="status" value="1"></div>
            <div><label>Country</label><input name="country_made" required></div>
            <div><label>Plate ID</label><input type="number" name="plate_id" required></div>
            <div><label>Avatar filename</label><input name="avatar"></div>
            <div><label>Category</label><select name="cat_id"><?php foreach ($categories as $c): ?><option value="<?= (int) $c['category_id'] ?>"><?= htmlspecialchars((string) $c['category_name']) ?></option><?php endforeach; ?></select></div>
            <div><label>Office</label><select name="office_id"><?php foreach ($offices as $o): ?><option value="<?= (int) $o['office_id'] ?>"><?= htmlspecialchars((string) $o['office_name']) ?></option><?php endforeach; ?></select></div>
        </div>
        <label>Description</label>
        <textarea name="description" required></textarea>
        <div class="actions">
            <button type="submit">Add Car</button>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/admin') ?>">Back to Dashboard</a>
        </div>
    </form>
</div>

<table>
    <thead><tr><th>ID</th><th>Image</th><th>Model</th><th>Price</th><th>Category</th><th>Office</th></tr></thead>
    <tbody>
    <?php foreach ($items as $item): ?>
        <?php
            $src = \App\Core\Url::carImage(
                (string) ($item['avatar'] ?? ''),
                (int) $item['Car_ID'],
                (string) $item['Model']
            );
        ?>
        <tr>
            <td><?= (int) $item['Car_ID'] ?></td>
            <td><img src="<?= htmlspecialchars($src) ?>" alt="car" style="width:90px;height:60px;object-fit:cover;border-radius:8px;"></td>
            <td><?= htmlspecialchars((string) $item['Model']) ?></td>
            <td><?= (int) $item['price'] ?></td>
            <td><?= htmlspecialchars((string) ($item['category_name'] ?? '')) ?></td>
            <td><?= htmlspecialchars((string) ($item['office_name'] ?? '')) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
