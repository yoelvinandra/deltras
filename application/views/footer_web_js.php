<!-- FOOTER -->
<script>
//BURGER-MENU
function openDrawer() {
  document.getElementById('drawer').classList.add('open');
  document.body.style.overflow = 'hidden';

  $("#default-mobile-menu").show();
  $("#club-mobile-menu").hide();
  $("#deltamania-mobile-menu").hide();
  $("#partners-mobile-menu").hide();
  $("#shop-mobile-menu").hide();

  // document.querySelectorAll('.mobile-menu').forEach(function(item) {
  //     if (item !== parent) {
  //     }
  // });
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
    $("#default-mobile-menu").hide();
    $("#club-mobile-menu").show();
    $("#deltamania-mobile-menu").hide();
    $("#partners-mobile-menu").hide();
    $("#shop-mobile-menu").hide();
  }
  else if(menu == "DELTAMANIA")
  {
    $("#default-mobile-menu").hide();
    $("#club-mobile-menu").hide();
    $("#deltamania-mobile-menu").show();
    $("#partners-mobile-menu").hide();
    $("#shop-mobile-menu").hide();
  }
  else if(menu == "PARTNERS")
  {
    $("#default-mobile-menu").hide();
    $("#club-mobile-menu").hide();
    $("#deltamania-mobile-menu").hide();
    $("#partners-mobile-menu").show();
    $("#shop-mobile-menu").hide();
  }
  else if(menu == "SHOP")
  {
    $("#default-mobile-menu").hide();
    $("#club-mobile-menu").hide();
    $("#deltamania-mobile-menu").hide();
    $("#partners-mobile-menu").hide();
    $("#shop-mobile-menu").show();
  }

  // document.querySelectorAll('.mobile-menu').forEach(function(item) {
  //     if (item !== parent) {
  //         item.innerHTML = submenu;
  //     }
  // });

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

function formatDate(dateStr) {
  const months = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
  ];
  const [year, month, day] = dateStr.split('-');
  return `${day} ${months[parseInt(month) - 1]} ${year}`;
}

function formatDateFull(dateStr) {
  const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
  const months = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
  ];

  const date = new Date(dateStr.replace(' ', 'T'));
  const dayName = days[date.getDay()];
  const day     = String(date.getDate()).padStart(2, '0');
  const month   = months[date.getMonth()];
  const year    = date.getFullYear();
  const hour    = String(date.getHours()).padStart(2, '0');
  const minute  = String(date.getMinutes()).padStart(2, '0');

  return `${dayName}, ${day} ${month} ${year}, ${hour}.${minute}`;
}

function formatMonthYear(dateStr){
  const [month, year] = dateStr.split(" ");

  const months = [
    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
  ];

  const result = `${months[month - 1]} ${year}`;

  return result;
}

function formatTime(timeStr){
  const [h, m,s] = timeStr.split(":");

  const result = `${h} ${m}`;

  return result;
}

// Update on scroll
window.addEventListener('scroll', function() {
    updateDropdownTop();
});

// Update on load
window.addEventListener('load', function() {
    updateDropdownTop();
});

$.ajax({
    url: '<?base_url()?>' + 'Master/Data/Sponsor/web?for=HOME',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      var htmlHome = "";
      var htmlMenu = "";
      for(var x = 0 ; x < data.rows.length;x++)
      {
        htmlHome += `
          <div class="sp-logo">
            <a href="`+data.rows[x].WEBSITE+`" target="_blank"><img src="`+data.rows[x].GAMBAR+`?t=`+Date.now()+`"></a>
          </div>
        `;

        htmlMenu += `
          <li><a href="`+data.rows[x].WEBSITE+`" target="_blank">`+data.rows[x].NAMA+`</a></li>
        `;
      }

      //FOOTER VIEW
      $(".sponsor-footer-inner").html(htmlHome);

      //DROPDOWN MENU WEB
      $(".partners-dropdown ul").html(htmlMenu);

      //DROPDOWN MENU MOBILE
      $("#partners-mobile-menu").html(htmlMenu);
    }
});

function timeYoutubePublished(isoString) {
  if(isoString == "")
  {
    return "";
  }
  else
  {
    var published = new Date(isoString);
    var now       = new Date();
    var seconds   = Math.floor((now - published) / 1000);

    if (seconds < 60)                        return 'Just now';

    var minutes = Math.floor(seconds / 60);
    if (minutes < 60)                        return minutes + ' minute' + (minutes > 1 ? 's' : '') + ' ago';

    var hours = Math.floor(minutes / 60);
    if (hours < 24)                          return hours + ' hour' + (hours > 1 ? 's' : '') + ' ago';

    var days = Math.floor(hours / 24);
    if (days < 7)                            return days + ' day' + (days > 1 ? 's' : '') + ' ago';

    var weeks = Math.floor(days / 7);
    if (weeks < 4)                           return weeks + ' week' + (weeks > 1 ? 's' : '') + ' ago';

    var months = Math.floor(days / 30);
    if (months < 12)                         return months + ' month' + (months > 1 ? 's' : '') + ' ago';

    var years = Math.floor(days / 365);
    return years + ' year' + (years > 1 ? 's' : '') + ' ago';
  }
}

function openModal(videoId, title) {
  document.getElementById('modalTitle').textContent = title;
  document.getElementById('ytFrame').src = 
    'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
  document.getElementById('videoModal').style.display = 'flex';
}

function closeModal() {
  document.getElementById('ytFrame').src = ''; // stops video playback
  document.getElementById('videoModal').style.display = 'none';
}

// Close on backdrop click
document.getElementById('videoModal').addEventListener('click', function(e) {
  if (e.target === this) closeModal();
});

// Close on Escape key
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

function getVideoId(url) {
    const regex = /(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\n?#]+)/;
    const match = url.match(regex);
    return match ? match[1] : null;
}

async function getYouTubeData(videoId) {
    if (!videoId) return null;

    try {
        const data = await $.ajax({
            url: '<?=base_url()?>' + 'Competition/Operational/Fixture/youtubeAPI',
            method: 'GET',
            dataType: 'json',
            data: { videoId: videoId }
        });
        return data;

    } catch (err) {
        console.error('Gagal:', err);
        return null;
    }
}

function isValidEmail(email) {
    let regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
}
function isValidPhone(phone) {
    let regex = /^62[0-9]{8,13}$/;
    return regex.test(phone);
}
function imageExists(url) {
    return new Promise((resolve) => {
        const img = new Image();
        img.onload = () => resolve(true);
        img.onerror = () => resolve(false);
        img.src = url;
    });
}

function loading(){
    Swal.fire({
        title: '',
        html: '<img src="'+base_url+'assets/images/loading.gif" style="height:150px;">',                // no text or HTML content
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        background: 'transparent',        // ← background popup transparan
        backdrop: 'rgba(0,0,0,0.4)',      // ← backdrop luar (bisa diatur opacity)
        customClass: {
          container: 'swal-no-box'      // ← tambahan class untuk CSS
        },
        didOpen: () => {
            Swal.showLoading();
        }
    });
}

</script>