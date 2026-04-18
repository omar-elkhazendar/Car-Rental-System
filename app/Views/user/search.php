<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Search</h1>
<form method="get" action="<?= htmlspecialchars($baseUrl . '/search') ?>">
    <input name="q" value="<?= htmlspecialchars((string) ($term ?? '')) ?>" placeholder="Search by model, country, description">
    <button type="submit">Search</button>
</form>

<?php if (!empty($term)): ?>
    <h2>Results for "<?= htmlspecialchars((string) $term) ?>"</h2>
    <div class="row">
        <?php foreach ($results as $result): ?>
            <?php
                $src = \App\Core\Url::carImage(
                    (string) ($result['avatar'] ?? ''),
                    (int) $result['Car_ID'],
                    (string) $result['Model']
                );
            ?>
            <div class="card">
                <img src="<?= htmlspecialchars($src) ?>" alt="car image" style="width:100%;height:180px;object-fit:cover;border-radius:8px;margin-bottom:10px;">
                <h3><?= htmlspecialchars((string) $result['Model']) ?></h3>
                <p><?= htmlspecialchars((string) $result['description']) ?></p>
                <a class="btn" href="<?= htmlspecialchars($baseUrl . '/item/' . (int) $result['Car_ID']) ?>">Open Car</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
