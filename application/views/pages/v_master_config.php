
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
				<li><a href="#tab_about" data-toggle="tab">About & Contact</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_banner">
                    <div class="box-body">
                        <h3 style="font-weight:bold;">Banner</h3>
						<button class="btn btn-success" onclick="javascript:tambahBanner()">Tambah</button>
                        <table id="dataGridBanner" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
								<tr>
									<th width="35px"></th>
									<th>Gambar</th> 
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
                        <h3 style="font-weight:bold;">Team & Player</h3>
						<label>Video Behind The Scene</label>
						<img src="" height="200px">
						<input type="text" class="form-control" id="VIDEOBEHINDTHESCENE" name="VIDEOBEHINDTHESCENE" placeholder="...">
						<br>
						<label>Kolom Pemain</label>
						<button class="btn btn-success" onclick="javascript:tambahPemain()">Tambah</button>
                        <table id="dataGridTeam" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
								<tr>
									<th width="35px"></th>
									<th>Nama</th>
									<th>Position</th>
									<th>Squad Number</th>  
									<th>Goals</th>    
									<th>Assist</th>     
									<th>GK Save</th>                                
								</tr>
                            </thead>
                        </table>
                    </div>
					<div class="box-footer">
                        <button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanTeam()">Simpan</button>
                    </div>
                </div>
				<div class="tab-pane" id="tab_fixture">
                    <div class="box-body">
                        <h3 style="font-weight:bold;">Fixture</h3>
						<label>Nama Fixture</label>
						<select class="form-control" id="IDFIXTURE" name="IDFIXTURE">
            			</select>
						<br>
						<label>Video Highlight</label>
						<img src="" height="200px">
						<select class="form-control" id="VIDEOHIGHLIGHT" name="VIDEOHIGHLIGHT">
            			</select>
						<br>
						<label>Video</label>
						<img src="" height="200px">
						<select class="form-control" id="VIDEO" name="VIDEO">
            			</select>
						<br>
						<label>Video Match Interview</label>
						<img src="" height="200px">
						<select class="form-control" id="VIDEOMATCHINTERVIEW" name="VIDEOMATCHINTERVIEW">
            			</select>
						<br>
						<label>Tabel Klasemen</label>
						<button class="btn btn-success" onclick="javascript:tambahKlasemen()">Tambah</button>
						<table id="dataGridKlasemen" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
								<tr>
									<th width="35px"></th>
									<th>Club</th>
									<th>Menang</th>
									<th>Seri</th>  
									<th>Kalah</th>    
									<th>Point</th>                               
								</tr>
                            </thead>
                        </table>
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
									<th>Judul</th>
									<th>Gambar</th>                             
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
						<button class="btn btn-success" onclick="javascript:tambahSponsor()">Tambah</button>
						<table id="dataGridSponsor" class="table table-bordered table-striped table-hover display nowrap" width="100%">
                            <!-- class="table-hover"> -->
                            <thead>
								<tr>
									<th width="35px"></th>
									<th>Nama</th>
									<th>Logo</th>                              
								</tr>
                            </thead>
                        </table>
						<br>
                    </div>
					<div class="box-footer">
                        <button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanSponsor()">Simpan</button>
                    </div>
                </div>
				<div class="tab-pane" id="tab_about">
                    <div class="box-body">
						<div class="row">
      						<div class="col-md-6">
								<h3 style="font-weight:bold;">About Deltras</h3>
								<label>Alamat</label>
								<input type="text" class="form-control" id="ALAMAT" name="ALAMAT" placeholder="...">
								<br>
								<label>Email</label>
								<input type="text" class="form-control" id="EMAIL" name="EMAIL" placeholder="...">
								<br>
								<label>Telp</label>
								<input type="text" class="form-control" id="TELP" name="TELP" placeholder="...">
								<br>

								<label>Youtube</label>
								<input type="text" class="form-control" id="YOUTUBE" name="YOUTUBE" placeholder="...">
								<br>

								<label>Tiktok</label>
								<input type="text" class="form-control" id="TIKTOK" name="TIKTOK" placeholder="...">
								<br>

								<label>Instagram</label>
								<input type="text" class="form-control" id="INSTAGRAM" name="INSTAGRAM" placeholder="...">
								<br>
							</div>
							<div class="col-md-6">
								<h3 style="font-weight:bold;">About Deltamania</h3>
								<label>Alamat</label>
								<input type="text" class="form-control" id="MEMBERALAMAT" name="MEMBERALAMAT" placeholder="...">
								<br>
								<label>Email</label>
								<input type="text" class="form-control" id="MEMBEREMAIL" name="MEMBEREMAIL" placeholder="...">
								<br>
								<label>Telp</label>
								<input type="text" class="form-control" id="MEMBERTELP" name="MEMBERTELP" placeholder="...">
								<br>
								<label>Youtube</label>
								<input type="text" class="form-control" id="MEMBERINSTAGRAM" name="MEMBERINSTAGRAM" placeholder="...">
								<br>
								<label>Tiktok</label>
								<input type="text" class="form-control" id="MEMBERX" name="TIKTOK" MEMBERX="...">
								<br>
								<label>Instagram</label>
								<input type="text" class="form-control" id="MEMBERTIKTOK" name="MEMBERTIKTOK" placeholder="...">
								<br>
								<label>Facebook</label>
								<input type="text" class="form-control" id="MEMBERFACEBOOK" name="MEMBERFACEBOOK" placeholder="...">
								<br>
							</div>
						</div>
                    </div>
					<div class="box-footer">
                        <button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpanAbout()">Simpan</button>
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
<script>
$(document).ready(function() {
	$('#dataGridBanner').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false,
		"scrollX"	  : true,
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
});    

function simpanAbout(){
	alert('a');
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
