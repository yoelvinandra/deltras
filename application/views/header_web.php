<?php
defined('BASEPATH') or exit('No direct script access allowed');

$CI = &get_instance();
$CI->load->database($_SESSION[NAMAPROGRAM]['CONFIG']);

?>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PSID FC - Official Website</title>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

<?php include("header_web_css.php"); ?>
</head>
<body>

<!-- NAVBAR -->
 <!-- HERO -->
<section class="header-social">
  <div class="header-social-strip">
    <span class="fira-sans-light-italic">For the fans</span>
    <span><a href="#"><img src="assets/images/youtube-white.png"></a></span>
    <span><a href="#"><img src="assets/images/instagram-white.png"></a></span>
    <span><a href="#"><img src="assets/images/tiktok-white.png"></a></span>
  </div>
</section>
<nav class="navbar">
  <div class="nav-wrap">
    <div class="hamburger" onclick="openDrawer()">
      <span></span><span></span><span></span>
    </div>
    <div class="nav-logo">
      <a href="#"><img src="assets/images/logo.png"></a>
    </div>
    <ul class="nav-links">
      <li><a href="#">NEWS</a></li>
      <li><a href="#">FIXTURE</a></li>
      <li class="has-dropdown">
          <a href="#">CLUB</a>
          <div class="dropdown">
              <div class="dropdown-menu">
                <p class="dropdown-title fira-sans-bold">CLUB</p>
                <ul>
                    <li><a href="">History</a></li>
                    <li><a href="">Team</a></li>
                </ul>
              </div>
              <div class="dropdown-address">
                  <span>Gelora Delta Stadium, Sidoarjo</span>
                  <span>contact@deltrasfc.com</span>
                  <span>‪+62 821‑4107‑1552‬</span>
              </div>
          </div>
      </li>
      <li class="has-dropdown">
          <a href="#">DELTAMANIA</a>
          <div class="dropdown">
              <div class="dropdown-menu">
                  <p class="dropdown-title fira-sans-bold">DELTAMANIA</p>
                  <ul>
                      <li><a href="">Membership</a></li>
                  </ul>
              </div>
              <div class="dropdown-address">
                  <span>Gelora Delta Stadium, Sidoarjo</span>
                  <span>contact@deltrasfc.com</span>
                  <span>‪+62 821‑4107‑1552‬</span>
              </div>
          </div>
      </li>
      <li class="has-dropdown">
          <a href="#">PARTNERS</a>
          <div class="dropdown">
              <div class="dropdown-menu">
                  <p class="dropdown-title fira-sans-bold">PARTNERS</p>
                  <ul>
                      <li><a href="#">KAPAL API</a></li>
                      <li><a href="#">AL HIJAZ</a></li>
                      <li><a href="#">RANS</a></li>
                      <li><a href="#">MITRA ORPHYS</a></li>
                      <li><a href="#">LEKAW</a></li>
                      <li><a href="#">CRYSTALIN</a></li>
                      <li><a href="#">BANDELL</a></li>
                  </ul>
              </div>
              <div class="dropdown-address">
                  <span>Gelora Delta Stadium, Sidoarjo</span>
                  <span>contact@deltrasfc.com</span>
                  <span>‪+62 821‑4107‑1552‬</span>
              </div>
          </div>
      </li>
      <li><div class="divider">|</div></li>
      <li class="has-dropdown">
          <a href="#">SHOP</a>
          <div class="dropdown">
              <div class="dropdown-menu">
                  <p class="dropdown-title fira-sans-bold">SHOP</p>
                  <ul>
                      <li><a href="">Website</a></li>
                      <li><a href="">Deltras Store</a></li>
                      <li><a href="">Shopee</a></li>
                      <li><a href="">Whatsapp</a></li>
                  </ul>
              </div>
              <div class="dropdown-address">
                  <span>Gelora Delta Stadium, Sidoarjo</span>
                  <span>contact@deltrasfc.com</span>
                  <span>‪+62 821‑4107‑1552‬</span>
              </div>
          </div>
      </li>
      <li><a href="#">TICKET</a></li>
      <li><a href="#"><img src="assets/images/cart.png"></a></li>
    </ul>
  </div>
</nav>

<!-- MOBILE DRAWER -->
<div class="mobile-overlay" id="drawer" onclick="closeDrawerOut(event)">
  <div class="mobile-drawer">
    <div class="mobile-drawer-border">
      <button class="mobile-close-btn" onclick="closeDrawer()">×</button>
    </div>
    <div class="mobile-menu mobile-drawer-border mobile-menu-height fira-sans-bold">
    <!-- ADA DI footer_web_js.php-->
    </div>
    <div class="mobile-drawer-address">
      <p>
          Gelora Delta Stadium, Sidoarjo<br>
          contact@deltrasfc.com<br>
          ‪+62 821‑4107‑1552‬
      </p>
    </div>
  </div>
</div>
