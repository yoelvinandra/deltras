<!-- ── TOPBAR ── -->
<section class="membership">

    <h1 class="headline fira-sans-extrabold">DELTAMANIA</h1>

    <div class="hero-placeholder"><img src="assets/images/member/member-logo.png?t=<?=date('Ymdhis')?>"></div>



    <div class="article fira-sans-regular">
        <i>Lebih dari sekadar fans, ini adalah keluarga.</i>
        <br><br>
        Deltamania adalah rumah bagi para pendukung yang memiliki satu rasa, satu semangat, dan satu tujuan—mendukung tim kebanggaan dengan sepenuh hati. Dari tribun hingga layar, dari lokal hingga global, kami hadir untuk merayakan setiap momen, setiap perjuangan, dan setiap kemenangan bersama.
        <br><br>
        Kami percaya bahwa sepak bola bukan hanya tentang pertandingan, tetapi tentang kebersamaan, loyalitas, dan cerita yang kita bangun bersama.
        Jadilah bagian dari perjalanan ini.
        <br><br>
        Bersama, kita lebih dari sekadar penonton — kita adalah Deltamania.
    </div>

    <div class="meta-bar">
        <div class="author-wrap">
            <div>
                <div class="author-name fira-sans-bold">DELTAMANIA MEMBERSHIP</div>
                <div class="author-detail fira-sans-light"><i>Jadi bagian dari kami dan dapatkan promo menarik!</i></div>
            </div>
        </div>

        <div>
            <?php if(isset($_SESSION[NAMAPROGRAM]['MEMBERNAME'])) {?>
                <div href="#" class="btn-terdaftar fira-sans-extrabold">Sudah Terdaftar</div>
            <?php }else{?>
                <a href="register" class="btn-daftar fira-sans-extrabold">Daftar</a>
            <?php }?>
        </div>
    </div>

    <div class="contact fira-sans-regular">
        <b>Kontak & Informasi</b><br>
        📞  : <a href="#" target="_blank" class="member-telp"></a><br>
        📧  : <a href="#" target="_blank" class="member-email"></a><br>
        📍  : <a href="#" target="_blank" class="member-location"></a>
        <br><br><br>
        <b>Ikuti Kami</b><br>
        Instagram : <a href="#" target="_blank" class="member-instagram"></a><br>
        Twitter/X : <a href="#" target="_blank" class="member-x"></a><br>
        TikTok : <a href="#" target="_blank" class="member-tiktok"></a><br>
        Facebook : <a href="#" target="_blank" class="member-facebook"></a><br>
    </div>
    <div class="all-deltras-member"><img src="assets/images/member/member-all.png?t=<?=date('Ymdhis')?>"></div>
    <div class="grey-strip">
    &nbsp;
    </div>
</section>

<script>

</script>