<?php $baseUrl = \App\Core\Url::base(); ?>
<?php if (!$item): ?>
    <p class="error">Car not found.</p>
<?php else: ?>
    <?php
        $imgSrc = \App\Core\Url::carImage(
            (string) ($item['avatar'] ?? ''),
            (int) $item['Car_ID'],
            (string) $item['Model']
        );
    ?>
    <h1><?= htmlspecialchars((string) $item['Model']) ?></h1>
    <div class="card">
        <img src="<?= htmlspecialchars($imgSrc) ?>" alt="car image" style="width:100%;max-height:360px;object-fit:cover;border-radius:10px;margin-bottom:12px;">
        <p><?= htmlspecialchars((string) $item['description']) ?></p>
        <p><strong>Price:</strong> <?= (int) $item['price'] ?></p>
        <div class="actions">
            <a class="btn" href="<?= htmlspecialchars($baseUrl . '/reserve/' . (int) $item['Car_ID']) ?>">Reserve this car</a>
            <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl) ?>">Back to Home</a>
        </div>
    </div>

    <h2>Comments</h2>
    <form method="post" action="<?= htmlspecialchars($baseUrl . '/item/' . (int) $item['Car_ID'] . '/comment') ?>">
        <textarea name="comment" required></textarea>
        <button type="submit">Add Comment</button>
    </form>

    <?php foreach ($comments as $comment): ?>
        <div class="card">
            <strong><?= htmlspecialchars((string) $comment['user_name']) ?></strong>
            <p><?= htmlspecialchars((string) $comment['comment']) ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
