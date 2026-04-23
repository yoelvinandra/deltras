
<!-- SPONSORS -->
<div class="sponsor-footer">
  <div class="section-wrap">
    <div class="section-wrap-mini">
      <div style="font-family:'Oswald',sans-serif;font-size:16px;color:#aaa;text-transform:uppercase;letter-spacing:1.5px;text-align:center;margin-bottom:40px;">Official Partners &amp; Sponsors</div>
      <div class="sponsor-footer-inner">
      </div>
    </div>
  </div>
</div>

<div class="grey-strip">
  &nbsp;
</div>
<!-- FOOTER -->
<footer class="site-footer">
  <div class="section-wrap-footer">
    <div class="footer-top">
      <a href="<?=base_url()?>"><img src="assets/images/logo.png"></a>
    </div>
    <div class="footer-bottom">
      <p class="footer-web">Deltras FC © 2026 All rights reserved</p>
      <ul>
        <li><a href="">Contact Us</a></li>
        <li><a href="">Shop</a></li>
        <li><a href="">Ticket</a></li>
        <li><a href="">Privacy policy</a></li>
      </ul>
      <p class="footer-mobile">Deltras FC © 2026 All rights reserved</p>
    </div>
</footer>

<div id="videoModal">
  <div id="videoModal-wrapper">
    
    <!-- Header: title + close button -->
    <div id="btnVideoCover">
      <p id="modalTitle"></p>
      <button onclick="closeModal()">×</button>
    </div>

    <!-- 16:9 responsive iframe wrapper -->
    <div id="videoScreen">
      <iframe id="ytFrame"
        frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    </div>

  </div>
</div>

<?php include("footer_web_js.php"); ?>
</body>
</html>
