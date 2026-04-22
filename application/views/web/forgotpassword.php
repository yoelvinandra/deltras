<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <div class="form-title fira-sans-bold">Atur Ulang Kata Sandi</div>
                <p class="form-subtitle fira-sans-regular">Masukkan email Anda, kami akan membantu Anda mengatur ulang password.</p>
                <br>
                <div class="field">
                <label class="field-label fira-sans-light">Alamat email</label>
                <input type="email" id="EMAIL" name="EMAIL"  />
                </div>
                <br>
                <br>
                <button type="button" class="btn-form fira-sans-bold">Kirim Email Reset Password</button>
                <br>
                <br>
                <br>
                <br>
                <div class="form-card-bottom">
                    <div class="bottom-forgotpassword-bar">&nbsp;</div>
                    <p class=" fira-sans-bold"><a href="login">Kembali ke halaman Login</a></p>
                    <div class="bottom-forgotpassword-bar">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    $(".btn-form").click(function(){
        resetPassword();
    })
})

$('#EMAIL').keyup(function(e){
	if(e.keyCode == 13)
	{
		resetPassword();
	}
});

function alertMsg(msg){
    alert(msg);
}

function resetPassword(){
    let email = $('#EMAIL').val();
    if(!email)
    {
        alert("Alamat Email wajib diisi");
        $("#EMAIL").focus();
    }
    else
    {
        if (email && !isValidEmail(email)) {
            alert("Format Email tidak valid");
            $("#EMAIL").focus();
            return;
        }
        else
        {

            loading();
            $.ajax({
                type    : 'POST',
                url     : base_url+'Master/Data/Member/emailResetPassword',
                data    : "e="+$("#EMAIL").val(),
                cache   : false,
                dataType: 'json',
                success: function(msg){
                    Swal.close();
                    if (msg.success) {
                        window.location.replace('<?php echo base_url(); ?>konfirmasi?i='+msg.idweb+'&e=rp');
                    } else {
                        alert(msg.errorMsg);
                    }
                }
            }); 
        }
    }
}
</script>