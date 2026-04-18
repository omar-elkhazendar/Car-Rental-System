<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Cars</h1>
<table>
    <thead><tr><th>Image</th><th>Model</th><th>Price</th><th>Action</th></tr></thead>
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
            <td><img src="<?= htmlspecialchars($src) ?>" alt="car" style="width:120px;height:70px;object-fit:cover;border-radius:8px;"></td>
            <td><?= htmlspecialchars((string) $item['Model']) ?></td>
            <td><?= (int) $item['price'] ?></td>
            <td><a class="btn" href="<?= htmlspecialchars($baseUrl . '/item/' . (int) $item['Car_ID']) ?>">View</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<div class="actions">
    <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl) ?>">Back to Home</a>
</div>
