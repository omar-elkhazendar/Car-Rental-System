<?php $baseUrl = \App\Core\Url::base(); ?>
<h1>About AutoMotors</h1>
<p class="muted">AutoMotors is a modern car rental platform focused on quality, reliability, and customer-first service.</p>

<div class="row">
    <div class="card">
        <h2 style="margin-top:0;">Who We Are</h2>
        <p>
            At AutoMotors, we provide practical and premium mobility solutions for individuals, families, and businesses.
            Our goal is to make renting a car simple, transparent, and fast from booking to return.
        </p>
    </div>
    <div class="card">
        <h2 style="margin-top:0;">Our Mission</h2>
        <p>
            Deliver safe and high-quality vehicles with excellent support, fair pricing, and a professional customer experience.
        </p>
    </div>
</div>

<h2>Our Services</h2>
<div class="row">
    <div class="card">
        <h3>Car Rental Plans</h3>
        <p>Daily, weekly, and long-term options tailored for personal and corporate usage.</p>
    </div>
    <div class="card">
        <h3>Multi-Category Fleet</h3>
        <p>Economy, Sedan, SUV, Luxury, Sports, Electric, Pickup, and Van options.</p>
    </div>
    <div class="card">
        <h3>Branch-Based Service</h3>
        <p>Multiple office locations for convenient pickup and return.</p>
    </div>
    <div class="card">
        <h3>Fast Booking Experience</h3>
        <p>Simple reservation flow with clear vehicle data and user-friendly interface.</p>
    </div>
</div>

<h2>Company Details</h2>
<div class="row">
    <div class="card">
        <p><strong>Brand:</strong> AutoMotors</p>
        <p><strong>Owner:</strong> Omar ElKhazendar</p>
        <p><strong>Contact Number:</strong> 201281875949</p>
    </div>
    <div class="card">
        <p><strong>Email:</strong> info@automotors.local</p>
        <p><strong>Support Hours:</strong> Daily - 24/7</p>
        <p><strong>Coverage:</strong> Major city branches and airport service points.</p>
    </div>
</div>

<div class="actions">
    <a class="btn" href="<?= htmlspecialchars($baseUrl) ?>">Back to Home</a>
    <a class="btn btn-secondary" href="<?= htmlspecialchars($baseUrl . '/search') ?>">Browse Cars</a>
</div>
