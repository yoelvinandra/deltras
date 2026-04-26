
<!-- HIGHLIGHT + NEXT MATCH -->
<section class="fixture-section">
  <div class="fixture-title">
    <div class="fira-sans-extrabold">FIXTURES</div>
  </div>
  <div class="tab">
      <div class="tab-header"> 
        <ul>
          <li>
            <a  class="fira-sans-regular active" href="#fixture-tab" data-tab="fixture-tab">FIXTURES</a>
          </li>
          <li>
            <a  class="fira-sans-regular" href="#result-tab" data-tab="result-tab" >RESULTS</a>
          </li>
        </ul>
      </div>
      <div class="tab-child"> 
        <div id="fixture-tab"  class="active">
          <div class="next-matches">
                <div class="next-content">
                  <div class="next-header">
                      <span class="next-title upcoming fira-sans-extrabold">NEXT MATCH</span>
                  </div>
                  <div class="grey-strip">
                    &nbsp;
                  </div>
                  <div class="list-content">
                  </div>
              </div>
          </div>
        </div>
        <div id="result-tab">
          <div class="filter">
            <div class="filter-wrapper">
              <span class="filter-label fira-sans-regular">Filter by season:</span>

              <div class="custom-select" id="seasonSelect">
                <div class="select-selected" id="selectSelected">
                  <span id="selectedText">2025/26</span>
                  <span><img src="assets/images/filter-dropdown.png"></span>
                </div>
                <div class="select-items" id="selectItems">
                </div>
              </div>
            </div>
          </div>
           <!-- PREVIOUS MATCHES -->
            <div class="prev-matches">
                <div class="prev-content">
                </div>
            </div>
        </div>
    </div>
  </div>  
</section>

<script>
//FIXTURE
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.tab-header a');
  const panels = document.querySelectorAll('.tab-child > div');

   // ✅ TAMBAHKAN INI — cek URL hash saat halaman dibuka
  const hash = window.location.hash; // "#result-tab" atau "#fixture-tab"
  if (hash) {
    const tabId = hash.replace('#', '');
    const targetEl = document.getElementById(tabId);
    const matchLink = document.querySelector(`.tab-header a[data-tab="${tabId}"]`);

    if (targetEl && matchLink) {
      // Reset semua
      links.forEach(l => l.classList.remove('active'));
      panels.forEach(p => p.classList.remove('active'));

      // Aktifkan tab yang sesuai
      matchLink.classList.add('active');
      targetEl.classList.add('active');

      // Update judul
      const titles = document.querySelectorAll('.fixture-title div');
      titles.forEach(t => {
        t.innerHTML = tabId === 'result-tab' ? 'RESULTS' : 'FIXTURES';
      });
    }
  }


  links.forEach(link => {
    link.addEventListener('click', e => {
      e.preventDefault();

      const target = link.dataset.tab;
      console.log("clicked:", target);
      
      const titles = document.querySelectorAll('.fixture-title div');
      titles.forEach(t => {
        if(target == "fixture-tab")
        {
          t.innerHTML = "FIXTURES";
        }
        else if(target == "result-tab")
        { 
          t.innerHTML = "RESULTS";
        }
      });
      
      const targetEl = document.getElementById(target);
      if (!targetEl) {
        console.log("target not found!");
        return;
      }
      
      links.forEach(l => l.classList.remove('active'));
      panels.forEach(p => p.classList.remove('active'));

      link.classList.add('active');
      targetEl.classList.add('active');
    });
  });

 $.ajax({
    url: '<?base_url()?>' + 'Competition/Operational/Fixture/comboGridSeason',
    type: 'GET',
    dataType: 'json',
    success: function (data) {
        var html = "";
        for (var x = 0; x < data.rows.length; x++) {
            var active = "";
            if (x == 0) {
                active = "active";
            }
            html += `
                <div class="select-item ${active}" data-value="${data.rows[x].SEASON}">
                    ${data.rows[x].SEASON}
                    <span><img src="assets/images/filter-check.png"></span>
                </div>
            `;
        }
        $("#selectItems").html(html);

        // ✅ Set teks awal sesuai item pertama
        if (data.rows.length > 0) {
            document.getElementById('selectedText').textContent = data.rows[0].SEASON;
        }

        // ✅ Pasang event SETELAH elemen sudah ada di DOM
        const items = document.querySelectorAll('.select-item');
        items.forEach(function (item) {
            item.addEventListener('click', function () {
                items.forEach(i => i.classList.remove('active'));
                this.classList.add('active');
                document.getElementById('selectedText').textContent = this.dataset.value;
                document.getElementById('seasonSelect').classList.remove('open');
                loadFixture();
            });
        });

        // ✅ Panggil loadFixture untuk load data season pertama
        loadFixture();
    }
});

  //FIXTURE FILTER RESULT DATE
  const selectEl = document.getElementById('seasonSelect');
  const selectedText = document.getElementById('selectedText');
  const items = document.querySelectorAll('.select-item');

  // Toggle open/close
  document.getElementById('selectSelected').addEventListener('click', function(e) {
    e.stopPropagation();
    selectEl.classList.toggle('open');
  });

  // Select an item
  items.forEach(function(item) {
    item.addEventListener('click', function() {
      // Remove active from all
      items.forEach(i => i.classList.remove('active'));
      // Set active on clicked
      this.classList.add('active');
      // Update displayed text
      selectedText.textContent = this.dataset.value;
      // Close dropdown
      selectEl.classList.remove('open');
      loadFixture();
    });
  });

  // Close when clicking outside
  document.addEventListener('click', function() {
    selectEl.classList.remove('open');
  });

function loadFixture(){
   //FIXTURE
  $.ajax({
    url: '<?base_url()?>' + 'Competition/Operational/Fixture/web?for=FIXTURE&s='+selectedText.textContent,
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      var html = "";
      var monthYearTemp = "";
      for (var x = 0; x < data.rows.FIXTURE.length; x++) {
        if(x != 0 && monthYearTemp != data.rows.FIXTURE[x].MONTHYEAR){
          if(monthYearTemp == "")
          {
            html += `
              <br><br>
              <br><br>
              <div class="next-header">
                  <span class="next-title upcoming-match fira-sans-extrabold">UPCOMING MATCH</span>
              </div>
            `;
          }
          monthYearTemp = data.rows.FIXTURE[x].MONTHYEAR;
          html += `
            <div class="next-header">
                    <span class="next-title fira-sans-extrabold">`+formatMonthYear(data.rows.FIXTURE[x].MONTHYEAR)+`</span>
            </div>
          `;
        }

        if(x != 0)
        {
          html += `
            <div class="grey-strip">
              &nbsp;
            </div>
          `;
        }
          html += `
            <div class="next-item">
                <div class="next-info">
                    <div class="next-championship fira-sans-extrabold">`+data.rows.FIXTURE[x].NAMA+`</div>
                    <div class="next-comp"><img src="assets/images/calendar.png">&nbsp;<span class="next-time">`+formatDate(data.rows.FIXTURE[x].TANGGAL)+`</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="assets/images/location.png">&nbsp;<span class="next-loc">`+data.rows.FIXTURE[x].LOKASI+`</span></div>
                </div>
                <div class="next-info-detail">
                  <div class="next-info-detail-sub">
                    <div class="next-team-1">
                      <span class="fira-sans-extrabold">`+data.rows.FIXTURE[x].NAMACLUB1+`</span>
                      <img src="` + data.rows.FIXTURE[x].GAMBARCLUB1 + `?t=` + Date.now() + `">
                    </div> 
                    <div class="next-team-time fira-sans-regular">
                      <p class="fira-sans-light">`+formatTime(data.rows.FIXTURE[x].JAM)+`</p>
                      <p class="timezone fira-sans-semibold">WIB</p>
                    </div>
                    <div class="next-team-2">
                      <img src="` + data.rows.FIXTURE[x].GAMBARCLUB2 + `?t=` + Date.now() + `">
                      <span class="fira-sans-extrabold">`+data.rows.FIXTURE[x].NAMACLUB2+`</span>
                    </div>
                  </div>`;

            if(data.rows.FIXTURE[x].STATUS == 2)
            {
              html += `
                    <div class="next-ticket">
                      <div class="next-ticket-detail">
                        <img src="assets/images/ticket-ready.png">
                        <span class="next-ticket-ready fira-sans-regular">Tickets available for sale</span>
                      </div>
                      <br>
                      <a href="`+data.rows.FIXTURE[x].LINKTICKET+`" target="_blank" class="btn-buynow fira-sans-extrabold">Buy Now</a>
                    </div>`;
            
            }
            else
            {
              html += `
                      <div class="next-ticket">
                        <div class="next-ticket-detail">
                          <img src="assets/images/ticket-unready.png">
                          <span class="next-ticket-unready fira-sans-regular">Coming soon</span>
                        </div>
                      </div>`;
            }
            html+=`      
                </div>
            </div>
          `;
      }

      if(html == ""){
        html = "<br><div class='fira-sans-regular' style='text-align:center; font-size:20px;'>Data tidak ditemukan</div>";
      }
      
      $(".list-content").html(html);

      html = "";
      monthYearTemp = "";
      for (var x = 0; x < data.rows.RESULT.length; x++) {
        if(monthYearTemp != data.rows.RESULT[x].MONTHYEAR)
        {
          monthYearTemp = data.rows.RESULT[x].MONTHYEAR;
          html += `
                 <div class="prev-header">
                        <div class="prev-title fira-sans-extrabold">
                           `+formatMonthYear(data.rows.RESULT[x].MONTHYEAR)+`
                        </div>
                  </div>
                  <div class="grey-strip">&nbsp;</div>
          `;
        }

          html += `
                <div class="prev-item">
                    <div class="prev-info">
                        <div class="prev-championship fira-sans-medium">`+data.rows.RESULT[x].NAMA+`</div>
                        <div class="prev-comp"><span class="prev-time">`+formatDate(data.rows.RESULT[x].TANGGAL)+`</span> | <span class="prev-loc">`+data.rows.RESULT[x].LOKASI+`</span></div>
                    </div>`;
          if(data.rows.RESULT[x].SKORCLUB1 > data.rows.RESULT[x].SKORCLUB2)
          {
            html += `
                    <div class="prev-status-web prev-status-win fira-sans-extrabold">
                      W
                    </div>`;
          }
          else if(data.rows.RESULT[x].SKORCLUB1 == data.rows.RESULT[x].SKORCLUB2)
          {
            html += `
                    <div class="prev-status-web prev-status-draw fira-sans-extrabold">
                      D
                    </div>`;
          }
          else
          {
            html += `
                    <div class="prev-status-web prev-status-lose fira-sans-extrabold">
                      L
                    </div>`;
          }
          html += `
                    <div class="prev-info-detail">
                      <div class="prev-team-1">
                        <span class="fira-sans-bold">`+data.rows.RESULT[x].NAMACLUB1+`</span>
                        <img src="` + data.rows.RESULT[x].GAMBARCLUB1 + `?t=` + Date.now() + `">
                      </div> 
                      <div class="prev-team-score fira-sans-regular">
                        `+data.rows.RESULT[x].SKORCLUB1+`-`+data.rows.RESULT[x].SKORCLUB2+`
                      </div>
                      <div class="prev-team-2">
                        <img src="` + data.rows.RESULT[x].GAMBARCLUB2 + `?t=` + Date.now() + `">
                        <span class="fira-sans-bold">`+data.rows.RESULT[x].NAMACLUB2+`</span>
                      </div>`;

          if(data.rows.RESULT[x].SKORCLUB1 > data.rows.RESULT[x].SKORCLUB2)
          {
            html += `
                    <div class="prev-status-mini prev-status-win fira-sans-extrabold">
                      W
                    </div>`;
          }
          else if(data.rows.RESULT[x].SKORCLUB1 == data.rows.RESULT[x].SKORCLUB2)
          {
            html += `
                    <div class="prev-status-mini prev-status-draw fira-sans-extrabold">
                      D
                    </div>`;
          }
          else
          {
            html += `
                    <div class="prev-status-mini prev-status-lose fira-sans-extrabold">
                        L
                      </div>`;
          }

          html += `
                    </div>
                </div>
        `;
      }

      if(html == ""){
        html = "<div class='fira-sans-regular' style='text-align:center; font-size:20px;'>Data tidak ditemukan</div>";
      }
      $(".prev-content").html(html);
    }
  });
 }

 loadFixture();

});
</script>