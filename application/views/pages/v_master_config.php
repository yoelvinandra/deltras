
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Home Configuration
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
        <!-- Custom Tabs -->
        <div class="nav-tabs-custom" >
            <ul class="nav nav-tabs" id="tab_transaksi">
				<li class="active"><a href="#tab_banner" data-toggle="tab">Banner</a></li>
				<li><a href="#tab_team" data-toggle="tab">Team & Player</a></li>
				<li><a href="#tab_fixture" data-toggle="tab">Fixture & Result</a></li>
				<li><a href="#tab_news" data-toggle="tab">News</a></li>
				<li><a href="#tab_sponsor" data-toggle="tab">Sponsor</a></li>
				<li><a href="#tab_about" data-toggle="tab">Lokasi & Kontak</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_banner">
                    <div class="box-body">
                        <h3 style="font-weight:bold;">Banner</h3>
						<button type='button'  class="btn btn-success" onclick="javascript:tambahBanner()">Tambah</button>
						<br><br>
                        <table id="dataGridBanner" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
								<tr>
									<th width="35px"></th>
									<th width="50%">Gambar</th> 
									<th>Url</th>                             
								</tr>
                            </thead>
                        </table>
						<br>
                    </div>
					<div class="box-footer">
                        <button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanBanner()">Simpan</button>
                    </div>
                </div>
				<div class="tab-pane" id="tab_team">
					<form role="form" id="form_input_team">
						<div class="box-body">
							<input id="mode-team" type="hidden" value="tambah">
							<input id="DETAILTEAM" name="DETAILTEAM" type="hidden" value="">
							<div class="row">
								<div class="col-md-4">
									<h3 style="font-weight:bold;">Video Behind The Scene</h3>
									<img id="previewGambarBehindTheScene" src="" width="100%"><br>
									<label>Link Youtube Behind The Scene</label>
									<input type="text" class="form-control" id="VIDEOBEHINDTHESCENE" name="VIDEOBEHINDTHESCENE" placeholder="...">
								</div>
								<div class="col-md-8">
									<h3 style="font-weight:bold;">Player yang ditampilkan di Beranda</h3>
									<button type='button'  class="btn btn-success" onclick="javascript:tambahDetailTeam()">Tambah</button>
									<br><br>
									<table id="dataGridTeam" class="table table-bordered table-striped table-hover display nowrap" width="100%">
										<!-- class="table-hover"> -->
										<thead>
											<tr>
												<th width="35px"></th>
												<th>ID</th>
												<th width="100px">Foto</th>
												<th width="300px">Nama</th>
												<th>Position</th>
												<th>Squad Number</th>  
												<th>Goals</th>    
												<th>Assist</th>     
												<th>GK Save</th>                                
											</tr>
										</thead>
									</table>
								</div>
								<br>
							</div>
						</div>
						<div class="box-footer">
							<button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanTeam()">Simpan</button>
						</div>
					</form>
					<div class="modal fade" id="modal-team">
                    	<div class="modal-dialog">
                    	<div class="modal-content">
                    		<div class="modal-body">
								<input type="hidden" id="IDPLAYERDETAILOLD">
								<h3 style="font-weight:bold;">Pilih Player</h3>
                    			<label>Nama Player</label>
								<select class="form-control" id="IDPLAYERDETAIL" name="IDPLAYERDETAIL" style="width:100%;">
								</select>
								<br>
								<br>
								<label>Foto</label>
								<br>
                    			<img id="previewGambarPlayerDetail" src="<?=base_url()?>assets/images/player/no-player.png" width="200px">
								<br><br>
								<div class="row">
									<div class="col-md-6">
										<label>Position</label>
										<br>
										<input type="text" id="POSITIONDETAIL" class="form-control"  name="POSITIONDETAIL" readonly>
									</div>
									<div class="col-md-6">
										<label>Squad Number</label>
										<br>
										<input type="number" id="SQUADNUMBERDETAIL" class="form-control"  name="SQUADNUMBERDETAIL" readonly>
									</div>
								</div>
								<br>
								<div class="row">
									<div class="col-md-4">
										<label>Goals</label>
										<br>
										<input type="number" id="GOALSDETAIL" class="form-control"  name="GOALSDETAIL" readonly>
									</div>
									<div class="col-md-4">
										<label>Assist</label>
										<br>
										<input type="number" id="ASSISTDETAIL" class="form-control"  name="ASSISTDETAIL" readonly>
									</div>
									<div class="col-md-4">
										<label>GK Save</label>
										<br>
										<input type="number" id="GKSAVEDETAIL" class="form-control"  name="GKSAVEDETAIL" readonly>
									</div>
								</div>
								<br>
								<br>
                    			<button class="btn btn-success pull-right" id="btn_batal" onclick="simpanDetailTeam()">Pilih</button>
                    			<br>
                    			<br>
                    		</div>
                    	</div>
                    	</div>
                    </div>
                </div>
				<div class="tab-pane" id="tab_fixture">
					<form role="form" id="form_input_fixture">
						<div class="box-body">
							<div class="row">
								<div class="col-md-4">
									<h3 style="font-weight:bold;">Fixture</h3>
									<input id="mode-fixture" type="hidden" value="tambah">
									<input id="DETAILFIXTURE" name="DETAILFIXTURE" type="hidden" value="">
									<label>Pilih Fixture</label>
									<br>
									<select class="form-control" id="IDFIXTURE" name="IDFIXTURE" style="width:100%;">
									</select>
									<br>
									<br>
									<label>Video Highlight 1</label>
									<img id="previewGambarHighlight1" src="" width="100%"><br>
									<label>Pilih Fixture Video</label>
									<select class="form-control" id="IDVIDEO" name="IDVIDEO" style="width:100%;">
									</select>
									<br>
									<br>
									<label>Video Highlight 2</label>
									<img id="previewGambarHighlight2" src="" width="100%"><br>
									<label>Pilih Fixture Video</label>
									<select class="form-control" id="IDVIDEOHIGHLIGHT" name="IDVIDEOHIGHLIGHT" style="width:100%;">
									</select>
									<br>
									<br>
									<label>Video Match Interview</label>
									<img id="previewGambarMatchInterview" src="" width="100%"><br>
									<label>Pilih Fixture Video</label>
									<select class="form-control" id="IDVIDEOMATCHINTERVIEW" name="IDVIDEOMATCHINTERVIEW" style="width:100%;">
									</select>
									
								</div>
								<div class="col-md-8">
									<h3 style="font-weight:bold;">Tabel Klasemen</h3>
									<button type='button'  class="btn btn-success" onclick="javascript:tambahDetailFixture()">Tambah</button>
									<br><br>
									<table id="dataGridKlasemen" class="table table-bordered table-striped table-hover display nowrap" width="100%">
										<!-- class="table-hover"> -->
										<thead>
											<tr>
												<th width="35px"></th>
												<th>ID</th>
												<th width="40px">Logo</th>
												<th width="300px">Club</th>
												<th>Menang</th>
												<th>Seri</th>  
												<th>Kalah</th>    
												<th>Point</th>                               
											</tr>
										</thead>
									</table>
								</div>
								<br>
							</div>
							<br>
						</div>
						<div class="box-footer">
							<button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanFixture()">Simpan</button>
						</div>
					</form>
					<div class="modal fade" id="modal-fixture">
                    	<div class="modal-dialog">
                    	<div class="modal-content">
                    		<div class="modal-body">
								<input type="hidden" id="IDCLUBDETAILOLD">
								<h3 style="font-weight:bold;">Pilih Club</h3>
                    			<label>Nama Club</label>
								<select class="form-control" id="IDCLUBDETAIL" name="IDCLUBDETAIL" style="width:100%;">
								</select>
								<br>
								<br>
								<label>Logo</label>
								<br>
                    			<img id="previewGambarClubDetail" src="<?=base_url()?>assets/images/news/no-image.png" width="100px">
								<br><br>
								<div class="row">
									<div class="col-md-3">
										<label>Menang</label>
										<br>
										<input type="number" id="MENANGDETAIL" class="form-control"  name="MENANGDETAIL">
									</div>
									<div class="col-md-3">
										<label>Seri</label>
										<br>
										<input type="number" id="SERIDETAIL" class="form-control"  name="SERIDETAIL">
									</div>
									<div class="col-md-3">
										<label>Kalah</label>
										<br>
										<input type="number" id="KALAHDETAIL" class="form-control"  name="KALAHDETAIL">
									</div>
									<div class="col-md-3">
										<label>Point</label>
										<br>
										<input type="number" id="POINTDETAIL" class="form-control"  name="POINTDETAIL">
									</div>
								</div>
								<br>
								<br>
                    			<button class="btn btn-success pull-right" id="btn_batal" onclick="simpanDetailFixture()">Pilih</button>
                    			<br>
                    			<br>
                    		</div>
                    	</div>
                    	</div>
                    </div>
                </div>
				<div class="tab-pane" id="tab_news">
					<form role="form" id="form_input_news">
						<div class="box-body">
							<h3 style="font-weight:bold;">News</h3>
							<input id="mode-news" type="hidden" value="tambah">
							<input id="DETAILNEWS" name="DETAILNEWS" type="hidden" value="">
							<table id="dataGridNews" class="table table-bordered table-striped table-hover display nowrap" width="100%">
								<!-- class="table-hover"> -->
								<thead>
									<tr>
										<th width="35px"></th>
										<th>ID</th>
										<th>Gambar</th>
										<th>Judul</th>  
										<th>Kategori</th>         
										<th>Tgl Terbit</th>                                
									</tr>
								</thead>
							</table>
							</h3>
						</div>
						<div class="box-footer">
							<button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanNews()">Simpan</button>
						</div>
					</form>
					<div class="modal fade" id="modal-news">
                    	<div class="modal-dialog">
                    	<div class="modal-content">
                    		<div class="modal-body">
								<input type="hidden" id="IDNEWSDETAILOLD">
								<h3 style="font-weight:bold;">Pilih News</h3>
                    			<label>Judul News</label>
								<select class="form-control" id="IDNEWSDETAIL" name="IDNEWSDETAIL" style="width:100%;">
								</select>
								<br>
								<br>
								<label>Gambar News</label>
								<br>
                    			<img id="previewGambarNewsDetail" src="<?=base_url()?>assets/images/news/no-image.png" width="100%">
								<br><br>
								<label>Kategori</label>
                    			<br>
								<input type="text" id="KATEGORINEWSDETAIL" class="form-control"  name="KATEGORINEWSDETAIL" readonly>
								<br>
								<label>Tgl Terbit</label>
                    			<br>
								<input type="text" id="TGLTERBITNEWSDETAIL" class="form-control"  name="TGLTERBITNEWSDETAIL" readonly>
								<br>
								<br>
                    			<button class="btn btn-success pull-right" id="btn_batal" onclick="simpanDetailNews()">Pilih</button>
                    			<br>
                    			<br>
                    		</div>
                    	</div>
                    	</div>
                    </div>
                </div>
				<div class="tab-pane" id="tab_sponsor">
					<form role="form" id="form_input_sponsor">
						<div class="box-body">
							<h3 style="font-weight:bold;">Sponsor</h3>
							<input id="mode-sponsor" type="hidden" value="tambah">
							<input id="DETAILSPONSOR" name="DETAILSPONSOR" type="hidden" value="">
							<button type='button'  class="btn btn-success" onclick="javascript:tambahDetailSponsor()">Tambah</button>
							<table id="dataGridSponsor" class="table table-bordered table-striped table-hover display nowrap" width="100%">
								<!-- class="table-hover"> -->
								<thead>
									<tr>
										<th width="35px"></th>
										<th>ID</th>
										<th>Logo</th>        
										<th>Nama</th>      
										<th>Website</th>                        
									</tr>
								</thead>
							</table>
							<br>
						</div>
						<div class="box-footer">
							<button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanSponsor()">Simpan</button>
						</div>
					</form>
					<div class="modal fade" id="modal-sponsor">
                    	<div class="modal-dialog">
                    	<div class="modal-content">
                    		<div class="modal-body">
								<input type="hidden" id="IDSPONSORDETAILOLD">
								<h3 style="font-weight:bold;">Pilih Sponsor</h3>
                    			<label>Nama Sponsor</label>
								<select class="form-control" id="IDSPONSORDETAIL" name="IDSPONSORDETAIL" style="width:100%;">
								</select>
								<br>
								<br>
								<label>Logo Sponsor</label>
								<br>
                    			<img id="previewGambarSponsorDetail" src="<?=base_url()?>assets/images/sponsor/no-logo.png" width="200px">
								<br><br>
								<label>Website Sponsor</label>
                    			<br>
								<input type="text" id="WEBSITESPONSORDETAIL" class="form-control"  name="WEBSITESPONSORDETAIL" readonly>
								<br>
								<br>
                    			<button class="btn btn-success pull-right" id="btn_batal" onclick="simpanDetailSponsor()">Pilih</button>
                    			<br>
                    			<br>
                    		</div>
                    	</div>
                    	</div>
                    </div>
                </div>
				<div class="tab-pane" id="tab_about">
                    <div class="box-body">
						<div class="row">
							<form role="form" id="form_input_lokasi_kontak">
								<div class="col-md-6">
									<h3 style="font-weight:bold;">Data Deltras</h3>
									<label>Alamat <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="ALAMAT" name="ALAMAT" placeholder="...">
									<br>
									<label>Url Alamat <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="ALAMATURL" name="ALAMATURL" placeholder="...">
									<br>
									<label>Email <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="email" class="form-control" id="EMAIL" name="EMAIL" placeholder="...">
									<br>
									<label>Telp <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="TELP" name="TELP" placeholder="...">
									<br>

									<label>Youtube <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="YOUTUBE" name="YOUTUBE" placeholder="...">
									<br>

									<label>Tiktok <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="TIKTOK" name="TIKTOK" placeholder="...">
									<br>

									<label>Instagram <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="INSTAGRAM" name="INSTAGRAM" placeholder="...">
									<br>
								</div>
								<div class="col-md-6">
									<h3 style="font-weight:bold;">Data Deltamania</h3>
									<label>Alamat <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="MEMBERALAMAT" name="MEMBERALAMAT" placeholder="...">
									<br>
									<label>Email <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="email" class="form-control" id="MEMBEREMAIL" name="MEMBEREMAIL" placeholder="...">
									<br>
									<label>Telp <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="MEMBERTELP" name="MEMBERTELP" placeholder="...">
									<br>
									<label>Instagram <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="MEMBERINSTAGRAM" name="MEMBERINSTAGRAM" placeholder="...">
									<br>
									<label>X <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="MEMBERX" name="MEMBERX" placeholder="...">
									<br>
									<label>Tiktok <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="MEMBERTIKTOK" name="MEMBERTIKTOK" placeholder="...">
									<br>
									<label>Facebook <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
									<input type="text" class="form-control" id="MEMBERFACEBOOK" name="MEMBERFACEBOOK" placeholder="...">
									<br>
								</div>
							</form>
						</div>
					</div>
					<div class="box-footer">
						<button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanLokasiKontak()">Simpan</button>
					</div>
                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>

$(document).ready(function() {
	$('.select2').select2({
		dropdownAutoWidth: true, 
	});

	$('#dataGridBanner').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		ajax		  : {
			url    : base_url+'Master/Data/Config/dataGridBanner',
			dataSrc: "rows",
		},      
        columns:[
            {data: ''},
            {data: 'GAMBAR',},
            {data: 'URL'},          
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button type='button' id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button type='button' id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
			},
            {
                "targets": 1,
                "render" :function (data) 
                {
                   return "<img src='"+data+"?t="+ Date.now()+"' style='width:100%;'>";
                },
			},
		]
    });

	// Enable sorting
    const tbodyBanner = $('#dataGridBanner tbody')[0];
    const sortableBanner = new Sortable(tbodyBanner, {
        animation: 150,
        ghostClass: 'dragging',
        handle: 'tr',
        onEnd: function(evt) {
            let movedData = $('#dataGridBanner').DataTable().row(evt.oldIndex).data();
            let temp;
            
            var dataList = $('#dataGridBanner').DataTable().rows().data();
            $('#dataGridBanner').DataTable().clear();
            
            for(var x = 0 ; x < dataList.length; x++)
            {
                if(evt.newIndex <= evt.oldIndex)
                {
                    
                   if(x == evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                   else if(x <= evt.oldIndex && x > evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                     $('#dataGridBanner').DataTable().row.add(dataList[x]).draw();
                }
                else
                {
                   if(x >= evt.oldIndex && x < evt.newIndex)
                   {
                       dataList[x] = dataList[x+1];
                   }
                   else if(x == evt.newIndex)
                   {
                       dataList[x] = movedData;
                   }
                 $('#dataGridBanner').DataTable().row.add(dataList[x]).draw();
                }
            }
        }
    });

	getDataVideoBTS();

	$('#dataGridTeam').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		ajax		  : {
			url    : base_url+'Master/Data/Config/dataGridTeam',
			dataSrc: "rows",
		},      
        columns:[
            {data: ''},
            {data: 'ID', visible:false},
            {data: 'GAMBAR', className:"text-center"},
            {data: 'NAMA'},         
            {data: 'POSITION', className:"text-center"},          
            {data: 'SQUADNUMBER', className:"text-center"},          
            {data: 'GOAL', className:"text-center"},          
            {data: 'ASSIST', className:"text-center"},          
            {data: 'GKSAVE', className:"text-center"},           
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button type='button' id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button type='button' id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
			},
            {
                "targets": 2,
                "render" :function (data) 
                {
                   return "<img src='"+data+"?t="+ Date.now()+"' style='width:100px;'>";
                },
			},
		]
    });

	$('#dataGridTeam tbody').on( 'click', 'button', function () {
		var row = $('#dataGridTeam').DataTable().row( $(this).parents('tr') ).data();
		var mode = $(this).attr("id");
		
		if(mode == "btn_ubah"){ ubahDetailTeam(row); }
		else if(mode == "btn_hapus"){ hapusDetailTeam(row); }

	} );

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
	});

	// Enable sorting
    const tbodyTeam = $('#dataGridTeam tbody')[0];
    const sortableTeam = new Sortable(tbodyTeam, {
        animation: 150,
        ghostClass: 'dragging',
        handle: 'tr',
        onEnd: function(evt) {
            let movedData = $('#dataGridTeam').DataTable().row(evt.oldIndex).data();
            let temp;
            
            var dataList = $('#dataGridTeam').DataTable().rows().data();
            $('#dataGridTeam').DataTable().clear();
            
            for(var x = 0 ; x < dataList.length; x++)
            {
                if(evt.newIndex <= evt.oldIndex)
                {
                    
                   if(x == evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                   else if(x <= evt.oldIndex && x > evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                     $('#dataGridTeam').DataTable().row.add(dataList[x]).draw();
                }
                else
                {
                   if(x >= evt.oldIndex && x < evt.newIndex)
                   {
                       dataList[x] = dataList[x+1];
                   }
                   else if(x == evt.newIndex)
                   {
                       dataList[x] = movedData;
                   }
                 $('#dataGridTeam').DataTable().row.add(dataList[x]).draw();
                }
            }
        }
    });

	$('#IDPLAYERDETAIL').select2({
		ajax: {
			url: base_url + 'Master/Data/Player/comboGridPlayer',
			dataType: 'json',
			delay: 250,
			cache: false,
			processResults: function (result) {
				return {
					results: result.rows.map(function (row) {
						return {        
							id: row.VALUE,
							text: row.TEXT,
							gambar: row.GAMBAR,
							position:row.POSITION,
							squadnumber:row.SQUADNUMBER,
							goal:row.GOAL,
							assist:row.ASSIST,
							gksave:row.GKSAVE
						};
					})
				};
			}
		}
	}).on('change', function () {
		var selectedData = $(this).select2('data')[0];
		var gambar  = selectedData?.gambar  || $('#IDPLAYERDETAIL option:selected')[0]?.dataset?.gambar;
		var position  = selectedData?.position  || $('#IDPLAYERDETAIL option:selected')[0]?.dataset?.position;
		var squadnumber  = selectedData?.squadnumber  || $('#IDPLAYERDETAIL option:selected')[0]?.dataset?.squadnumber;
		var goal  = selectedData?.goal  || $('#IDPLAYERDETAIL option:selected')[0]?.dataset?.goal;
		var assist  = selectedData?.assist  || $('#IDPLAYERDETAIL option:selected')[0]?.dataset?.assist;
		var gksave  = selectedData?.gksave  || $('#IDPLAYERDETAIL option:selected')[0]?.dataset?.gksave;

		if (!selectedData) {
			$("#POSITIONDETAIL").val("");
			$("#SQUADNUMBER").val("");
			$("#GOALSDETAIL").val(0);
			$("#ASSISTDETAIL").val(0);
			$("#GKSAVEDETAIL").val(0);
			$('#previewGambarPlayerDetail').attr('src', base_url + 'assets/images/player/no-player.png');
			return;
		}

		$("#POSITIONDETAIL").val(position);
		$("#SQUADNUMBERDETAIL").val(squadnumber);
		$("#GOALSDETAIL").val(goal);
		$("#ASSISTDETAIL").val(assist);
		$("#GKSAVEDETAIL").val(gksave);

		if (gambar) {
			$('#previewGambarPlayerDetail').attr('src', gambar + '?t=' + Date.now());
		}
	});

	getDataVideoHighlight();

	$('#dataGridKlasemen').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		ajax		  : {
			url    : base_url+'Master/Data/Config/dataGridKlasemen',
			dataSrc: "rows",
		},      
        columns:[
            {data: ''},
            {data: 'ID',visible:false},
            {data: 'GAMBAR', className:"text-center"},  
            {data: 'NAMA'},         
            {data: 'MENANG', className:"text-center"},          
            {data: 'SERI', className:"text-center"},          
            {data: 'KALAH', className:"text-center"},          
            {data: 'POINT', className:"text-center"},              
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button type='button' id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button type='button' id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
			},
            {
                "targets": 2,
                "render" :function (data) 
                {
                   return "<img src='"+data+"?t="+ Date.now()+"' style='width:40px;'>";
                },
			},
		]
    });

	$('#dataGridKlasemen tbody').on( 'click', 'button', function () {
		var row = $('#dataGridKlasemen').DataTable().row( $(this).parents('tr') ).data();
		var mode = $(this).attr("id");
		
		if(mode == "btn_ubah"){ ubahDetailFixture(row); }
		else if(mode == "btn_hapus"){ hapusDetailFixture(row); }

	} );

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
	});

	// Enable sorting
    const tbodyKlasemen = $('#dataGridKlasemen tbody')[0];
    const sortableKlasemen = new Sortable(tbodyKlasemen, {
        animation: 150,
        ghostClass: 'dragging',
        handle: 'tr',
        onEnd: function(evt) {
            let movedData = $('#dataGridKlasemen').DataTable().row(evt.oldIndex).data();
            let temp;
            
            var dataList = $('#dataGridKlasemen').DataTable().rows().data();
            $('#dataGridKlasemen').DataTable().clear();
            
            for(var x = 0 ; x < dataList.length; x++)
            {
                if(evt.newIndex <= evt.oldIndex)
                {
                    
                   if(x == evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                   else if(x <= evt.oldIndex && x > evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                     $('#dataGridKlasemen').DataTable().row.add(dataList[x]).draw();
                }
                else
                {
                   if(x >= evt.oldIndex && x < evt.newIndex)
                   {
                       dataList[x] = dataList[x+1];
                   }
                   else if(x == evt.newIndex)
                   {
                       dataList[x] = movedData;
                   }
                 $('#dataGridKlasemen').DataTable().row.add(dataList[x]).draw();
                }
            }
        }
    });

	$('#IDCLUBDETAIL').select2({
		ajax: {
			url: base_url + 'Master/Data/Club/comboGrid',
			dataType: 'json',
			delay: 250,
			cache: false,
			processResults: function (result) {
				return {
					results: result.rows.map(function (row) {
						return {        
							id: row.VALUE,
							text: row.TEXT,
							gambar: row.GAMBAR
						};
					})
				};
			}
		}
	}).on('change', function () {
		var selectedData = $(this).select2('data')[0];
		var gambar  = selectedData?.gambar  || $('#IDCLUBDETAIL option:selected')[0]?.dataset?.gambar;

		if (!selectedData) {
			$("#MENANGDETAIL").val(0);
			$("#SERIDETAIL").val(0);
			$("#KALAHDETAIL").val(0);
			$("#POINTDETAIL").val(0);
			$('#previewGambarClubDetail').attr('src', base_url + 'assets/images/club/no-logo.png');
			return;
		}
		if (gambar) {
			$('#previewGambarClubDetail').attr('src', gambar + '?t=' + Date.now());
		}
	});


	$('#dataGridNews').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		ajax		  : {
			url    : base_url+'Master/Data/Config/dataGridNews',
			dataSrc: "rows",
		},      
        columns:[
            {data: ''},
            {data: 'ID',visible:false},
            {data: 'GAMBAR', className:"text-center"},  
            {data: 'JUDUL'},        
            {data: 'KATEGORI', className:"text-center"},        
            {data: 'TGLTERBIT', className:"text-center"},              
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button type='button' id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> " //<button type='button' id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>	
			},
            {
                "targets": 2,
                "render" :function (data) 
                {
                   return "<img src='"+data+"?t="+ Date.now()+"' style='width:400px;'>";
                },
			},
		]
    });

	$('#dataGridNews tbody').on( 'click', 'button', function () {
		var row = $('#dataGridNews').DataTable().row( $(this).parents('tr') ).data();
		var mode = $(this).attr("id");
		
		if(mode == "btn_ubah"){ ubahDetailNews(row); }
		else if(mode == "btn_hapus"){ hapusDetailNews(row); }

	} );

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
	});

	const tbodyNews = $('#dataGridNews tbody')[0];
    const sortableNews = new Sortable(tbodyNews, {
        animation: 150,
        ghostClass: 'dragging',
        handle: 'tr',
        onEnd: function(evt) {
            let movedData = $('#dataGridNews').DataTable().row(evt.oldIndex).data();
            let temp;
            
            var dataList = $('#dataGridNews').DataTable().rows().data();
            $('#dataGridNews').DataTable().clear();
            
            for(var x = 0 ; x < dataList.length; x++)
            {
                if(evt.newIndex <= evt.oldIndex)
                {
                    
                   if(x == evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                   else if(x <= evt.oldIndex && x > evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                     $('#dataGridNews').DataTable().row.add(dataList[x]).draw();
                }
                else
                {
                   if(x >= evt.oldIndex && x < evt.newIndex)
                   {
                       dataList[x] = dataList[x+1];
                   }
                   else if(x == evt.newIndex)
                   {
                       dataList[x] = movedData;
                   }
                 $('#dataGridNews').DataTable().row.add(dataList[x]).draw();
                }
            }
        }
    });

	$('#IDNEWSDETAIL').select2({
		ajax: {
			url: base_url + 'Competition/Operational/News/comboGrid',
			dataType: 'json',
			delay: 250,
			cache: false,
			processResults: function (result) {
				return {
					results: result.rows.map(function (row) {
						return {        
							id: row.VALUE,
							text: row.TEXT,
							kategori: row.KATEGORI,
							tglterbit: row.TGLTERBIT,
							gambar: row.GAMBAR
						};
					})
				};
			}
		}
	}).on('change', function () {
		var selectedData = $(this).select2('data')[0];
		var gambar  = selectedData?.gambar  || $('#IDNEWSDETAIL option:selected')[0]?.dataset?.gambar;
		var kategori  = selectedData?.kategori  || $('#IDNEWSDETAIL option:selected')[0]?.dataset?.kategori;
		var tglterbit = selectedData?.tglterbit || $('#IDNEWSDETAIL option:selected')[0]?.dataset?.tglterbit;

		if (!selectedData) {
			$('#KATEGORINEWSDETAIL').val('');
			$('#TGLTERBITNEWSDETAIL').val('');
			$('#previewGambarNewsDetail').attr('src', base_url + 'assets/images/news/no-image.png');
			return;
		}

		$('#KATEGORINEWSDETAIL').val(kategori);
		$('#TGLTERBITNEWSDETAIL').val(tglterbit);
		if (gambar) {
			$('#previewGambarNewsDetail').attr('src', gambar + '?t=' + Date.now());
		}
	});


	$('#dataGridSponsor').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		ajax		  : {
			url    : base_url+'Master/Data/Config/dataGridSponsor',
			dataSrc: "rows",
		},      
        columns:[
            {data: ''},
            {data: 'ID',visible:false},
            {data: 'GAMBAR', className:"text-center"},  
            {data: 'NAMA'},                   
            {data: 'WEBSITE'},                   
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button type='button' id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button type='button' id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
			},
            {
                "targets": 2,
                "render" :function (data) 
                {
                   return "<img src='"+data+"?t="+ Date.now()+"' style='width:100px;'>";
                },
			},
		]
    });


	$('#dataGridSponsor tbody').on( 'click', 'button', function () {
		var row = $('#dataGridSponsor').DataTable().row( $(this).parents('tr') ).data();
		var mode = $(this).attr("id");
		
		if(mode == "btn_ubah"){ ubahDetailSponsor(row); }
		else if(mode == "btn_hapus"){ hapusDetailSponsor(row); }

	} );

	$('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
		$($.fn.dataTable.tables(true)).DataTable().columns.adjust();
	});

	const tbodySponsor = $('#dataGridSponsor tbody')[0];
    const sortableSponsor = new Sortable(tbodySponsor, {
        animation: 150,
        ghostClass: 'dragging',
        handle: 'tr',
        onEnd: function(evt) {
            let movedData = $('#dataGridSponsor').DataTable().row(evt.oldIndex).data();
            let temp;
            
            var dataList = $('#dataGridSponsor').DataTable().rows().data();
            $('#dataGridSponsor').DataTable().clear();
            
            for(var x = 0 ; x < dataList.length; x++)
            {
                if(evt.newIndex <= evt.oldIndex)
                {
                    
                   if(x == evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                   else if(x <= evt.oldIndex && x > evt.newIndex)
                   {
                       temp = dataList[x];
                       dataList[x] = movedData;
                       movedData = temp;
                   }
                     $('#dataGridSponsor').DataTable().row.add(dataList[x]).draw();
                }
                else
                {
                   if(x >= evt.oldIndex && x < evt.newIndex)
                   {
                       dataList[x] = dataList[x+1];
                   }
                   else if(x == evt.newIndex)
                   {
                       dataList[x] = movedData;
                   }
                 $('#dataGridSponsor').DataTable().row.add(dataList[x]).draw();
                }
            }
        }
    });

	$('#IDSPONSORDETAIL').select2({
		ajax: {
			url: base_url + 'Master/Data/Sponsor/comboGrid',
			dataType: 'json',
			delay: 250,
			cache: false,
			processResults: function (result) {
				return {
					results: result.rows.map(function (row) {
						return {
							id: row.VALUE,
							text: row.TEXT,
							website: row.WEBSITE,
							gambar: row.GAMBAR
						};
					})
				};
			}
		}
	}).on('change', function () {
		var selectedData = $(this).select2('data')[0];
		var gambar  = selectedData?.gambar  || $('#IDSPONSORDETAIL option:selected')[0]?.dataset?.gambar;
		var website = selectedData?.website || $('#IDSPONSORDETAIL option:selected')[0]?.dataset?.website;

		if (!selectedData) {
			$('#WEBSITESPONSORDETAIL').val('');
			$('#previewGambarSponsorDetail').attr('src', base_url + 'assets/images/sponsor/no-logo.png');
			return;
		}

		$('#WEBSITESPONSORDETAIL').val(website);
		if (gambar) {
			$('#previewGambarSponsorDetail').attr('src', gambar + '?t=' + Date.now());
		}
	});


	getDataContact();

});  

function getDataVideoBTS(){	
	$.ajax({
		url: base_url+ 'Master/Data/Config/loadVideoBTS',
		type: 'GET',
		dataType: 'json',
		success: async function (data)  {
			var videoid = getVideoId(data.rows.URLBTS.VALUE);
			var videoData = await getYouTubeData(videoid);
			$("#previewGambarBehindTheScene").attr("src",videoData.thumbnail);
			$("#VIDEOBEHINDTHESCENE").val(data.rows.URLBTS.VALUE);
		}
	});
}

$("#VIDEOBEHINDTHESCENE").change(async function(){
	var videoid = getVideoId($(this).val());
	var videoData = await getYouTubeData(videoid);
	if(videoData)
	{
		$("#previewGambarBehindTheScene").attr("src",videoData.thumbnail);
	}
	else
	{
		$("#previewGambarBehindTheScene").attr("src",base_url + 'assets/images/video/no-video.png');
	}
});

function getDataVideoHighlight(){
	$.ajax({
		url: base_url + 'Master/Data/Config/loadNamaDanVideoFixture',
		type: 'GET',
		dataType: 'json',
		success: async function (data) {

			$('#IDFIXTURE').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGrid',
					dataType: 'json',
					delay: 250,
					cache: false,
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return {
									id: row.VALUE,
									text: row.FULLNAME
								};
							})
						};
					}
				}
			});

			// ✅ 2. Set value setelah Select2 di-init
			var newOption = new Option(data.rows.NAMA, data.rows.ID, true, true);
			$('#IDFIXTURE').append(newOption).trigger('change');

			// IDVIDEO
			$('#IDVIDEO').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGridDetail',
					dataType: 'json',
					delay: 250,
					cache: false,
					data: function (params) {
						return { id: data.rows.ID, video: 'VIDEO' };
					},
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return { id: row.VALUE, text: row.TEXT, video: row.VIDEO };
							})
						};
					}
				}
			}).on('change', async function () {
				var selectedData = $(this).select2('data')[0];
				if (!selectedData) return;

				// ✅ Fallback ke data-* attribute kalau video undefined (option manual)
				var video = selectedData.video
						|| $('#IDVIDEO option:selected').attr('data-video')
						|| '';

				if (!video) return;
				var videoid = getVideoId(video);
				var videoData = await getYouTubeData(videoid);
				if (videoData) $("#previewGambarHighlight1").attr("src", videoData.thumbnail);
			});

			// ✅ Set value + simpan video di data-*
			var newOption = new Option(data.rows.VIDEOTEXT, data.rows.VIDEOVALUE, true, true);
			$(newOption).attr('data-video', data.rows.VIDEO);
			$('#IDVIDEO').append(newOption).trigger('change');


			// IDVIDEOHIGHLIGHT
			$('#IDVIDEOHIGHLIGHT').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGridDetail',
					dataType: 'json',
					delay: 250,
					cache: false,
					data: function (params) {
						return { id: data.rows.ID, video: 'VIDEOHIGHLIGHT' };
					},
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return { id: row.VALUE, text: row.TEXT, video: row.VIDEO };
							})
						};
					}
				}
			}).on('change', async function () {
				var selectedData = $(this).select2('data')[0];
				if (!selectedData) return;

				// ✅ Fallback ke data-* attribute
				var video = selectedData.video
						|| $('#IDVIDEOHIGHLIGHT option:selected').attr('data-video')
						|| '';

				if (!video) return;
				var videoid = getVideoId(video);
				var videoData = await getYouTubeData(videoid);
				if (videoData) $("#previewGambarHighlight2").attr("src", videoData.thumbnail);
			});

			// ✅ Set value + simpan video di data-*
			var newOption = new Option(data.rows.VIDEOHIGHLIGHTTEXT, data.rows.VIDEOHIGHLIGHTVALUE, true, true);
			$(newOption).attr('data-video', data.rows.VIDEOHIGHLIGHT);
			$('#IDVIDEOHIGHLIGHT').append(newOption).trigger('change');


			// IDVIDEOMATCHINTERVIEW
			$('#IDVIDEOMATCHINTERVIEW').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGridDetail',
					dataType: 'json',
					delay: 250,
					cache: false,
					data: function (params) {
						return { id: data.rows.ID, video: 'VIDEOMATCHINTERVIEW' };
					},
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return { id: row.VALUE, text: row.TEXT, video: row.VIDEO };
							})
						};
					}
				}
			}).on('change', async function () {
				var selectedData = $(this).select2('data')[0];
				if (!selectedData) return;

				// ✅ Fallback ke data-* attribute
				var video = selectedData.video
						|| $('#IDVIDEOMATCHINTERVIEW option:selected').attr('data-video')
						|| '';

				if (!video) return;
				var videoid = getVideoId(video);
				var videoData = await getYouTubeData(videoid);
				if (videoData) $("#previewGambarMatchInterview").attr("src", videoData.thumbnail);
			});

			// ✅ Set value + simpan video di data-*
			var newOption = new Option(data.rows.VIDEOMATCHINTERVIEWTEXT, data.rows.VIDEOMATCHINTERVIEWVALUE, true, true);
			$(newOption).attr('data-video', data.rows.VIDEOMATCHINTERVIEW);

			$('#IDVIDEOMATCHINTERVIEW').append(newOption).trigger('change');
		}
	});
}

function getDataContact() {
	$.ajax({
		url: base_url+ 'Master/Data/Config/loadContact',
		type: 'GET',
		dataType: 'json',
		success: async function (data)  {

			 //CONTACT
			var contact = data.rows.CONTACT;
			
			for(var x = 0 ; x < contact.length ; x++){
				if(contact[x].CONFIG == 'ALAMAT'){
					$("#ALAMAT").val(contact[x].VALUE);
					$("#ALAMATURL").val(contact[x].PREFIX);
				}
				else if(contact[x].CONFIG == 'EMAIL'){
					$("#EMAIL").val(contact[x].VALUE);
				}
				else if(contact[x].CONFIG == 'TELP'){
					$("#TELP").val(contact[x].VALUE);
				}
				else if(contact[x].CONFIG == 'INSTAGRAM'){
					$("#INSTAGRAM").val(contact[x].VALUE);
				}
				else if(contact[x].CONFIG == 'TIKTOK'){
					$("#TIKTOK").val(contact[x].VALUE);
				}
				else if(contact[x].CONFIG == 'YOUTUBE'){
					$("#YOUTUBE").val(contact[x].VALUE);
				}
			}
			//CONTACT

			//MEMBER-CONTACT
			var memberContact = data.rows.MEMBERCONTACT;
			
			for(var x = 0 ; x < memberContact.length ; x++){

				if(memberContact[x].CONFIG == 'MEMBER-ALAMAT'){
					$("#MEMBERALAMAT").val(memberContact[x].VALUE);
				}
				else if(memberContact[x].CONFIG == 'MEMBER-EMAIL'){
					$("#MEMBEREMAIL").val(memberContact[x].VALUE);
				}
				else if(memberContact[x].CONFIG == 'MEMBER-TELP'){
					$("#MEMBERTELP").val(memberContact[x].VALUE);
				}
				else if(memberContact[x].CONFIG == 'MEMBER-INSTAGRAM'){
					$("#MEMBERINSTAGRAM").val(memberContact[x].VALUE);
				}
				else if(memberContact[x].CONFIG == 'MEMBER-X'){
					$("#MEMBERX").val(memberContact[x].VALUE);
				}
				else if(memberContact[x].CONFIG == 'MEMBER-TIKTOK'){
					$("#MEMBERTIKTOK").val(memberContact[x].VALUE);
				}
				else if(memberContact[x].CONFIG == 'MEMBER-FACEBOOK'){
					$("#MEMBERFACEBOOK").val(memberContact[x].VALUE);
				}
			}
		}
	});
}

function tambahDetailTeam(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
			$('#IDPLAYERDETAIL').val(null).trigger('change');
			$('#IDPLAYERDETAILOLD').val(0);
			$('#mode-team').val('tambah');
			$("#modal-team").modal('show');
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
function ubahDetailTeam(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
			$('#mode-team').val('ubah');
			$('#IDPLAYERDETAILOLD').val(row.ID);

			// ✅ Set value Select2 dengan data lengkap, tanpa append, tanpa destroy
			var option = new Option(row.NAMA, row.ID, true, true);
			option.dataset.gambar = row.GAMBAR;   // ✅ simpan di dataset
			$('#IDPLAYERDETAIL').append(option).trigger('change');

			$('#previewGambarPlayerDetail').attr('src', row.GAMBAR + '?t=' + Date.now());
			$('#POSITIONDETAIL').val(row.POSITION);
			$('#SQUADNUMBERDETAIL').val(row.SQUADNUMBER);
			$('#GOALSDETAIL').val(row.GOAL);
			$('#ASSISTDETAIL').val(row.ASSIST);
			$('#GKSAVEDETAIL').val(row.GKSAVE);

			$("#modal-team").modal('show');
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
function hapusDetailTeam(row){
	 get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
 			$('#mode-team').val('hapus');
            if (row) {          
                Swal.fire({
                    title: 'Hapus Dari Beranda <br>' + row.NAMA,
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                   if (result.value) {
                        // Ambil index row di DataTable
                        $("#dataGridTeam").DataTable().rows(function(idx, data_row) {
                            return data_row.ID === row.ID;
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
function simpanDetailTeam(){
    var rowData = {
        ID      	: $('#IDPLAYERDETAIL').val(),
        GAMBAR  	: $('#previewGambarPlayerDetail').attr('src').split('?t=')[0],
        NAMA    	: $('#IDPLAYERDETAIL option:selected').text(),
        POSITION  	: $('#POSITIONDETAIL').val(),
        SQUADNUMBER	: $('#SQUADNUMBERDETAIL').val(),
		GOAL   		: $('#GOALSDETAIL').val(),
        ASSIST		: $('#ASSISTDETAIL').val(),
        GKSAVE		: $('#GKSAVEDETAIL').val(),
    };

    if (!rowData.ID) {
        Swal.fire({ title: "Player wajib dipilih", icon: "warning" });
        return;
    }

    var table = $('#dataGridTeam').DataTable();
    var oldID = $('#IDPLAYERDETAILOLD').val();

    if ($('#mode-team').val() == "tambah") {
        var matchedRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(rowData.ID);
        });

        if (matchedRows.count() == 0) {
            table.row.add(rowData).draw(false);
        } else {
            Swal.fire({ title: "Player tersebut sudah ada", icon: "warning" });
            return;
        }
    }
    else if ($('#mode-team').val() == "ubah") {
        var matchedRows = table.rows(function(idx, data_row) {
            // ✅ Cek duplikat: ID sama tapi BUKAN dirinya sendiri
            return String(data_row.ID) === String(rowData.ID) && String(data_row.ID) !== String(oldID);
        });

        if (matchedRows.count() > 0) {
            Swal.fire({ title: "Player tersebut sudah ada", icon: "warning" });
            return;
        }

        // ✅ Update row berdasarkan OLD ID
        var updateRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(oldID);
        });

        if (updateRows.count() > 0) {
            updateRows.every(function() {
                this.data(rowData).invalidate();
            });
            table.draw(false);
        }
    }

    $("#modal-team").modal('hide');
}

async function simpanTeam(){

	var videoid = getVideoId($("#VIDEOBEHINDTHESCENE").val());
	var videoData = await getYouTubeData(videoid);
	if(videoData)
	{
		$("#previewGambarBehindTheScene").attr("src",videoData.thumbnail);
	}
	else
	{
		$("#previewGambarBehindTheScene").attr("src",base_url + 'assets/images/video/no-video.png');
	}
	
	if($("#previewGambarBehindTheScene").attr("src") == (base_url + 'assets/images/video/no-video.png'))
	{
		Swal.fire({ title: "Video belum tersedia", icon: "warning" });
	}
	else
	{
		$("#DETAILTEAM").val(JSON.stringify($('#dataGridTeam').DataTable().rows().data().toArray()));
		let formData = new FormData($('#form_input_team')[0]);

		loading();
		$.ajax({
			type: 'POST',
			url: base_url+'Master/Data/Config/simpanTeam',
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
					getDataVideoBT();
					$("#dataGridTeam").DataTable().ajax.reload();

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

function tambahDetailFixture(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
			$('#IDCLUBDETAIL').val(null).trigger('change');
			$('#IDCLUBDETAILOLD').val(0);
			$('#mode-fixture').val('tambah');
			$("#modal-fixture").modal('show');
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
function ubahDetailFixture(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
			$('#mode-fixture').val('ubah');
			$('#IDCLUBDETAILOLD').val(row.ID);

			// ✅ Set value Select2 dengan data lengkap, tanpa append, tanpa destroy
			var option = new Option(row.NAMA, row.ID, true, true);
			option.dataset.gambar = row.GAMBAR;   // ✅ simpan di dataset
			$('#IDCLUBDETAIL').append(option).trigger('change');

			$('#previewGambarClubDetail').attr('src', row.GAMBAR + '?t=' + Date.now());
			$('#MENANGDETAIL').val(row.MENANG);
			$('#SERIDETAIL').val(row.SERI);
			$('#KALAHDETAIL').val(row.KALAH);
			$('#POINTDETAIL').val(row.POINT);

			$("#modal-fixture").modal('show');
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
function hapusDetailFixture(row){
	 get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
 			$('#mode-fixture').val('hapus');
            if (row) {          
                Swal.fire({
                    title: 'Hapus Dari Beranda <br>' + row.NAMA,
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                   if (result.value) {
                        // Ambil index row di DataTable
                        $("#dataGridKlasemen").DataTable().rows(function(idx, data_row) {
                            return data_row.ID === row.ID;
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
function simpanDetailFixture(){
    var rowData = {
        ID      : $('#IDCLUBDETAIL').val(),
        GAMBAR  : $('#previewGambarClubDetail').attr('src').split('?t=')[0],
        NAMA    : $('#IDCLUBDETAIL option:selected').text(),
        MENANG  : $('#MENANGDETAIL').val(),
        SERI	: $('#SERIDETAIL').val(),
		KALAH   : $('#KALAHDETAIL').val(),
        POINT	: $('#POINTDETAIL').val(),
    };

    if (!rowData.ID) {
        Swal.fire({ title: "Club wajib dipilih", icon: "warning" });
        return;
    }

    var table = $('#dataGridKlasemen').DataTable();
    var oldID = $('#IDCLUBDETAILOLD').val();

    if ($('#mode-fixture').val() == "tambah") {
        var matchedRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(rowData.ID);
        });

        if (matchedRows.count() == 0) {
            table.row.add(rowData).draw(false);
        } else {
            Swal.fire({ title: "Club tersebut sudah ada", icon: "warning" });
            return;
        }
    }
    else if ($('#mode-fixture').val() == "ubah") {
        var matchedRows = table.rows(function(idx, data_row) {
            // ✅ Cek duplikat: ID sama tapi BUKAN dirinya sendiri
            return String(data_row.ID) === String(rowData.ID) && String(data_row.ID) !== String(oldID);
        });

        if (matchedRows.count() > 0) {
            Swal.fire({ title: "Club tersebut sudah ada", icon: "warning" });
            return;
        }

        // ✅ Update row berdasarkan OLD ID
        var updateRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(oldID);
        });

        if (updateRows.count() > 0) {
            updateRows.every(function() {
                this.data(rowData).invalidate();
            });
            table.draw(false);
        }
    }

    $("#modal-fixture").modal('hide');
}

function simpanFixture(){
	$("#DETAILFIXTURE").val(JSON.stringify($('#dataGridKlasemen').DataTable().rows().data().toArray()));
	let formData = new FormData($('#form_input_fixture')[0]);

	loading();
	$.ajax({
		type: 'POST',
		url: base_url+'Master/Data/Config/simpanFixture',
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
				getDataVideoHighlight();
				$("#dataGridKlasemen").DataTable().ajax.reload();

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

function tambahDetailNews(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
			$('#IDNEWSDETAIL').val(null).trigger('change');
			$('#IDNEWSDETAILOLD').val(0);
			$('#mode-news').val('tambah');
			$("#modal-news").modal('show');
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
function ubahDetailNews(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
			$('#mode-news').val('ubah');
			$('#IDNEWSDETAILOLD').val(row.ID);

			// ✅ Set value Select2 dengan data lengkap, tanpa append, tanpa destroy
			var option = new Option(row.JUDUL, row.ID, true, true);
			option.dataset.gambar = row.GAMBAR;   // ✅ simpan di dataset
			option.dataset.tglterbit = row.TGLTERBIT;
			option.dataset.kategori = row.KATEGORI;
			$('#IDNEWSDETAIL').append(option).trigger('change');

			$('#previewGambarNewsDetail').attr('src', row.GAMBAR + '?t=' + Date.now());
			$('#TGLTERBITNEWSDETAIL').val(row.TGLTERBIT);
			$('#KATEGORINEWSDETAIL').val(row.KATEGORI);

			$("#modal-news").modal('show');
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
function hapusDetailNews(row){
	 get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
 			$('#mode-news').val('hapus');
            if (row) {          
                Swal.fire({
                    title: 'Hapus Dari Beranda <br>' + row.JUDUL,
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                   if (result.value) {
                        // Ambil index row di DataTable
                        $("#dataGridNews").DataTable().rows(function(idx, data_row) {
                            return data_row.ID === row.ID;
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
function simpanDetailNews(){
    var rowData = {
        ID      : $('#IDNEWSDETAIL').val(),
        GAMBAR  : $('#previewGambarNewsDetail').attr('src').split('?t=')[0],
        JUDUL    : $('#IDNEWSDETAIL option:selected').text(),
        TGLTERBIT  : $('#TGLTERBITNEWSDETAIL').val(),
        KATEGORI: $('#KATEGORINEWSDETAIL').val(),
    };

    if (!rowData.ID) {
        Swal.fire({ title: "News wajib dipilih", icon: "warning" });
        return;
    }

    var table = $('#dataGridNews').DataTable();
    var oldID = $('#IDNEWSDETAILOLD').val();

    if ($('#mode-news').val() == "tambah") {
        var matchedRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(rowData.ID);
        });

        if (matchedRows.count() == 0) {
            table.row.add(rowData).draw(false);
        } else {
            Swal.fire({ title: "News tersebut sudah ada", icon: "warning" });
            return;
        }
    }
    else if ($('#mode-news').val() == "ubah") {
        var matchedRows = table.rows(function(idx, data_row) {
            // ✅ Cek duplikat: ID sama tapi BUKAN dirinya sendiri
            return String(data_row.ID) === String(rowData.ID) && String(data_row.ID) !== String(oldID);
        });

        if (matchedRows.count() > 0) {
            Swal.fire({ title: "News tersebut sudah ada", icon: "warning" });
            return;
        }

        // ✅ Update row berdasarkan OLD ID
        var updateRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(oldID);
        });

        if (updateRows.count() > 0) {
            updateRows.every(function() {
                this.data(rowData).invalidate();
            });
            table.draw(false);
        }
    }

    $("#modal-news").modal('hide');
}

function simpanNews(){
	$("#DETAILNEWS").val(JSON.stringify($('#dataGridNews').DataTable().rows().data().toArray()));
	let formData = new FormData($('#form_input_news')[0]);

	loading();
	$.ajax({
		type: 'POST',
		url: base_url+'Master/Data/Config/simpanNews',
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

				 $("#dataGridNews").DataTable().ajax.reload();

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

function tambahDetailSponsor(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
			$('#IDSPONSORDETAIL').val(null).trigger('change');
			$('#IDSPONSORDETAILOLD').val(0);
			$('#mode-sponsor').val('tambah');
			$("#modal-sponsor").modal('show');
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
function ubahDetailSponsor(row){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
			$('#mode-sponsor').val('ubah');
			$('#IDSPONSORDETAILOLD').val(row.ID);

			// ✅ Set value Select2 dengan data lengkap, tanpa append, tanpa destroy
			var option = new Option(row.NAMA, row.ID, true, true);
			option.dataset.gambar = row.GAMBAR;   // ✅ simpan di dataset
			option.dataset.website = row.WEBSITE;
			$('#IDSPONSORDETAIL').append(option).trigger('change');

			$('#previewGambarSponsorDetail').attr('src', row.GAMBAR + '?t=' + Date.now());
			$('#WEBSITESPONSORDETAIL').val(row.WEBSITE);

			$("#modal-sponsor").modal('show');
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
function hapusDetailSponsor(row){
	 get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
 			$('#mode-sponsor').val('hapus');
            if (row) {          
                Swal.fire({
                    title: 'Hapus Dari Beranda <br>' + row.NAMA,
                    showCancelButton: true,
                    confirmButtonText: 'Yakin',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                   if (result.value) {
                        // Ambil index row di DataTable
                        $("#dataGridSponsor").DataTable().rows(function(idx, data_row) {
                            return data_row.ID === row.ID;
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
function simpanDetailSponsor(){
    var rowData = {
        ID      : $('#IDSPONSORDETAIL').val(),
        GAMBAR  : $('#previewGambarSponsorDetail').attr('src').split('?t=')[0],
        NAMA    : $('#IDSPONSORDETAIL option:selected').text(),
        WEBSITE : $('#WEBSITESPONSORDETAIL').val()
    };

    if (!rowData.ID) {
        Swal.fire({ title: "Sponsor wajib dipilih", icon: "warning" });
        return;
    }

    var table = $('#dataGridSponsor').DataTable();
    var oldID = $('#IDSPONSORDETAILOLD').val();

    if ($('#mode-sponsor').val() == "tambah") {
        var matchedRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(rowData.ID);
        });

        if (matchedRows.count() == 0) {
            table.row.add(rowData).draw(false);
        } else {
            Swal.fire({ title: "Sponsor tersebut sudah ada", icon: "warning" });
            return;
        }
    }
    else if ($('#mode-sponsor').val() == "ubah") {
        var matchedRows = table.rows(function(idx, data_row) {
            // ✅ Cek duplikat: ID sama tapi BUKAN dirinya sendiri
            return String(data_row.ID) === String(rowData.ID) && String(data_row.ID) !== String(oldID);
        });

        if (matchedRows.count() > 0) {
            Swal.fire({ title: "Sponsor tersebut sudah ada", icon: "warning" });
            return;
        }

        // ✅ Update row berdasarkan OLD ID
        var updateRows = table.rows(function(idx, data_row) {
            return String(data_row.ID) === String(oldID);
        });

        if (updateRows.count() > 0) {
            updateRows.every(function() {
                this.data(rowData).invalidate();
            });
            table.draw(false);
        }
    }

    $("#modal-sponsor").modal('hide');
}

function simpanSponsor(){
	$("#DETAILSPONSOR").val(JSON.stringify($('#dataGridSponsor').DataTable().rows().data().toArray()));
	let formData = new FormData($('#form_input_sponsor')[0]);

	loading();
	$.ajax({
		type: 'POST',
		url: base_url+'Master/Data/Config/simpanSponsor',
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

				 $("#dataGridSponsor").DataTable().ajax.reload();

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

function simpanLokasiKontak(){
	let alamat = $('#ALAMAT').val();
	let alamaturl = $('#ALAMATURL').val();
	let email = $('#EMAIL').val();
    let telp = $('#TELP').val();
    var youtube = $("#YOUTUBE").val();
    var tiktok = $("#TIKTOK").val();
    var instagram = $("#INSTAGRAM").val();

	let memberalamat = $('#MEMBERALAMAT').val();
	let memberemail = $('#MEMBEREMAIL').val();
	let membertelp = $('#MEMBERTELP').val();
    let memberinstagram = $('#MEMBERINSTAGRAM').val();
    var memberx = $("#MEMBERX").val();
    var membertiktok = $("#MEMBERTIKTOK").val();
    var memberfacebook = $("#MEMBERFACEBOOK").val();

    if(!alamat)
    {
        Swal.fire({ title: "Deltras Alamat wajib diisi", type: "warning" });
        return;
    }
	else if(!alamaturl)
    {
        Swal.fire({ title: "Deltras Url Alamat wajib diisi", type: "warning" });
        return;
    }
    else if(!email)
    {
        Swal.fire({ title: "Deltras Email wajib diisi", type: "warning" });
        return;
    }
	else if(!telp)
    {
        Swal.fire({ title: "Deltras Telp wajib diisi", type: "warning" });
        return;
    }
	else if(!youtube)
    {
        Swal.fire({ title: "Deltras Youtube wajib diisi", type: "warning" });
        return;
    }
	else if(!tiktok)
    {
        Swal.fire({ title: "Deltras Tiktok wajib diisi", type: "warning" });
        return;
    }
	else if(!instagram)
    {
        Swal.fire({ title: "Deltras Instagram wajib diisi", type: "warning" });
        return;
    }
	else if(!memberalamat)
    {
        Swal.fire({ title: "Deltamania Alamat wajib diisi", type: "warning" });
        return;
    }
	else if(!memberemail)
    {
        Swal.fire({ title: "Deltamania Email wajib diisi", type: "warning" });
        return;
    }
	else if(!membertelp)
    {
        Swal.fire({ title: "Deltamania Telp wajib diisi", type: "warning" });
        return;
    }
	else if(!memberx)
    {
        Swal.fire({ title: "Deltamania X wajib diisi", type: "warning" });
        return;
    }
	else if(!membertiktok)
    {
        Swal.fire({ title: "Deltamania Tiktok wajib diisi", type: "warning" });
        return;
    }
	else if(!memberinstagram)
    {
        Swal.fire({ title: "Deltamania Instagram wajib diisi", type: "warning" });
        return;
    }
	else if(!memberfacebook)
    {
        Swal.fire({ title: "Deltamania Facebook wajib diisi", type: "warning" });
        return;
    }
    else 
    {
        
        if (telp && !isValidPhone(telp)) {
            Swal.fire({ title: "Deltras No Telp harus diawali 62, dengan panjang 10-15 karakter", type: "warning" });
            return;
        }
        else if (email && !isValidEmail(email)) {
            Swal.fire({ title: "Deltras Format Email tidak valid", type: "warning" });
            return;
        }
		else if (membertelp && !isValidPhone(membertelp)) {
            Swal.fire({ title: "Deltamania No Telp harus diawali 62, dengan panjang 10-15 karakter", type: "warning" });
            return;
        }
        else if (memberemail && !isValidEmail(memberemail)) {
            Swal.fire({ title: "Deltamania Format Email tidak valid", type: "warning" });
            return;
        }
        else
        {
			let formData = new FormData($('#form_input_lokasi_kontak')[0]);

			loading();
			$.ajax({
				type: 'POST',
				url: base_url+'Master/Data/Config/simpanLokasiKontak',
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

						getDataContact();

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

function getVideoId(url) {
    const regex = /(?:youtube\.com\/watch\?v=|youtu\.be\/)([^&\n?#]+)/;
    const match = url.match(regex);
    return match ? match[1] : null;
}

async function getYouTubeData(videoId) {
    if (!videoId) return null;

    try {
        const data = await $.ajax({
            url: base_url+ 'Competition/Operational/Fixture/youtubeAPINoKey/',
            method: 'GET',
            dataType: 'json',
            data: { videoId: videoId }
        });
        return data;

    } catch (err) {
        console.error('Gagal:', err);
        return null;
    }
}
</script>
