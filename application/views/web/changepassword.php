<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <input type="hidden" id="EMAIL" name="EMAIL">
                <div class="form-title fira-sans-bold"></div>
                <p class="form-subtitle fira-sans-regular"></p>
                <br>
                <div class="form-input">
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {

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

                    
                    if('<?= $e ?>' == 'cp') 
                    {
                        $(".form-title").html("Ubah Password");
                        valid = true;
                    }
                    else if('<?= $e ?>' == 'rp') 
                    {
                        $(".form-title").html("Atur Ulang Password");
                        valid = true;
                    }

                    if(!valid){
                        alertMsg("Link tidak valid");
                    }
                    else
                    {
                        $("#EMAIL").val(msg.EMAIL);
                        $(".form-subtitle").html("Masukkan password baru-mu sekarang.");
                        $(".form-input").html(
                        `
                        <div class="field">
                            <label class="field-label fira-sans-light">Password Baru</label>
                            <input type="password" id="PASSWORD" name="PASSWORD"/>
                            </div>
                            <div class="field">
                            <label class="field-label fira-sans-light">Konfirmasi Password</label>
                            <input type="password" id="CPASSWORD" name="CPASSWORD"/>
                            </div>
                        <br>
                        <br>
                        <button type="button" class="btn-form fira-sans-bold">Simpan Password</button>
                        `
                        );
                    }

                    $('#CPASSWORD').keyup(function(e){
                        if(e.keyCode == 13)
                        {
                            simpanPassword();
                        }
                    });

                    $('.btn-form').click(function(){
                        simpanPassword();
                    });
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
});


function simpanPassword(){
    var password = $("#PASSWORD").val();
    var cpassword = $("#CPASSWORD").val();

    if(!password)
    {
        alert("Password Baru wajib diisi");
        $("#PASSWORD").focus();
    }
    else if(!cpassword)
    {
        alert("Konfirmasi Password wajib diisi");
        $("#CPASSWORD").focus();
    }
    else if(password != cpassword)
    {
        alert("Password Baru dan Konfirmasi Password tidak sama");
        $("#PASSWORD").focus();
    }
    else 
    {  loading();
        $.ajax({
            type    : 'POST',
            url     : base_url+'Master/Data/Member/changePassword',
            data    : "e="+$("#EMAIL").val()+"&p="+$("#PASSWORD").val(),
            cache   : false,
            dataType: 'json',
            success: function(msg){
                Swal.close();
                if (msg.success) {
                    window.location.replace('<?php echo base_url(); ?>konfirmasi?i='+msg.idweb+'&e=sp');
                } else {
                    alert(msg.errorMsg);
                    document.activeElement.blur();
                }
            }
        }); 
    }
}
</script>