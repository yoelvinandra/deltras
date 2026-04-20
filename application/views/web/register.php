<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="member-card" >   
                <img src="assets/images/member/member-card.png?t=<?=date(Ymdhis)?>">
            </div>
            <div class="form-card">
                <div class="form-title fira-sans-bold">Bergabunglah dengan komunitas kami</div>
                <p class="form-subtitle fira-sans-regular">Gabung sekarang! Jadilah bagian dari Deltamania.</p>
                <form role="form" id="form_input">
                    <input type="hidden" id="mode" name="mode" value="<?php if($m=='t'){ echo 'tambah';}else{ echo 'ubah';}?>">
                    <input type="hidden" id="from" name="from" value="USER">
                    <input type="hidden" id="IDMEMBER" name="IDMEMBER">
                    <input type="hidden" id="STATUS" name="STATUS" value="1">
                    <br>
                    <div class="field">
                    <label class="field-label fira-sans-light">Nama Depan*</label>
                    <input type="text" id="NAMADEPAN" name="NAMADEPAN"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Nama Belakang*</label>
                    <input type="text" id="NAMABELAKANG" name="NAMABELAKANG"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">NIK KTP*</label>
                    <input type="text" id="NIK" name="NIK"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Tanggal Lahir*</label>
                    <input type="text" id="TGLLAHIR" name="TGLLAHIR" placeholder="Cth:1999-01-01"/>
                    <div id="form-tgl-lahir">
                    </div>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Alamat*</label>
                    <input type="text" id="ALAMAT" name="ALAMAT"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Nomor Telepon*</label>
                    <input type="text" id="TELP" name="TELP" placeholder="Cth : 628xxxxxxxxxx"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Kontak Darurat*</label>
                    <input type="text" id="TELPDARURAT" name="TELPDARURAT" placeholder="Cth : 628xxxxxxxxxx"/>
                    </div>
                    <div class="field">
                    <label id="EMAIL-LABEL" class="field-label fira-sans-light">Alamat Email*</label>
                    <input type="email" id="EMAIL" name="EMAIL" placeholder="Isi dengan email aktif, untuk login"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Akun Instagram</label>
                    <input type="text" id="INSTAGRAM" name="INSTAGRAM"/>
                    </div>
                    <div class="field">
                    <label class="field-label fira-sans-light">Akun Tiktok</label>
                    <input type="text" id="TIKTOK" name="TIKTOK"/>
                    </div>
                    <label class="field-label fira-sans-light">Unggah Foto Profil*</label>
                    <div style="display:flex; align-items:center; gap:20px;">
                        <div>
                            <img id="previewGambar" src="<?=base_url()?>assets/images/member/no-member.png" style="border:1px solid #ccc; object-fit: cover;" width="242" height="242">
                            <input type="file" id="GAMBAR" style="display:none;">
                            <input type="file" id="GAMBARGALLERY" name="GAMBAR" accept="image/*" style="display:none;">
                            <input type="file" id="GAMBARKAMERA" accept="image/*" capture style="display:none;">
                            <div style="display:flex;  margin-bottom:8px;">
                                <button type="button" onclick="$('#GAMBARGALLERY').click()" 
                                    style="flex:1; padding:8px; border:1px solid #ccc; background:#fff; cursor:pointer; font-family:'Fira Sans',sans-serif; font-size:13px;">
                                    📁 Ambil Galeri
                                </button>
                                <button type="button" onclick="$('#GAMBARKAMERA').click()" 
                                    style="flex:1; padding:8px; border:1px solid #ccc; background:#fff; cursor:pointer; font-family:'Fira Sans',sans-serif; font-size:13px;">
                                    📷 Ambil Foto
                                </button>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <label class="wajib fira-sans-medium">*Wajib diisi</label>
                    <div class="check-register">
                        <input type="checkbox" id="CHECKVALID" name="CHECKVALID">
                        <span class="fira-sans-regular">
                            Dengan menyetujui Formulir Pendaftaran Anggota Deltamania, Anda akan menerima ID Card Anggota Deltamania yang akan dikirimkan melalui WhatsApp (nomor telepon yang terdaftar). ID Card tersebut dapat digunakan untuk memperoleh berbagai penawaran spesial, produk, serta layanan dari sponsor dan mitra resmi.
                        </span>
                    </div>
                    <br>
                    <br>
                    <button type="button" class="btn-form fira-sans-bold">Daftar Sekarang</button>
                    <button type="button" class="btn-logout fira-sans-bold">Logout</button>
                </form>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    if($("#mode").val() == "ubah"){
        $(".check-register, .wajib").hide();
        $(".member-card").show();
        $(".btn-form").html("Ubah Data");
        $(".form-title").html("Akun Profil");
        $("#EMAIL").css("background", "#cecece");
        $("#EMAIL").attr("readonly", "readonly");
        $("#EMAIL-LABEL").html("Alamat Email* (Tidak dapat diubah)");
        $(".form-subtitle").html("Yuk, perbaharui data dirimu, supaya kami bisa melihat perkembanganmu sebagai Member Deltamania");

        $.ajax({
            type    : 'POST',
            dataType: 'json',
            url     : base_url+"Master/Data/Member/getDataWeb",
            data    : "e="+'<?=$_SESSION[NAMAPROGRAM]["EMAIL_MEMBER"]?>' ,
            cache   : false,
            success : async function(msg){
                if (msg.success) {
                    msg = msg.rows;
                    $("#IDMEMBER").val(msg.IDMEMBER);
                    $("#NAMADEPAN").val(msg.NAMADEPAN);
                    $("#NAMABELAKANG").val(msg.NAMABELAKANG);
                    $("#NIK").val(msg.NIK);
                    $("#TGLLAHIR").val(msg.TGLLAHIR);
                    $("#ALAMAT").val(msg.ALAMAT);
                    $("#TELP").val(msg.TELP);
                    $("#TELPDARURAT").val(msg.TELPDARURAT);
                    $("#EMAIL").val(msg.EMAIL);
                    $("#INSTAGRAM").val(msg.INSTAGRAM);
                    $("#TIKTOK").val(msg.TIKTOK);
                    $("#STATUS").val(msg.STATUS);

                    var link = '';
                    var exists = false;

                    link = msg.GAMBAR+'?t='+ Date.now();
                    exists = await imageExists(link);
                    if(exists)
                    {
                        $('#previewGambar').attr('src', link);
                    }
                } else {
                    alertMsg(msg.errorMsg);
                    logout();
                }
            }
        });
    }
    else
    {
        $(".member-card").hide();
        $(".btn-logout").hide();
    }
    $('#TGLLAHIR').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
        container: '#form-tgl-lahir',  // ← ganti ini
        orientation: 'bottom left'
    });

    $(".btn-form").click(function(){
        if($("#mode").val() == "ubah")
        {
            changeProfile();
        }
        else
        {
            register();
        }
    })

    $(".btn-logout").click(function(){
      logout();
    });
});

$('#GAMBARGALLERY').on('change', function(e) {
    handleImageFile(e.target.files[0]);
});

$('#GAMBARKAMERA').on('change', function(e) {
    handleImageFile(e.target.files[0]);
});

function handleImageFile(file) {
    if (!file) return;

    if (!file.type.startsWith('image/')) {
        alert("File harus berupa gambar");
        return;
    }

    let img = new Image();
    let objectUrl = URL.createObjectURL(file);

    img.onload = function () {
        $('#previewGambar').attr('src', objectUrl).show();
        // Pindahkan file ke input utama GAMBAR
        let dt = new DataTransfer();
        dt.items.add(file);
        $('#GAMBAR')[0].files = dt.files;

        URL.revokeObjectURL(objectUrl);
    };

    img.src = objectUrl;
}

function alertMsg(msg){
    alert(msg);
}

function register(){
    var namadepan = $("#NAMADEPAN").val();
    var namabelakang = $("#NAMABELAKANG").val();
    let nik = $('#NIK').val();
    let tgllahir = $('#TGLLAHIR').val();
    let alamat = $('#ALAMAT').val();
    let telp = $('#TELP').val();
    let telpdarurat = $('#TELPDARURAT').val();
    let email = $('#EMAIL').val();
    if(!namadepan || !namabelakang)
    {
        alert("Nama Depan dan Nama Belakang wajib diisi");
        if(!namadepan)$("#NAMADEPAN").focus();
        else if(!namabelakang)$("#NAMABELAKANG").focus();
    }
    else if(!nik)
    {
        alert("NIK KTP wajib diisi");
        $("#NIK").focus();
    }
    else if(!tgllahir)
    {
        alert("Tgl Lahir wajib diisi");
        $("#TGLLAHIR").focus();
    }
    else if(!alamat)
    {
        alert("Alamat wajib diisi");
        $("#ALAMAT").focus();
    }
    else if(!telp)
    {
        alert("Nomor Telepon wajib diisi");
        $("#TELP").focus();
    }
    else if(!telpdarurat)
    {
        alert("Kontak Darurat wajib diisi");
        $("#TELPDARURAT").focus();
    }
    else if(!email)
    {
        alert("Alamat Email wajib diisi");
        $("#EMAIL").focus();
    }
    else
    {
        if (telp && !isValidPhone(telp)) {
            alert("No Telp harus diawali 62, dengan panjang 10-15 karakter");
            $("#TELP").focus();
            return;
        }
        else if (telpdarurat && !isValidPhone(telpdarurat)) {
            alert("Kontak Darurat harus diawali 62, dengan panjang 10-15 karakter");
            $("#TELPDARURAT").focus();
            return;
        }
        else if (email && !isValidEmail(email)) {
            alert("Format Email tidak valid");
            $("#EMAIL").focus();
            return;
        }
        else
        {
            
            let formData = new FormData($('#form_input')[0]);
            $.ajax({
                type: 'POST',
                url: base_url+'Master/Data/Member/simpan',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(msg){
                    if (msg.success) {
                        window.location.replace('<?php echo base_url(); ?>konfirmasi?i='+msg.idweb);
                    } else {
                        alert(msg.errorMsg);
                    }
                }
            }); 
        }
    }
}

function changeProfile(){
    var namadepan = $("#NAMADEPAN").val();
    var namabelakang = $("#NAMABELAKANG").val();
    let nik = $('#NIK').val();
    let tgllahir = $('#TGLLAHIR').val();
    let alamat = $('#ALAMAT').val();
    let telp = $('#TELP').val();
    let telpdarurat = $('#TELPDARURAT').val();
    let email = $('#EMAIL').val();
    
    if(!namadepan || !namabelakang)
    {
        alert("Nama Depan dan Nama Belakang wajib diisi");
        if(!namadepan)$("#NAMADEPAN").focus();
        else if(!namabelakang)$("#NAMABELAKANG").focus();
    }
    else if(!nik)
    {
        alert("NIK KTP wajib diisi");
        $("#NIK").focus();
    }
    else if(!tgllahir)
    {
        alert("Tgl Lahir wajib diisi");
        $("#TGLLAHIR").focus();
    }
    else if(!alamat)
    {
        alert("Alamat wajib diisi");
        $("#ALAMAT").focus();
    }
    else if(!telp)
    {
        alert("Nomor Telepon wajib diisi");
        $("#TELP").focus();
    }
    else if(!telpdarurat)
    {
        alert("Kontak Darurat wajib diisi");
        $("#TELPDARURAT").focus();
    }
    else if(!email)
    {
        alert("Alamat Email wajib diisi");
        $("#EMAIL").focus();
    }
    else
    {
        if (telp && !isValidPhone(telp)) {
            alert("No Telp harus diawali 62, dengan panjang 10-15 karakter");
            $("#TELP").focus();
            return;
        }
        else if (telpdarurat && !isValidPhone(telpdarurat)) {
            alert("Kontak Darurat harus diawali 62, dengan panjang 10-15 karakter");
            $("#TELPDARURAT").focus();
            return;
        }
        else if (email && !isValidEmail(email)) {
            alert("Format Email tidak valid");
            $("#EMAIL").focus();
            return;
        }
        else
        {
            
            let formData = new FormData($('#form_input')[0]);
            $.ajax({
                type: 'POST',
                url: base_url+'Master/Data/Member/simpan',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(msg){
                    if (msg.success) {
                        alert("Akun Profil berhasil diubah");
                        window.location.replace('<?php echo base_url(); ?>');
                    } else {
                        alert(msg.errorMsg);
                    }
                }
            }); 
        }
    }
}

function logout(){
    $.ajax({
        type: 'POST',
        url: base_url+'Master/Data/Member/logout',
        processData: false,
        contentType: false,
        dataType: 'json',

        success: function(msg){
            if (msg.success) {
                window.location.replace('<?php echo base_url(); ?>');
            } else {
                alert(msg.errorMsg);
            }
        }
    }); 
}
</script>