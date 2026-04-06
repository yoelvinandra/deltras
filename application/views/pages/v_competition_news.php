
<link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    News
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
                                <th>Judul</th>
                                <th>Tgl Terbit</th>
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
                            <input type="hidden" id="IDNEWS" name="IDNEWS">
                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <h3 style="font-weight:bold;">Informasi Berita</h3>
                                    <label style="display:flex; justify-content:space-between; align-items:center;">
                                        <span>
                                            Judul Berita 
                                            <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i>
                                        </span>

                                        <span>
                                            <input type="checkbox" class="flat-blue" id="STATUS" name="STATUS" value="1">
                                            &nbsp;
                                            Aktif
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" id="TITLE" name="TITLE" placeholder="...">
                                    <br>
                                    <label>Gambar Berita <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i> </label>
                                    <br>
                                    <div style="display:flex; align-items:center; gap:20px;">
                                        <div>
                                            <img id="previewGambar" src="<?=base_url()?>assets/images/news/no-image.png" style="border:1px solid #ccc;" width="390" height="200">
                                            <input type="file" class="form-control" id="GAMBAR" name="GAMBAR" accept="image/png" style="width:390px;">
                                        </div>
                                        <span>Syarat :<br>- Format wajib PNG<br>- Ukuran maks 390x200 px<br>- Kapasitas gambar maks 1000 kb</span>
                                    </div>
                                    <br>
                                    <label>Tgl Terbit <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <input type="text" class="form-control" id="TGLTERBIT" name="TGLTERBIT" placeholder="...">
                                    <br>
                                    <label>Detail Berita <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <textarea class="form-control" rows="20" id="DETAIL" name="DETAIL" placeholder="..."></textarea>
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

</section>
<!-- /.content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>
<script>
var indexRow;

var summernoteConfig = {
    lang: 'id-ID',
    height: 400,
    minHeight: 200,
    maxHeight: 800,
    placeholder: 'Tulis isi berita di sini...',
    toolbar: [
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'clear']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['table', ['table']],
        ['insert', ['link']],
        ['view', [ 'undo', 'redo']]
    ]
};

$(document).ready(function() {
    
    $('#DETAIL').summernote(summernoteConfig);

    $('#TGLTERBIT').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',  // format sesuai database
        showTodayButton: true,           // tombol "Hari Ini"
        showClear: true,                 // tombol hapus
        showClose: true,                 // tombol tutup
        sideBySide: true,                // kalender & jam tampil bersamaan
        locale: 'id',                    // bahasa Indonesia
    });

    // Ambil nilai saat berubah
    $('#TGLTERBIT').on('dp.change', function (e) {
        var tgl = $('#TGLTERBIT').val();
        console.log('Tanggal dipilih: ' + tgl);
        // tgl sudah dalam format YYYY-MM-DD HH:mm:ss, siap disimpan ke database
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
			url    : base_url+'Competition/Operational/News/dataGrid',
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
            {data: 'IDNEWS', visible:false},
            {data: 'TITLE'},
            {data: 'TGLTERBIT',  className:"text-center"},
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

$('#GAMBAR').on('change', function(event) {
    let file = event.target.files[0];

    if (!file) return;

    // 🔥 CEK SIZE (1000 KB)
    if (file.size > 1000 * 1024) {
        Swal.fire({
            title: "Ukuran file maksimal 1000 KB",
            type: "warning"
        });
        $(this).val('');
        $('#previewGambar').attr('src', '<?=base_url()?>assets/images/news/no-image.png');
        return;
    }

    // cek format
    if (file.type !== "image/png") {
        Swal.fire({
            title: "File harus PNG",
            type: "warning"
        });
        $(this).val('');
        $('#previewGambar').attr('src', '<?=base_url()?>assets/images/news/no-image.png');
        return;
    }

    let img = new Image();
    let objectUrl = URL.createObjectURL(file);

    img.onload = function () {
        // 🔥 perbaikan logika (pakai OR, bukan AND)
        if (this.width > 390 || this.height > 200) {
            Swal.fire({
                title: "Ukuran maks 390x200 px",
                type: "warning"
            });
            $('#GAMBAR').val('');
            $('#previewGambar').attr('src', '<?=base_url()?>assets/images/news/no-image.png');
        } else {
            $('#previewGambar')
                .attr('src', objectUrl)
                .show();
        }
    };

    img.src = objectUrl;
});

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
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
			$("#mode").val('ubah');
			
			//pindah tab & ganti judul tab
			$('.nav-tabs a[href="#tab_form"]').tab('show');
			$('.nav-tabs a[href="#tab_form"]').html('Ubah');

			//load row data to form
			if(row.STATUS == 0) $("#STATUS").prop('checked',false).iCheck('update');
			else if(row.STATUS == 1) $("#STATUS").prop('checked',true).iCheck('update');
			$("#IDNEWS").val(row.IDNEWS);
            $("#STATUS").prop('checked',true).iCheck('update');
			$("#TITLE").val(row.TITLE);
			$("#TGLTERBIT").val(row.TGLTERBIT);
            $('#previewGambar').attr('src', '<?=base_url()?>assets/images/news/'+row.IDNEWS+'.png?t='+ Date.now());
			$('#DETAIL').summernote('code', row.DETAIL); // ✅
			$("#CATATAN").val(row.CATATAN);
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
    let title = $('#TITLE').val();
    let tglterbit = $('#TGLTERBIT').val();
    let detail = $('#DETAIL').summernote('code');
    let detailStrip = detail.replace(/<[^>]*>/g, '').trim(); // hapus tag HTML
    

    if(!title){
        Swal.fire({ title: "Judul Berita tidak boleh kosong", type: "warning" });
        return;
    }
    else if (!detailStrip) {
        Swal.fire({ title: "Detail Berita tidak boleh kosong", type: "warning" });
        return;
    }
    else if (!tglterbit) {
        Swal.fire({ title: "Tanggal Terbit tidak boleh kosong", type: "warning" });
        return;
    }
    else
    {
        $('#DETAIL').val($('#DETAIL').summernote('code'));
        let formData = new FormData($('#form_input')[0]);

        $.ajax({
            type: 'POST',
            url: base_url+'Competition/Operational/News/simpan',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',

            success: function(msg){
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

function hapus(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
		    
            if (row) {
    		    Swal.fire({
                		title: 'Anda Yakin Akan Menghapus Berita '+row.TITLE+' ?',
                		showCancelButton: true,
                		confirmButtonText: 'Yakin',
                		cancelButtonText: 'Tidak',
                		}).then((result) => {
                		/* Read more about isConfirmed, isDenied below */
                			if (result.value) {
                              $("#mode").val('hapus');
                    		    $.ajax({
                    		    	type    : 'POST',
                    		    	dataType: 'json',
                    		    	url     : base_url+"Competition/Operational/News/hapus",
                    		    	data    : "id="+row.IDNEWS ,
                    		    	cache   : false,
                    		    	success : function(msg){
                    		    		if (msg.success) {
                    		    			Swal.fire({
                    		    				title            : 'Berita dengan judul '+row.TITLE+' telah dihapus',
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

function clearForm(){
	//clear form input
	$("#STATUS").prop('checked',true).iCheck('update');
	$("#IDNEWS").val("");
	$("#TITLE").val("");
	$("#TGLTERBIT").val("");
	$("#GAMBAR").val(""); 
    $('#DETAIL').summernote('reset');  
	$("#CATATAN").val("");
    $('#previewGambar').attr('src', '<?=base_url()?>assets/images/news/no-image.png'); // 🔥 tambahan
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
