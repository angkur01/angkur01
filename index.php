<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Personal Portfolio</title>

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">

<!-- CSS -->
<link rel="stylesheet" href="index.css">

</head>
<body>


<!-- HEADER -->
<header>
<div class="container">
<div class="logo">ME.</div>
</div>
</header>



<main>


<!-- HERO -->
<section id="hero" class="section-padding">

<div class="container">

<div class="hero-content reveal">

<p class="hero-role" id="hero-role">Loading...</p>

<h1 class="hero-title" id="hero-name">Loading...</h1>

<p class="hero-intro" id="hero-intro">Loading...</p>

<div class="hero-actions">

<a href="#" id="btn-hero-wa" class="btn btn-primary" target="_blank">
Chat on WhatsApp
</a>

<a href="#" id="btn-hero-tg" class="btn btn-outline" target="_blank">
Message on Telegram
</a>

</div>

</div>
</div>
</section>



<!-- ABOUT -->
<section id="about" class="section-padding">

<div class="container">

<div class="about-grid">

<div class="about-image-wrapper reveal">
<img id="about-img" src="" alt="">
</div>

<div class="about-content reveal">

<h2 class="section-title">About Me</h2>

<div class="about-text" id="about-text">
Loading...
</div>

</div>

</div>
</div>
</section>



<!-- ACTIONS -->
<section id="actions" class="section-padding">

<div class="container">

<div class="reveal">
<h2 class="section-title">Let's Connect</h2>
</div>

<div class="actions-grid" id="actions-container"></div>

</div>
</section>



<!-- CONTACT -->
<section id="contact" class="section-padding">

<div class="container reveal">

<h2 class="section-title">Get in Touch</h2>

<div class="contact-links">

<a href="#" id="contact-wa" class="contact-pill" target="_blank">
WhatsApp
</a>

<a href="#" id="contact-tg" class="contact-pill" target="_blank">
Telegram
</a>

<a href="#" id="contact-email" class="contact-pill">
<span id="email-text">Email</span>
</a>

</div>

</div>
</section>


</main>



<footer>

<div class="container">

<p>© <span id="year"></span></p>

<span class="admin-link" onclick="checkAdminHash()">Admin</span>

</div>

</footer>



<!-- ADMIN PANEL -->
<div id="admin-panel"></div>

<!-- LOGIN MODAL -->
<div id="login-modal"></div>



<!-- MAIN JS -->
<script src="index.js"></script>

</body>
</html>