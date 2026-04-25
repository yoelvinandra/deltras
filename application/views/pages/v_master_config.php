
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
						<button class="btn btn-success" onclick="javascript:tambahBanner()">Tambah</button>
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
                    <div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<h3 style="font-weight:bold;">Video Behind The Scene</h3>
								<img id="previewGambarBehindTheScene" src="" width="100%"><br>
								<label>Link Youtube Behind The Scene</label>
								<input type="text" class="form-control" id="VIDEOBEHINDTHESCENE" name="VIDEOBEHINDTHESCENE" placeholder="...">
							</div>
							<div class="col-md-8">
								<h3 style="font-weight:bold;">Player yang ditampilkan di Beranda</h3>
								<button class="btn btn-success" onclick="javascript:tambahPemain()">Tambah</button>
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
                </div>
				<div class="tab-pane" id="tab_fixture">
                    <div class="box-body">
						<div class="row">
							<div class="col-md-4">
								<h3 style="font-weight:bold;">Fixture</h3>
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
								<button class="btn btn-success" onclick="javascript:tambahKlasemen()">Tambah</button>
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
                </div>
				<div class="tab-pane" id="tab_news">
                    <div class="box-body">
                        <h3 style="font-weight:bold;">News</h3>
						<table id="dataGridNews" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
								<tr>
									<th width="35px"></th>
									<th>ID</th>
									<th>Gambar</th>
									<th>Judul</th>  
									<th>Kategori</th>         
									<th>Terbit</th>                                
								</tr>
                            </thead>
                        </table>
                        
                    </div>
					<div class="box-footer">
                        <button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanNews()">Simpan</button>
                    </div>
                </div>
				<div class="tab-pane" id="tab_sponsor">
                    <div class="box-body">
                        <h3 style="font-weight:bold;">Sponsor</h3>
						<input id="mode-sponsor" type="hidden" value="tambah">
						<button class="btn btn-success" onclick="javascript:tambahSponsor()">Tambah</button>
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
					<div class="modal fade" id="modal-sponsor">
                    	<div class="modal-dialog">
                    	<div class="modal-content">
                    		<div class="modal-body">
								<h3 style="font-weight:bold;">Pilih Sponsor</h3>
                    			<label>Sponsor</label>
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
                "defaultContent": "<button id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
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

	getDataVideoBT();

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
                "defaultContent": "<button id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
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
                "defaultContent": "<button id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
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
            {data: 'TERBIT', className:"text-center"},              
        ],
		columnDefs: [
			{
                "targets": 0,
                "data": null,
                "defaultContent": "<button id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
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
                "defaultContent": "<button id='btn_ubah' class='btn btn-primary'><i class='fa fa-edit'></i></button> <button id='btn_hapus' class='btn btn-danger'><i class='fa fa-trash' aria-hidden='true' ></button>"	
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

	var table = $('#dataGridSponsor').DataTable();
	$('#dataGridSponsor tbody').on( 'click', 'button', function () {
			var row = table.row( $(this).parents('tr') ).data();
			var mode = $(this).attr("id");
			
			if(mode == "btn_ubah"){ ubahSponsor(row); }
			else if(mode == "btn_hapus"){ hapusSponsor(row); }

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
		// Ambil selected option data
		var selectedData = $(this).select2('data')[0];

		if (selectedData) {
			// Set nilai ke input
			$('#NAMASPONSORDETAIL').val(selectedData.nama);
			$('#WEBSITESPONSORDETAIL').val(selectedData.website);

			// Set preview gambar
			$('#previewGambarSponsorDetail').attr('src', selectedData.gambar + '?t=' + Date.now());
		} else {
			// Reset jika tidak ada yang dipilih
			$('#NAMASPONSORDETAIL').val('');
			$('#WEBSITESPONSORDETAIL').val('');
			$('#previewGambarSponsorDetail').attr('src', base_url+'assets/images/sponsor/no-logo.png');
		}
	});


	getDataContact();

});  

function getDataVideoBT(){	
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

			//VIDEO

			var videoid = getVideoId(data.rows.VIDEO);
			var videoData = await getYouTubeData(videoid);
			$("#previewGambarHighlight1").attr("src", videoData.thumbnail);

			videoid = getVideoId(data.rows.VIDEOHIGHLIGHT);
			videoData = await getYouTubeData(videoid);
			$("#previewGambarHighlight2").attr("src", videoData.thumbnail);

			videoid = getVideoId(data.rows.VIDEOMATCHINTERVIEW);
			videoData = await getYouTubeData(videoid);
			$("#previewGambarMatchInterview").attr("src", videoData.thumbnail);

			$('#IDVIDEO').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGridDetail',
					dataType: 'json',
					delay: 250,
					cache: false,
					data: function (params) {
						return {
							id: data.rows.ID,
							video : 'VIDEO'
						};
					},
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return {
									id: row.VALUE,
									text: row.TEXT
								};
							})
						};
					}
				}
			});
			// ✅ 2. Set value setelah Select2 di-init
			var newOption = new Option(data.rows.VIDEOTEXT, data.rows.VIDEOVALUE, true, true);
			$('#IDVIDEO').append(newOption).trigger('change');

			$('#IDVIDEOHIGHLIGHT').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGridDetail',
					dataType: 'json',
					delay: 250,
					cache: false,
					data: function (params) {
						return {
							id: data.rows.ID,
							video : 'VIDEOHIGHLIGHT'
						};
					},
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return {
									id: row.VALUE,
									text: row.TEXT
								};
							})
						};
					}
				}
			});

			// ✅ 2. Set value setelah Select2 di-init
			var newOption = new Option(data.rows.VIDEOHIGHLIGHTTEXT, data.rows.VIDEOHIGHLIGHTVALUE, true, true);
			$('#IDVIDEOHIGHLIGHT').append(newOption).trigger('change');

			$('#IDVIDEOMATCHINTERVIEW').select2({
				ajax: {
					url: base_url + 'Competition/Operational/Fixture/comboGridDetail',
					dataType: 'json',
					delay: 250,
					cache: false,
					data: function (params) {
						return {
							id: data.rows.ID,
							video : 'VIDEOMATCHINTERVIEW'
						};
					},
					processResults: function (result) {
						return {
							results: result.rows.map(function (row) {
								return {
									id: row.VALUE,
									text: row.TEXT
								};
							})
						};
					}
				}
			});

			// ✅ 2. Set value setelah Select2 di-init
			var newOption = new Option(data.rows.VIDEOMATCHINTERVIEWTEXT, data.rows.VIDEOMATCHINTERVIEWVALUE, true, true);
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

function tambahSponsor(){
	$('#IDSPONSORDETAIL').val(null).trigger('change');
	$("#mode-sponsor").show('tambah');
	$("#modal-sponsor").modal('show');
}
function ubahSponsor(row){

	$("#mode-sponsor").show('ubah');
	$("#modal-sponsor").modal('show');

	var newOption = new Option(row.NAMA, row.ID, true, true);
	$('#IDSPONSORDETAIL').append(newOption).trigger('change');
	$('#WEBSITESPONSORDETAIL').val(row.WEBSITE);
    $('#previewGambarSponsorDetail').attr('src', row.GAMBAR + '?t=' + Date.now());
}
function hapusSponsor(){
 $("#mode-sponsor").show('hapus');
	
}
function simpanDetailSponsor(){
 $("#modal-sponsor").modal('hide');
}
function simpanSponsor(){

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
