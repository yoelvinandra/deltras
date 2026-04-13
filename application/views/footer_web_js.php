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

</script>