<h1>Reservations</h1>
<p class="muted">All bookings created by users.</p>
<table>
    <thead><tr><th>ID</th><th>Customer</th><th>Email</th><th>Car</th><th>Office</th><th>From</th><th>To</th></tr></thead>
    <tbody>
    <?php foreach ($payments as $payment): ?>
        <tr>
            <td><?= (int) $payment['reserve_id'] ?></td>
            <td><?= htmlspecialchars((string) $payment['fullname']) ?></td>
            <td><?= htmlspecialchars((string) $payment['email']) ?></td>
            <td><?= htmlspecialchars((string) $payment['Model']) ?></td>
            <td><?= htmlspecialchars((string) ($payment['office_name'] ?? '')) ?></td>
            <td><?= htmlspecialchars((string) $payment['start_rented_date']) ?></td>
            <td><?= htmlspecialchars((string) $payment['end_rented_date']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
