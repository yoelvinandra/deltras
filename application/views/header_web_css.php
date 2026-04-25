<!-- DATEPICKER -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">

<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Roboto', sans-serif; background: #fff; color: #222; font-size: 14px; }
a { text-decoration: none; color: inherit; }
img { display: block; max-width: 100%; }

@font-face {
  font-family: 'SlamDunk';
  src: url('assets/font/slamdunk/SlamDunk.ttf') format('truetype');
}

:root {
  --primary-color: #BB1111;
  --dp-primary:       #BB1111;
  --dp-primary-dark:  #8e0d0d;
  --dp-primary-hover: #EC3237;
  --dp-text:          #1a1a1a;
  --dp-text-muted:    #999;
  --dp-bg:            #ffffff;
  --dp-border:        #e0e0e0;
  --dp-range-bg:      #f9e0e0;
  --dp-today-bg:      #fff3f3;
  --dp-radius:        0px; /* Deltras pakai style kotak/tegas */
  --dp-shadow:        0 8px 32px rgba(0,0,0,0.18);
  --dp-font:          'Fira Sans', sans-serif;
}



/* ======= FONT ======= */
.fira-sans-thin {
  font-family: "Fira Sans", sans-serif;
  font-weight: 100;
  font-style: normal;
}

.fira-sans-extralight {
  font-family: "Fira Sans", sans-serif;
  font-weight: 200;
  font-style: normal;
}

.fira-sans-light {
  font-family: "Fira Sans", sans-serif;
  font-weight: 300;
  font-style: normal;
}

.fira-sans-regular {
  font-family: "Fira Sans", sans-serif;
  font-weight: 400;
  font-style: normal;
}

.fira-sans-medium {
  font-family: "Fira Sans", sans-serif;
  font-weight: 500;
  font-style: normal;
}

.fira-sans-semibold {
  font-family: "Fira Sans", sans-serif;
  font-weight: 600;
  font-style: normal;
}

.fira-sans-bold {
  font-family: "Fira Sans", sans-serif;
  font-weight: 700;
  font-style: normal;
}

.fira-sans-extrabold {
  font-family: "Fira Sans", sans-serif;
  font-weight: 800;
  font-style: normal;
}

.fira-sans-black {
  font-family: "Fira Sans", sans-serif;
  font-weight: 900;
  font-style: normal;
}

.fira-sans-thin-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 100;
  font-style: italic;
}

.fira-sans-extralight-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 200;
  font-style: italic;
}

.fira-sans-light-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 300;
  font-style: italic;
}

.fira-sans-regular-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 400;
  font-style: italic;
}

.fira-sans-medium-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 500;
  font-style: italic;
}

.fira-sans-semibold-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 600;
  font-style: italic;
}

.fira-sans-bold-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 700;
  font-style: italic;
}

.fira-sans-extrabold-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 800;
  font-style: italic;
}

.fira-sans-black-italic {
  font-family: "Fira Sans", sans-serif;
  font-weight: 900;
  font-style: italic;
}

/* ======= HEADER SOCIAL ======= */
.header-social {
  z-index:1;
  position: relative;
  width: 100%;
  height:50px;
  overflow: hidden;
  background: linear-gradient(
  to bottom,
  rgba(26,10,10,1) 10%,
  rgba(26,10,10,0.9) 80%,
  rgba(26,10,10,0.8) 100%
  );
}
.header-social-strip {
  margin: 0 auto;
  text-align:center;
  justify-content: right;
  width: 100%;
  max-width: 1140px;
  position: absolute;
  left: 50%;
  transform: translateX(-50%);
  padding: 16px 20px;
  display: flex;
  align-items: center;
  gap: 25px;
  font-size: 12px;
  color: rgba(255,255,255,1);
  letter-spacing: 0.5px;
}

/* ======= NAVBAR ======= */
.navbar {
  background:   var(--primary-color);
  height: 60px;
  display: flex;
  align-items: center;
  position: sticky;
  top: 0;
  z-index: 1000;
  box-shadow: 0 4px 6px rgba(0,2,2,0.4);
}
.nav-wrap {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 16px;
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.nav-logo {
  display: flex;
  align-items: center;
  gap: 8px;
}
.nav-logo img{
  height:50px;
}
/* mobile */
.nav-logo-shield {
  width: 32px;
  height: 32px;
  background: #fff;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Fira Sans', sans-serif;
  font-size: 10px;
  font-weight: 700;
  color:   var(--primary-color);
  line-height: 1;
  text-align: center;
}
.nav-logo-text {
  font-family: 'Fira Sans', sans-serif;
  font-size: 15px;
  font-weight: 600;
  color: #fff;
  letter-spacing: 1px;
}
.nav-links {
  display: flex;
  align-items: center;
  list-style: none;
  gap:30px;
}
.nav-links li a {
  font-family: 'Fira Sans', sans-serif;
  font-size: 16px;
  font-weight: bold;
  color: rgba(255,255,255,0.9);
  /* text-transform: uppercase; */
  letter-spacing: 0.5px;
  padding: 14px 11px;
  display: block;
  transition: background 0.15s;
}
.nav-links li .divider {
  font-family: 'Fira Sans', sans-serif;
  font-size: 16px;
  font-weight: bold;
  color: rgba(255,255,255,0.9);
  text-transform: uppercase;
  letter-spacing: 0.5px;
  padding: 14px 11px;
  display: block;
}
.nav-links li a img{
  height:30px;
}
.nav-links li a:hover { background: rgba(255,255,255,0.12); }
.hamburger {
  display: none;
  flex-direction: column;
  gap: 4px;
  cursor: pointer;
  padding: 6px;
}
.hamburger span {
  width: 22px; height: 2px;
  background: #fff;
  border-radius: 1px;
}

.has-dropdown {
  position: relative;
}

.dropdown {
  display: none;
  position: fixed; /* full width below navbar */
  top:60;
  left:10%;
  width: 90%;
  background: #fff;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  z-index: 999;
}

.dropdown-menu{
  padding: 36px 80px;
}

.has-dropdown.active .dropdown {
  display: block;
}

.dropdown-title {
  font-size: 20px;
  margin-bottom: 10px;
}

.dropdown ul {
  list-style: none;
  padding: 0;
  margin: 0;
}

.dropdown ul li {
  margin-bottom: 10px;
}

.dropdown ul li a {
  text-decoration: none;
  color: #333;
  font-size: 14px;
  font-weight:400;
  padding:0px;
  margin:0px;
  padding-top:10px;
  transition:    color 0.2s;
}

.dropdown ul li a:hover {
  color:var(--primary-color);
}

.dropdown-address{
  border-top:1px solid #cecece;
  padding-top:24px;
  padding-bottom:24px;
  padding-right:48px;
  display: flex;
  justify-content: right;
  align-items: center;
  gap:60px;
}

.dropdown-address a{
  color:#777777 !important;
  font-size:14px !important;
  font-weight:normal !important;
  letter-spacing:0px !important;
  padding:0px !important;
  transition:  color 0.2s !important;
} 

.dropdown-address a:hover{
  color:var(--primary-color) !important;
}

.login-div a{
  display:flex !important;
  justify-content: right;
  align-items: center;
  gap:6px;
}
.login-logo{
  height:20px;
}

/* LOGIN */
.page-bg {
  min-height: 88vh;
  background: var(--primary-color); /* merah */
}
.page-bg-cover{
  padding-left:32px;
  padding-right:32px;
  gap:32px;
  width: 100%;  min-height: 88vh;
  display: flex;
  align-items: top;
  justify-content: center;
  background: linear-gradient(
    to bottom,
    rgba(0,0,0,0.2) 0%,    /* atas - gelap */
    rgba(0,0,0,0) 30%,     /* tengah - transparan */
    rgba(0,0,0,0) 70%,     /* tengah - transparan */
    rgba(0,0,0,0.2) 100%   /* bawah - gelap */
  );
}
.form-card {
  background: #fff;
  padding: 54px 48px 61px;
  margin-top:60px;
  margin-bottom:60px;
  width: 100%;
  height:100%;
  max-width: 600px;
  box-shadow: 0 4px 6px rgba(0,2,2,0.4);
}
.member-card{
  margin-top:60px;
  margin-bottom:60px;
}
.member-card img{
  width:100%;
  box-shadow: 0 4px 6px rgba(0,2,2,0.4);
}
.form-title{
  font-size:40px; 
  padding-bottom:7px;
  text-align:center;
}
.form-subtitle{
  font-size:20px; 
  text-align:center;
}

.form-subtitle a{
  color: var(--primary-color);
  text-align:center;
}
.form-subtitle-detail{
  font-size:20px; 
  text-align:center;
}

.form-subtitle-detail a{
  color: var(--primary-color);
  text-align:center;
}
/* Tambahkan ini */
.field {
  margin-bottom: 16px;
  display: flex;
  flex-direction: column;  /* ← label di atas, input di bawah */
}

.field-label {
  font-size: 15px;
  color: #888;
  margin-bottom: 4px;
  display: block;  /* ← pastikan block, bukan inline */
}

.form-card input{
  width: 100%;
  border: 1px solid #ccc;
  padding: 10px 12px;
  font-size: 14px;
  display: block;  /* ← tambahkan ini */
}

.form-card input::placeholder{
  color:#ccc;
}

.form-card .wajib{
  color:#000;
}

.btn-form {
  width: 100%;
  background: var(--primary-color);
  color: #fff;
  border: none;
  padding: 13px;
  font-size: 24px;
  cursor:pointer;
  transition: background 0.4s ease;
}
.btn-form:hover {
  background: var(--dp-primary-hover);
}

.btn-logout {
  margin-top:16px;
  width: 100%;
  background: #fff;
  border:none;
  outline: 2px solid var(--primary-color);
  outline-offset: -2px; /* negatif = ke dalam */
  color:  var(--primary-color);
  padding: 13px;
  font-size: 24px;
  cursor:pointer;
  transition: background 0.4s ease;
}
.btn-logout:hover {
  background: #cecece;
}

.btn-changepassword {
  margin-bottom:16px;
  width: 100%;
  background: #fff;
  border:none;
  outline: 1.9px solid var(--primary-color);
  outline-offset: -1.9px; /* negatif = ke dalam */
  color:  var(--primary-color);
  padding: 13px;
  font-size: 16px;
  cursor:pointer;
  transition: background 0.4s ease;
  display:flex;
  justify-content:center;
  align-items:center;
}
.btn-changepassword:hover {
  background: #cecece;
}

.form-card-bottom{
  color:#7B7B7B;
  font-size:16px;
  text-align:center;
  cursor:pointer;
  display:flex;
  justify-content:space-between;
  align-items:center;
}

.form-card-bottom .bottom-login-bar {
  width:28%;
  height:1px;
  background:#d4d4d4;
}

.form-card-bottom .bottom-forgotpassword-bar {
  width:22%;
  height:1px;
  background:#d4d4d4;
}

/* ======= SLIDER ======== */
.slider-section {
  background: #111;
  position: relative;
  width: 100%;
  overflow: hidden;
  border-radius: 0;
  text-align: center;
}

/* Wrapper to maintain height */
.slider-wrapper {
  position: relative;
  width: 100%;
}

.slide {
  display: block;
  position: absolute;
  inset: 0;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.6s ease;
}

.slide.active {
  opacity: 1;
  pointer-events: auto;
  position: relative; /* active slide drives the height */
}

.slide img {
  display: block;
  width: 100%;
  max-height: 90vh;
  object-fit: cover;
}
/* grain overlay */
.slide::before {
  content: '';
  position: absolute;
  inset: 0;
  opacity: 0.18;
  pointer-events: none;
  mix-blend-mode: overlay;
}
/* ── Nav Arrows ── */
.slider-nav {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  background:none;
  width:100px;
  z-index: 10;
  border: none;
  color: #fff;
  font-size: 6rem;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: color 0.2s;
  user-select: none;
}
.slider-nav:hover { color: rgba(255,255,255,0.3); }
.slider-nav.prev { left: 7%; }
.slider-nav.next { right: 7%; }
/* ── Segmented Progress Bar ── */
.slider-dots {
  position: absolute;
  bottom: 0;
  margin-bottom:2%;
  display: flex;
  z-index: 10;
  width: 50%;
  left: 50% ;
  transform: translateX(-50%);
}
.dot {
  flex: 1;
  height: 5px;
  border-radius: 0;
  background: #3B3B3B;
  cursor: pointer;
  transition: background 0.25s;
  border: none;
  outline: none;
  clip-path: polygon(4px 0%, 100% 0%, calc(100% - 4px) 100%, 0% 100%);
}
.dot.active {
  background:var(--primary-color);
}

/* ======= TEAM PHOTO STRIP ======= */
.team-all-section {
  margin:auto;
  max-width: 1140px;
  margin-top:30px;
  margin-bottom:100px;
}
.team-all-card {
  background: var(--primary-color);
  overflow: hidden;
  box-shadow: 0 4px 4px rgba(0,0,0,0.4);
  transition: box-shadow 0.4s ease;
}

.team-all-card:hover {
  box-shadow: 0 6px 8px rgba(0,0,0,0.4);
  cursor:pointer;
}

.team-all-card:hover .team-all-image-bg {
  transform: scale(1.1);
}

.team-all-image{
  position: relative;
  width: 100%;
  aspect-ratio:4/3;
  max-height:668px;
  overflow: hidden; /* penting untuk zoom */
}
.team-all-title {
  font-size: 32px;
  color: #000;
  text-transform: uppercase;
  position: relative;
}
.team-all-image-bg {
  position: absolute;
  inset: 0;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  transition: transform 0.4s ease;
}

.team-all-image-bg-cover {
  position: absolute; /* 🔥 ini kunci */
  inset: 0;
  background: linear-gradient(
  to bottom,
  rgba(255,255,255,0) 0%,
  rgba(0,0,0,0.0) 80%,
  rgba(0,0,0,0.95) 100%
  );
}
/* ======= SECTION UTILITY ======= */
.section-wrap {
  max-width: 1140px;
  margin: 0 auto;
  padding: 0 16px;
}
.section-wrap-mini {
  max-width: 900px;
  margin: 0 auto;
  padding: 0 16px;
}
.section-wrap-footer {
  max-width: 1280px;
  margin: 0 auto;
  padding: 0 16px;
}
.section-head {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 14px 0 10px;
  border-bottom: 2px solid   var(--primary-color);
  margin-bottom: 16px;
}
.section-head h2 {
  font-family: 'Fira Sans', sans-serif;
  font-size: 15px;
  font-weight: 600;
  text-transform: uppercase;
  letter-spacing: 1px;
  color: #111;
}
.section-head .all-link {
  font-family: 'Roboto', sans-serif;
  font-size: 11px;
  color:   var(--primary-color);
  border: 1px solid   var(--primary-color);
  padding: 3px 10px;
  border-radius: 2px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.section-head .all-link:hover { background:   var(--primary-color); color: #fff; }

/* ======= SENIOR SQUAD ======= */
.red-line{
  width: 85px;
  height:6px;
  margin-bottom:10px;
  margin-left:46px;
  background: var( --primary-color);
}
.squad-section {
  width: 100%;
  max-width: 1280px;
  margin: 0 auto;
  padding: 0px 24px 40px;
}
/* ── Header ── */
.squad-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 46px;
  padding-left: 46px;
  opacity:1;
}
.squad-header-mobile{
  opacity:0;
  padding-left: 30px;
  padding-right: 30px;
  display:none;
}
.squad-title {
  font-size: 32px;
  color: #000;
  text-transform: uppercase;
  position: relative;
}
.all-player-link {
  font-size: 20px;
  color: var(--primary-color);
  display: inline-flex;
  align-items: center;
  gap: 8px;
  position: relative; /* needed for ::after */

  text-decoration: underline;
  text-decoration-thickness: 1px;
  text-underline-offset: 4px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
}

.all-player-link:hover {
  text-decoration-color: var(--primary-color);
}

/* ── Slider ── */
.slider-outer {
  display: flex;
  align-items: center;
  gap: 10px;
}
.slider-viewport {
  overflow: hidden;
  flex: 1;
  min-width: 0;
}
.slider-track {
  display: flex;
  gap: 48px;
  transition: transform 0.45s cubic-bezier(0.25, 0.46, 0.45, 0.94);
  will-change: transform;
}
/* ── Player Card ── */
.player-card {
  /* width set by JS */
  flex-shrink: 0;
  background: var(--primary-color);
  border:1px #D4D4D4 solid;
  overflow: hidden;
  cursor: pointer;
  transition: transform 0.4s ease, box-shadow 0.4s ease;
}
.player-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 28px rgba(0,0,0,0.15);
}
/* Photo */
.card-photo {
  position: relative;
  width: 100%;
  background: #e2e2e2;
  overflow: hidden;
  height:294px;
}
.card-photo img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center top;
  display: block;
}
.card-number {
  position: absolute;
  top: 12px;
  right: 16px;
  font-family: 'SlamDunk', sans-serif;
  font-size: 80px;
  font-weight: 700;
  color: var( --primary-color);
  line-height: 1;
  z-index: 2;
  user-select: none;
}
/* Info bar */
.card-info {
  background: var( --primary-color);
  padding: 10px 24px 4px;
}
.player-name {
  font-size: 20px;
  color: #fff;
  text-transform: uppercase;
}
.player-position {
  font-size: 16px;
  color: #fff;
  margin-top: 2px;
}
/* Stats */
.card-stats {
  background: var( --primary-color);
  color: #fff;
  padding: 0px 24px 8px;
}
.stat-row {
  display: flex;
  justify-content: space-between;
  padding: 4px 0;
  border-bottom: 1px solid #f0f0f0;
  font-size: 14px;
}
.stat-row:last-child:not(:only-child)
 { border-bottom: none; }

/* Arrows */
.arrow-btn {
  width: 36px; height: 36px;
  border-radius: 50%;
  background: var( --primary-color);
  border-color: transparent;
  color: #fff;
  font-size: 48px;
  cursor: pointer;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
  transition: all 0.2s;
  padding: 0;
}

.arrow-btn:disabled { 
  cursor: default;
  background: #DDDDDD;
  color: #fff; 
}

.arrow-btn img{
  width:15px;
  color:#fff !important;
}

.grey-strip {
  margin:0 auto;
  max-width: 1520px;
  width:100%;
  border-top: 1px solid #d4d4d4;
  height:0px;
}

.grey-area {
  height: 70px;
  width: 100%;
  background: #f0f0f0;
}

.black-strip {
  margin:0 auto;
  width:100%;
  border-top: 1px solid #000;
  height:0px;
}
  
/* ======= HIGHLIGHT + NEXT MATCH SECTION ======= */
#main-video-title{
  text-transform:uppercase;
}
#secondary-video-title{
  text-transform:uppercase;
}
#optional-video-title{
  text-transform:uppercase;
}
  /* MAIN WRAPPER */
.highlight-section {
  max-width: 1520px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 2fr;
  gap: 48px;
}
.highlight-section-secondary {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 36px;
}
.red-title{
  background:  var(--primary-color);
  padding:2px 10px 4px;
  color:white;
  font-size:20px;
  display: inline-block;
  margin-top:60px;
  margin-bottom:40px;
}

.all-results-link {
  font-size: 14px;
  color: #fff;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  position: relative; /* needed for ::after */

  text-decoration: underline;
  text-decoration-thickness: 0.5px;
  text-underline-offset: 2px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
}

.all-results-link:hover {
  text-decoration-color: #fff;
}
/* SECTION TITLE */
.section-title {
  font-size: 26px;
}
.section-title-with-link {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 12px;
}
.view-link {
  color: #c41e3a;
  font-size: 10px;
  font-weight: bold;
  text-decoration: none;
}
/* HIGHLIGHT CARD */

.left-col {
  grid-column: 1;
}
.right-col {
  grid-column: 2;
  grid-row: 1;
}
.full-width {
  grid-column: 1 / -1;
}
.videos-grid {
  grid-template-columns: repeat(2, 1fr);
}

.highlight-card {
  background: var(--primary-color);
  overflow: hidden;
  box-shadow: 0 4px 4px rgba(0,0,0,0.4);
  transition: box-shadow 0.4s ease;
}

.highlight-card:hover {
  box-shadow: 0 6px 8px rgba(0,0,0,0.4);
  cursor:pointer;
}

.highlight-title {
  font-size: 36px;
  text-decoration: underline;
  text-decoration-thickness: 1px;
  text-underline-offset: 4px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
}

.highlight-title-sub {
  font-size: 20px;
  text-decoration: underline;
  text-decoration-thickness: 1px;
  text-underline-offset: 4px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
}

.highlight-caption {
  margin-top:6px;
  font-size: 16px;
  text-decoration: underline;
  text-underline-offset: 4px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
}

.highlight-card:hover .highlight-image-bg {
  transform: scale(1.1);
}
.highlight-card:hover .highlight-title {
  text-decoration-color: #fff;
}
.highlight-card:hover .highlight-title-sub {
  text-decoration-color: #fff;
}
.highlight-card:hover .highlight-caption {
  text-decoration-color: #fff;
}

.highlight-image{
  position: relative;
  width: 100%;
  height: 315px;
  overflow: hidden; /* penting untuk zoom */
}

.highlight-section-secondary .highlight-image {
  height: 266px;
}

.highlight-image-bg {
  position: absolute;
  inset: 0;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  transition: transform 0.4s ease;
}

.highlight-image-bg-cover {
  position: absolute; /* 🔥 ini kunci */
  inset: 0;
  background: linear-gradient(
  to bottom,
  rgba(255,255,255,0) 0%,
  rgba(0,0,0,0.0) 80%,
  rgba(0,0,0,0.95) 100%
  );
}

.play-icon {
  position: absolute;
  bottom: 30px;
  left: 30px;
  width: 65px;
  height: 65px;
  background: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: transform 0.4s ease;
}
.play-icon::after {
  content: '';
  width: 0;
  height: 0;
  border-left: 20px solid #696969;
  border-top: 12px solid transparent;
  border-bottom: 12px solid transparent;
  margin-left: 3px;
}
.play-icon:hover{
  transform: scale(1.2);

}
.deltras-icon {
  position: absolute;
  top: 30px;
  right: 23px;
  width: 80px;
  height: 80px;
}
.highlight-section .video-icon {
  position: absolute;
  top: 110px;
  right: 30px;
  width: 65px;
  height: 65px;
}

.highlight-section-secondary .video-icon {
  position: absolute;
  top: 30px;
  right: 30px;
  width: 65px;
  height: 65px;
}
.highlight-red-section {
  background: var(--primary-color);
  color: white;
  padding: 24px 30px;
}
.highlight-section-secondary{
  margin-left:0px;
  margin-right:0px;
}
.highlight-section-secondary .highlight-red-section {
  background: var(--primary-color);
  color: white;
  padding: 16px 20px;
}
.red-badge {
  color:black;
  font-size:24px;
}
.highlight-meta {
  margin-top:120px;
  font-size: 18px;
  display: flex;
  justify-content: space-between;
}
.meta-time {
}
/* MATCH STATS */
.match-stats {
  background: white;
  padding: 15px;
  border-radius: 3px;
  margin-bottom: 15px;
}
.score-row {
  display: grid;
  grid-template-columns: 1fr auto 1fr;
  align-items: center;
  gap: 15px;
  text-align: center;
  margin-bottom: 15px;
  padding-bottom: 15px;
  border-bottom: 1px solid #e0e0e0;
}
.team-col {
  display: flex;
  flex-direction: column;
  gap: 8px;
}
.team-icon {
  width: 48px;
  height: 48px;
  background: #f0f0f0;
  border-radius: 50%;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: center;
  font-weight: bold;
  font-size: 12px;
  color: #c41e3a;
}
.team-name {
  font-size: 11px;
  font-weight: 600;
}
.score {
  font-size: 28px;
  font-weight: bold;
  color: #c41e3a;
  margin-bottom: 3px;
}
.score-label {
  font-size: 9px;
  color: #999;
  text-transform: uppercase;
}
.stats-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 10px;
}
.stat {
  text-align: center;
  padding: 8px;
}
.stat-label {
  font-size: 14px;
  color: #fff;
  margin-bottom: 4px;
}
.stat-value {
  font-size: 14px;
}
/* PREVIOUS MATCHES */
.prev-matches {
  background: white;
  border-radius: 3px;
  overflow: hidden;
  margin-bottom: 15px;
  margin-left:0px;
  margin-right:0px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.4);
}
.prev-header {
  background: var(--primary-color);
  color: white;
  padding: 6px 28px;
  text-transform: uppercase;
  display: flex;
  justify-content: space-between;
}
.prev-title{
  font-size: 20px;
}
.prev-item {
  padding: 10.5px 28px;
}
.prev-item:last-child {
  border-bottom: none;
}
.prev-info {
}
.prev-info-detail {
  margin:18px 0px 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  gap:14px;
}
.prev-team-1{
  display: flex;
  align-items: center;
  justify-content: flex-end;
  text-align:right;
  gap:14px;
  font-size:14px;
  flex: 1;
  text-transform: uppercase;
}
.prev-team-1 img{
  height:20px;
}
.prev-team-2{
  display: flex;
  align-items: center;
  justify-content: flex-start;  
  text-align:left;
  gap:14px;
  flex: 1;
  font-size:14px;
  text-transform: uppercase;
}
.prev-team-2 img{
  height:20px;
}
.prev-team-score{
  background:var(--primary-color);
  color:white;
  border-radius:9px;
  padding:4px 16px;
  font-size:18px;
}
.prev-comp {
  font-size: 12px;
  margin-top: 3px;
}
.prev-championship {
  font-size: 16px;
}
/* NEXT MATCH SIDEBAR */
.next-matches {
  background: white;
  border-radius: 3px;
  overflow: hidden;
  margin-top: 132px;
}
.next-header {
  padding: 4px 0px;
  text-transform: uppercase;
  display: flex;
  justify-content: space-between;
}
.next-title{
  font-size: 26px;
  color:#BFBFBF;
}
.upcoming{
  color:black;
}
.all-fixtures-link {
  font-size: 20px;
  color: var(--primary-color);
  display: inline-flex;
  align-items: center;
  gap: 8px;
  position: relative; /* needed for ::after */

  text-decoration: underline;
  text-decoration-thickness: 0.5px;
  text-underline-offset: 2px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
}

.all-fixtures-link:hover {
  text-decoration-color: var(--primary-color);
}
.next-item {
  align-items: center;
  padding: 10px 0px;
}
.next-item:last-child {
  border-bottom: none;
}
.next-info {
}
.next-info-detail{
  margin:18px 0px 6px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap:14px;
}
.next-info-detail-sub{
  display: flex;
  align-items: center;
  justify-content: center;
  gap:14px;
  width:100%;
}
.next-team-1{
  display: flex;
  align-items: center;
  justify-content: flex-end;
  text-align:right;
  gap:14px;
  font-size:24px;
  flex: 1;
  text-transform: uppercase;
}
.next-team-1 img{
  height:28px;
}
.next-team-2{
  display: flex;
  align-items: center;
  justify-content: flex-start;  
  text-align:left;
  gap:14px;
  flex: 1;
  font-size:24px;
  text-transform: uppercase;
}
.next-team-2 img{
  height:28px;
}
.next-team-time{
  background:#eee;
  padding:5px 7px;
  font-size:16px;
  text-align:center;
}
.timezone{
  font-size:11px;
}
.next-comp {
  font-size: 14px;
  margin-top: 3px;
  display:flex;
}
.next-comp img{
  height:14px;
}
.next-championship {
  font-size: 16px;
}
.next-ticket{
  text-align:center;
  align-items: center;
  justify-content: center;
}
.next-ticket-detail{
  display:flex;
  gap:4px;
  text-align:center;
  align-items: center;
  justify-content: center;
  width:200px;

}
.btn-buynow {
  width: 100%;
  background: var(--primary-color);
  color: white;
  border: none;
  padding: 8px 18px;
  border-radius : 4px;
  font-size: 16px;
  cursor: pointer;
  text-align:center;
  transition: background-color 0.4s ease;
}

.btn-buynow:hover{
  background: #EC3237;
}
/* VIDEO SECTION */
.video-title {
  font-size: 11px;
  font-weight: bold;
  text-transform: uppercase;
  margin-top: 20px;
  margin-bottom: 12px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  letter-spacing: 1px;
}
.videos-grid {
  display: grid;
  grid-template-columns: 1fr;
  gap: 12px;
  margin-bottom: 20px;
}
.video-card {
  background: white;
  border-radius: 3px;
  overflow: hidden;
}
.video-thumb {
  position: relative;
  width: 100%;
  background: #000;
  aspect-ratio: 16/9;
}
.video-thumb img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
.video-play {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 55px;
  height: 55px;
  background: rgba(196, 30, 58, 0.85);
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  border: 2px solid white;
}
.video-play::after {
  content: '';
  width: 0;
  height: 0;
  border-left: 16px solid white;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  margin-left: 3px;
}
.video-info {
  padding: 10px;
  background: white;
}
.video-name {
  font-size: 12px;
  font-weight: 600;
  line-height: 1.3;
  margin-bottom: 5px;
}
.video-time {
  font-size: 10px;
  color: #999;
}

/* ======= STANDINGS + NEWS ======= */
.standing-news-section{
  background:var(--primary-color);
  padding-top: 60px;
  padding-bottom: 60px;
}
.standing-news-wrapper {
  max-width: 1520px;
  margin: 0 auto;
  display: grid;
  grid-template-columns: 1fr 1.5fr;
  gap: 80px;
} 
/* ===== STANDINGS SECTION ===== */
.standings-title {
  font-size: 26px;
  color: #fff;
  background:var(--primary-color);
  padding: 12px 0px;
  text-transform: uppercase;
} 
.standings-table-data{
  padding: 40px 16px 16px 16px;
  background: #fff;
  box-shadow: 0 4px 4px rgba(0,0,0,0.4);
}
.standings-table {
  width: 100%;
  border-collapse: collapse;
  background: #fff;
  padding: 20px;
} 
.table-header {
  background:var(--primary-color);
  color: #fff;
} 
.table-header th {
  padding: 10px 12px;
  font-size: 16px;
  text-align:left;
}

.standings-table tbody tr {
  transition: background-color 0.2s ease;
  text-align:center;
} 
.standings-table tbody tr:hover {
  background-color: #f9f9f9;
} 
.standings-table tbody tr.highlight {
  background-color: var(--primary-color);
  padding: 10px 12px;
  color: #fff;
} 
.standings-table tbody tr.highlight td {
  color: #fff;
} 
.standings-table td {
  padding: 10px 12px;
  font-size: 14px;
} 
.text-left{
  text-align:left;
}
.border-top {
  border-top: 1px solid black;
}
.border-bottom {
  border-bottom: 1px solid black;
}
/* ===== NEWS SECTION ===== */
.news-list-section {
  display: flex;
  flex-direction: column;
} 
.news-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
  padding: 12px 0px;
} 
.news-title {
  font-size: 26px;
  text-transform: uppercase;
} 
.all-news-link {
  color: #fff;
  font-size: 20px;
  text-transform: uppercase;  
  
  text-decoration: underline;
  text-decoration-thickness: 0.5px;
  text-underline-offset: 2px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
} 
.all-news-link:hover {
  text-decoration-color: #fff;
} 
.news-grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 24px 48px;
} 
.news-card {
  overflow: hidden;
  background:transparent;
  transition: background-color   0.4s ease;
  display: flex;
  flex-direction: column;
  border-bottom:1px solid #D4D4D4;
} 
.news-card:hover {
  background:#a20505;
  cursor:pointer;
} 

.news-card:hover .news-image-bg {
  transform: scale(1.1);
}
.news-card:hover .news-title-text {
  text-decoration-color: #fff;
}

.news-image {
  width: 100%;
  height: 200px;
  overflow: hidden;
  position: relative;
} 
.news-image-bg {
  position: absolute;
  inset: 0;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  transition: transform 0.4s ease;
} 
.news-content {
  padding: 12px 0px;
} 
.news-category {
  font-size: 20px;
  color: #fff;
  display: inline-block;
  text-transform: uppercase;
} 
.news-title-text {
  font-size: 18px;
  color: #fff;
  height:80px;
  text-decoration: underline;
  text-underline-offset: 4px;

  text-decoration-color: transparent;
  transition: text-decoration-color 0.4s ease;
} 
.news-date {
  font-size: 16px;
  color: #fff;
}

/* ======= SPONSOR BAR ======= */
.sponsor-footer {
  background: #fff;
  padding: 20px 0;
}

.sponsor-footer .section-wrap{
  padding: 60px 0;
}

.sponsor-footer-inner {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  column-gap:80px; /* horizontal gap only */
  row-gap: 1rem;     /* no vertical gap */
}
.sp-logo {
  display: flex;
  align-items: center;
}
.sp-logo img{
  width: 120px;
}

/* ======= FOOTER ======= */
.site-footer {
  background: #fff;
  color:#303030;
  padding-bottom: 10px;
  text-align: center;
  font-size: 14px;
}

.footer-top img {
  width:120px;
}

.footer-top {
  display: flex;
  align-items: center; /* sejajar vertikal dengan ul */
  justify-content: space-between;
  padding: 0.6rem 3.5rem;
  margin-top: 12px;
}

.footer-bottom {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-top:20px;
  margin-bottom:12px;
}

.footer-bottom p {
  color: #333;
  margin: 0;
}

.footer-bottom ul {
  list-style: none;
  display: flex;
  gap: 2.5rem;
}

.footer-mobile{
  display:none;
}
.footer-web{
  display:inline;
}

/* FIXTURE MENU */
.fixture-section .next-matches{
  margin-top:60px; 
}
.fixture-title{
  margin:30px auto 25px;
  width: 100%;
  max-width: 1280px;
}

.fixture-title div {
  font-size: 64px;
  color:var(--primary-color);
}
/* ── TAB HEADER ── */
.tab-header {
  border-bottom: 1px solid var(--primary-color);
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  
}
.tab-header ul {
  margin:auto;
  width: 100%;
  max-width: 1280px;
  list-style: none;
  display: flex;
  align-items: center;
  gap: 0;
}
.tab-header ul li {
  position: relative;
}
.tab-header ul li:not(:last-child)::after {
  content: '|';
  color:  var(--primary-color);
  font-size:20px;
  position: relative;
  padding: 0px 16px;
  border-bottom: 12px solid transparent;
}
.tab-header ul li a {
  display: inline-block;
  padding: 0 0 12px;
  text-decoration: none;
  color: #1a1a1a;
  font-size:20px;
  border-bottom: 12px solid transparent;
}
.tab-header ul li a.active {
  border-bottom: 12px solid var(--primary-color);
}
.tab-header ul li a:hover:not(.active) {
}
.tab-child {
  margin:auto;
  width: 100%;
  max-width: 1280px;
}
/* ── TAB CONTENT ── */
.tab-child > div {
  display: none;
}
.tab-child > div.active {
  display: block;
}
.fixture-section .upcoming{
  color: var(--primary-color);
}
.fixture-section .upcoming-match{
  color:#000;
}

.fixture-section .prev-header{
  background:none;
  color: var(--primary-color);
  margin:0px;
  padding: 14px 0px;
}

.fixture-section .prev-title{
  font-size:22px;
}

.fixture-section .prev-matches {
  box-shadow:none;
  background:none;
}

.fixture-section .prev-item {
  padding: 14px 0px;
  display:flex;
  justify-content:space-between;
}

.fixture-section .prev-info{
  width:28%;
}

.fixture-section .prev-info-detail {
  margin:0px;
  width:70%;
  gap:24px;
}

.fixture-section .prev-team-1{
  font-size:20px;
  gap:24px;
}
.fixture-section .prev-team-1 img{
  height:37px;
}
.fixture-section .prev-team-2{
  font-size:20px;
  gap:24px;
}
.fixture-section .prev-team-2 img{
  height:37px;
}

.fixture-section .prev-status-win{
  border-radius:100px;
  background:var(--primary-color);
  border:1px solid var(--primary-color);
  color:white;
  font-size:15px;
  width:23px;
  height:23px;
  text-align:center;
  padding-top:2px;
  align-items: center;
  justify-content: center;
  margin:auto;
}

.fixture-section .prev-status-draw{
  border-radius:100px;
  background:white;
  border:1px solid var(--primary-color);
  color:var(--primary-color);
  font-size:15px;
  width:23px;
  height:23px;
  text-align:center;
  padding-top:2px;
  align-items: center;
  justify-content: center;
  margin:auto;
}

.fixture-section .prev-status-lose{
  border-radius:100px;
  background:black;
  border:1px solid black;
  color:white;
  font-size:15px;
  width:23px;
  height:23px;
  text-align:center;
  padding-top:2px;
  align-items: center;
  justify-content: center;
  margin:auto;
}

.filter{
  display: flex;
  justify-content: flex-end;
}

.filter-wrapper {
  display: flex;
  align-items: center;
  gap: 12px;
  margin:30px 0px 0px; 
  border-radius: 8px;
}
.filter-label {
  font-size: 14px;
}
/* The custom dropdown container */
.custom-select {
  position: relative;
  min-width: 120px;
}
/* The visible "button" part */
.select-selected {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 8px;
  padding: 8px 12px;
  border: 1.5px solid #ccc;
  border-radius: 6px;
  cursor: pointer;
  font-size: 16px;
  color: #333;
  background: #fff;
  user-select: none;
  transition: border-color 0.2s;
}
.select-selected:hover {
  border-color: #999;
}

/* Dropdown list */
.select-items {
  position: absolute;
  top: calc(100% + 4px);
  right: 0;
  background: #fff;
  border: 1px solid #E0E0E0;
  border-radius: 10px;
  overflow: hidden;
  z-index: 100;
  display: none;
}
.custom-select.open .select-items {
  display: block;
}
/* Each option */
.select-item {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 8px 12px;
  font-size: 16px;
  cursor: pointer;
  color: #333;
  margin:2px;
  transition: background 0.15s;
}
.select-item:hover {
  border-radius: 10px;
  background:#ffd3d3;
  color:#000;
  margin:2px;
}
/* Active / selected state — red background */
.select-item.active {
  margin:2px;
  border-radius: 10px;
  background: var(--primary-color);
  color: #fff;
}

.select-item span{
  padding-left:12px;
}

.prev-status-mini{
  display:none;
}

/* TEAM */
.team-title{
  margin:30px auto 25px;
  width: 100%;
  max-width: 1280px;
}

.team-title div {
  font-size: 64px;
  color:var(--primary-color);
}

.team-section .player-title{
  margin-top:100px;
  margin-bottom:10px;
  font-size:45px;
  color:var(--primary-color);
}

.team-section .player-detail{
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  padding-top:20px;
}

.team-section .player-name{
  font-size:28px;
}
.team-section .card-photo{
  height:285px;
}
.team-section .card-info {
  display:flex;
  flex-direction:column;
  justify-content:space-between;
  height:155px;
  padding: 20px;
}

.team-section .player-position {
  font-size: 20px;
  color: #fff;
}

/* HISTORY */
.about-deltras{
  max-width:1214px;
  width:100%;
  margin:auto;
  display:flex;
  padding-top:87px;
  padding-bottom:45px;
  padding-left:32px;
  padding-right:32px;
}

.about-deltras .about-deltras-image{
  width:600px;
}

.about-deltras .about-deltras-detail{
  background:var(--primary-color);
}

.about-deltras .about-deltras-detail img{
  height:160px;
  margin: 50px auto 0px;
}

.about-deltras .about-deltras-title{
  margin:45px 62px 0px;
  font-size:30px;
}

.about-deltras .about-deltras-text{
  margin:0px 62px 0px;
  font-size:16px;
  color:#fff;
}

.about-deltras-video{
  max-width:1214px;
  width:100%;
  margin:auto;
  padding-top:25px;
  padding-bottom:45px;
  padding-left:32px;
  padding-right:32px;
}

.about-deltras-video .about-deltras-video-title{
  color:var(--primary-color);
  font-size:40px;
  padding-bottom:45px;
}

.history-card {
  background: var(--primary-color);
  overflow: hidden;
  box-shadow: 0 4px 4px rgba(0,0,0,0.4);
  transition: box-shadow 0.4s ease;
}

.history-card:hover {
  box-shadow: 0 6px 8px rgba(0,0,0,0.4);
  cursor:pointer;
}

.history-card:hover .history-image-bg {
  transform: scale(1.1);
}

.history-image{
  position: relative;
  width: 100%;
  aspect-ratio:4/3;
  max-height:668px;
  overflow: hidden; /* penting untuk zoom */
}

.history-image-bg {
  position: absolute;
  inset: 0;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  transition: transform 0.4s ease;
}

.history-image-bg-cover {
  position: absolute; /* 🔥 ini kunci */
  inset: 0;
  background: linear-gradient(
  to bottom,
  rgba(255,255,255,0) 0%,
  rgba(0,0,0,0.0) 80%,
  rgba(0,0,0,0.95) 100%
  );
}


.play-icon {
  position: absolute;
  bottom: 30px;
  left: 30px;
  width: 65px;
  height: 65px;
  background: white;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: transform 0.4s ease;
}
.play-icon::after {
  content: '';
  width: 0;
  height: 0;
  border-left: 20px solid #696969;
  border-top: 12px solid transparent;
  border-bottom: 12px solid transparent;
  margin-left: 3px;
}
.play-icon:hover{
  transform: scale(1.2);

}
.deltras-icon {
  position: absolute;
  top: 30px;
  right: 23px;
  width: 80px;
  height: 80px;
}
.history-section .video-icon {
  position: absolute;
  top: 110px;
  right: 30px;
  width: 65px;
  height: 65px;
}

.about-deltras-old{
  max-width:1214px;
  width:100%;
  margin:auto;
  padding:0px 32px;
}

.about-deltras-old .about-deltras-old-wrapper{
  width:600px;
}

.about-deltras-old .about-deltras-old-subtitle{
  font-size:30px;
}

.about-deltras-old .about-deltras-old-detail{
  font-size:16px;
  padding-bottom:40px;
}

.about-deltras-old .about-deltras-old-image img{
  width:100%;
  height:100%;
  max-height:300px;
  object-fit: cover;
  object-position: center;
  padding-bottom:40px;
}

.vision-mission{
  background:#000;
}

.vision-mission .vision-mission-wrapper{
  max-width:1150px;
  width:100%;
  margin:auto;
  background:var(--primary-color);
  padding:251px 100px;
}

.vision-mission img{
  margin:auto;
  height:280px;
  margin-bottom:73px;
}

.vision-mission .vision-mission-title{
  font-size:48px;
  color:#fff;
}

.vision-mission .vision-mission-subtitle{
  font-size:18px;
  color:#000;
}

.vision-mission .vision-mission-subtitle ol{
  padding-left:24px;
}

.about-deltras-new{
  max-width:1214px;
  width:100%;
  margin:auto;
  padding:0px 32px;
}

.about-deltras-new .about-deltras-new-wrapper{
  margin:110px 0px;
}

.about-deltras-new .about-deltras-new-header{
  background:var(--primary-color);
  color:white;
  font-size:20px;
  padding: 3px 11px;
  display: inline-block;   
}

.about-deltras-new .about-deltras-new-title{
  font-size:32px;
  color:var(--primary-color);
  margin-top:34px;
  margin-bottom:19px;
}

.about-deltras-new .about-deltras-new-subtitle{
  font-size:24px;
  margin-bottom:34px;
}

.about-deltras-new .about-deltras-new-date{
  font-size:24px;
  margin-bottom:30px;
}

.about-deltras-new .about-deltras-new-detail{
  font-size:20px;
  padding-bottom:54px;
}

/* NEWS */
/* ═══════════════════════════════
   TOPBAR
═══════════════════════════════ */

.news-list-section{
  margin: auto ;
  width: 100%;
  max-width: 1280px;
}

.news-list-section .topbar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-top:36px;
  padding-bottom:17px;
}

/* Filter */
.news-list-section .filter-wrap { position: relative; }

.news-list-section .filter-btn {
  background: none;
  border: none;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 5px;
  font-family: inherit;
  font-size:16px;
  color: #000;
  padding: 0;
  user-select: none;
}
.news-list-section .filter-btn .caret {
  display: inline-flex;
  transition: transform 0.2s;
}
.news-list-section .filter-btn.open .caret { transform: rotate(180deg); }

/* Dropdown */
.news-list-section .filter-dropdown {
  position: absolute;
  top: calc(100% + 8px);
  left: 0;
  background: #fff;
  border: 1px solid #ccc;
  box-shadow: 0 3px 10px rgba(0,0,0,.12);
  min-width: 180px;
  z-index: 100;
  display: none;
}
.news-list-section .filter-dropdown.open { display: block; }
.news-list-section .filter-dropdown a {
  display: block;
  padding: 9px 14px;
  font-weight: 600;
  min-width: 160px;
  letter-spacing: 0.06em;
  text-transform: uppercase;
  color: #000;
  text-decoration: none;
  transition: background .15s;
}
.news-list-section .filter-dropdown a:hover { background: #f4f4f4; }
.news-list-section .filter-dropdown a.active { color: var(--red); }

/* Search */
.news-list-section .search-area {
  display: flex;
  align-items: center;
  gap: 10px;
}
.news-list-section .search-label {
  font-size:16px;
  color: #000;
}
.news-list-section .search-box {
  position: relative;
  display: flex;
  align-items: center;
}
.news-list-section .search-box input {
  width: 285px;
  border: 1px solid #D9D9D9;
  outline: none;
  padding:8px 36px 8px 6px;
  border-radius: 6px;
  background: #fff;
}
.news-list-section .search-box input:focus { border-color: #888; }
.news-list-section .search-box .ico-search {
  position: absolute;
  right: 8px;
  top: 50%;
  transform: translateY(-50%);
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  color: #333;
}

/* ═══════════════════════════════
   PAGE TITLE
═══════════════════════════════ */
.news-list-section .page-title-wrap {
}
.news-list-section .page-title {
  font-size: 36px;
  color: #000;
}

/* ═══════════════════════════════
   NEWS GRID  (3-col desktop)
═══════════════════════════════ */
.news-list-section .news-grid {
  margin-top:25px;
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 25px;
}

/* Each column card */
.news-list-section .news-card {
  display: block;
  text-decoration: none;
  color: inherit;
}
.news-list-section .news-card:last-child,
.news-list-section .news-card:nth-child(3),
.news-list-section .news-card:nth-child(6) { padding-right: 0; }

.news-list-section .news-card:hover .card-thumb img { transform: scale(1.04);  }

.news-list-section .news-card:hover{
  background:#f4f4f4;
}

.news-list-section .news-detail{
  height:78px;
  display:flex;
  flex-direction:column;
  justify-content:space-between;
}

/* Thumb */
.news-list-section .card-thumb {
  width: 100%;
  /* screenshot ratio ≈ 270w × 163h */
  height: 200px;
  overflow: hidden;
  background: #ccc;
  position: relative;
}
.news-list-section .card-thumb img {
  width: 100%; height: 100%;
  object-fit: cover;
  display: block;
  transition: transform .4s ease;
}
/* Meta */
.news-list-section .card-meta { height:120px; padding-top:12px; }

.news-list-section .card-cat {
  font-size:20px;
  color: #000;
}
.news-list-section .card-ttl {
  font-size: 18px;
  color: #000;
  text-decoration:underline;
  text-underline-offset: 4px;
  text-decoration-color:transparent;
  transition: text-decoration-color 0.4s ease;
}
.news-list-section .card-ttl:hover {
  text-decoration-color:black;
}
.news-list-section .card-dt {
  font-size: 11px;
  color: #6B6B6B;
  line-height: 1;
}

/* ═══════════════════════════════
   PAGINATION
═══════════════════════════════ */
.news-list-section .pager {
  display: flex;
  align-items: right;
  justify-content: right;
  padding: 67px 30px 58px 10px;
  gap: 1px;
}
.news-list-section .pg {
  display: inline-flex;
  align-items: center;
  justify-content: right;
  font-size: 20px;
  color: #8B8B8B;
  background: none;
  border: none;
  cursor: pointer;
  font-family: inherit;
  padding: 0 15px;
  transition: color .4s;
  text-decoration: none;
  font-weight:400;
}
.news-list-section .pg:hover {color:var(--primary-color); }
.news-list-section .pg.active { color:var(--primary-color); font-weight: 700; font-size:26px; }
.news-list-section .pg-left.pg.arr { background:url('assets/images/page-left-disabled.png'); background-repeat: no-repeat; }
.news-list-section .pg-left.pg.arr.on { background:url('assets/images/page-left.png'); background-repeat: no-repeat }
.news-list-section .pg-right.pg.arr { background:url('assets/images/page-right-disabled.png'); background-repeat: no-repeat }
.news-list-section .pg-right.pg.arr.on { background:url('assets/images/page-right.png'); background-repeat: no-repeat }
.news-list-section .pg.arr:disabled { color: #ccc; cursor: default; }
.news-list-section .pg.dots { cursor: default; color: #888; letter-spacing: 1px; }

/* ── divider ── */
.news-list-section .bot-divider {
  border: none;
  border-top: 1px solid #d0d0d0;
  margin: 0 24px 0;
}

/* Desktop: mobile header hidden */
.news-list-section .mobile-hdr { display: none; }

/* NEWS DETAIL */
.news-detail {
  max-width: 860px;
  margin: 0 auto;
  background: #ffffff;
}
/* ─── NEWS label ─── */
.news-detail .news-tag {
  font-size: 20px;
  color:#000;
  padding:59px 32px 0px;
}
/* ─── Headline ─── */
.news-detail .headline {
  font-size: 44px;
  color: #000;
  padding: 10px 32px 42px;
}
/* ─── Hero image ─── */
.news-detail .hero-placeholder {
  width: 100%;
  position: relative;
  overflow: hidden;
}

.news-detail .hero-placeholder img {
  width: 100%;
}

/* ─── Author / meta bar ─── */
.news-detail .meta-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 51px 32px 30px;
}
.news-detail .author-wrap {
  display: flex;
  align-items: center;
  gap: 14px;
}
.news-detail .grey-strip{
  width:100%;
  max-width:796px;
}
.news-detail .avatar {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #cc2222;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}
.news-detail .author-name {
  font-size: 20px;
  color: #0B0B0B;
  padding-bottom:3px;
}
.news-detail .author-date {
  font-size: 18px;
  color: #6B6B6B;
}
/* ─── Share ─── */
.news-detail .share-wrap {
  display: flex;
  align-items: center;
  gap: 10px;
}
.news-detail .share-text {
  font-size: 20px;
  color: #0B0B0B;
}
.news-detail .share-icons {
  display: flex;
  gap: 10px;
}
.news-detail .share-btn {
  width: 42px;
  height: 42px;
  border-radius: 50%;
  border: 1px solid #000000;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  background: #fff;
  transition: border-color 0.15s;
  text-decoration: none;
}
.news-detail .share-btn:hover { border-color: #888; }
.news-detail .share-btn img {
  width: 18px;
  height: 18px;
}
/* ─── Article text ─── */
.news-detail .article {
  padding: 34px 32px 32px;
}
.news-detail .article p {
  font-size: 20px;
  color: #000;
  padding-bottom: 32px;
}
.news-detail .article p:last-child { margin-bottom: 0; }
/* ─── Bottom divider + next ─── */

.news-detail .next-row {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  padding: 44px 32px 4px;
  gap: 8px;
  text-decoration: none;
  cursor: pointer;
}
.news-detail .next-label {
  font-size: 20px;
  color: #8B8B8B;
}

.news-detail .next-title {
  margin-left: auto; /* ← tambahkan ini */
  text-align: right;
  font-size: 16px;
  color: #000;
  padding: 11px 32px 40px;
  max-width:390px;
}

/* MEMBERSHIP */
.membership {
  max-width: 860px;
  margin: 0 auto;
  background: #ffffff;
}
/* ─── Headline ─── */
.membership .headline {
  font-size: 44px;
  color: #000;
  padding: 96px 32px 42px;
}
/* ─── Hero image ─── */
.membership .hero-placeholder {
  width: 100%;
  position: relative;
  overflow: hidden;
}

.membership .hero-placeholder img {
  max-height:354px;
  margin:auto;
}

.membership .btn-daftar {
  display: inline-block;
  background-color: var(--primary-color);
  color: white;
  padding: 8px 34px;
  font-size: 16px;
  text-decoration: none;
  border-radius : 4px;
  transition: background-color 0.4s ease;
}

.membership .btn-daftar:hover {
  /* background: #aa0000; */
  background-color: #EC3237;
}

.membership .btn-terdaftar {
  display: inline-block;
  background-color: #cecece;
  color: white;
  padding: 8px 34px;
  font-size: 16px;
  text-decoration: none;
  border-radius : 4px;
  cursor:default;
}

/* ─── Author / meta bar ─── */
.membership .meta-bar {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 22px 40px;
  border:1px solid #CECECE;
  margin-left: 32px;
  margin-right:32px;
  margin-top:80px;
  margin-bottom:80px;
  box-shadow:0 2px 2px rgba(0,0,0,0.1);
}
.membership .author-wrap {
  display: flex;
  align-items: center;
  gap: 14px;
}
.membership .author-name {
  font-size: 24px;
  color: #0B0B0B;
  padding-bottom:3px;
}
.membership .author-detail {
  font-size: 14px;
  color: #6B6B6B;
}
/* ─── Article text ─── */
.membership .article {
  padding: 0px 32px 0px;
  font-size: 16px;
}
.membership .contact {
  padding: 0px 32px 80px;
  font-size: 16px;
}

.membership .contact a{
  color:#000;
  transition:    color 0.2s;
}

.membership .contact a:hover{
  color:var(--primary-color);
}

.all-deltras-member{
  padding-left:32px;
  padding-right:32px;
  padding-bottom:80px;
}
.all-deltras-member img{
  width:100%;
  max-width:860px;
}

.membership .grey-strip{
  padding-left:32px;
  padding-right:32px;
  max-width:calc(100% - 64px);
}
/* REGISTER */
.check-register{
  display:flex;
  gap:10px;
  align-items: flex-start;
  padding-top:20px;
  font-size:14px;
}

.check-register input{
  margin-top:2.5px;
  width: 14px; 
  height: 14px; 
  flex-shrink: 0;
}

.check-register span{
  color:#000;
  text-align:justify;
}

/* ── Wrapper utama ── */
.datepicker {
  font-family:   var(--dp-font);
  font-size:     14px;
  color:         var(--dp-text);
  background:    var(--dp-bg);
  border:        1px solid var(--dp-border);
  box-shadow:    var(--dp-shadow);
  padding:       12px;
  z-index:       9999 !important;
}
 
.datepicker-inline {
  border-top: 3px solid var(--dp-primary);
  width:      100%;
}
 
/* ── Table global ── */
.datepicker table {
  width:           100%;
  border-collapse: collapse;
  margin:          0;
}
 
/* ── Header navigasi (bulan/tahun + panah) ── */
.datepicker thead tr:first-child th {
  background:    var(--dp-primary);
  color:         #fff;
  font-size:     13px;
  font-weight:   700;
  text-transform: uppercase;
  letter-spacing: 1.5px;
  padding:       10px 8px;
  cursor:        pointer;
  transition:    background 0.2s;
  border:        none;
}
 
.datepicker thead tr:first-child th:hover {
  background: var(--dp-primary-dark);
}
 
/* Panah prev/next */
.datepicker .prev,
.datepicker .next {
  font-size:  18px;
  padding:    10px 14px;
  font-weight: 700;
  color:       #fff;
  border-radius:0px;
  background:  var(--dp-primary);
  transition:  background 0.2s, transform 0.2s;
}
 
.datepicker .prev:hover,
.datepicker .next:hover {
  background:  var(--dp-primary-hover);
  transform:   scaleX(1.15);
  color:#fff;
}
 
/* Title bulan/tahun di tengah */
.datepicker .datepicker-switch {
  font-weight:    800;
  letter-spacing: 0.5px;
  border-radius:0px;
  background:     var(--dp-primary);
  color:          #fff;
  transition:  background 0.2s;
}
 
.datepicker .datepicker-switch:hover {
  background: var(--dp-primary-hover);
  color:#fff;
}
 
/* ── Hari dalam seminggu (Mon, Tue, dst) ── */
.datepicker thead tr:last-child th,
.datepicker .dow {
  background:     #f5f5f5;
  color:          #555;
  font-size:      11px;
  font-weight:    700;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  padding:        7px 4px;
  border:         none;
  border-bottom:  2px solid var(--dp-border);
}
 
/* ── Sel tanggal ── */
.datepicker table tr td {
  border:     none;
  padding:    0;
  text-align: center;
}
 
.datepicker table tr td.day {
  width:         34px;
  height:        34px;
  line-height:   34px;
  font-size:     13px;
  font-weight:   500;
  color:         var(--dp-text);
  cursor:        pointer;
  transition:    background 0.15s, color 0.15s, transform 0.15s;
}
 
.datepicker table tr td.day:hover {
  background: var(--dp-range-bg);
  color:      var(--dp-primary);
  transform:  scale(1.1);
  font-weight: 700;
}
 
/* Tanggal bulan lalu / depan */
.datepicker table tr td.old,
.datepicker table tr td.new {
  color:       var(--dp-text-muted);
  font-weight: 400;
}
 
.datepicker table tr td.old:hover,
.datepicker table tr td.new:hover {
  color:      #aaa;
  background: #fafafa;
}
 
/* Hari ini */
.datepicker table tr td.today {
  background:  var(--dp-today-bg);
  color:       var(--dp-primary);
  font-weight: 800;
  position:    relative;
}
 
.datepicker table tr td.today::after {
  content:       '';
  position:      absolute;
  bottom:        4px;
  left:          50%;
  transform:     translateX(-50%);
  width:         4px;
  height:        4px;
  background:    var(--dp-primary);
}
 
/* Tanggal dipilih / aktif */
.datepicker table tr td.active,
.datepicker table tr td.active:hover,
.datepicker table tr td.selected,
.datepicker table tr td.selected:hover {
  background:    var(--dp-primary) !important;
  color:         #fff !important;
  font-weight:   800;
  transform:     scale(1.08);
  box-shadow:    0 2px 8px rgba(187,17,17,0.4);
}
 
/* Tanggal disabled */
.datepicker table tr td.disabled,
.datepicker table tr td.disabled:hover {
  color:         #ccc;
  background:    transparent;
  cursor:        not-allowed;
  text-decoration: line-through;
  transform:     none;
}
 
/* Range selection */
.datepicker table tr td.range {
  background:  var(--dp-range-bg);
}
 
.datepicker table tr td.range-start {
  background:    var(--dp-primary) !important;
  color:         #fff !important;
}
 
.datepicker table tr td.range-end {
  background:    var(--dp-primary) !important;
  color:         #fff !important;
}
 
.datepicker table tr td.highlighted {
  background: #fde8e8;
  color:      var(--dp-primary-dark);
  font-weight: 600;
}
 
.datepicker table tr td.focused {
  background: var(--dp-range-bg);
}
 
/* ── Span bulan / tahun / dekade ── */
.datepicker table tr td span {
  display:       inline-block;
  width:         54px;
  height:        38px;
  line-height:   38px;
  font-size:     12px;
  font-weight:   600;
  text-transform: uppercase;
  color:         var(--dp-text);
  cursor:        pointer;
  margin:        2px;
  transition:    background 0.15s, color 0.15s, transform 0.15s;
}
 
.datepicker table tr td span:hover {
  background:  var(--dp-range-bg);
  color:       var(--dp-primary);
  transform:   scale(1.06);
}
 
.datepicker table tr td span.active,
.datepicker table tr td span.active:hover {
  background:  var(--dp-primary) !important;
  color:       #fff !important;
  font-weight: 800;
  box-shadow:  0 2px 8px rgba(187,17,17,0.35);
}
 
.datepicker table tr td span.old,
.datepicker table tr td span.new {
  color: var(--dp-text-muted);
}
 
.datepicker table tr td span.disabled,
.datepicker table tr td span.disabled:hover {
  color:      #ccc;
  background: transparent;
  cursor:     not-allowed;
  transform:  none;
}
 
.datepicker table tr td span.focused {
  background: var(--dp-range-bg);
}
 
/* ── Footer (Today / Clear button) ── */
.datepicker tfoot tr th {
  padding:        8px;
  text-align:     center;
  border-top:     1px solid var(--dp-border);
  font-size:      12px;
  font-weight:    700;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  color:          var(--dp-primary);
  cursor:         pointer;
  transition:     background 0.15s, color 0.15s;
}
 
.datepicker tfoot tr th:hover {
  background: var(--dp-primary);
  color:      #fff;
}
 
.datepicker .today {
  font-weight: 700;
  color:       var(--dp-primary);
}
 
.datepicker .clear {
  color: #888;
}
 
.datepicker .clear:hover {
  color: #fff;
  background: #555;
}
 
/* ── Input field yang trigger datepicker ── */
input.datepicker-input,
input[data-provide="datepicker"],
.datepicker-trigger {
  font-family:     var(--dp-font);
  font-size:       14px;
  color:           var(--dp-text);
  background:      #fff;
  border:          1px solid #ccc;
  padding:         10px 36px 10px 12px;
  width:           100%;
  outline:         none;
  transition:      border-color 0.2s, box-shadow 0.2s;
  background-image:    url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%23BB1111' stroke-width='2'%3E%3Crect x='3' y='4' width='18' height='18' rx='2'/%3E%3Cline x1='16' y1='2' x2='16' y2='6'/%3E%3Cline x1='8' y1='2' x2='8' y2='6'/%3E%3Cline x1='3' y1='10' x2='21' y2='10'/%3E%3C/svg%3E");
  background-repeat:   no-repeat;
  background-position: right 10px center;
}
 
input.datepicker-input:focus,
input[data-provide="datepicker"]:focus {
  border-color: var(--dp-primary);
  box-shadow:   0 0 0 2px rgba(187,17,17,0.15);
}
 
/* ── Animasi masuk ── */

.datepicker.dropdown-menu {
  position: absolute !important;
  top: auto !important;
  left: auto !important;
  width: auto !important;
  min-width: 260px !important;
  transform: none !important;
}

@keyframes dpFadeIn {
  from {
    opacity:   0;
    transform: translateY(-6px);
  }
  to {
    opacity:   1;
    transform: translateY(0);
  }
}

@media (max-width: 1600px) {
   .slide-content {
      position: absolute;
      bottom: 120px;
      right: 10%;
      text-align: right;
      color: white;
      max-width: 600px;
      padding-left:10%;
    }
    .highlight-section{
      padding:0px 32px;
    }
    .standing-news-section{
      padding-left:32px;
      padding-right:32px;
    }
    .section-wrap-footer {
      padding-left:32px;
      padding-right:32px;
    }
      /* FIXTURES */
    .fixture-title{
      padding-left: 32px;
      padding-right: 32px;
    }

    .tab-header ul, .tab-child{
      padding-left: 32px;
      padding-right: 32px;
    }
    
    .fixture-section .prev-info{
      width:100%;
    }
    .fixture-section .prev-item {
      padding: 14px 0px;
      display:flex;
      flex-direction: column;
      justify-content:space-between;
    }
    .fixture-section .prev-info-detail {
      margin:10px 0px 0px;
      width:100%;
      gap:24px;
    }
    .prev-status-mini{
      display:block;
    }

    .prev-status-web{
      display:none;
    }
      /* TEAM */
    .team-title{
      padding-left: 32px;
      padding-right: 32px;
    }

    .news-list-section{
      padding-left: 32px;
      padding-right: 32px;
    }
}

@media (max-width: 1200px){
  .team-all-section {
    padding-left:32px;
    padding-right:32px;
  }
}

/* ======= MOBILE ======= */
@media (max-width: 1050px) {
    .slider-nav {
      font-size: 4rem;
    }
    .slider-nav.prev { left: 3%; }
    .slider-nav.next { right: 3%; }

    .nav-logo {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    align-items: center;
    gap: 8px;
    }
    .nav-links { display: none; }
    .hamburger { display: flex; }

    .squad-section { padding: 0px 0px 32px; }
    .red-line{display:none;}
    .squad-header{opacity:0; display:none;}
    .squad-header-mobile{display:inline-block; opacity:1; margin-top:28px;margin-bottom:24px;}
    .squad-title { font-size: 24px;}
    .arrow-btn { display:none;}
    .slider-track {
    gap: 60px;
    padding-left:120px;
    } 

    .grey-strip{
    width:calc(100vw - 72px);
    }

    .highlight-section{
    display:flex;
    flex-direction: column;
    padding:0px 32px;
    margin:auto;
    }

    .red-title{
    margin-bottom:8px;
    }

    .section-title{
    margin-bottom:8px;
    font-size:36px;
    }

    .highlight-meta{
    margin-top:60px;
    }

    .next-matches{
    margin-top: 0px;
    }

    .highlight-section-primary {
    margin:0px 40px;
    }
    .highlight-section-secondary {
    display: inline;
    margin-left:40px;
    margin-right:40px;
    }
    .highlight-section-secondary .highlight-card{
    margin-bottom:32px;
    margin-left:40px;
    margin-right:40px;
    }

    .prev-matches{
    margin-left:40px;
    margin-right:40px;
    margin-bottom:0px;
    }

    .next-info-detail{
    display: inline;
    }

    .next-ticket{
    margin-top:10px;
    text-align:center;
    margin-bottom:14px;
    }

    .next-info-detail-sub{
    margin-top:10px;
    }

    .next-ticket-detail{
    margin:auto;
    text-align:center;
    }

    .next-ticket-unready{
    color:#9C9C9C;
    font-size:14pt;
    font-weight:800;
    }

    .standing-news-section{
      background:var(--primary-color);
      padding: 40px 32px 40px 32px;
    }
    .standing-news-wrapper {
      display: flex;
      flex-direction:column;
      gap: 40px;
    } 
    .news-image {
      height: 315px;
    }
    /* ===== STANDINGS SECTION ===== */
    
    .standings-table-data{
      padding: 30px 8px 8px 8px;
    }
    .table-header th {
      font-size: 12px;
    }
    .standings-table{
      padding: 20px;
    }
    .standings-table td {
      font-size: 12px;
    } 
    .news-grid {
      display: flex;
      flex-direction:column;
    } 

    .bottom-grid { grid-template-columns: 1fr; }

    .sponsor-footer-inner { 
    display: grid;
    grid-template-columns: 1fr 1fr;
    column-gap:10px; /* horizontal gap only */
    row-gap: 60px;     /* no vertical gap */
    }

    .slide-content {
    position: absolute;
    bottom: 120px;
    right: 10%;
    text-align: right;
    color: white;
    max-width: 520px;
    padding-left:10%;
    }
    
    .sp-logo{
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .footer-top {
    display: flex;
    justify-content: center;
    padding: 20px;
    }

    .footer-top img {
      height: 100px;
      width: auto;
    }

    .footer-bottom {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 15px;
      padding: 20px;
    }

    .footer-bottom ul {
      display: flex;
      list-style: none;
      gap: 30px;
      margin: 0;
      padding: 0;
    }

    .footer-bottom ul li a {
      text-decoration: none;
      color: #333;
      font-size: 14px;
    }

    .footer-bottom p {
      margin: 0;
      color: #666;
    }

    .footer-mobile{
      padding-top:24px;
      display:inline;
    }

    .footer-web{
      display:none;
    }

      /* FIXTURES */
    .fixture-title{
      padding-left: 32px;
      padding-right: 32px;
    }

    .tab-header ul, .tab-child{
      padding-left: 32px;
      padding-right: 32px;
    }

    .fixture-section .prev-matches{
      margin-left:0px;
      margin-right:0px;
    }

    /* TEAM */
    .team-title{
      padding-left: 32px;
      padding-right: 32px;
    }

    .team-section .player-detail{
      grid-template-columns: repeat(3, 1fr);
    }

    .about-deltras{
      display:flex;
      flex-direction:column;
    }
    
    .about-deltras .about-deltras-image{
      width:100%;
    }

    .about-deltras .about-deltras-text{
      margin-bottom:40px;
    }

    .about-deltras-old .about-deltras-old-wrapper{
      width:100%;
    }

      /* NEWS */
    /* Topbar stacks vertically */
    .news-list-section .topbar {
        flex-direction: column;
        align-items: flex-start;
        padding: 60px 0px 24px 0px;
        gap: 0;
      }
    .news-list-section  .filter-btn { font-size: 16px; }

      /* Search block below filter */
    .news-list-section  .search-area {
        align-items: center;
        width: 100%;
        margin-top: 44px;
        gap: 8px;
      }
    .mobile-hidden{
      display:none;
    }
    .news-list-section  .search-label { font-size: 18px;  }
    .news-list-section  .search-box { width: 100%; }
    .news-list-section  .search-box input {
      width: 100%;
      height: 35px;
      font-size: 13px;
      border-radius: 0px;
    }

    /* Hide desktop title */
    .news-list-section .page-title-wrap { display: none; }

    /* Mobile section header */
    .news-list-section .mobile-hdr {
      display: flex !important;
      align-items: baseline;
      justify-content: space-between;
      padding: 0px;
    }
    .news-list-section .mobile-hdr .mh-t {
      font-size: 36px;
      color: #000;
    }
    .news-list-section  .mobile-hdr .mh-a {
      font-size: 24px;
      color: #000;
      text-decoration: none;
    }

    /* 1-column grid */
    .news-list-section .news-grid {
      grid-template-columns: 1fr;
      padding: 0;
    }

    .news-list-section .news-card {
      padding-right: 0 !important;
      padding-bottom: 22px;
    }

    /* Taller image on mobile */
    .news-list-section .card-thumb {
      aspect-ratio: 16 / 10;
    }

    .news-list-section .card-cat  { font-size: 24px; }
    .news-list-section .card-ttl  { font-size: 20px }

    .news-list-section .pager {
      align-items: right;
      justify-content: center;
      gap:2px;
      width:100%;
      height:90px;
      padding: 30px 16px 30px 16px;
    }

    .news-list-section .pg {    
      justify-content: center;
      padding: 0 3%;
      font-size: 14px;
    }
    
    .news-list-section .pg.active { font-size:16px; }
    
    .news-list-section .news-grid {
      margin-top:12px;
    }

    .news-list-section{
      padding-left: 32px;
      padding-right: 32px;
    }

    .news-list-section .card-thumb {
      height:502px;
    }

    .news-list-section .news-detail{
      height:90px;
    }

    .news-list-section .card-dt {
      font-size: 16px;
      color: #000;
    }

    /* NEWS-DETAIL */
    .news-detail .hero-placeholder img {
      padding:0px 32px;
    }

    .news-detail .grey-strip{
      padding:0px 32px;
      max-width:calc(100% - 64px);
    }

     /* MEMBERSHIP */
    .membership .hero-placeholder img {
      padding:0px 32px;
    }
}

@media (max-width: 768px) {
   .team-section .player-detail{
      grid-template-columns: repeat(2, 1fr);
  }

  .news-list-section .pager {
      height:calc(90px-20%);
  }

  .news-list-section .pg-left.pg.arr { background-size:80%; }
  .news-list-section .pg-left.pg.arr.on { background-size:80%; }
  .news-list-section .pg-right.pg.arr { background-size:80%; }
  .news-list-section .pg-right.pg.arr.on { background-size:80%;}

  .membership .meta-bar {
    display: block;
    text-align:center;
    margin-left: 15%;
    margin-right:15%;
    margin-top:30px;
    margin-bottom:44px;
  }
  
  .membership .author-wrap {
    display: block;
    align-items: center;
    padding-bottom:12px;
  }
  .membership .author-name {
    padding-bottom:3px;
  }
  .form-card {
    box-shadow: none;
    max-width: 100%;
    margin-top:-30px;
  }

  .form-page .page-bg-cover{
    background:#fff;
    flex-direction:column;
  }
  .member-card{
    margin-bottom:0px;
  }
}

@media (max-width: 520px) {
    .slider-nav.prev { left: -15px; }
    .slider-nav.next { right: -15px; }
    .highlight-section-primary {
      margin:0px;
    }

    .slider-track {
      gap: 32px;
      padding-left:64px;
    } 


    .prev-header {
      padding: 6px 16px;
    }

    .prev-item {
      padding: 10.5px 16px;
    }

    .team-all-section {
      padding-left:16px;
      padding-right:16px;
    }

    .highlight-section{
      padding:0px 16px;
    }

    .prev-matches{
      margin-left:0px;
      margin-right:0px;
    }

    .next-team-1{
      font-size:12pt;
      gap:10px;
    }

    .next-team-2{
      font-size:12pt;
      gap:10px;
    }

    .highlight-section-secondary .highlight-card{
      margin-left:0px;
      margin-right:0px;
    }

    .table-header th {
      padding: 6px 8px;
      font-size: 10px;
    }
    .standings-table{
      padding: 0px;
    }
    .standings-table td {
      padding: 6px 8px;
      font-size: 10px;
    } 
    .grey-strip{
      width:calc(100vw - 32px);
    }
    .standing-news-section{
      background:var(--primary-color);
      padding-left: 16px;
      padding-right: 16px;
    }
    .section-wrap-footer {
      padding-left:0px;
      padding-right:0px;
    }
    
    /* FIXTURES */
    .fixture-title{
      padding-left: 16px;
      padding-right: 16px;
      font-size:20px;
    }
    
    .fixture-title div {
      font-size:50px;
    }

    .tab-header ul, .tab-child{
      padding-left: 16px;
      padding-right: 16px;
    }
    .fixture-section .prev-info-detail {
      margin:10px 0px 0px;
      width:100%;
      gap:10px;
    }
    .fixture-section .prev-team-1{
      font-size:16px;
      gap:10px;
    }
    .fixture-section .prev-team-1 img{
      height:30px;
    }
    .fixture-section .prev-team-2{
      font-size:16px;
      gap:10px;
    }
    .fixture-section .prev-team-2 img{
      height:30px;
    }

    .tab-header ul li:not(:last-child)::after {
      font-size:16px;
      padding: 0px 10px;
      border-bottom: 6px solid transparent;
    }
    .tab-header ul li a {
      font-size:16px;
      padding: 0px 0px 6px;
      border-bottom: 6px solid transparent;
    }

    .tab-header ul li a.active {
      border-bottom: 6px solid var(--primary-color);
    }

    /* TEAM */
    .team-title{
      padding-left: 16px;
      padding-right: 16px;
    }

    .team-title div {
      font-size:50px;
    }

    .team-section .player-detail{
      grid-template-columns: repeat(1, 1fr);
    }
    
    .about-deltras .about-deltras-detail img{
      height:100px;
    }
    .about-deltras .about-deltras-title{
      margin-left: 32px;
      margin-right: 32px;
    }

    .about-deltras .about-deltras-text{
      margin-left: 32px;
      margin-right: 32px;
    }

    .about-deltras-old .about-deltras-old-title{
      font-size:24px;
      padding-bottom:12px;
    }
    
    .about-deltras-old .about-deltras-old-subtitle{
      font-size:36px;
      padding-bottom:12px;
    }

    .vision-mission .vision-mission-wrapper{
      padding:16px 16px;
    }
    
    .about-deltras-video{
      padding-left:16px;
      padding-right:16px;
    }
    .vision-mission img{
      margin:auto;
      height:150px;
      margin-bottom:32px;
    }

    .about-deltras {
      padding-left: 16px;
      padding-right: 16px;
    }
   .about-deltras .about-deltras-title{
      margin-left: 16px;
      margin-right: 16px;
    }

    .about-deltras .about-deltras-text{
      margin-left: 16px;
      margin-right: 16px;
    }

    .about-deltras-old{
      padding:0px 16px;
    }
    .about-deltras-new{
      padding:0px 16px;
    }
    .about-deltras-new .about-deltras-new-wrapper{
      margin:64px 0px;
    }

    .about-deltras-new .about-deltras-new-header{
      font-size:14px;
    }

    .about-deltras-new .about-deltras-new-subtitle{
      font-size:20px  ;
      margin-bottom:16px;
    }

    .about-deltras-new .about-deltras-new-date{
      font-size:20px;
      margin-bottom:16px;
    }

    .about-deltras-new .about-deltras-new-detail{
      font-size:14px;
    }

    /* NEWS */
    .news-list-section{
      padding-left: 16px;
      padding-right: 16px;
    }

    .news-list-section .card-thumb {
      height:300px;
    }

    .news-list-section .pager {
      height:calc(80px);
      padding-left:32px;
      padding-right:32px;
    }

    .news-list-section .pg {    
      justify-content: center;
      padding: 0 3%;
      font-size: 12px;
    }
    
    .news-list-section .pg.active { font-size:14px; }
    

    .news-list-section .pg-left.pg.arr { background-size:100%; }
    .news-list-section .pg-left.pg.arr.on { background-size:100%; }
    .news-list-section .pg-right.pg.arr { background-size:100%; }
    .news-list-section .pg-right.pg.arr.on { background-size:100%;}

    /* NEWS-DETAIL */
    .news-detail .hero-placeholder img {
      padding:0px 16px;
    }

    .news-detail .grey-strip{
      padding:0px 16px;
      max-width:calc(100% - 32px);
    }

     /* ─── NEWS label ─── */
    .news-detail .news-tag {
      font-size: 20px;
      padding-left:16px;
      padding-right:16px;
    }
    /* ─── Headline ─── */
    .news-detail .headline {
      font-size: 30px;
      padding-left:16px;
      padding-right:16px;
    }
    /* ─── Hero image ─── */
    .news-detail .hero-placeholder {
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    /* ─── Author / meta bar ─── */
    .news-detail .meta-bar {
      padding-left:16px;
      padding-right:16px;
    }
    .news-detail .author-wrap {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .news-detail .avatar {
      width: 40px;
      height: 40px;
    }
    .news-detail .author-name {
      font-size: 16px;
      padding-bottom:3px;
    }
    .news-detail .author-date {
      font-size: 14px;
    }
    /* ─── Share ─── */
    .news-detail .share-wrap {
      width:35%;
      margin-left:10px;
      display:flex-end;
      justify-content:flex-end;
    }
    .news-detail .share-text {
      display:none;
    }
    .news-detail .share-icons {
      gap: 0px;
    }
    .news-detail .share-btn {
      border:0px;
    }
    .news-detail .share-btn:hover { border-color: #888; }
    .news-detail .share-btn img {
      width: 22px;
      height: 22px;
    }
    /* ─── Article text ─── */
    .news-detail .article {
      padding-left:16px;
      padding-right:16px;
    }
    .news-detail .article p {
      font-size: 16px;
      padding-bottom: 16px;
    }
    .news-detail .article p:last-child { margin-bottom: 0; }
    /* ─── Bottom divider + next ─── */

    .news-detail .next-row {
      font-size: 16px;
      padding-bottom: 0px;
      padding-left:16px;
      padding-right:16px;
    }
    .news-detail .next-label {
      font-size: 16px;
    }

    .news-detail .next-title {
      font-size: 14px;
      padding-top: 0px;
      padding-bottom: 16px;
      padding-left:16px;
      padding-right:16px;
      width:70%;
    }

    	 /* MEMBERSHIP */
    .membership .hero-placeholder img {
      padding:0px 16px;
    }

    /* ─── Headline ─── */
    .membership .headline {
      font-size: 30px;
      padding-left:16px;
      padding-right:16px;
    }
    /* ─── Hero image ─── */
    .membership .hero-placeholder {
      width: 100%;
      position: relative;
      overflow: hidden;
    }

    /* ─── Author / meta bar ─── */
    .membership .meta-bar {
      padding-left:16px;
      padding-right:16px;
      margin-left:16px;
      margin-right:16px;
      width:calc(100% - 32px);
    }
    
    .membership .author-name {
      font-size: 24px;
      padding-bottom:3px;
    }
    .membership .author-detail {
      font-size: 14px;
    }
 
    /* ─── Article text ─── */
    .membership .article {
      padding-left:16px;
      padding-right:16px;
    }
    .membership .contact {
      padding-left:16px;
      padding-right:16px;
      padding-bottom:40px;
    }
    .all-deltras-member{
      padding-left:16px;
      padding-right:16px;
      padding-bottom:80px;
    }

    .membership .grey-strip{
      padding-left:16px;
      padding-right:16px;
      max-width:calc(100% - 32px);
    }
    .form-card {
      padding-left:16px;
      padding-right:16px;
    }

    .form-title{
      font-size:30px; 
    }
    .form-subtitle{
      font-size:16px; 
    }
    .form-subtitle-detail{
      font-size:16px; 
    }


    .field-label {
      font-size: 12px;
    }
    .btn-form {
      font-size: 20px;
    } 
    .btn-logout {
      font-size: 20px;
    }
    .btn-changepassword {
      font-size: 16px;
    }
    .form-card-bottom{
      font-size:14px;
    }
    .form-card-bottom .bottom-login-bar {
      width:28%;
    }

    .form-card-bottom .bottom-forgotpassword-bar {
      width:22%;
    }
    .datepicker {
      padding:   8px;
      font-size: 13px;
    }
  
    .datepicker table tr td.day {
      width:       28px;
      height:      28px;
      line-height: 28px;
      font-size:   12px;
    }
  
    .datepicker table tr td span {
      width:       44px;
      height:      34px;
      line-height: 34px;
      font-size:   11px;
    }
  
    .datepicker thead tr:first-child th {
      font-size:      11px;
      padding:        8px 4px;
      letter-spacing: 0.8px;
    }
}

@media (max-width:400px){
    .form-card-bottom .bottom-login-bar {
      width:25%;
    }

    .form-card-bottom .bottom-forgotpassword-bar {
      width:18%;
    }
}


/* ======= MOBILE NAV ======= */
.mobile-overlay {
  display: none;
  position: fixed;
  inset: 0;
  z-index: 2000;
}
.mobile-overlay.open { display: flex; }
.mobile-drawer {
  background: #fff;
  width: 100%;
  /* height: 100vh - 60px;
  margin-top:60px; */
  display: flex;
  flex-direction: column;
  gap: 0;
  position: relative;
  padding-top:48px;
}
.mobile-close-btn {
  position: absolute;
  right: 10px;
  top:0px;
  background: none;
  border: none;
  color: #D52525;
  font-size: 60px;
  cursor: pointer;
  line-height:0.8;
}
.mobile-drawer a {
  font-family: 'Fira Sans', sans-serif;
  font-size: 20px;
  text-transform: uppercase;
  letter-spacing: 0.8px;
  color: #000;
  border-bottom: 1px solid rgba(255,255,255,0.12);
  display: block;
  padding-top : 24px;
  padding-left : 24px;
  padding-right : 24px;
}
.mobile-right-btn {
  position: absolute;
  right: 20px;
  background: none;
  border: none;
  cursor: pointer;
}
.mobile-right-btn img{
  height:26px;
}
.mobile-drawer-border{
  padding-top:10px;
}

.mobile-menu-height{
  height:75vh;
}

.mobile-drawer-address p{
  padding:24px;
  border-top:1px solid #cecece;
}

.deltras-contact a{
  padding:0px;
  font-size: 14px;
  color:#777;
  font-weight:400;
  letter-spacing:0px;
  text-transform:none;
}

.mobile-drawer a:hover { color: var(--primary-color); }

.red-bar { width: 100%; height: 4px; background:   var(--primary-color); }
.clearfix::after { content: ''; display: table; clear: both; }


#videoModal{
  display:none; 
  position:fixed; 
  inset:0; 
  background:rgba(0,0,0,0.85); 
  z-index:9999; 
  align-items:center; 
  justify-content:center;
}

#videoModal-wrapper{
  position:relative; 
  width:90%; 
  max-width:800px;
}

#modalTitle{
  color:#fff; 
  font-size:15px; 
  margin:0;
}

#btnVideoCover{
  display:flex; 
  justify-content:space-between; 
  align-items:center; 
  margin-bottom:10px;
}

#btnVideoCover button{
  background:var(--primary-color);
  border:none; 
  color:#fff; 
  width:34px; 
  height:34px; 
  border-radius:50%; 
  font-size:20px; 
  cursor:pointer;
}

#videoScreen{
  position:relative; 
  padding-bottom:56.25%; 
  height:0; 
  background:#000; 
  border-radius:8px; 
  overflow:hidden;
}

#ytFrame{
  position:absolute; 
  top:0; 
  left:0; 
  width:100%; 
  height:100%;
}

.swal2-popup{
  align-items: center;
}
.swal-no-box {
  background: transparent !important;
  box-shadow: none !important;
  border: none !important;
  padding: 0 !important;
}
#preloader {
  position: fixed;
  inset: 0;
  background: #fff;
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}
</style>

<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
 <!-- DATEPICKER -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="assets/js/sweetalert.min.js"></script> -->
<script src="<?php echo base_url(); ?>assets/js/sweetalert2.all.min.js"></script>
<script>
    var base_url = '<?=base_url()?>';
</script>