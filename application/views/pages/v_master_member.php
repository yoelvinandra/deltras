
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Master Member
    <!-- <button type="button" class="btn pull-right btn-success" id="btn_print" style="font-size:10pt;"  onclick="exportTableToExcel()">Excel</button> -->
  </h1>
  <!-- <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol> -->
</section>

<!-- Main content -->
<section class="content">
  
  <!-- Main row -->
  <div class="row">
      <div class="col-md-12">
        <div class="box">
        <div class="box-header">
            <button class="btn btn-success" onclick="javascript:tambah()">Tambah</button>
        </div>
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom" >
            <ul class="nav nav-tabs" id="tab_transaksi">
				<li class="active"><a href="#tab_grid" data-toggle="tab">Grid</a></li>
				<li><a href="#tab_form" data-toggle="tab">Tambah</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_grid">
                    <div class="box-body">
                        <table id="dataGrid" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
                            <tr>
                                <th width="35px"></th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Nomor Telepon</th>
                                <th>Kontak Darurat</th>
                                <th>Email</th>
                                <th>Catatan</th>
                                <th width="40px">User Input</th>
                                <th width="40px">Tgl. Input</th>
                                <th width="25px">Aktif</th>          
                            </tr>
                            </thead>
                        </table>
                    </div>
                    <div id="tableExcel" style="display:none;" ></div>
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_form">
                    <div class="box-body">
					 <div class="col-md-12">
						<!-- form start -->
						<form role="form" id="form_input">
                            <input type="hidden" id="mode" name="mode">
                            <input type="hidden" id="from" name="from" value="ADMIN">
                            <input type="hidden" id="IDMEMBER" name="IDMEMBER">
                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <h3 style="font-weight:bold;">Informasi Member</h3>
                                    <label style="display:flex; justify-content:space-between; align-items:center;">
                                        <span>
                                            Nama Member 
                                            <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i>
                                        </span>

                                        <span>
                                            <input type="checkbox" class="flat-blue" id="STATUS" name="STATUS" value="1">
                                            &nbsp;
                                            Aktif
                                        </span>
                                    </label>
                                    <div style="display:flex; justify-content:space-between; align-items:center;">
                                        <input type="text" class="form-control" id="NAMADEPAN" name="NAMADEPAN" placeholder="Nama Depan">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="text" class="form-control" id="NAMABELAKANG" name="NAMABELAKANG" placeholder="Nama Belakang">
                                    </div>
                                    <br>
                                    <label>NIK KTP <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="NIK" name="NIK" placeholde="...">
                                    <br>
                                    <label>Tanggal Lahir <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="TGLLAHIR" name="TGLLAHIR" placeholder="Cth:1999-01-01">
                                    <br>
                                    <label>Alamat <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="ALAMAT" name="ALAMAT" placeholder="...">
                                    <br>
                                    <label>Nomor Telepon <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="TELP" name="TELP" placeholder="Cth : 628xxxxxxxxxx">
                                    <br>
                                    <label>Kontak Darurat <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="TELPDARURAT" name="TELPDARURAT" placeholder="Cth : 628xxxxxxxxxx">
                                    <br>
                                    <label>Email <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="EMAIL" name="EMAIL" placeholder="..." readonly >
                                    <br>
                                    <label>Password <i style="color:grey;">&nbsp;&nbsp;&nbsp;Auto Generate</i></label>
                                    <div style="display:flex; gap:6px;">
                                    <input type="text" class="form-control" id="PASS" name="PASS" placeholder="Dibuat oleh System / dari User" readonly>
                                    <button type="button" id="KIRIMPASSWORD" class="btn btn-warning" onclick="javascript:kirimEmailPassword()">Kirim Email Ubah Password ke Member</button>
                                    </div>
                                    <br>
                                    <label>Akun Instagram</label>
                                    <input type="text" class="form-control" id="INSTAGRAM" name="INSTAGRAM" placeholder="...">
                                    <br>
                                    <label>Akun Tiktok</label>
                                    <input type="text" class="form-control" id="TIKTOK" name="TIKTOK" placeholder="...">
                                    <br>      
                                    <label>Foto Profil <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i> </label>
                                    <br>
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
                                    <br><br>
                                    <h3 style="font-weight:bold;">Informasi Lain</h3>
                                    <label>Catatan</label>
                                    <textarea class="form-control" rows="3" id="CATATAN" name="CATATAN" placeholder="Catatan....."></textarea>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpan()">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
        </div>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row (main row) -->
<div

</section>
<!-- /.content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<script>

$(document).ready(function() {

    $('.select2').select2({
		dropdownAutoWidth: true, 
	});

    $('#TGLLAHIR').datepicker({
        format: "yyyy-mm-dd", // sesuai format database
        autoclose: true,
        todayHighlight: true
    });

    $("#mode").val('tambah');
    $("#STATUS").prop('checked',true).iCheck('update');
    

    $('#dataGrid').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		"scrollX"	  : true,
		ajax		  : {
			url    : base_url+'Master/Data/Member/dataGrid',
			dataSrc: "rows",
			// dataFilter: function (data) {
            //     // Refresh the new table whenever DataTable reloads
            //     var allData = JSON.parse(data).rows; // Get all rows' data

            //     // Create the HTML structure for the new table
            //     var newTable = $('<table id="newTable" class="table table-bordered">');
            //     var thead = $('<thead>').append('<tr><th>Kode CLUB</th><th>Nama CLUB</th><th>Alamat</th><th>Telp</th><th>Fax</th><th>Email</th><th>Website</th><th>Nama Bank</th><th>No Rekening</th><th>Contact Person</th><th>Telp CP</th><th>Email CP</th><th>NPWP</th><th>Catatan</th><th>User Buat</th><th>Tgl Entry</th><th>Status</th></tr>');
            //     var tbody = $('<tbody>');
            //      // Loop through the DataTable data and create rows for the new table
         
            //     allData.forEach(function (row, index) {
            //         var tr = $('<tr>');
            //         tr.append('<td>' + (row.KODECLUB) + '</td>');
            //         tr.append('<td>' + (row.NAMA) + '</td>');
            //         tr.append('<td>' + (row.ALAMAT == null?"":row.ALAMAT) + '</td>');
            //         tr.append('<td>' + (row.TELP == null?"":row.TELP) + '</td>');
            //         tr.append('<td>' + (row.FAX == null?"":row.FAX) + '</td>');
            //         tr.append('<td>' + (row.EMAIL == null?"":row.EMAIL) + '</td>');
            //         tr.append('<td>' + (row.WEBSITE == null?"":row.WEBSITE) + '</td>');
            //         tr.append('<td>' + (row.NAMABANK == null?"":row.NAMABANK) + '</td>');
            //         tr.append('<td>' + (row.NOREKENING == null?"":row.NOREKENING) + '</td>');
            //         tr.append('<td>' + (row.CP == null?"":row.CP) + '</td>');
            //         tr.append('<td>' + (row.TELPCP == null?"":row.TELPCP) + '</td>');
            //         tr.append('<td>' + (row.EMAILCP == null?"":row.EMAILCP) + '</td>');
            //         tr.append('<td>' + (row.NPWP == null?"":row.NPWP) + '</td>');
            //         tr.append('<td>' + (row.CATATAN== null?"":row.CATATAN) + '</td>');
            //         tr.append('<td>' + row.USERBUAT + '</td>');
            //         tr.append('<td class="text-center">' + row.TGLENTRY + '</td>');
            //         tr.append('<td class="text-center">' + (row.STATUS == 1 ? 'AKTIF' : 'NON AKTIF') + '</td>');
            
            //         // Append the row to the tbody
            //         tbody.append(tr);
            //     });
            
            //     // Append the thead and tbody to the new table
            //     newTable.append(thead).append(tbody);
            //     // Append the new table to the DOM (you can specify where you want the new table to appear)
            //     $('#tableExcel').html(newTable); 
                
            //     return data;
            // }
		},      
        columns:[
            {data: ''},
            {data: 'IDMEMBER', visible:false},
            {data: 'NAMA'},
            {data: 'ALAMAT'},
            {data: 'TELP'},
            {data: 'TELPDARURAT'},
            {data: 'EMAIL'},
            {data: 'CATATAN'},
            {data: 'USERBUAT'},
            {data: 'TGLENTRY', className:"text-center"},
            {data: 'STATUS', className:"text-center"},            
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
			},
			{
                "targets": -1,
                "render" :function (data) 
                            {
                                if (data == 1) return '<input type="checkbox" class="flat-blue" checked disabled></input>';
                                else return '<input type="checkbox" class="flat-blue" disabled></input>';
                            },	
			},
		]
    });

//DAPATKAN INDEX
var table = $('#dataGrid').DataTable();
$('#dataGrid tbody').on( 'click', 'button', function () {
		var row = table.row( $(this).parents('tr') ).data();
		var mode = $(this).attr("id");
		
		if(mode == "btn_ubah"){ ubah(row); }
		else if(mode == "btn_hapus"){ hapus(row); }

	} );

    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });
});

// function exportTableToExcel() {
//   var wb = XLSX.utils.table_to_book(document.getElementById('tableExcel'), {sheet:"Sheet 1"});
//   const ws = wb.Sheets[wb.SheetNames[0]];
//   ws['!cols'] = [
//     { wpx: 70 }, // Column A width in pixels
//     { wpx: 200 }, // Column B width in pixels
//     { wpx: 300 },  // Column C width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 120 },  // Column C width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 60 },  // Column C width in pixels
//     { wpx: 150 },  // Column C width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 120 },  // Column C width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 150 },  // Column C width in pixels
//     { wpx: 100 }, // Column A width in pixels
//     { wpx: 70 }, // Column B width in pixels
//     { wpx: 50 },  // Column C width in pixels
//   ];
//   // Trigger download
//   XLSX.writeFile(wb, 'CLUB_'+dateNowFormatExcel()+'.xlsx');
// }

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

function tambah(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
				$("#mode").val('tambah');

				//pindah tab & ganti judul tab
				$('.nav-tabs a[href="#tab_form"]').tab('show');
				$('.nav-tabs a[href="#tab_form"]').html('Tambah');
                clearForm();
		} else {
			Swal.fire({
				title            : 'Anda Tidak Memiliki Hak Akses',
				type             : 'warning',
				showConfirmButton: false,
				timer            : 1500
			});
		}
	});
}

function ubah(row){
	get_akses_user('<?=$_GET['kode']?>', async function(data){
		if (data.UBAH==1) {
            clearForm();
			$("#mode").val('ubah');
			
			//pindah tab & ganti judul tab
			$('.nav-tabs a[href="#tab_form"]').tab('show');
			$('.nav-tabs a[href="#tab_form"]').html('Ubah');

			//load row data to form
			if(row.STATUS == 0) $("#STATUS").prop('checked',false).iCheck('update');
			else if(row.STATUS == 1) $("#STATUS").prop('checked',true).iCheck('update');
            $("#IDMEMBER").val(row.IDMEMBER);
            $("#NAMADEPAN").val(row.NAMADEPAN);
            $("#NAMABELAKANG").val(row.NAMABELAKANG);
            $("#NIK").val(row.NIK);
            $("#TGLLAHIR").val(row.TGLLAHIR);
            $("#ALAMAT").val(row.ALAMAT);
            $("#TELP").val(row.TELP);
            $("#TELPDARURAT").val(row.TELPDARURAT);
            $("#EMAIL").val(row.EMAIL);
            $("#INSTAGRAM").val(row.INSTAGRAM);
            $("#TIKTOK").val(row.TIKTOK);
            $("#CATATAN").val(row.CATATAN);
            $("#STATUS").val(row.STATUS);

            var link = '';
            var exists = false;

            link = '<?=base_url()?>assets/images/member/'+row.IDMEMBER+'.png?t='+ Date.now();
            exists = await imageExists(link);
            if(exists)
            {
                $('#previewGambar').attr('src', link);
            }
            
            $("#KIRIMPASSWORD").show();
            
		} else {
			Swal.fire({
				title            : 'Anda Tidak Memiliki Hak Akses',
				type             : 'warning',
				showConfirmButton: false,
				timer            : 1500
			});
		}
	});
}

function simpan() {
    var namadepan = $("#NAMADEPAN").val();
    var namabelakang = $("#NAMABELAKANG").val();
    let nik = $('#NIK').val();
    let tgllahir = $('#TGLLAHIR').val();
    let alamat = $('#ALAMAT').val();
    let telp = $('#TELP').val();
    let telpdarurat = $('#TELPDARURAT').val();
    let email = $('#EMAIL').val();

    $("#STATUS").val(($("#STATUS").prop('checked')?1:0));

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

            loading();
            $.ajax({
                type: 'POST',
                url: base_url+'Master/Data/Member/simpan',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'json',

                success: function(msg){
                    Swal.close();
                    if (msg.success) {
                        Swal.fire({
                            title: 'Simpan Data Sukses',
                            type: 'success',
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $("#dataGrid").DataTable().ajax.reload();
                        tambah();
                        $('.nav-tabs a[href="#tab_grid"]').tab('show');

                    } else {
                        Swal.fire({
                            title: msg.errorMsg,
                            type: 'error',
                            timer: 1500
                        });
                    }
                }
            }); 
        }
    }
}

function hapus(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
		    
            if (row) {
    		    Swal.fire({
                		title: 'Anda Yakin Akan Menghapus Member '+row.NAMA+' ?',
                		showCancelButton: true,
                		confirmButtonText: 'Yakin',
                		cancelButtonText: 'Tidak',
                		}).then((result) => {
                		/* Read more about isConfirmed, isDenied below */
                			if (result.value) {
                              $("#mode").val('hapus');
                                loading();
                    		    $.ajax({
                    		    	type    : 'POST',
                    		    	dataType: 'json',
                    		    	url     : base_url+"Master/Data/Member/hapus",
                    		    	data    : "id="+row.IDMEMBER ,
                    		    	cache   : false,
                    		    	success : function(msg){
                                        Swal.close();
                    		    		if (msg.success) {
                    		    			Swal.fire({
                    		    				title            : 'Member dengan nama '+row.NAMA+' telah dihapus',
                    		    				type             : 'success',
                    		    				showConfirmButton: false,
                    		    				timer            : 1500
                    		    			});
                    		    			$("#dataGrid").DataTable().ajax.reload();
                    		    			$('.nav-tabs a[href="#tab_grid"]').tab('show');
                                            clearForm();
                    		    		} else {
                    		    				Swal.fire({
                    		    					title            : msg.errorMsg,
                    		    					type             : 'error',
                    		    					showConfirmButton: false,
                    		    					timer            : 1500
                    		    				});
                    		    		}
                    		    	}
                    		    });
                			} 
                    });
            }
			
		} else {
			Swal.fire({
				title            : 'Anda Tidak Memiliki Hak Akses',
				type             : 'warning',
				showConfirmButton: false,
				timer            : 1500
			});
		}
	});
}

function kirimEmailPassword(){
    loading();
    $.ajax({
        type    : 'POST',
        url     : base_url+'Master/Data/Member/emailChangePassword',
        data    : "e="+$("#EMAIL").val(),
        cache   : false,
        dataType: 'json',
        success: function(msg){
            // Swal.close();
            if (msg.success) {
                Swal.fire({
                    title: 'Email Ubah Password Berhasil Dikirim',
                    type: 'success',
                    showConfirmButton: false,
                    timer: 1500
                });
            } else {
                Swal.fire({
                	title            : msg.errorMsg,
                	type             : 'error',
                	showConfirmButton: false,
                	timer            : 1500
                });
            }
         }
    }); 
}

function clearForm(){
	//clear form input
	$("#STATUS").prop('checked',true).iCheck('update');
    $("#IDMEMBER").val("");
	$("#NAMADEPAN").val("");
	$("#NAMABELAKANG").val("");
	$("#TGLLAHIR").val("");
	$("#NIK").val("");
	$("#GAMBAR").val("");
	$("#GAMBARGALLERY").val("");
	$("#GAMBARKAMERA").val("");
	$("#ALAMAT").val("");
	$("#TELP").val("");
	$("#TELPDARURAT").val("");
	$("#EMAIL").val("");
	$("#INSTAGRAM").val("");
	$("#TIKTOK").val("");
	$("#CATATAN").val("");

    $("#KIRIMPASSWORD").hide();

    $('#previewGambar').attr('src', '<?=base_url()?>assets/images/member/no-member.png'); // 🔥 tambahan
}

function get_akses_user(kodemenu, callback) {
	$.ajax({
		dataType: "json",
		type: 'POST',
		url: base_url+"Master/Data/User/getUserAkses",
		data: "kodemenu=" + kodemenu+ " &iduser=<?= $_SESSION[NAMAPROGRAM]['IDUSER']?>",
		cache: false,
		success: function (msg) {
			if (msg.success) {
				callback(msg.data);
			} else {
				$.messager.alert('Error', msg.errorMsg, 'error');
			}
		}
	});
}
</script>
