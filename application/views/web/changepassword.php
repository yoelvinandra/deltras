<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <div class="form-title fira-sans-bold"></div>
                <p class="form-subtitle fira-sans-regular">Masukkan password baru-mu sekarang.</p>
                <br>
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
            </div>
        </div>
    </div>
</section>
<script>
$(document).ready(function() {
    if('<?= $e ?>' == 'cp') 
    {
        $(".form-title").html("Ubah Password");
    }
    else if('<?= $e ?>' == 'rp') 
    {
        $(".form-title").html("Atur Ulang Password");
    }

    $('#CPASSWORD').keyup(function(e){
		if(e.keyCode == 13)
		{
			simpanPassword();
		}
	});
});


function simpanPassword(){
    
}
</script>