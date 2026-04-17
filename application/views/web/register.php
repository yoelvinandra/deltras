<!-- HTML Structure -->
<section class="form-page">
    <div class="page-bg">
        <div class="page-bg-cover">
            <div class="form-card">
                <div class="form-title fira-sans-bold">Bergabunglah dengan komunitas kami</div>
                <p class="form-subtitle fira-sans-regular">Gabung sekarang! Jadilah bagian dari Deltamania.</p>
                <br>
                <div class="field">
                <label class="field-label fira-sans-light">Nama Depan*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Nama Belakang*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">NIK KTP*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Tanggal Lahir*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Alamat*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Nomor Telepon*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Kontak Darurat*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Alamat Email*</label>
                <input type="email" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Akun Instagram*</label>
                <input type="text" />
                </div>
                <div class="field">
                <label class="field-label fira-sans-light">Akun Tiktok*</label>
                <input type="text" />
                </div>
                <label class="field-label fira-sans-light">Unggah Foto Profil*</label>
                <div style="display:flex; align-items:center; gap:20px;">
                    <div>
                        <img id="previewGambar" src="<?=base_url()?>assets/images/member/no-member.png" style="border:1px solid #ccc; object-fit: contain;" width="242" height="294">
                        <input type="file" class="form-control" id="GAMBAR" name="GAMBAR" accept="image/png" style="width:242px;">
                    </div>
                    <span>Syarat :<br>- Format wajib PNG<br>- Ukuran maks 242x294 px<br>- Kapasitas gambar maks 1000 kb</span>
                </div>
                <br>
                <br>
                <br>
                <label class="wajib fira-sans-medium">*Wajib diisi</label>
                <div class="check-register">
                    <input type="checkbox">
                    <span class="fira-sans-regular">
                        Dengan menyetujui Formulir Pendaftaran Anggota Deltamania, Anda akan menerima ID Card Anggota Deltamania yang akan dikirimkan melalui WhatsApp (nomor telepon yang terdaftar). ID Card tersebut dapat digunakan untuk memperoleh berbagai penawaran spesial, produk, serta layanan dari sponsor dan mitra resmi.
                    </span>
                </div>
                <br>
                <br>
                <button type="button" class="btn-form fira-sans-bold">Daftar Sekarang</button>
            </div>
        </div>
    </div>
</section>

<script>
    $('#GAMBAR').on('change', function(event) {
    let file = event.target.files[0];

    if (!file) return;

    // 🔥 CEK SIZE (1000 KB)
    if (file.size > 1000 * 1024) {
        alert("Ukuran file maksimal 1000 KB");
        $(this).val('');
        $('#previewGambar').attr('src', '<?=base_url()?>assets/images/member/no-member.png');
        return;
    }

    // cek format
    if (file.type !== "image/png") {
        alert("File harus PNG");
        $(this).val('');
        $('#previewGambar').attr('src', '<?=base_url()?>assets/images/member/no-member.png');
        return;
    }

    let img = new Image();
    let objectUrl = URL.createObjectURL(file);

    img.onload = function () {
        // 🔥 perbaikan logika (pakai OR, bukan AND)
        if (this.width > 242 || this.height > 294) {
            alert("Ukuran maks 242x294 px");
            $('#GAMBAR').val('');
            $('#previewGambar').attr('src', '<?=base_url()?>assets/images/member/no-member.png');
        } else {
            $('#previewGambar')
                .attr('src', objectUrl)
                .show();
        }
    };

    img.src = objectUrl;
});
</script>