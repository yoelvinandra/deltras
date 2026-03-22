<style>
* { margin: 0; padding: 0; box-sizing: border-box; }
body { font-family: 'Roboto', sans-serif; background: #fff; color: #222; font-size: 14px; }
a { text-decoration: none; color: inherit; }
img { display: block; max-width: 100%; }

@font-face {
  font-family: 'SlamDunk';
  src: url('<?= base_url("assets/font/slamdunk/SlamDunk.ttf") ?>') format('truetype');
}

:root {
  --primary-color: #BB1111;
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
  text-transform: uppercase;
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
}

.dropdown ul li a:hover {
  color: #c00;
}

.dropdown-address{
  border-top:1px solid #cecece;
  padding-top:24px;
  padding-bottom:24px;
  padding-right:48px;
  color:#777777;
  display: flex;
  justify-content: right;
  align-items: center;
  gap:60px;
}

/* ======= HERO ======= */
.hero-slider {
  position: relative;
  width: 100%;
  height: calc(100vh - 110px);
  overflow: hidden;
}

/* Slides */
.slide {
  position: absolute;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background-size: cover;
  background-position: center;
  opacity: 0;
  transition: opacity 1s ease;
}

.slide-cover{
  width: 100%; height: 100%;
  background: linear-gradient(
    to bottom,
    rgba(255,255,255,0) 0%,  /* transparent */
    rgba(0,0,0,0.0) 80%,
    rgba(0,0,0,0.95) 100%   /* solid dark */
  );
}
.slide.active {
  opacity: 1;
}

/* Content on right side */
.slide-content {
  position: absolute;
  bottom: 120px;
  right: calc((100vw - 1280px) / 2);
  text-align: right;
  color: white;
  max-width: 350px;
}

.slide-content h1 {
  font-size: 48px;
  font-weight: 900;
  margin: 0 0 10px;
  letter-spacing: 2px;
}

.slide-content p {
  color:black;
  font-size: 18px;
  margin: 0 0 20px;
}

.btn-readmore {
  display: inline-block;
  background: var(--primary-color);
  color: white;
  padding: 8px 18px;
  font-size: 16px;
  text-decoration: none;
  border-radius : 4px;
}

.btn-readmore:hover {
  background: #aa0000;
}

/* Bottom Bar */
.slider-controller {
  position: absolute;
  bottom: 20;
  width:100%;
  max-width: 1280px;
  display: flex;
  align-items: center; left: 50%;    
  transform: translateX(-50%);
  justify-content: space-between;
  box-sizing: border-box;
  z-index: 10;
  padding-left:10px;
  padding-right:10px;
}

.slider-bar {
  position: absolute;
  bottom: 0;
  width:100%;
  max-width: 1280px;
  background: rgba(0,0,0,0.6);
  display: flex;
  align-items: center; left: 50%;    
  transform: translateX(-50%);
  gap: 15px;
  box-sizing: border-box;
  z-index: 10;
}

.play-btn {
  background: none;
  border: none;
  color: white;
  font-size: 14px;
  cursor: pointer;
  display: flex;
  align-items: center;
  gap: 8px;
  white-space: nowrap;
}

.play-btn:hover {
  color: #ccc;
}

/* Progress Bar */
.progress-bar-wrap {
  flex: 1;
  height: 6px;
  background: rgba(255,255,255,  0.4);
  overflow: hidden;
}

.progress-bar {
  height: 100%;
  width: 0%;
  background: var(--primary-color);
  transition: width 0.1s linear;
}

/* Sound Button */
.sound-btn {
  background: none;
  border: none;
  color: white;
  font-size: 20px;
  cursor: pointer;
}

.sound-btn:hover {
  color: #ccc;
}

/* ======= TEAM PHOTO STRIP ======= */
.team-photo-strip {
  margin:auto;
  max-width: 1520px;
  height:450px;
  margin-top:100px;
  margin-bottom:50px;
  overflow: hidden;
  background:white;
}
.team-photo-strip img {
  width: 100%;
  height: 100%;
  object-fit: contain;
  object-position: center 30%;
  transition: transform 0.4s ease;
  transform-origin: center center;
}
.team-photo-strip img:hover {
  transform: scale(1.1);
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
  background: #fff;
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
  padding-top: 120%;
  background: #e2e2e2;
  overflow: hidden;
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
.stat-row:last-child { border-bottom: none; }

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
  
/* ======= HIGHLIGHT + NEXT MATCH SECTION ======= */
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
  margin-bottom:50px;
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
  font-size: 9px;
  color: #999;
  text-transform: uppercase;
  margin-bottom: 4px;
}
.stat-value {
  font-size: 14px;
  font-weight: bold;
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
  background: #D52525;
  color: white;
  border: none;
  padding: 9px 39px;
  border-radius: 6px;
  font-size: 18px;
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
.border-bottom {
  border-bottom: 1px solid black;
}
/* ===== NEWS SECTION ===== */
.news-section {
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
  font-size: 11px;
}

.footer-top img {
  width:120px;
}

.footer-top {
  display: flex;
  align-items: center; /* sejajar vertikal dengan ul */
  justify-content: space-between;
  padding: 0.6rem 2rem;
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
@media (max-width: 1600px) {
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
}

/* ======= MOBILE ======= */
@media (max-width: 1050px) {
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

  .team-photo-strip {
  height:250px;
  margin-top:40px;
  margin-bottom:0px;
  }
  .team-photo-strip img {
  object-fit: cover;
  }

  .squad-section { padding: 0px 0px 32px; }
  .red-line{display:none;}
  .squad-header{opacity:0; display:none;}
  .squad-header-mobile{display:inline-block; opacity:1; margin-top:28px;margin-bottom:24px;}
  .squad-title { font-size: 24px;}
  .arrow-btn { display:none;}
  .slider-track {
  gap: 36px;
  padding-left:72px;
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

  .next-title{
  font-size: 20px;
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
    font-size: 10px;
  }
  .standings-table{
    padding: 20px;
  }
  .standings-table td {
    font-size: 10px;
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
  max-width: 350px;
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
}

@media (max-width: 520px) {
  .highlight-section-primary {
  margin:0px;
  }

  .prev-matches{
  margin-left:0px;
  margin-right:0px;
  }

  .next-team-1{
  font-size:14pt;
  gap:10px;
  }

  .next-team-2{
  font-size:14pt;
  gap:10px;
  }

  .next-team-1 img{
  font-size:14pt;
  }

  .next-team-2 img{
  font-size:14pt;
  }

  .highlight-section-secondary .highlight-card{
  margin-left:0px;
  margin-right:0px;
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
  padding-top:54px;
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
  font-weight:700;
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
  border-bottom:1px solid #cecece;
  padding-top:10px;
}

.mobile-menu-height{
  height:75vh;
}

.mobile-drawer-address p {
  padding:24px;
  line-height:24px;
  font-size: 14px;
  color:#777;
  font-weight:400;
}

.mobile-drawer a:hover { color: var(--primary-color); }

.red-bar { width: 100%; height: 4px; background:   var(--primary-color); }
.clearfix::after { content: ''; display: table; clear: both; }
</style>