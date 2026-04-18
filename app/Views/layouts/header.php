<?php

declare(strict_types=1);

$authUser = \App\Core\Auth::user();
$baseUrl = \App\Core\Url::base();
$placeholder = \App\Core\Url::asset('placeholder-car.svg');
$legacyImage = \App\Core\Url::asset('car-cover.jpg');
$logoUrl = \App\Core\Url::asset('automotors-logo.svg');
$appName = (require BASE_PATH . '/config/app.php')['name'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars((string) $appName) ?></title>
    <style>
        :root {
            --primary-900: #0b1220;
            --primary-800: #111c34;
            --primary-600: #1d4ed8;
            --primary-500: #2563eb;
            --accent-500: #06b6d4;
            --surface: #ffffff;
            --surface-soft: #f8fafc;
            --border: #e2e8f0;
            --text-strong: #0f172a;
            --text-muted: #64748b;
            --success: #16a34a;
            --danger: #dc2626;
            --radius-lg: 16px;
            --radius-md: 12px;
            --radius-sm: 10px;
            --shadow-soft: 0 10px 30px rgba(2, 6, 23, 0.08);
            --shadow-card: 0 8px 20px rgba(15, 23, 42, 0.06);
        }
        * { box-sizing: border-box; }
        body {
            font-family: Inter, "Segoe UI", Tahoma, sans-serif;
            margin: 0;
            background:
                radial-gradient(circle at 20% 0%, rgba(37,99,235,.08), transparent 40%),
                radial-gradient(circle at 80% 0%, rgba(6,182,212,.07), transparent 42%),
                #f1f5f9;
            color: var(--text-strong);
            line-height: 1.55;
        }
        .topbar {
            background: linear-gradient(120deg, var(--primary-900), var(--primary-800) 45%, var(--primary-600));
            color: #fff;
            padding: 14px 20px;
            box-shadow: 0 8px 24px rgba(2, 6, 23, 0.35);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(6px);
        }
        .topbar-inner {
            max-width: 1180px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 19px;
            font-weight: 800;
            letter-spacing: .2px;
            text-shadow: 0 2px 10px rgba(0,0,0,.25);
        }
        .brand img {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.45);
        }
        .menu, .sub-menu { display: flex; align-items: center; gap: 8px; flex-wrap: wrap; }
        .menu a, .sub-menu a, .btn-link {
            color: #fff;
            text-decoration: none;
            padding: 8px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,.18);
            background: rgba(255,255,255,.08);
            transition: all .2s ease;
        }
        .menu a:hover, .sub-menu a:hover, .btn-link:hover {
            background: rgba(255,255,255,.18);
            transform: translateY(-1px);
        }
        .subnav {
            background: rgba(255,255,255,.85);
            border-bottom: 1px solid var(--border);
            backdrop-filter: blur(8px);
        }
        .subnav-inner {
            max-width: 1180px;
            margin: 0 auto;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
        }
        .sub-menu a {
            color: #1f2937;
            border: 1px solid #dbe3ef;
            background: #fff;
            border-radius: 10px;
        }
        .sub-menu a:hover {
            background: #f8fafc;
            border-color: #bfdbfe;
            color: var(--primary-600);
        }
        .user-chip {
            color: #334155;
            font-size: 12px;
            font-weight: 600;
            padding: 8px 12px;
            border-radius: 999px;
            background: #e2e8f0;
        }
        .wrap {
            max-width: 1180px;
            margin: 22px auto;
            background: var(--surface);
            padding: 28px;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-soft);
            border: 1px solid var(--border);
        }
        .hero {
            max-width: 1180px;
            margin: 16px auto 0;
            min-height: 180px;
            border-radius: var(--radius-lg);
            overflow: hidden;
            background: linear-gradient(130deg, var(--primary-500), var(--primary-900));
            position: relative;
            box-shadow: var(--shadow-soft);
            border: 1px solid rgba(255,255,255,.15);
        }
        .hero::after {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(90deg, rgba(15,23,42,.7), rgba(15,23,42,.25));
        }
        .hero img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            opacity: .45;
            display: block;
            transform: scale(1.02);
        }
        .hero .hero-content {
            position: absolute;
            inset: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 24px 30px;
            color: #fff;
            z-index: 1;
        }
        .hero h2 {
            margin: 0 0 10px;
            font-size: clamp(26px, 3vw, 38px);
            line-height: 1.2;
            letter-spacing: .2px;
        }
        .hero p {
            margin: 0;
            color: #dbeafe;
            font-size: 15px;
            max-width: 720px;
        }
        h1 {
            margin: 0 0 14px;
            font-size: clamp(28px, 3vw, 36px);
            line-height: 1.2;
        }
        h2 { margin-top: 24px; margin-bottom: 10px; font-size: 24px; }
        h3 { margin-top: 0; margin-bottom: 8px; }
        p { margin-top: 0; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 14px;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border);
            background: #fff;
        }
        th, td { border-bottom: 1px solid var(--border); padding: 11px 12px; text-align: left; }
        th {
            background: linear-gradient(180deg, #f8fafc, #f1f5f9);
            font-size: 13px;
            color: #334155;
            text-transform: uppercase;
            letter-spacing: .3px;
        }
        tr:hover td { background: #f8fbff; }
        input, textarea, select {
            padding: 11px 12px;
            margin: 5px 0 12px;
            width: 100%;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background: #fff;
            color: #0f172a;
            transition: .2s ease;
        }
        input:focus, textarea:focus, select:focus {
            border-color: #60a5fa;
            outline: 0;
            box-shadow: 0 0 0 4px rgba(59,130,246,.15);
        }
        textarea { min-height: 120px; resize: vertical; }
        button, .btn {
            display: inline-block;
            background: linear-gradient(135deg, var(--primary-500), var(--primary-600));
            color: #fff;
            border: 1px solid transparent;
            border-radius: 10px;
            padding: 10px 14px;
            text-decoration: none;
            cursor: pointer;
            transition: all .2s ease;
            font-weight: 700;
            font-size: 13px;
            letter-spacing: .2px;
        }
        button:hover, .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 18px rgba(37,99,235,.24);
        }
        .btn-secondary {
            background: #fff;
            color: #1f2937;
            border-color: #cbd5e1;
        }
        .btn-secondary:hover {
            background: #f8fafc;
            box-shadow: 0 8px 14px rgba(15,23,42,.12);
        }
        .row { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 16px; }
        .grid-4 { display: grid; grid-template-columns: repeat(4, minmax(0, 1fr)); gap: 14px; }
        .card {
            background: linear-gradient(180deg, #ffffff, #fbfdff);
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            padding: 18px;
            box-shadow: var(--shadow-card);
        }
        .card:hover { border-color: #bfdbfe; }
        .stat {
            font-size: 30px;
            font-weight: 800;
            color: var(--primary-900);
            line-height: 1.1;
            margin-bottom: 4px;
        }
        .muted { color: var(--text-muted); font-size: 14px; }
        .error {
            color: #991b1b;
            margin-bottom: 12px;
            padding: 10px 12px;
            border: 1px solid #fecaca;
            background: #fff1f2;
            border-radius: 10px;
        }
        .actions { display: flex; gap: 8px; flex-wrap: wrap; margin: 10px 0 6px; }
        .footer-shell {
            max-width: 1180px;
            margin: 0 auto 22px;
            padding: 14px 18px;
            color: #64748b;
            background: #fff;
            border: 1px solid var(--border);
            border-radius: 12px;
            text-align: center;
            box-shadow: var(--shadow-card);
        }
        @media (max-width: 920px) {
            .row, .grid-4 { grid-template-columns: 1fr; }
            .topbar-inner { align-items: flex-start; }
            .menu { width: 100%; }
            .hero img { height: 210px; }
        }
    </style>
</head>
<body>
<header class="topbar">
    <div class="topbar-inner">
        <div class="brand">
            <img src="<?= htmlspecialchars($logoUrl) ?>" alt="AutoMotors logo">
            <span><?= htmlspecialchars((string) $appName) ?></span>
        </div>
        <nav class="menu">
            <a href="<?= htmlspecialchars($baseUrl) ?>">Home</a>
            <a href="<?= htmlspecialchars($baseUrl . '/about') ?>">About</a>
            <?php if ($authUser): ?>
                <a href="<?= htmlspecialchars($baseUrl . '/profile') ?>">Profile</a>
                <a href="<?= htmlspecialchars($baseUrl . '/search') ?>">Search</a>
                <?php if ($authUser['role'] === 'admin'): ?>
                    <a href="<?= htmlspecialchars($baseUrl . '/admin') ?>">Admin</a>
                <?php endif; ?>
                <form method="post" action="<?= htmlspecialchars($baseUrl . '/logout') ?>" style="display:inline;">
                    <button type="submit" class="btn-link" style="width:auto;">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?= htmlspecialchars($baseUrl . '/login') ?>">Login</a>
                <a href="<?= htmlspecialchars($baseUrl . '/register') ?>">Register</a>
            <?php endif; ?>
        </nav>
    </div>
</header>
<?php if ($authUser): ?>
    <div class="subnav">
        <div class="subnav-inner">
            <div class="sub-menu">
                <a href="<?= htmlspecialchars($baseUrl) ?>">Home</a>
                <a href="<?= htmlspecialchars($baseUrl . '/about') ?>">About</a>
                <a href="<?= htmlspecialchars($baseUrl . '/search') ?>">Find Cars</a>
                <a href="<?= htmlspecialchars($baseUrl . '/profile') ?>">My Profile</a>
                <?php if ($authUser['role'] === 'admin'): ?>
                    <a href="<?= htmlspecialchars($baseUrl . '/admin/members') ?>">Members</a>
                    <a href="<?= htmlspecialchars($baseUrl . '/admin/categories') ?>">Categories</a>
                    <a href="<?= htmlspecialchars($baseUrl . '/admin/items') ?>">Cars</a>
                    <a href="<?= htmlspecialchars($baseUrl . '/admin/offices') ?>">Offices</a>
                    <a href="<?= htmlspecialchars($baseUrl . '/admin/payments') ?>">Reservations</a>
                <?php endif; ?>
            </div>
            <div class="user-chip">
                Signed in as <?= htmlspecialchars((string) $authUser['user_name']) ?> (<?= htmlspecialchars((string) $authUser['role']) ?>)
            </div>
        </div>
    </div>
<?php endif; ?>
<section class="hero">
    <img src="<?= htmlspecialchars($legacyImage) ?>" alt="Car Rental Banner" onerror="this.src='<?= htmlspecialchars($placeholder) ?>'">
    <div class="hero-content">
        <h2>AutoMotors - Drive Your Next Journey</h2>
        <p>Premium rentals, trusted service, and smooth booking in minutes.</p>
    </div>
</section>
<main class="wrap">
