<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <div class="form-title fira-sans-bold">Login</div>
                <p class="form-subtitle fira-sans-regular">Belum punya akun? <a href="register" class="fira-sans-semibold">Daftar sekarang</a></p>
                <form role="form" id="form_input">
                    <br>
                    <div class="field">
                    <label class="field-label fira-sans-light">Alamat email</label>
                    <input type="email" id="EMAIL" name="EMAIL" />
                    </div>

                    <div class="field">
                    <label class="field-label fira-sans-light">Password</label>
                    <input type="password" id="PASSWORD" name="PASSWORD" />
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn-form fira-sans-bold">Log In</button>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="form-card-bottom">
                        <div class="bottom-login-bar">&nbsp;</div>
                        <p class=" fira-sans-bold"><a href="forgotpassword">Lupa password?</a></p>
                        <div class="bottom-login-bar">&nbsp;</div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script>

    $('#PASSWORD').keyup(function(e){
		if(e.keyCode == 13)
		{
			login();
		}
	});

    $(".btn-form").click(function(){
        login();
    });


    function alertMsg(msg){
        alert(msg);
    }

    function login(){
        let email = $('#EMAIL').val();
        let password = $('#PASSWORD').val();
         if(!email)
        {
            alert("Alamat Email wajib diisi");
            $("#EMAIL").focus();
        }
        else if(!password)
        {
            alert("Password wajib diisi");
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
                let formData = new FormData($('#form_input')[0]);
                $.ajax({
                    type    : 'POST',
                    url: base_url+'Master/Data/Member/loginWeb',
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    
                    success : function(msg){
                        if (msg.success) {
                           alert("Berhasil Login");
						   window.location.replace('<?php echo base_url(); ?>');
                        } else {
                            alertMsg(msg.errorMsg);
                            document.activeElement.blur();
                        }
                    }
                });
            }
        }
    }
</script>