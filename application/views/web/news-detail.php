<!-- ── TOPBAR ── -->
  <!-- OG Tags -->
<meta property="og:title"       content="<?= $og->TITLE ?>">
<meta property="og:description" content="<?= $og->TITLE ?>">
<meta property="og:image"       content="<?= $og->GAMBAR ?>">
<meta property="og:url"         content="<?= $og->URL?>">
<meta property="og:type"        content="article">

<section class="news-detail">
    
</section>

<script>
  loadNews();

  function loadNews() {
    $.ajax({
        url: '<?base_url()?>' + 'Competition/Operational/News/web?for=DETAIL&i=' + '<?=$i?>',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var html = "";
            for (var x = 0; x < data.rows.length; x++) {
                html += `
                <div class="news-tag fira-sans-regular">`+data.rows[x].KATEGORI+`</div>

                <h1 class="headline fira-sans-extrabold">`+data.rows[x].TITLE+`</h1>

                <div class="hero-placeholder"><img src="`+data.rows[x].GAMBAR+`?t=`+Date.now()+`"></div>

                <div class="meta-bar">
                    <div class="author-wrap">
                        <div class="avatar">
                            <img src="assets/images/user/deltras.png">
                        </div>
                        <div>
                            <div class="author-name fira-sans-regular">`+data.rows[x].USERNAME+`</div>
                            <div class="author-date fira-sans-regular">`+formatDateFull(data.rows[x].TGLTERBIT)+`</div>
                        </div>
                    </div>

                    <div class="share-wrap">
                        <span class="share-text fira-sans-bold">Bagikan</span>
                        <div class="share-icons">
                            <a class="share-btn" href="#" aria-label="Facebook">
                                <img src="assets/images/facebook-news.png">
                            </a>
                            <a class="share-btn" href="#" aria-label="TikTok">
                                <img src="assets/images/tiktok-news.png">
                            </a>
                            <a class="share-btn" href="#" aria-label="WhatsApp">
                                <img src="assets/images/whatsapp-news.png">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="grey-strip">&nbsp;</div>

                <div class="article fira-sans-regular">
                    `+data.rows[x].DETAIL+`
                </div>

                <div class="grey-strip">&nbsp;</div>
                `;
            }



            if(data.rowsBefore.length > 0)
            {
               html += `
                <a class="next-row" href="news-detail?i=${data.rowsBefore[0].IDNEWS}">
                    <span class="next-label fira-sans-regular">Next</span>
                    <span class="next-arrow"><img src="assets/images/next-news-detail.png"></span>
                </a>
                <div class="next-title fira-sans-regular">${data.rowsBefore[0].TITLE}</div>
                `;
            }

            $(".news-detail").html(html);

            //SHARE BUTTON
            document.querySelectorAll('.share-btn').forEach(btn => {
                btn.addEventListener('click', e => {
                    e.preventDefault();
                    const label = btn.getAttribute('aria-label');
                    const url   = location.href;                    // jangan encode dulu
                    const text  = $(".headline").text().trim();     // jangan encode dulu

                    const map = {
                    'Facebook': `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
                    'WhatsApp': `https://api.whatsapp.com/send?text=${encodeURIComponent(text + '\n\n' + url)}`,
                    'TikTok'  : 'https://www.tiktok.com/'
                    };

                    if (map[label]) {
                    window.open(map[label], '_blank', 'noopener,width=600,height=400');
                    } else if (label === 'TikTok') {
                    navigator.clipboard.writeText(url).then(() => alert('Link copied!'));
                    }
                });
                });
        }
    });
    }
</script>