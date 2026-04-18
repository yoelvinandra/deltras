<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <div class="form-title fira-sans-bold">Hi, <span id="NAMADEPAN"></span><br>Pendaftaranmu Berhasil !</div>
                <br><br>
                <p class="form-subtitle fira-sans-regular" style="text-align:left;">Untuk password login sudah dikirim ke email <a href="#" id="EMAIL" class="fira-sans-semibold">Daftar sekarang</a></p>
                <br><br>
                <div class="grey-strip">&nbsp;</div>
                <br><br>
                <p class="form-subtitle" style="text-align:left;">Untuk <b>Login</b>, ikuti langkah-langkah ini :<br>
                    1. Cek Emailmu.<br>
                    2. Salin password yang dikirimkan lewat email.<br>
                    3. Login menggunakan email & password tersebut.<br>
                </p>
            </div>
        </div>
    </div>
</section>

<script>
    function alertMsg(msg){
        alert(msg);
        history.back();
    }

    if('<?= $i ?>' !== '') 
    {
        $.ajax({
            type    : 'POST',
            dataType: 'json',
            url     : base_url+"Master/Data/Member/getKonfirmasiWeb",
            data    : "i="+'<?=$i?>' ,
            cache   : false,
            success : function(msg){
                if (msg.success) {
                    $("#NAMADEPAN").html(msg.NAMADEPAN);
                    $("#EMAIL").html(msg.EMAIL);
                    $("#EMAIL").attr("href","mailto:"+msg.EMAIL);
                } else {
                    alertMsg(msg.errorMsg);
                }
            }
        });
    }
    else
    {
        alertMsg("Link tidak valid");
    }
</script>