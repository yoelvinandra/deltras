
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Master Player
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
                                <th>Position</th>
                                <th>Squad Number</th>
                                <th>Club</th>
                                <th>Alamat</th>
                                <th>Telp</th>
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
                            <input type="hidden" id="IDPLAYER" name="IDPLAYER">
                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <h3 style="font-weight:bold;">Informasi Player</h3>
                                    <label style="display:flex; justify-content:space-between; align-items:center;">
                                        <span>
                                            Nama Player 
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
                                    <label>Foto Player <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i> </label>
                                    <br>
                                    <div style="display:flex; align-items:center; gap:20px;">
                                        <div>
                                            <img id="previewGambar" src="<?=base_url()?>assets/images/player/no-player.png" style="border:1px solid #ccc; object-fit: contain;" width="242" height="294">
                                            <input type="file" class="form-control" id="GAMBAR" name="GAMBAR" accept="image/png" style="width:242px;">
                                        </div>
                                        <span>Syarat :<br>- Format wajib PNG<br>- Ukuran maks 242x294 px<br>- Kapasitas gambar maks 1000 kb</span>
                                    </div>
                                    <br>
                                   <div style="display:flex; gap:15px; width:100%;">
                                        
                                        <div style="flex:1;">
                                            <label>Club <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                            <br>
                                            <select class="form-control select2" id="IDCLUB" name="IDCLUB" style="width:100%">
                                                <option value="">-PILIH-</option>
                                            </select>
                                        </div>

                                        <div style="flex:1;">
                                            <label>Position <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                            <select class="form-control" id="POSITION" name="POSITION">
                                            </select>
                                        </div>

                                        <div id="divsquadnumber" style="flex:1;">
                                            <label>Squad Number <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                            <input type="number" class="form-control" id="SQUADNUMBER" name="SQUADNUMBER">
                                        </div>

                                    </div>

                                    <br>

                                    <div style="display:flex; gap:15px; width:100%;">

                                        <div id="divgoal"  style="flex:1;">
                                            <label>Goal</label>
                                            <input type="text" class="form-control" id="GOAL" name="GOAL" placeholder="0">
                                        </div>

                                        <div id="divassist"  style="flex:1;">
                                            <label>Assist</label>
                                            <input type="text" class="form-control" id="ASSIST" name="ASSIST" placeholder="0">
                                        </div>

                                        <div id="divgksave" style="flex:1;">
                                            <label>GK Save</label>
                                            <input type="text" class="form-control" id="GKSAVE" name="GKSAVE" placeholder="0">
                                        </div>

                                    </div>
                                    <br>
                                    <label>Tgl Bergabung </label>
                                    <input type="text" class="form-control" id="TGLBERGABUNG" name="TGLBERGABUNG" placeholder="...">
                                    <br><br>
                                    <h3 style="font-weight:bold;">Data Pribadi Player</h3>
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="3" id="DESKRIPSI" name="DESKRIPSI" placeholder="..."></textarea>
                                    <br>
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" id="ALAMAT" name="ALAMAT" placeholder="...">
                                    <br>
                                    <label>Telp</label>
                                    <input type="text" class="form-control" id="TELP" name="TELP" placeholder="Cth : 628xxxxxxxxxx">
                                    <br>
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="EMAIL" name="EMAIL" placeholder="...">
                                    <br>
                                    <label>Facebook</label>
                                    <input type="text" class="form-control" id="FACEBOOK" name="FACEBOOK" placeholder="...">
                                    <br>
                                    <label>Instagram</label>
                                    <input type="text" class="form-control" id="INSTAGRAM" name="INSTAGRAM" placeholder="...">
                                    <br>
                                    <label>X</label>
                                    <input type="text" class="form-control" id="X" name="X" placeholder="...">
                                    <br>
                                    <label>Tiktok</label>
                                    <input type="text" class="form-control" id="TIKTOK" name="TIKTOK" placeholder="...">
                                    <br>
                                    <label>Link Video</label>
                                    <input type="text" class="form-control" id="VIDEO" name="VIDEO" placeholder="...">
                                    <br>
                                    <label>Tanda Tangan</label>
                                    <br>
                                    <div style="display:flex; align-items:center; gap:20px;">
                                        <div>
                                            <img id="previewSign" src="<?=base_url()?>assets/images/player/no-player-sign.png" style="border:1px solid #ccc;" width="242" height="294">
                                            <input type="file" class="form-control" id="SIGN" name="SIGN" accept="image/png" style="width:242px;">
                                        </div>
                                        <span>Syarat :<br>- Format wajib PNG<br>- Ukuran maks 242x294 px<br>- Kapasitas gambar maks 1000 kb</span>
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

</section>
<!-- /.content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<script>
var indexRow;
var configTeam = [];
var labelPosition = [
    {
        'NAME' : 'GOAL KEEPER',
        'VALUE' : 'GOALKEEPER'
    },
    {
        'NAME' : 'DEFENDERS',
        'VALUE' : 'DEFENDERS'
    },
    {
        'NAME' : 'MIDFIELDERS',
        'VALUE' : 'MIDFIELDERS'
    },
    {
        'NAME' : 'FORWARDS',
        'VALUE' : 'FORWARDS'
    },
    {
        'NAME' : 'CEO',
        'VALUE' : 'CEO'
    },
    {
        'NAME' : 'COO',
        'VALUE' : 'COO'
    },
    {
        'NAME' : 'CLUB SECRETARY',
        'VALUE' : 'CLUBSECRETARY'
    },
    {
        'NAME' : 'ACADEMY DIRECTOR',
        'VALUE' : 'ACADEMYDIRECTOR'
    }
];

$(document).ready(function() {

    $('.select2').select2({
		dropdownAutoWidth: true, 
	});

    $('#TGLBERGABUNG').datepicker({
        format: "yyyy-mm-dd", // sesuai format database
        autoclose: true,
        todayHighlight: true
    });

    $("#mode").val('tambah');
    $("#STATUS").prop('checked',true).iCheck('update');

    var opsi = '<option value="">-Pilih-</option>';
    for(var x = 0 ; x < labelPosition.length; x++)
    {
        opsi += "<option value='"+labelPosition[x].VALUE+"'>"+labelPosition[x].NAME+"</option>";
    }
    $("#POSITION").html(opsi);

    $.ajax({
        url: base_url + 'Master/Data/Player/configTeam',
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            configTeam = data.rows;
        }
    });

    $('#IDCLUB').select2({
        ajax: {
            url: base_url + 'Master/Data/Club/comboGrid',
            dataType: 'json',
            delay: 250,
            cache: false, // 🔥 disable cache
            data: function (params) {
                return {
                    search: "DELTRAS" // 🔥 kirim keyword params.term
                };
            },
            processResults: function (data) {
                return {
                    results: data.rows.map(function (row) {
                        return {
                            id: row.VALUE,
                            text: row.TEXT
                        };
                    })
                };
            }
        }
    });

    $("#POSITION").change(function(){
        let value = $(this).val();

        setPosition(value);
    });
    

    $('#dataGrid').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		"scrollX"	  : true,
		ajax		  : {
			url    : base_url+'Master/Data/Player/dataGrid',
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
            {data: 'IDPLAYER', visible:false},
            {data: 'NAMA'},
            {data: 'POSITION'},
            {data: 'SQUADNUMBER'},
            {data: 'CLUB'},
            {data: 'ALAMAT'},
            {data: 'TELP'},
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
                "targets": 3,
                "render" :function (data) 
                            {
                                for(var x = 0 ; x < labelPosition.length;x++)
                                {
                                   if(labelPosition[x].VALUE == data) 
                                   {
                                        return labelPosition[x].NAME;
                                   }
                                }
                            },
			},
            {
                "targets": 4,
                "render" :function (data) 
                            {
                                if (data == 0)
                                {
                                    return '-';
                                }
                                else
                                {
                                    return data;
                                }
                            },
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
        $('#previewGambar').attr('src', '<?=base_url()?>assets/images/player/no-player.png');
        return;
    }

    // cek format
    if (file.type !== "image/png") {
        Swal.fire({
            title: "File harus PNG",
            type: "warning"
        });
        $(this).val('');
        $('#previewGambar').attr('src', '<?=base_url()?>assets/images/player/no-player.png');
        return;
    }

    let img = new Image();
    let objectUrl = URL.createObjectURL(file);

    img.onload = function () {
        // 🔥 perbaikan logika (pakai OR, bukan AND)
        if (this.width > 242 || this.height > 294) {
            Swal.fire({
                title: "Ukuran maks 242x294 px",
                type: "warning"
            });
            $('#GAMBAR').val('');
            $('#previewGambar').attr('src', '<?=base_url()?>assets/images/player/no-player.png');
        } else {
            $('#previewGambar')
                .attr('src', objectUrl)
                .show();
        }
    };

    img.src = objectUrl;
});

$('#SIGN').on('change', function(event) {
    let file = event.target.files[0];

    if (!file) return;

    // 🔥 CEK SIZE (1000 KB)
    if (file.size > 1000 * 1024) {
        Swal.fire({
            title: "Ukuran file maksimal 1000 KB",
            type: "warning"
        });
        $(this).val('');
        $('#previewSign').attr('src', '<?=base_url()?>assets/images/player/no-player-sign.png');
        return;
    }

    // cek format
    if (file.type !== "image/png") {
        Swal.fire({
            title: "File harus PNG",
            type: "warning"
        });
        $(this).val('');
        $('#previewSign').attr('src', '<?=base_url()?>assets/images/player/no-player-sign.png');
        return;
    }

    let img = new Image();
    let objectUrl = URL.createObjectURL(file);

    img.onload = function () {
        // 🔥 perbaikan logika (pakai OR, bukan AND)
        if (this.width > 242 || this.height > 294) {
            Swal.fire({
                title: "Ukuran maks 242x294 px",
                type: "warning"
            });
            $('#SIGN').val('');
            $('#previewSign').attr('src', '<?=base_url()?>assets/images/player/no-player-sign.png');
        } else {
            $('#previewSign')
                .attr('src', objectUrl)
                .show();
        }
    };

    img.src = objectUrl;
});

function setPosition(value){
    $("#divsquadnumber").hide();
    $("#divgoal").hide();
    $("#divassist").hide();
    $("#divgksave").hide();

    $("#GOAL").val("");
    $("#ASSIST").val("");
    $("#GKSAVE").val("");
    $("#SQUADNUMBER").val("");

    for(var x = 0 ; x < configTeam.length ; x++)
    {
        if(configTeam[x].VALUE == value)
        {
            if(configTeam[x].HEAD.split("-")[0] == 'SENIOR TEAM')
            {
                $("#divsquadnumber").show();
                $("#divgoal").show();
                $("#divassist").show();
            }

            if(configTeam[x].VALUE == 'GOALKEEPER')
            {
                $("#divgksave").show();
            }
        }
    }
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
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
			$("#mode").val('ubah');
			
			//pindah tab & ganti judul tab
			$('.nav-tabs a[href="#tab_form"]').tab('show');
			$('.nav-tabs a[href="#tab_form"]').html('Ubah');

			//load row data to form
			if(row.STATUS == 0) $("#STATUS").prop('checked',false).iCheck('update');
			else if(row.STATUS == 1) $("#STATUS").prop('checked',true).iCheck('update');
			var newOption = new Option(row.CLUB, row.IDCLUB, true, true);
            $('#IDCLUB').append(newOption).trigger('change');
			$("#POSITION").val(row.POSITION);
            setPosition(row.POSITION);
            $("#IDPLAYER").val(row.IDPLAYER);
            $("#GOAL").val(row.GOAL);
            $("#ASSIST").val(row.ASSIST);
            $("#GKSAVE").val(row.GKSAVE);
			$("#NAMADEPAN").val(row.NAMADEPAN);
			$("#NAMABELAKANG").val(row.NAMABELAKANG);
			$("#SQUADNUMBER").val(row.SQUADNUMBER);
			$("#VIDEO").val(row.VIDEO);
			$("#TGLBERGABUNG").val(row.TGLBERGABUNG);
			$("#DESKRIPSI").val(row.DESKRIPSI);
			$("#ALAMAT").val(row.ALAMAT);
			$("#TELP").val(row.TELP);
			$("#EMAIL").val(row.EMAIL);
			$("#FACEBOOK").val(row.FACEBOOK);
			$("#X").val(row.X);
			$("#INSTAGRAM").val(row.INSTAGRAM);
			$("#TIKTOK").val(row.TIKTOK);
			$("#CATATAN").val(row.CATATAN);
            $('#previewGambar').attr('src', '<?=base_url()?>assets/images/player/'+row.IDPLAYER+'.png?t='+ Date.now());
            $('#previewSign').attr('src', '<?=base_url()?>assets/images/player/'+row.IDPLAYER+'-sign.png?t='+ Date.now());
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

    let email = $('#EMAIL').val();
    let telp = $('#TELP').val();
    var namadepan = $("#NAMADEPAN").val();
    var namabelakang = $("#NAMABELAKANG").val();
    var position = $("#POSITION").val();
    var idclub = $("#IDCLUB").val();

    if(!namadepan)
    {
        Swal.fire({ title: "Nama Depan dan Nama Belakang wajib diisi", type: "warning" });
        return;
    }
    else if(!idclub)
    {
        Swal.fire({ title: "Club wajib diisi", type: "warning" });
        return;
    }
    else if(!position)
    {
        Swal.fire({ title: "Position wajib diisi", type: "warning" });
        return;
    }
    else if(position)
    {
        for(var x = 0 ; x < configTeam.length ; x++)
        {
            if(configTeam[x].VALUE == position)
            {
                if(configTeam[x].HEAD.split("-")[0] == 'SENIOR TEAM')
                {
                    let squadnumber = $('#SQUADNUMBER').val();
               
                    if (!squadnumber) {
                        Swal.fire({ title: "Squad Number wajib diisi", type: "warning" });
                        return;
                    }
                }
            }
        }

        if (telp && !isValidPhone(telp)) {
            Swal.fire({ title: "No Telp harus diawali 62, dengan panjang 10-15 karakter", type: "warning" });
            return;
        }
        else if (email && !isValidEmail(email)) {
            Swal.fire({ title: "Format Email tidak valid", type: "warning" });
            return;
        }
        else
        {
            let formData = new FormData($('#form_input')[0]);

            $.ajax({
                type: 'POST',
                url: base_url+'Master/Data/Player/simpan',
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
}

function hapus(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
		    
            if (row) {
    		    Swal.fire({
                		title: 'Anda Yakin Akan Menghapus Player '+row.NAMA+' ?',
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
                    		    	url     : base_url+"Master/Data/Player/hapus",
                    		    	data    : "id="+row.IDPLAYER ,
                    		    	cache   : false,
                    		    	success : function(msg){
                    		    		if (msg.success) {
                    		    			Swal.fire({
                    		    				title            : 'Player dengan nama '+row.NAMA+' telah dihapus',
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
	$('#IDCLUB').val(null).trigger('change');
    $("#IDPLAYER").val("");
    $("#GOAL").val("");
    $("#ASSIST").val("");
    $("#GKSAVE").val("");
	$("#NAMADEPAN").val("");
	$("#NAMABELAKANG").val("");
    $("#SQUADNUMBER").val("");
	$("#POSITION").val("");
	$("#VIDEO").val("");
	$("#TGLBERGABUNG").val("");
	$("#GAMBAR").val("");
	$("#SIGN").val("");
	$("#DESKRIPSI").val("");
	$("#ALAMAT").val("");
	$("#TELP").val("");
	$("#EMAIL").val("");
    $("#FACEBOOK").val("");
	$("#X").val("");
	$("#INSTAGRAM").val("");
	$("#TIKTOK").val("");
	$("#CATATAN").val("");

    
    $("#divsquadnumber").hide();
    $("#divgoal").hide();
    $("#divassist").hide();
    $("#divgksave").hide();

    $('#previewGambar').attr('src', '<?=base_url()?>assets/images/player/no-player.png'); // 🔥 tambahan
    $('#previewSign').attr('src', '<?=base_url()?>assets/images/player/no-player-sign.png'); // 🔥 tambahan
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
