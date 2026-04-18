<?php

declare(strict_types=1);

$id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$model = isset($_GET['model']) ? trim((string) $_GET['model']) : 'Car';
$model = $model !== '' ? $model : 'Car';

// Deterministic color palette per car id.
$palette = [
    ['#1d4ed8', '#0f172a'],
    ['#059669', '#064e3b'],
    ['#dc2626', '#7f1d1d'],
    ['#7c3aed', '#3b0764'],
    ['#ea580c', '#7c2d12'],
    ['#0891b2', '#164e63'],
    ['#4338ca', '#1e1b4b'],
    ['#16a34a', '#14532d'],
];

$pair = $palette[abs($id) % count($palette)];
[$primary, $secondary] = $pair;

header('Content-Type: image/svg+xml; charset=UTF-8');

$safeModel = htmlspecialchars($model, ENT_QUOTES, 'UTF-8');
$safeId = htmlspecialchars((string) $id, ENT_QUOTES, 'UTF-8');

echo <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="700" viewBox="0 0 1200 700" fill="none">
  <defs>
    <linearGradient id="bg" x1="0" y1="0" x2="1200" y2="700" gradientUnits="userSpaceOnUse">
      <stop stop-color="{$primary}"/>
      <stop offset="1" stop-color="{$secondary}"/>
    </linearGradient>
  </defs>
  <rect width="1200" height="700" fill="url(#bg)"/>
  <rect x="220" y="250" width="760" height="220" rx="30" fill="rgba(255,255,255,0.2)"/>
  <rect x="360" y="180" width="360" height="110" rx="24" fill="rgba(255,255,255,0.3)"/>
  <circle cx="400" cy="510" r="70" fill="#111827"/>
  <circle cx="800" cy="510" r="70" fill="#111827"/>
  <circle cx="400" cy="510" r="30" fill="#E5E7EB"/>
  <circle cx="800" cy="510" r="30" fill="#E5E7EB"/>
  <text x="600" y="105" text-anchor="middle" fill="#F8FAFC" font-family="Segoe UI, Arial, sans-serif" font-size="44" font-weight="700">{$safeModel}</text>
  <text x="600" y="155" text-anchor="middle" fill="#E2E8F0" font-family="Segoe UI, Arial, sans-serif" font-size="24">Car ID: {$safeId}</text>
</svg>
SVG;
