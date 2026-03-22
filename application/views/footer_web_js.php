<!-- FOOTER -->
<script>
//BURGER-MENU
function openDrawer() {
  document.getElementById('drawer').classList.add('open');
  document.body.style.overflow = 'hidden';
  var submenu = `
    <ul>
      <li><a href="#">NEWS</a></li>
      <li><a href="#">FIXTURE</a></li>
      <li><a href="#" onclick="openMenuMobile('CLUB')">CLUB <button class="mobile-right-btn"><img src="<?=base_url()?>/assets/images/right.png"></button></a></li>
      <li><a href="#" onclick="openMenuMobile('DELTAMANIA')">DELTAMANIA <button class="mobile-right-btn"><img src="<?=base_url()?>/assets/images/right.png"></button></a></li>
      <li><a href="#" onclick="openMenuMobile('PARTNERS')">PARTNERS <button class="mobile-right-btn"><img src="<?=base_url()?>/assets/images/right.png"></button></a></li>
      <li><a href="#" onclick="openMenuMobile('SHOP')">SHOP <button class="mobile-right-btn"><img src="<?=base_url()?>/assets/images/right.png"></button></a></li>
      <li><a href="#">TICKET</a></li>
    </ul>
  `;

  document.querySelectorAll('.mobile-menu').forEach(function(item) {
      if (item !== parent) {
          item.innerHTML = submenu;
      }
  });
}
function closeDrawer() {
  document.getElementById('drawer').classList.remove('open');
  document.body.style.overflow = '';
}
function closeDrawerOut(e) {
  if (e.target === document.getElementById('drawer')) closeDrawer();
}

function openMenuMobile(menu){
  var submenu = "";
  if(menu == "CLUB")
  {
    submenu = `
      <ul>
      <li><a href="#">History</a></li>
      <li><a href="#">Team</a></li>
      </ul>
    `;
  }
  else if(menu == "DELTAMANIA")
  {
    submenu = `
      <ul>
      <li><a href="#">Membership</a></li>
      </ul>
    `;
  }
  else if(menu == "PARTNERS")
  {
    submenu = `
      <ul>
      <li><a href="#">KAPAL API</a></li>
      <li><a href="#">AL HIJAZ</a></li>
      <li><a href="#">RANS</a></li>
      <li><a href="#">MITRA ORPHYS</a></li>
      <li><a href="#">LEKAW</a></li>
      <li><a href="#">CRYSTALIN</a></li>
      <li><a href="#">BANDELL</a></li>
      </ul>
    `;
  }
  else if(menu == "SHOP")
  {
    submenu = `
      <ul>
      <li><a href="#">Website</a></li>
      <li><a href="#">Deltras Store</a></li>
      <li><a href="#">Shopee</a></li>
      <li><a href="#">Whatsapp</a></li>
      </ul>
    `;
  }

  document.querySelectorAll('.mobile-menu').forEach(function(item) {
      if (item !== parent) {
          item.innerHTML = submenu;
      }
  });

}

//DROPDOWN
document.querySelectorAll('.has-dropdown > a').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const parent = this.parentElement;

        // Close all other dropdowns
        document.querySelectorAll('.has-dropdown').forEach(function(item) {
            if (item !== parent) {
                item.classList.remove('active');
            }
        });

        // Toggle current
        parent.classList.toggle('active');

        // Update top position when opening
        updateDropdownTop();
    });
});

// Close when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.has-dropdown')) {
        document.querySelectorAll('.has-dropdown').forEach(function(item) {
            item.classList.remove('active');
        });
    }
});

function getNavbarBottom() {
  const navbar = document.querySelector('.navbar');
  const navbarRect = navbar.getBoundingClientRect();
  return navbarRect.bottom;
}

function updateDropdownTop() {
  const dropdowns = document.querySelectorAll('.dropdown');
  dropdowns.forEach(function(dropdown) {
      dropdown.style.top = getNavbarBottom() + 'px';
  });

  const drawer = document.querySelectorAll('.mobile-drawer');
  drawer.forEach(function(drawer) {
      drawer.style.marginTop = getNavbarBottom() + 'px';
      drawer.style.height = "100vh"-(getNavbarBottom() + 'px');
  });
}

// Update on scroll
window.addEventListener('scroll', function() {
    updateDropdownTop();
});

// Update on load
window.addEventListener('load', function() {
    updateDropdownTop();
});

//HERO
const slides      = document.querySelectorAll('.slide');
const progressBar = document.getElementById('progressBar');
const playBtn     = document.getElementById('playBtn');
const playIcon    = document.getElementById('playIcon');
const slideTitle  = document.getElementById('slideTitle');
const soundBtn    = document.getElementById('soundBtn');

const slideTitles = [
    'Deltras FC Club History',
    'Deltras FC Season 2026',
    'Deltras FC Highlights'
];

let currentSlide  = 0;
let isPlaying     = true;
let isMuted       = false;
let progress      = 0;
let interval      = null;
let audio         = null;
const duration    = 5000; // 5 seconds per slide
const tick        = 100;  // update every 100ms

function loadAudio(index) {
    if (audio) {
        audio.pause();
        audio = null;
    }
    const src = slides[index].dataset.audio;
    if (src) {
        audio = new Audio(src);
        audio.muted = isMuted;
        audio.play().catch(() => {}); // catch autoplay block
    }
}

function goToSlide(index) {
    slides[currentSlide].classList.remove('active');
    currentSlide = index % slides.length;
    slides[currentSlide].classList.add('active');
    slideTitle.textContent = slideTitles[currentSlide];
    progress = 0;
    progressBar.style.width = '0%';
    loadAudio(currentSlide);
}

function startSlider() {
    interval = setInterval(() => {
        progress += tick;
        const pct = (progress / duration) * 100;
        progressBar.style.width = pct + '%';

        if (progress >= duration) {
            goToSlide(currentSlide + 1);
        }
    }, tick);
}

function stopSlider() {
    clearInterval(interval);
    interval = null;
    if (audio) audio.pause();
}

// Play / Stop toggle
playBtn.addEventListener('click', () => {
    isPlaying = !isPlaying;
    if (isPlaying) {
        playIcon.innerHTML = '<img src="<?=base_url()?>/assets/images/pause.png">'; // play icon
        startSlider();
        if (audio) audio.play().catch(() => {});
    } else {
        playIcon.innerHTML = '<img src="<?=base_url()?>/assets/images/play.png">'; // pause icon
        stopSlider();
    }
});

// Sound toggle
soundBtn.addEventListener('click', () => {
    isMuted = !isMuted;
    soundBtn.innerHTML = isMuted ? '<img src="<?=base_url()?>/assets/images/volume_off.png">' : '<img src="<?=base_url()?>/assets/images/volume_on.png">';
    if (audio) audio.muted = isMuted;
});

// Start on load
loadAudio(currentSlide);
startSlider();

//PLAYER
const track    = document.getElementById('track');
const viewport = document.getElementById('viewport');
const prevBtn  = document.getElementById('prevBtn');
const nextBtn  = document.getElementById('nextBtn');
const cards    = Array.from(track.querySelectorAll('.player-card'));
let current = 0;
function getShow() {
  const w = window.innerWidth;
  if (w <= 1000) return 1;
  return 4;
}

function getPages() {
  return Math.ceil(cards.length / getShow());
}
function setCardWidths() {

  const show = getShow();
  let gap  = 48;
  if (window.innerWidth <= 1000){
    gap = 36;
  }

  const w    = (viewport.offsetWidth - gap * (show - 1)) / show;
  /* on mobile show 1 full + peek of next */
  const mobileW = window.innerWidth <= 1000
    ? viewport.offsetWidth * 0.64
    : w;
  cards.forEach(c => { c.style.width = (window.innerWidth <= 1000 ? mobileW : w) + 'px'; });
}
function updateUI() {
  prevBtn.disabled = current === 0;
  nextBtn.disabled = current >= getPages() - 1;
}
function goTo(page) {
  current = Math.max(0, Math.min(page, getPages() - 1));
  const show   = getShow();
  let gap  = 48;
  if (window.innerWidth <= 1000){
    gap = 36;
  }

  const cardW  = window.innerWidth <= 1000
    ? viewport.offsetWidth * 0.64
    : (viewport.offsetWidth - gap * (show - 1)) / show;
  let offset = current * show * (cardW + gap);
  // BIAR POSISI GAMBAR WAKTU KECIL ADA DITENGAH
  // if (window.innerWidth <= 1000){
  //   offset = offset - gap;
  // }
  track.style.transform = `translateX(-${offset}px)`; //-30
  updateUI();
}
prevBtn.addEventListener('click', () => goTo(current - 1));
nextBtn.addEventListener('click', () => goTo(current + 1));
/* swipe support */
let tx = 0;
viewport.addEventListener('touchstart', e => { tx = e.touches[0].clientX; }, { passive: true });
viewport.addEventListener('touchend',   e => {
  const dx = e.changedTouches[0].clientX - tx;
  if (Math.abs(dx) > 40) goTo(current + (dx < 0 ? 1 : -1));
});
function init() {
  current = 0;
  setCardWidths();
  goTo(0);
}
window.addEventListener('resize', init);
init();

//HIGHLIGHT
document.querySelectorAll('.play-icon, .video-play').forEach(el => {
    el.addEventListener('click', () => alert('Video player opens'));
});
document.querySelectorAll('.btn-ticket').forEach(el => {
    el.addEventListener('click', () => alert('Opening ticket purchase'));
});

</script>