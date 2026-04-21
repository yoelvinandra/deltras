<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <div class="form-title fira-sans-bold"></div>
                <br><br>
                <p class="form-subtitle fira-sans-regular" style="text-align:left;"></p>
                <br><br>
                <div class="grey-strip">&nbsp;</div>
                <br><br>
                <p class="form-subtitle-detail" style="font-size:16px;text-align:left;">
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

    if('<?= $i ?>' !== '' && '<?= $e ?>' !== '') 
    {
        var valid = false;
        $.ajax({
            type    : 'POST',
            dataType: 'json',
            url     : base_url+"Master/Data/Member/getKonfirmasiWeb",
            data    : "i="+'<?=$i?>' ,
            cache   : false,
            success : function(msg){
                if (msg.success) {

                    if('<?= $e ?>' == 'r') 
                    {
                        $(".form-title").html(
                            `
                                Hi, <span id="NAMADEPAN"></span><br>Pendaftaranmu Berhasil !
                            `
                        );

                        $(".form-subtitle").html(
                            `
                            Untuk password login sudah dikirim ke email <a href="#" id="EMAIL" class="fira-sans-semibold">Daftar sekarang</a>
                            `
                        );

                        $(".form-subtitle-detail").html(
                            `
                            Untuk <b>Login</b>, ikuti langkah-langkah ini :<br>
                            <ol style="font-size:16px; text-align:left; padding-top:10px;padding-left:20px; padding-right:20px; display: flex; flex-direction: column; gap: 6px;">
                                <li>Cek Emailmu.</li>
                                <li>Salin password yang dikirimkan lewat email.</li>
                                <li>Login menggunakan email & password tersebut.</li>
                            </ol>
                            `
                        )
                        valid = true;
                    }
                    else if('<?= $e ?>' == 'cp') 
                    {
                        $(".form-title").html(
                            `
                                Hi, <span id="NAMADEPAN"></span><br>Permintaan Ubah Password telah diterima !
                            `
                        );

                        $(".form-subtitle").html(
                            `
                            Untuk melanjutkan proses ini, mohon cek pada email <a href="#" id="EMAIL" class="fira-sans-semibold">Daftar sekarang</a>
                            `
                        );

                        $(".form-subtitle-detail").html(
                            `
                            Untuk melakukan <b>Ubah Password</b>, ikuti langkah-langkah ini :<br>
                            <ol style="font-size:16px; text-align:left; padding-top:10px;padding-left:20px; padding-right:20px; display: flex; flex-direction: column; gap: 6px;">
                                <li>Cek Emailmu.</li>
                                <li>Klik tombol "Ubah Password" / salin link yang dikirimkan dan tempel pada browsermu.</li>
                                <li>Isi password terbarumu, dan konfirmasi ulang password tersebut.</li>
                            </ol>
                            `
                        )
                        valid = true;
                    }
                    else if('<?= $e ?>' == 'rp') 
                    {
                        $(".form-title").html(
                            `
                                Hi, <span id="NAMADEPAN"></span><br>Permintaan Atur Ulang Password telah diterima !
                            `
                        );

                        $(".form-subtitle").html(
                            `
                            Untuk melanjutkan proses ini, mohon cek pada email <a href="#" id="EMAIL" class="fira-sans-semibold">Daftar sekarang</a>
                            `
                        );

                        $(".form-subtitle-detail").html(
                            `
                            Untuk melakukan <b>Atur Ulang Password</b>, ikuti langkah-langkah ini :<br>
                            <ol style="font-size:16px; text-align:left; padding-top:10px;padding-left:20px; padding-right:20px; display: flex; flex-direction: column; gap: 6px;">
                                <li>Cek Emailmu.</li>
                                <li>Klik tombol "Atur Ulang Password" / salin link yang dikirimkan dan tempel pada browsermu.</li>
                                <li>Isi password terbarumu, dan konfirmasi ulang password tersebut.</li>
                            </ol>
                            `
                        )
                        valid = true;
                    }
                    else if('<?= $e ?>' == 'sp') 
                    {
                        $(".form-title").html(
                            `
                                Hi, <span id="NAMADEPAN"></span><br>Password-mu telah berhasil diubah !
                            `
                        );

                        $(".form-subtitle").html(
                            `
                            Untuk melihat password yang telah diubah, mohon cek pada email <a href="#" id="EMAIL" class="fira-sans-semibold">Daftar sekarang</a>
                            `
                        );

                        $(".form-subtitle-detail").html(
                            `
                            Mohon tetap menjaga kerahasian data, karena kamu adalah member Deltamania yang berharga.
                            `
                        )
                        valid = true;
                    }

                    if(valid)
                    {
                        $("#NAMADEPAN").html(msg.NAMADEPAN.toUpperCase());
                        $("#EMAIL").html(msg.EMAIL);
                        $("#EMAIL").attr("href","mailto:"+msg.EMAIL);
                    }
                    else 
                    {
                        alertMsg(msg.errorMsg);
                    }
                } else {
                    alertMsg("Link tidak valid");
                }
            }
        });
    }
    else
    {
        alertMsg("Link tidak valid");
    }
</script>