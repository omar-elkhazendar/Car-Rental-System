<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Welcome to AutoMotors</h1>
<p class="muted">Your trusted platform for modern car rental experiences across Egypt.</p>

<div class="grid-4">
    <div class="card"><div class="stat">60+</div><div class="muted">Available Cars</div></div>
    <div class="card"><div class="stat">12</div><div class="muted">Vehicle Categories</div></div>
    <div class="card"><div class="stat">8</div><div class="muted">Service Branches</div></div>
    <div class="card"><div class="stat">24/7</div><div class="muted">Customer Support</div></div>
</div>

<h2>Our Services</h2>
<div class="row">
    <div class="card">
        <h3>Daily & Weekly Rental</h3>
        <p>Flexible rental plans for business, travel, and family needs with competitive pricing.</p>
    </div>
    <div class="card">
        <h3>Airport Pickup</h3>
        <p>Fast handover and return from major branches with smooth documentation process.</p>
    </div>
    <div class="card">
        <h3>Luxury & Sports Fleet</h3>
        <p>Premium vehicles for events, executive trips, and exceptional driving experiences.</p>
    </div>
    <div class="card">
        <h3>Safe & Maintained Vehicles</h3>
        <p>Regular inspections and clean-ready cars to ensure comfort and reliability.</p>
    </div>
</div>

<div class="actions">
    <a class="btn" href="<?= htmlspecialchars($baseUrl . '/about') ?>">Learn More About AutoMotors</a>
    <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/search') ?>">Search Cars</a>
</div>

<h2>Why Choose Us</h2>
<div class="row">
    <div class="card">
        <h3>Transparent Pricing</h3>
        <p>No hidden fees, clear terms, and fair daily rates for all categories.</p>
    </div>
    <div class="card">
        <h3>Trusted Fleet Quality</h3>
        <p>Vehicles are cleaned, inspected, and prepared before every handover.</p>
    </div>
</div>

<h2>Browse Categories</h2>
<div class="row">
    <?php foreach ($categories as $category): ?>
        <div class="card">
            <h3><?= htmlspecialchars((string) $category['category_name']) ?></h3>
            <p><?= htmlspecialchars((string) ($category['description'] ?? '')) ?></p>
            <a class="btn" href="<?= htmlspecialchars($baseUrl . '/category/' . (int) $category['category_id']) ?>">View Cars</a>
        </div>
    <?php endforeach; ?>
</div>
