
<link rel="stylesheet" href="bootstrap-datetimepicker.min.css">
<link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Fixture
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
                                <th>Season Awal</th>
                                <th>Season Akhir</th>
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
                            <input type="hidden" id="IDFIXTURE" name="IDFIXTURE">
                            <input type="hidden" id="DETAILFIXTURE" name="DETAILFIXTURE">
                            <div class="box-body">
                                <div class="form-group col-md-6">
                                    <h3 style="font-weight:bold;">Informasi Fixture</h3>
                                    <label style="display:flex; justify-content:space-between; align-items:center;">
                                        <span>
                                            Nama 
                                            <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i>
                                        </span>
                                         <span>
                                            <input type="checkbox" class="flat-blue" id="STATUS" name="STATUS" value="1">
                                            &nbsp;
                                            Aktif
                                        </span>
                                    </label>
                                    <input type="text" class="form-control" id="NAMA" name="NAMA" placeholder="...">
                                    <br>
                                    <label>Season <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                                    <div>
                                        <input style="width:48%; float:left;" type="text" class="form-control" id="SEASONAWAL" name="SEASONAWAL" placeholder="...">
                                        <div style="float:left; width:4%; text-align:center; padding-top:8px;" >&nbsp;s/d&nbsp;</div>
                                        <input style="width:48%; " type="text" class="form-control" id="SEASONAKHIR" name="SEASONAKHIR" placeholder="...">
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <br>
                                    <div style="margin-bottom:10px;">
                                        <button type="button" class="btn btn-success" onclick="tambahDetail()">
                                            Buat Match
                                        </button>
                                    </div>
                                    <table id="dataGridDetail" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                                        <thead>
                                            <tr>
                                                <th width="80px"></th>
                                                <th width="80px"></th>
                                                <th width="80px"></th>
                                                <th>Club 1</th>
                                                <th>Club 2</th>
                                                <th>Skor Club 1</th>
                                                <th>Skor Club 2</th>
                                                <th>Tgl Match</th>
                                                <th>Lokasi Match</th>
                                                <th width="80px"></th>
                                                <th width="80px"></th>
                                                <th width="80px"></th>
                                                <th>Tgl Entry</th>
                                                <th>User Entry</th>
                                                <th>Catatan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="form-group col-md-6">
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

  <div class="modal fade" id="modalDetail" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modalDetailTitle">Tambah Detail Fixture</h4>
      </div>
      <div class="modal-body">
        <form id="form_detail">
          <input type="hidden" id="d_mode" name="mode">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Status</label>
                <select class="form-control" id="d_STATUS" name="STATUS">
                  <option value="0">NOT PUBLISH</option>
                  <option value="1">UPCOMING</option>
                  <option value="2">TICKET SALE</option>
                  <option value="3">ONGOING</option>
                  <option value="4">FINISHED</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Club 1 <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <br>
                <select class="form-control select2" id="d_IDCLUB1" name="IDCLUB1" style="width:100%">
                  <option value="">-- Pilih Club --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Skor Club 1 <i class="fixture_finished" style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="number" class="form-control" id="d_SKORCLUB1" name="SKORCLUB1" min="0" value="0" onchange="this.value = parseInt(this.value) || 0">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Club 2 <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <br>
                <select class="form-control select2" id="d_IDCLUB2" name="IDCLUB2" style="width:100%">
                  <option value="">-- Pilih Club --</option>
                </select>
              </div>
              <div class="form-group">
                <label>Skor Club 2 <i class="fixture_finished" style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="number" class="form-control" id="d_SKORCLUB2" name="SKORCLUB2" min="0" value="0" onchange="this.value = parseInt(this.value) || 0">
              </div>
            </div>
            <div class="col-md-12">
              
              <div class="form-group">
                <label>Tanggal Match <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <div class="input-group date" id="dp_TGLFIXTURE">
                  <input type="text" class="form-control" id="d_TGLFIXTURE" name="TGLFIXTURE" placeholder="YYYY-MM-DD HH:mm">
                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                </div>
              </div>
                
              <div class="form-group">
                <label>Lokasi Match <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="text" class="form-control" id="d_LOKASI" name="LOKASI" placeholder="Nama Stadion / Lokasi">
              </div>
              
              <div class="form-group">
                <label>Link Ticket <i class="fixture_ticketsale" style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="text" class="form-control" id="d_LINKTICKET" name="LINKTICKET" placeholder="https://...">
              </div>
            
              <div class="form-group">
                <label>Link Video Youtube<i class="fixture_ongoing" style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="text" class="form-control" id="d_VIDEO" name="VIDEO" placeholder="Format : https://youtu.be/[YOUTUBE ID]">
              </div>
              <div class="form-group">
                <label>Link Video Highlight Youtube<i class="fixture_finished" style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="text" class="form-control" id="d_VIDEOHIGHLIGHT" name="VIDEOHIGHLIGHT" placeholder="Format : https://youtu.be/[YOUTUBE ID]">
              </div>
              <div class="form-group">
                <label>Link Video Match Interview Youtube<i class="fixture_finished" style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
                <input type="text" class="form-control" id="d_VIDEOMATCHINTERVIEW" name="VIDEOMATCHINTERVIEW" placeholder="Format : https://youtu.be/[YOUTUBE ID]">
              </div>
              <div class="form-group">
                <label>Catatan</label>
                <textarea class="form-control" rows="2" id="d_CATATAN" name="CATATAN"></textarea>
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="simpanDetail()">Simpan Match</button>
      </div>
    </div>
  </div>
</div>

</section>
<!-- /.content -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/eonasdan-bootstrap-datetimepicker@4.17.49/build/js/bootstrap-datetimepicker.min.js"></script>
<script>
var indexRow;

$(document).ready(function() {
    
    $('#SEASONAWAL,#SEASONAKHIR').datepicker({
        format: "yyyy-mm", // sesuai format database
        autoclose: true,
        startView: 'months',
        minViewMode: 'months',
    });

    $('#d_TGLFIXTURE').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',  // format sesuai database
        showTodayButton: true,           // tombol "Hari Ini"
        showClear: true,                 // tombol hapus
        showClose: true,                 // tombol tutup
        sideBySide: true,                // kalender & jam tampil bersamaan
        locale: 'id',                    // bahasa Indonesia
    });

    $("#mode").val('tambah');

    $("#STATUS").prop('checked',true).iCheck('update');

    $('#d_IDCLUB1,#d_IDCLUB2').select2({
        ajax: {
            url: base_url + 'Master/Data/Club/comboGrid',
            dataType: 'json',
            delay: 250,
            cache: false, // 🔥 disable cache
            data: function (params) {
                return {
                    search: params.term // 🔥 kirim keyword
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

    $("#d_STATUS").change(function(){
        
        $(".fixture_finished").hide();
        $(".fixture_ongoing").hide();
        $(".fixture_ticketsale").hide();

        if($(this).val() == 2) //TICKET SALE
        {
            $(".fixture_ticketsale").show();
        }
        else if($(this).val() == 3) // ONGOING
        {
            $(".fixture_ticketsale").show();
            $(".fixture_ongoing").show();
        }
        else if($(this).val() == 4) // FINISHED
        {
            $(".fixture_ticketsale").show();
            $(".fixture_ongoing").show();
            $(".fixture_finished").show();
        }
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
			url    : base_url+'Competition/Operational/Fixture/dataGrid',
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
            {data: 'IDFIXTURE', visible:false},
            {data: 'NAMA'},
            {data: 'SEASONAWAL',  className:"text-center"},
            {data: 'SEASONAKHIR',  className:"text-center"},
            {data: 'CATATAN'},
            {data: 'USERBUAT'},
            {data: 'TGLENTRY', className:"text-center"},
            {data: 'STATUS', className:"text-center"},            
        ],
		columnDefs: [ 
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button  type='button'  id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button  type='button'  id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
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


// ===================== DETAIL FIXTURE =====================
var tableDetail;

function initTableDetail(idFixture) {
    if (tableDetail) {
        tableDetail.destroy();
    }
    tableDetail = $('#dataGridDetail').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'autoWidth'   : false,
        'scrollX'     : true,
        ajax: {
            url    : base_url + 'Competition/Operational/Fixture/dataGridDetail',
            dataSrc: "rows",
            data   : { IDFIXTURE: idFixture }
        },
        columns: [ 
            { data: null },
            { data: 'IDCLUB1' , visible:false},
            { data: 'IDCLUB2' , visible:false},
            { data: 'CLUB1'},
            { data: 'CLUB2'},
            { data: 'SKORCLUB1',       className: 'text-center' },
            { data: 'SKORCLUB2',       className: 'text-center' },
            { data: 'TGLFIXTURE',      className: 'text-center' },
            { data: 'LOKASI' },
            { data: 'VIDEO' , visible:false},
            { data: 'VIDEOHIGHLIGHT' , visible:false},
            { data: 'LINKTICKET' , visible:false},
            { data: 'TGLENTRY',        className: 'text-center' },
            { data: 'USERENTRY',       className: 'text-center' },
            { data: 'CATATAN' },
            { data: 'STATUS',          className: 'text-center' },
        ],
        columnDefs: [
            {
                "targets": 0,
                "data": null,
                "defaultContent": "<button  type='button'  id='btn_ubah_detail' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button  type='button'  id='btn_hapus_detail' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
			},
            {
                targets: -1,
                render: function(data) {
                    var labels = ['NOT PUBLISH','UPCOMING','TICKET SALE','ONGOING','FINISHED'];
                    var colors = ['default','info','success','danger','warning'];
                    var idx    = parseInt(data) || 0;
                    return '<span class="label label-' + colors[idx] + '">' + (labels[idx] || data) + '</span>';
                }
            }
        ]
    });

    $('#dataGridDetail tbody').on( 'click', 'button', function () {
        var row  = tableDetail.row($(this).parents('tr')).data();
        var mode = $(this).attr('id');
        if (mode === 'btn_ubah_detail')  ubahDetail(row);
        else if (mode === 'btn_hapus_detail') hapusDetail(row);
    });
}

function tambahDetail() {
    var idFixture = $('#IDFIXTURE').val();
    clearFormDetail();
    $('#d_mode').val('tambah');
    $('#modalDetailTitle').text('Tambah Detail Fixture');
    $('#modalDetail').modal('show');
}

function ubahDetail(row) {
    clearFormDetail();
    $('#d_mode').val('ubah');
    $('#d_IDCLUB1').val(row.IDCLUB1);
    $('#d_IDCLUB2').val(row.IDCLUB2);
    var newOption = new Option(row.CLUB1, row.IDCLUB1, true, true);
    $('#d_IDCLUB1').append(newOption).trigger('change');

    var newOption = new Option(row.CLUB2, row.IDCLUB2, true, true);
    $('#d_IDCLUB2').append(newOption).trigger('change');

    $('#d_SKORCLUB1').val(row.SKORCLUB1);
    $('#d_SKORCLUB2').val(row.SKORCLUB2);
    $('#d_TGLFIXTURE').val(row.TGLFIXTURE);
    $('#d_VIDEO').val(row.VIDEO);
    $('#d_VIDEOHIGHLIGHT').val(row.VIDEOHIGHLIGHT);
    $('#d_VIDEOMATCHINTERVIEW').val(row.VIDEOMATCHINTERVIEW);
    $('#d_LINKTICKET').val(row.LINKTICKET);
    $('#d_LOKASI').val(row.LOKASI);
    // $('#d_LAT').val(row.LAT);
    // $('#d_LNG').val(row.LNG);
    $('#d_CATATAN').val(row.CATATAN);
    $('#d_STATUS').val(row.STATUS).trigger('change');
    $('#modalDetailTitle').text('Ubah Detail Fixture');
    $('#modalDetail').modal('show');
}

function hapusDetail(row) {
    get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
		    
            if (row) {          
                Swal.fire({
                    title: 'Hapus Data Match<br>' + row.CLUB1 + ' vs ' + row.CLUB2,
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                   if (result.value) {
                        // Ambil index row di DataTable
                        tableDetail.rows(function(idx, data_row) {
                            return data_row.IDCLUB1 === row.IDCLUB1 
                                && data_row.IDCLUB2 === row.IDCLUB2 
                                && data_row.TGLFIXTURE === row.TGLFIXTURE;
                        }).remove().draw();

                        Swal.fire('Terhapus!', 'Data berhasil dihapus.', 'success');
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

function simpanDetail(){
    var rowData = {
        IDCLUB1             : $('#d_IDCLUB1').val(),
        IDCLUB2             : $('#d_IDCLUB2').val(),
        CLUB1               : $('#d_IDCLUB1 option:selected').text(),
        CLUB2               : $('#d_IDCLUB2 option:selected').text(),
        SKORCLUB1           : $('#d_SKORCLUB1').val(),
        SKORCLUB2           : $('#d_SKORCLUB2').val(),
        TGLFIXTURE          : $('#d_TGLFIXTURE').val(),
        LOKASI              : $('#d_LOKASI').val(),
        VIDEO               : $('#d_VIDEO').val(),
        VIDEOHIGHLIGHT      : $('#d_VIDEOHIGHLIGHT').val(),
        VIDEOMATCHINTERVIEW : $('#d_VIDEOMATCHINTERVIEW').val(),
        LINKTICKET          : $('#d_LINKTICKET').val(),
        TGLENTRY            : 'AUTO',
        USERENTRY           : '<?=$_SESSION[NAMAPROGRAM]["USERNAME"]?>',
        CATATAN             : $('#d_CATATAN').val(),
        STATUS              : $('#d_STATUS').val()
    };
    

    // Validasi
    if (!rowData.IDCLUB1 || !rowData.IDCLUB2) {
        Swal.fire({ title: "Club 1 dan Club 2 wajib diisi", type: "warning" });
        return;
    }
    if(rowData.IDCLUB1 == rowData.IDCLUB2)
    {
        Swal.fire({ title: "Club 1 dan Club 2 tidak boleh sama", type: "warning" });
        return;
    }
    if (!rowData.TGLFIXTURE) {
        Swal.fire({ title: "Tanggal Match wajib diisi", type: "warning" });
        return;
    }
    if (!rowData.LOKASI) {
        Swal.fire({ title: "Lokasi Match wajib diisi", type: "warning" });
        return;
    }

    if(rowData.STATUS >= 2){
        //TICKET SALE
        if (!rowData.LINKTICKET) {
            Swal.fire({ title: "Link Ticket wajib diisi", type: "warning" });
            return;
        }

    }
    if(rowData.STATUS >= 3){
        //ONGOING
        if (!rowData.VIDEO) {
            Swal.fire({ title: "Link Video Youtube wajib diisi", type: "warning" });
            return;
        }
        else if(!checkYoutubeUrl(rowData.VIDEO)){
            Swal.fire({ title: "Link Video Youtube tidak valid", type: "warning" });
            return;
        }

    }
    if(rowData.STATUS >= 4){
        //FINISHED
        if (!rowData.VIDEOHIGHLIGHT) {
            Swal.fire({ title: "Link Video Highlight Youtube wajib diisi", type: "warning" });
            return;
        }
        else if(!checkYoutubeUrl(rowData.VIDEOHIGHLIGHT)){
            Swal.fire({ title: "Link Video Highlight Youtube tidak valid", type: "warning" });
            return;
        }

        if (!rowData.VIDEOMATCHINTERVIEW) {
            Swal.fire({ title: "Link Video Match Interview Youtube wajib diisi", type: "warning" });
            return;
        }
        else if(!checkYoutubeUrl(rowData.VIDEOMATCHINTERVIEW)){
            Swal.fire({ title: "Link Video Match Interview Youtube tidak valid", type: "warning" });
            return;
        }

        if (!rowData.SKORCLUB1 || rowData.SKORCLUB1 == 0) {
            Swal.fire({ title: "Skor Club 1 wajib diisi", type: "warning" });
            return;
        }
        if (!rowData.SKORCLUB2 || rowData.SKORCLUB2 == 0) {
            Swal.fire({ title: "Skor Club 2 wajib diisi", type: "warning" });
            return;
        }

    }

    
    var matchedRows = tableDetail.rows(function(idx, data_row) {
        return data_row.IDCLUB1 === rowData.IDCLUB1 
            && data_row.IDCLUB2 === rowData.IDCLUB2 
            && data_row.TGLFIXTURE === rowData.TGLFIXTURE;
    });


    if($('#d_mode').val() == "tambah")
    {
        if (matchedRows.count() == 0) {
            tableDetail.row.add(rowData).draw(false);
        }
        else
        {
            Swal.fire({ title: "Match dengan tanggal dan club tersebut sudah dibuat", type: "warning" });
            return;
        }
    }
    else if($('#d_mode').val() == "ubah")
    {
        if (matchedRows.count() > 0) {
                matchedRows.every(function() {
                this.data(rowData);
            });
            tableDetail.draw(false);
        }
    }
    
    $('#modalDetail').modal('hide');
}

function clearFormDetail() {
	$("#STATUS").prop('checked',true).iCheck('update');
    $('#d_IDCLUB1').val(null).trigger('change');
    $('#d_IDCLUB2').val(null).trigger('change');
    $('#d_SKORCLUB1').val(0);
    $('#d_SKORCLUB2').val(0);
    $('#d_TGLFIXTURE').val('');
    $('#d_VIDEO').val('');
    $('#d_VIDEOHIGHLIGHT').val('');
    $('#d_VIDEOMATCHINTERVIEW').val('');
    $('#d_LINKTICKET').val('');
    $('#d_LOKASI').val('');
    // $('#d_LAT').val('');
    // $('#d_LNG').val('');
    $('#d_CATATAN').val('');
    $('#d_STATUS').val(0);
    $(".fixture_finished").hide();
    $(".fixture_ongoing").hide();
    $(".fixture_ticketsale").hide();
}

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

function tambah(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
				$("#mode").val('tambah');

				//pindah tab & ganti judul tab
				$('.nav-tabs a[href="#tab_form"]').tab('show');
				$('.nav-tabs a[href="#tab_form"]').html('Tambah');
                initTableDetail(0);
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
			$("#IDFIXTURE").val(row.IDFIXTURE);
			$("#NAMA").val(row.NAMA);
			$("#SEASONAWAL").datepicker('update', row.SEASONAWAL.slice(0, -3));
			$("#SEASONAKHIR").datepicker('update', row.SEASONAKHIR.slice(0, -3));
			$("#CATATAN").val(row.CATATAN);
            initTableDetail(row.IDFIXTURE);
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
    let nama = $('#NAMA').val();
    let seasonAwal = $('#SEASONAWAL').val();
    let seasonAkhir = $('#SEASONAKHIR').val();
    $("#STATUS").val(($("#STATUS").prop('checked')?1:0));

    if(!nama){
        Swal.fire({ title: "Nama wajib diisi", type: "warning" });
        return;
    }
    else if (!seasonAwal) {
        Swal.fire({ title: "Season Awal wajib diisi", type: "warning" });
        return;
    }else if (!seasonAkhir) {
        Swal.fire({ title: "Season Akhir wajib diisi", type: "warning" });
        return;
    }
    else if(tableDetail.rows().data().toArray().length == 0)
    {
        Swal.fire({ title: "Match wajib ada", type: "warning" });
        return;
    }
    else
    {       
        $("#DETAILFIXTURE").val(JSON.stringify(tableDetail.rows().data().toArray()));
        let formData = new FormData($('#form_input')[0]);
        
        loading();
        $.ajax({
            type: 'POST',
            url: base_url+'Competition/Operational/Fixture/simpan',
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

function hapus(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
		    
            if (row) {
    		    Swal.fire({
                		title: 'Anda Yakin Akan Menghapus Fixture '+row.NAMA+' ?',
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
                    		    	url     : base_url+"Competition/Operational/Fixture/hapus",
                    		    	data    : "id="+row.IDFIXTURE ,
                    		    	cache   : false,
                    		    	success : function(msg){
                                        Swal.close();
                    		    		if (msg.success) {
                    		    			Swal.fire({
                    		    				title            : 'Fixture dengan nama '+row.NAMA+' telah dihapus',
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
	$("#IDFIXTURE").val("");
	$("#NAMA").val("");
	$("#SEASONAWAL").val(""); 
	$("#SEASONAKHIR").val(""); 
	$("#CATATAN").val("");
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
