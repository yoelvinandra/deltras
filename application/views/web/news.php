<!-- ── TOPBAR ── -->
<section class="news-list-section">
    <div class="topbar">

        <div class="filter-wrap">
            <button class="filter-btn fira-sans-semibold" id="filterBtn" aria-expanded="false">
            FILTER BY CATEGORY
            <span class="caret">
                <img src="assets/images/category-dropdown.png">
            </span>
            </button>
            <div class="filter-dropdown" id="filterDrop">
            <a href="#" class="active" data-cat="all">All</a>
            <a href="#" data-cat="news">News</a>
            <a href="#" data-cat="match">Match</a>
            </div>
        </div>

        <div class="search-area">
            <span class="search-label fira-sans-regular">CARI</span>
            <div class="search-box">
            <input type="text" id="searchInput" autocomplete="off" aria-label="Cari berita">
            <span class="ico-search">
                <img src="assets/images/search.png">
            </span>
            </div>
        </div>

    </div>

    <!-- ── PAGE TITLE (desktop only) ── -->
    <div class="page-title-wrap">
        <div class="page-title fira-sans-extrabold">ALL NEWS</div>
    </div>
    <div class="grey-strip mobile-hidden">
        &nbsp;
    </div>

    <!-- ── SECTION HEADER (mobile only) ── -->
    <div class="mobile-hdr">
        <span class="mh-t fira-sans-extrabold">ALL NEWS</span>
        <!-- <a href="#" class="mh-a fira-sans-bold">ALL NEWS &gt;</a> -->
    </div>

    <!-- ── NEWS GRID ── -->
    <div class="news-grid" id="newsGrid">

    </div><!-- /.news-grid -->

    <div id="nodata">

    </div><!-- /.news-grid -->

    <!-- ── PAGINATION ── -->
   <div class="pager" id="pager">
    <button class="pg arr pg-left" id="btnPrev" disabled aria-label="Previous page"></button>
    <div id="pgNumbers"></div>
    <button class="pg arr pg-right" id="btnNext" aria-label="Next page"></button>
  </div>

    <!-- ── DIVIDER ── -->
    <div class="grey-strip">&nbsp;</div>
</section>

<script>
/* ── Filter dropdown ── */
const filterBtn  = document.getElementById('filterBtn');
const filterDrop = document.getElementById('filterDrop');

filterBtn.addEventListener('click', e => {
  e.stopPropagation();
  const isOpen = filterDrop.classList.toggle('open');
  filterBtn.classList.toggle('open', isOpen);
  filterBtn.setAttribute('aria-expanded', isOpen);
});
document.addEventListener('click', () => {
  filterDrop.classList.remove('open');
  filterBtn.classList.remove('open');
  filterBtn.setAttribute('aria-expanded', false);
});
filterDrop.addEventListener('click', e => {
  if (e.target.matches('a')) {
    e.preventDefault();
    filterDrop.querySelectorAll('a').forEach(a => a.classList.remove('active'));
    e.target.classList.add('active');
    filterDrop.classList.remove('open');
    filterBtn.classList.remove('open');
    filterBtn.setAttribute('aria-expanded', false);

    // Langsung hit API
    k = e.target.dataset.cat === 'all' ? '' : e.target.dataset.cat;
    cur = 1;
    loadNews();
  }
});

/* ── Search ── */
let searchTimeout = null;
document.getElementById('searchInput').addEventListener('input', function() {
  clearTimeout(searchTimeout);
  const val = this.value.trim();
  searchTimeout = setTimeout(() => {
    q = val;
    cur = 1;
    loadNews();
  }, 400); // debounce 400ms, tidak spam API tiap ketik
});

/* ── Pagination ── */
let cur = 1, totalPages = 0;
let q = "", k = "";

function renderPager() {
  const container = document.getElementById('pgNumbers');
  const prev = document.getElementById('btnPrev');
  const next = document.getElementById('btnNext');

  prev.disabled = cur <= 1;
  prev.classList.toggle('on', cur > 1);
  next.disabled = cur >= totalPages;
  next.classList.toggle('on', cur < totalPages);

  const windowSize = 10;
  const windowIndex = Math.floor((cur - 1) / windowSize);
  const start = windowIndex * windowSize + 1;
  const end   = Math.min(start + windowSize - 1, totalPages);

  let html = '';
  for (let i = start; i <= end; i++) {
    html += `<button class="pg ${i === cur ? 'active' : ''}" data-p="${i}">${i}</button>`;
  }
  if (end < totalPages) {
    html += `<span class="pg dots">...</span>`;
  }

  container.innerHTML = html;

  container.querySelectorAll('.pg[data-p]').forEach(b => {
    b.addEventListener('click', () => {
      cur = +b.dataset.p;
      loadNews();
    });
  });
}

function loadNews() {
  $.ajax({
    url: '<?base_url()?>' + 'Competition/Operational/News/web?for=NEWS&p=' + cur + '&q=' + q + '&k=' + k,
    type: 'GET',
    dataType: 'json',
    success: function (data) {
      totalPages = data.count;

      var html = "";
      for (var x = 0; x < data.rows.length; x++) {
        html += `
          <a href="news-detail?i=${data.rows[x].IDNEWS}" class="news-card" 
             data-cat="${data.rows[x].KATEGORI.toLowerCase()}"
             data-title="${data.rows[x].TITLE}">
            <div class="card-thumb">
              <img src="${data.rows[x].GAMBAR}?t=${Date.now()}" alt="${data.rows[x].TITLE}"
                loading="lazy"
                onerror="this.src='https://placehold.co/700x423/4a7c59/fff?text=Photo'">
            </div>
            <div class="card-meta">
              <div class="card-cat fira-sans-extrabold">${data.rows[x].KATEGORI}</div>
              <div class="news-detail">
                <div class="card-ttl fira-sans-regular">${data.rows[x].TITLE}</div>
                <div class="card-dt fira-sans-regular">${formatDate(data.rows[x].TGLTERBIT.split(" ")[0])}</div>
              </div>
            </div>
          </a>`;
      }
      if(html == ""){
        $("#nodata").html( "<div class='fira-sans-regular' style='text-align:center; font-size:20px;'>Data tidak ditemukan</div>");
      }
      $("#newsGrid").html(html);
      renderPager();
    }
  });
}

document.getElementById('btnPrev').addEventListener('click', () => {
  if (cur > 1) { cur--; loadNews(); }
});
document.getElementById('btnNext').addEventListener('click', () => {
  if (cur < totalPages) { cur++; loadNews(); }
});

loadNews();
</script>