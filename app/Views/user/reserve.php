<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>Reserve Car</h1>
<?php if (!$item): ?>
    <p class="error">Invalid car.</p>
<?php else: ?>
    <?php if (!empty($errors)): ?>
        <p class="error">Please fill all required fields.</p>
    <?php endif; ?>
    <div class="card">
        <p>Car: <strong><?= htmlspecialchars((string) $item['Model']) ?></strong></p>
        <form method="post" action="<?= htmlspecialchars($baseUrl . '/reserve') ?>">
            <input type="hidden" name="car_id" value="<?= (int) $item['Car_ID'] ?>">
            <div class="row">
                <div><label>Full Name</label><input name="fullname" required></div>
                <div><label>Email</label><input type="email" name="email" required></div>
                <div><label>City</label><input name="city" required></div>
                <div><label>State</label><input name="state" required></div>
                <div><label>Zipcode</label><input name="zipcode" required></div>
                <div><label>Card Name</label><input name="card_name" required></div>
                <div><label>Card Number</label><input name="card_number" required></div>
                <div><label>Start Date</label><input type="date" name="start_rented_date" required></div>
                <div><label>End Date</label><input type="date" name="end_rented_date" required></div>
                <div><label>Office ID</label><input type="number" name="office_id" value="<?= (int) ($item['office_id'] ?? 0) ?>"></div>
            </div>
            <div class="actions">
                <button type="submit">Confirm Reservation</button>
                <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/item/' . (int) $item['Car_ID']) ?>">Back to Car</a>
            </div>
        </form>
    </div>
<?php endif; ?>
