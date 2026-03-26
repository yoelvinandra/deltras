<!-- FOOTER -->
<script>
//BURGER-MENU
function openDrawer() {
  document.getElementById('drawer').classList.add('open');
  document.body.style.overflow = 'hidden';
  var submenu = `
    <ul>
      <li><a href="news">NEWS</a></li>
      <li><a href="fixture">FIXTURE</a></li>
      <li><a href="#" onclick="openMenuMobile('CLUB')">CLUB <button class="mobile-right-btn"><img src="assets/images/right.png"></button></a></li>
      <li><a href="#" onclick="openMenuMobile('DELTAMANIA')">DELTAMANIA <button class="mobile-right-btn"><img src="assets/images/right.png"></button></a></li>
      <li><a href="#" onclick="openMenuMobile('PARTNERS')">PARTNERS <button class="mobile-right-btn"><img src="assets/images/right.png"></button></a></li>
      <li><a href="#" onclick="openMenuMobile('SHOP')">SHOP <button class="mobile-right-btn"><img src="assets/images/right.png"></button></a></li>
      <li><a href="ticket">TICKET</a></li>
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
      <li><a href="history">History</a></li>
      <li><a href="team">Team</a></li>
      </ul>
    `;
  }
  else if(menu == "DELTAMANIA")
  {
    submenu = `
      <ul>
      <li><a href="membership">Membership</a></li>
      </ul>
    `;
  }
  else if(menu == "PARTNERS")
  {
    submenu = `
      <ul>
      <li><a href="KAPALAPI">KAPAL API</a></li>
      <li><a href="ALHIJAZ">AL HIJAZ</a></li>
      <li><a href="RANS">RANS</a></li>
      <li><a href="MITRAORPHYS">MITRA ORPHYS</a></li>
      <li><a href="LEKAW">LEKAW</a></li>
      <li><a href="CRYSTALIN">CRYSTALIN</a></li>
      <li><a href="BANDELL">BANDELL</a></li>
      </ul>
    `;
  }
  else if(menu == "SHOP")
  {
    submenu = `
      <ul>
      <li><a href="website">Website</a></li>
      <li><a href="deltrasstore">Deltras Store</a></li>
      <li><a href="shopee">Shopee</a></li>
      <li><a href="whatsapp">Whatsapp</a></li>
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

</script>