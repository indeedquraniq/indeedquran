<?php
$site_name = "Indeed Qur'an";
$site_url = "https://indeedquran.com";
$site_desc = "Read and Listen to the Holy Quran online. 230+ reciters. Free — no ads ever.";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $page_title ?? "Indeed Qur'an — Guidance for Humanity" ?></title>
<meta name="description" content="<?= $page_desc ?? $site_desc ?>">
<meta name="keywords" content="<?= $page_keywords ?? 'Quran online, listen Quran, read Quran, Quran MP3 download, Sudais, Mishary, Minshawi' ?>">
<meta property="og:title" content="<?= $page_title ?? "Indeed Qur'an" ?>">
<meta property="og:description" content="<?= $page_desc ?? $site_desc ?>">
<meta property="og:url" content="<?= $page_url ?? $site_url ?>">
<meta property="og:type" content="website">
<meta property="og:image" content="<?= $site_url ?>/logo-circle.png">
<link rel="canonical" href="<?= $page_url ?? $site_url ?>">
<link rel="icon" type="image/png" href="/logo-circle.png">
<link rel="apple-touch-icon" href="/logo-circle.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Scheherazade+New:wght@400;700&family=Cinzel:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
<style>
*{box-sizing:border-box;margin:0;padding:0;}
:root{--navy:#0A0E1A;--navy2:#0d1321;--navy3:#111d2e;--cyan:#00C8E8;--cyan2:rgba(0,200,232,0.12);--cyan3:rgba(0,200,232,0.25);--text:#fff;--muted:rgba(255,255,255,0.55);--dim:rgba(255,255,255,0.28);--border:rgba(255,255,255,0.07);--card:#0d1321;--gold:#C4A44A;}
body.light{--navy:#f0f4f8;--navy2:#fff;--navy3:#e8edf2;--text:#0A0E1A;--muted:rgba(10,14,26,0.6);--dim:rgba(10,14,26,0.35);--border:rgba(10,14,26,0.1);--card:#fff;}
html,body{font-family:'Inter',sans-serif;background:var(--navy);color:var(--text);min-height:100vh;overflow-x:hidden;transition:background .3s,color .3s;}
nav{background:rgba(13,19,33,.97);backdrop-filter:blur(16px);height:68px;padding:0 48px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--border);position:sticky;top:0;z-index:100;}
body.light nav{background:rgba(255,255,255,.97);}
.nav-logo{display:flex;align-items:center;gap:12px;text-decoration:none;}
.nav-logo img{width:46px;height:46px;object-fit:contain;}
.nav-brand{font-family:'Cinzel',serif;font-size:18px;font-weight:700;color:var(--text);}
.nav-brand span{color:var(--cyan);}
.nav-tag{font-size:9px;color:rgba(0,200,232,.6);letter-spacing:.12em;margin-top:2px;}
.nav-links{display:flex;gap:4px;}
.nl{font-size:13px;color:var(--muted);padding:7px 14px;border-radius:8px;cursor:pointer;transition:.2s;border:1px solid transparent;text-decoration:none;white-space:nowrap;}
.nl:hover,.nl.on{color:var(--cyan);background:var(--cyan2);border-color:var(--cyan3);}
.nav-right{display:flex;align-items:center;gap:10px;}
.theme-wrap{display:flex;align-items:center;gap:7px;cursor:pointer;padding:6px 12px;border-radius:8px;border:1px solid var(--border);transition:.2s;}
.theme-wrap:hover{border-color:var(--cyan3);}
.theme-icon{font-size:14px;}
.theme-lbl{font-size:11px;color:var(--muted);}
@media(max-width:960px){.nav-links{display:none;}.nav{padding:0 18px;}}
footer{background:var(--card);border-top:1px solid var(--border);padding:40px 60px 20px;margin-top:60px;}
.ft-grid{display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:32px;margin-bottom:28px;}
@media(max-width:900px){.ft-grid{grid-template-columns:1fr 1fr;}}
@media(max-width:540px){.ft-grid{grid-template-columns:1fr;}}
.ft-logo-row{display:flex;align-items:center;gap:11px;margin-bottom:12px;}
.ft-logo-row img{width:44px;height:44px;object-fit:contain;}
.ft-brand{font-family:'Cinzel',serif;font-size:16px;font-weight:700;color:var(--text);}
.ft-brand span{color:var(--cyan);}
.ft-tag{font-size:9px;color:rgba(0,200,232,.55);letter-spacing:.1em;margin-top:2px;}
.ft-desc{font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:12px;}
.ft-col-t{font-family:'Cinzel',serif;font-size:12px;color:var(--text);letter-spacing:.08em;margin-bottom:14px;font-weight:600;}
.ft-link{display:block;font-size:13px;color:var(--muted);cursor:pointer;margin-bottom:10px;text-decoration:none;transition:.2s;}
.ft-link:hover{color:var(--cyan);}
.ft-bot{display:flex;justify-content:space-between;padding-top:18px;border-top:1px solid var(--border);flex-wrap:wrap;gap:10px;}
.ft-copy{font-size:11px;color:var(--dim);}
</style>
</head>
<body id="body">
<nav>
  <a class="nav-logo" href="/">
    <img src="/logo-circle.png" alt="Indeed Qur'an">
    <div><div class="nav-brand">Indeed <span>Qur'an</span></div><div class="nav-tag">GUIDANCE FOR HUMANITY</div></div>
  </a>
  <div class="nav-links">
    <a class="nl <?= (strpos($_SERVER['REQUEST_URI'], '/listen') !== false) ? 'on' : '' ?>" href="/listen-quran/">Listen Quran</a>
    <a class="nl <?= (strpos($_SERVER['REQUEST_URI'], '/read') !== false) ? 'on' : '' ?>" href="/read-quran/">Read Quran</a>
    <a class="nl <?= (strpos($_SERVER['REQUEST_URI'], '/dhikr') !== false) ? 'on' : '' ?>" href="/dhikr/">Dhikr & Hadith</a>
    <a class="nl <?= (strpos($_SERVER['REQUEST_URI'], '/islamic-qa') !== false) ? 'on' : '' ?>" href="/islamic-qa/">Islamic Q&A</a>
  </div>
  <div class="nav-right">
    <div class="theme-wrap" onclick="toggleTheme()">
      <span class="theme-icon" id="themeIcon">🌙</span>
      <span class="theme-lbl" id="themeLbl">Dark</span>
    </div>
  </div>
</nav>
