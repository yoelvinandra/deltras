
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Master User
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
									<th width="25px">Login</th>
									<th>ID</th>
									<th>User ID</th>
									<th>Nama</th>
									<th>HP</th>
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
					<div class="tab-pane" id="tab_form">
						<div class="box-body">
							 <div class="nav-tabs-custom" >
								<ul class="nav nav-tabs" id="tab_transaksi">
									<li class="active"><a href="#tab_umum" data-toggle="tab">Umum</a></li>
									<li><a href="#tab_hak_akses" data-toggle="tab">Hak Akses</a></li>
									<li>									
										<button type="button" id="btn_simpan" class="btn btn-primary" onclick="javascript:simpan()">Simpan</button>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="tab_umum">
										<div class="box-body">
											<div class="col-md-12">
												<!-- form start -->
												<form role="form" id="form_input">
													<input type="hidden" id="mode" name="mode">
													<input type="hidden" id="IDUSER" name="IDUSER">
													<div class="box-body">
														<div class="form-group col-md-6">
															<h3 style="font-weight:bold;">Data Umum</h3>
															<label for="USERID">User ID <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i> &nbsp;&nbsp;&nbsp;</label> <label><input type="checkbox" class="flat-blue" id="STATUS" name="STATUS" value="1">&nbsp; Aktif </label> &nbsp;  &nbsp; <input type="hidden"id="LOGIN" name="LOGIN" value="1" >
															<input type="text" class="form-control" id="USERID" name="USERID" placeholder="User ID" onkeydown="return onlyAlphabets(event)">
															<br>
															<label>Nama User <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
															<input type="text" class="form-control" id="USERNAME" name="USERNAME" placeholder="Nama User">
															<br>
															<label>Password <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
															<input type="password" class="form-control" id="PASS" name="PASS" placeholder="Password">
															<br>
															<label>Ulangi Password <i style="color:grey;">&nbsp;&nbsp;&nbsp;Wajib</i></label>
															<input type="password" class="form-control" id="RE_PASS" name="RE_PASS" placeholder="Re-type Password">
															<br>
															<label>HP</label>
															<input type="text" class="form-control" id="HP" name="HP" placeholder="Handphone">
															<br>
															<label>Email</label>
															<input type="text" class="form-control" id="EMAIL" name="EMAIL" placeholder="Email">
														</div>
														<div class="form-group col-md-10">
															<label>Catatan</label>
															<textarea class="form-control" rows="3" id="CATATAN" name="CATATAN" placeholder="Catatan....."></textarea>
														</div>
													</div>
													<!-- /.box-body -->
												</form>	
											</div>
										</div>
									<!-- /.tab-pane -->
									</div>
									
									<div class="tab-pane" id="tab_hak_akses">
									  <div class="box-body">
										  <div><h3 style="font-weight:bold;">Master <label class="pull-right"><input type="checkbox" id="masterAll"> &nbsp;&nbsp;Semua Akses</label></h3></div>
										  <table id="dataGridMaster" class="table table-bordered table-striped table-hover display nowrap" width="100%">
											  <!-- class="table-hover"> -->
											  <thead>
											  <tr>
												  <th></th>
												  <th width="150px">Header Modul</th>
												  <th>Nama Modul</th>
												  <th width="40px" > <!--<input type="checkbox" id="hakakses_Master"></input>-->  	Akses </th>
												  <th width="40px" > <!--<input type="checkbox" id="tambah_Master"></input>--> 	Tambah</th>
												  <th width="40px" > <!--<input type="checkbox" id="ubah_Master"></input>-->  	Ubah  </th>
												  <th width="40px" > <!--<input type="checkbox" id="hapus_Master"></input>-->  	Hapus </th>
											  </tr>                 
											  </thead>
										  </table>
										  <br>
										  <div><h3 style="font-weight:bold;">Competition <label class="pull-right"><input type="checkbox" id="competitionAll"> &nbsp;&nbsp;Semua Akses</label></h3></div>
										  <table id="dataGridCompetition" class="table table-bordered table-striped table-hover display nowrap" width="100%">
											 <!-- class="table-hover"> -->
											 <thead>
											 <tr>
												  <th></th>
												  <th width="150px">Header Modul</th>
												  <th>Nama Modul</th>
												  <th width="40px"><!--<input type="checkbox" id="hakakses_Transaksi"></input>-->  Akses</th>
												  <th width="40px"><!--<input type="checkbox" id="tambah_Transaksi"></input>--> 	Tambah</th>
												  <th width="40px"><!--<input type="checkbox" id="ubah_Transaksi"></input>-->  	Ubah</th>
												  <th width="40px"><!--<input type="checkbox" id="hapus_Transaksi"></input>--> 	Hapus</th>
											 </tr>
											 </thead>
										  </table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<!-- nav-tabs-custom -->
			</div>
		</div>
    <!-- /.col -->
	  </div>
  </div>
  <!-- /.row (main row) -->

</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.2/xlsx.full.min.js"></script>
<!-- /.content -->

<script>
var indexRow;
$(document).ready(function() {
    $("#mode").val('tambah');
    $("#STATUS").prop('checked',true).iCheck('update');
    
    $("#masterAll").click(function(){
        $('#dataGridMaster tbody input[type="checkbox"]').each(function() {
            
            var checkbox = $(this);
            
            checkbox.prop('checked', $("#masterAll").prop('checked'));
            
            var row = $('#dataGridMaster').DataTable().row( $(this).parents('tr') ).data();
    		var check = 0;
    		
    		if($("#masterAll").prop('checked'))
    		{check = 1;}
    		else
    		{check = 0;}
    		
    		row.HAKAKSES	= check; 
    		row.TAMBAH 		= check;
    		row.UBAH 		= check;
    		row.HAPUS 		= check;
    		
        });
    });
    
    $("#competitionAll").click(function(){
        $('#dataGridCompetition tbody input[type="checkbox"]').each(function() {
            
            var checkbox = $(this);
            
            checkbox.prop('checked', $("#competitionAll").prop('checked'));
            
            var row = $('#dataGridCompetition').DataTable().row( $(this).parents('tr') ).data();
    		var check = 0;
    		
    		if($("#competitionAll").prop('checked'))
    		{check = 1;}
    		else
    		{check = 0;}
    		
    		row.HAKAKSES	= check; 
    		row.TAMBAH 		= check;
    		row.UBAH 		= check;
    		row.HAPUS 		= check;
    		
        });
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
			url    : base_url+'Master/Data/User/dataGrid',
			dataSrc: "rows",
			dataFilter: function (data) {
                // Refresh the new table whenever DataTable reloads
                var allData = JSON.parse(data).rows; // Get all rows' data

                // Create the HTML structure for the new table
                var newTable = $('<table id="newTable" class="table table-bordered">');
                var thead = $('<thead>').append('<tr><th>User ID</th><th>Nama User</th><th>HP</th><th>Email</th><th>Catatan</th><th>User Buat</th><th>Tgl Entry</th><th>Status</th></tr>');
                var tbody = $('<tbody>');
                 // Loop through the DataTable data and create rows for the new table
         
                allData.forEach(function (row, index) {
                    var tr = $('<tr>');
            
                    tr.append('<td>' + row.USERID + '</td>');
                    tr.append('<td>' + row.USERNAME + '</td>');
                    tr.append('<td>' + (row.HP== null?"":row.HP) + '</td>');
                    tr.append('<td>' + (row.EMAIL== null?"":row.EMAIL) + '</td>');
                    tr.append('<td>' + (row.CATATAN== null?"":row.CATATAN) + '</td>');
                    tr.append('<td>' + row.USERBUAT + '</td>');
                    tr.append('<td class="text-center">' + row.TGLENTRY + '</td>');
                    tr.append('<td class="text-center">' + (row.STATUS == 1 ? 'AKTIF' : 'NON AKTIF') + '</td>');
            
                    // Append the row to the tbody
                    tbody.append(tr);
                });
            
                // Append the thead and tbody to the new table
                newTable.append(thead).append(tbody);
                // Append the new table to the DOM (you can specify where you want the new table to appear)
                $('#tableExcel').html(newTable); 
                
                return data;
            }
		},
        columns:[
            {data: ''},
            {data: 'STATUSLOGIN', visible: false},
            {data: 'IDUSER', visible: false},
            {data: 'USERID'},
            {data: 'USERNAME'},
			{data: 'HP'},
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
						if(data == 1) return "YA";
						else return "TIDAK";
					},	
			}
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
	
	$('#dataGridMaster').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : false,
        'autoWidth'   : false,
		"scrollX"	  : true,
		ajax		  : {
			url       : base_url+'Master/Data/User/treeGrid',
			data      : function(e){
						e.jenismenu = "Data";
						e.iduser 	= getIduser();
						},
			type      : "POST",
			dataSrc   : "rows",
			dataType  : 'json',
		},
        columns:[
            {data: 'KODEMODUL', visible: false},
            {data: 'HEADER'},
            {data: 'NAMAMODUL'},
            {data: 'HAKAKSES', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.HAKAKSES == 1) {
							return '<input type="checkbox" class="hakakses" checked>';
						}
						else{
							return '<input type="checkbox" class="hakakses">';
						}
						return data;
					},
					className: "dt-body-center"},
			{data: 'TAMBAH', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.TAMBAH == 1) {
							return '<input type="checkbox" class="tambah" checked>';
						}
						else{
							return '<input type="checkbox" class="tambah">';
						}
						return data;
					},
					className: "dt-body-center"},
			{data: 'UBAH', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.UBAH == 1) {
							return '<input type="checkbox" class="ubah" checked>';
						}
						else{
							return '<input type="checkbox" class="ubah">';
						}
						return data;
					},
					className: "dt-body-center"},
            {data: 'HAPUS', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.HAPUS == 1) {
							return '<input type="checkbox" class="hapus" checked>';
						}
						else{
							return '<input type="checkbox" class="hapus">';
						}
						return data;
					},
					className: "dt-body-center"},
        ],
    });
	
	
	$('#dataGridMaster tbody').on('click', 'tr input', function () {
		var kolom = $(this).attr("class");
		var row = $('#dataGridMaster').DataTable().row( $(this).parents('tr') ).data();
		var check = 0;
		
		
		if($(this).prop("checked"))
		{check = 1;}
		else
		{check = 0;}
		
		if(kolom == "hakakses")
		{
			//alert(JSON.stringify($('#dataGridMaster').DataTable().row( $(this).parents('tr') ).indexes()));
			
			row.HAKAKSES	= check; 
			//row.TAMBAH 		= check;
			//row.UBAH 		= check;
			//row.HAPUS 		= check;
		}
		if(kolom == "tambah")
		{	
			row.TAMBAH 		= check;
		}
		if(kolom == "ubah")
		{	
			row.UBAH 		= check;
		}
		if(kolom == "hapus")
		{	
			row.HAPUS 		= check;
		}
	
		//alert(row.HAKAKSES+" "+row.TAMBAH+" "+row.UBAH+" "+row.HAPUS);
		//$(this).prop("checked",true);//CENTANG CHECKBOX
		//$('#table_hutang').DataTable().data()[indexHutang].LUNAS = 1; 
		//indexHutang++;
	});
	
	$('#dataGridCompetition').DataTable({
        'paging'      : false,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : false,
        'info'        : false,
        'autoWidth'   : false,
		"scrollX"	  : true,
		ajax		  : {
			url       : base_url+'Master/Data/User/treeGrid',
			data      : function(e){
						e.jenismenu = "Operational";
						e.iduser 	= getIduser();
						},
			type      : "POST",
			dataSrc   : "rows",
			dataType  : 'json',
		},
        columns:[
            {data: 'KODEMODUL', visible: false},
			{data: 'HEADER'},
            {data: 'NAMAMODUL'},
            {data: 'HAKAKSES', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.HAKAKSES == 1) {
							return '<input type="checkbox" class="hakakses" checked>';
						}
						else{
							return '<input type="checkbox" class="hakakses">';
						}
						return data;
					},
					className: "dt-body-center"},
			{data: 'TAMBAH', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.TAMBAH == 1) {
							return '<input type="checkbox" class="tambah" checked>';
						}
						else{
							return '<input type="checkbox" class="tambah">';
						}
						return data;
					},
					className: "dt-body-center"},
			{data: 'UBAH', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.UBAH == 1) {
							return '<input type="checkbox" class="ubah" checked>';
						}
						else{
							return '<input type="checkbox" class="ubah">';
						}
						return data;
					},
					className: "dt-body-center"},
            {data: 'HAPUS', className:"text-center",
					render: function ( data, type, row ) {
						if ( type === 'display' && row.HAPUS == 1) {
							return '<input type="checkbox" class="hapus" checked>';
						}
						else{
							return '<input type="checkbox" class="hapus">';
						}
						return data;
					},
					className: "dt-body-center"},
        ],
    });
	
	$('#dataGridCompetition tbody').on('click', 'tr input', function () {
		var kolom = $(this).attr("class");
		var row = $('#dataGridCompetition').DataTable().row( $(this).parents('tr') ).data();
		var check = 0;
		
		
		if($(this).prop("checked"))
		{check = 1;}
		else
		{check = 0;}
		
		if(kolom == "hakakses")
		{
			row.HAKAKSES	= check; 
		}
		if(kolom == "tambah")
		{	
			row.TAMBAH 		= check;
		}
		if(kolom == "ubah")
		{	
			row.UBAH 		= check;
		}
		if(kolom == "hapus")
		{	
			row.HAPUS 		= check;
		}
	});
	
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    });
});

function onlyAlphabets(event) {
    // Allow control keys (backspace, tab, arrows), and letters A-Z
    const allowedKeys = [
        8,    // Backspace
        9,    // Tab
        37,   // Left Arrow
        38,   // Up Arrow
        39,   // Right Arrow
        40,   // Down Arrow
        46,   // Delete
        65,   // 'A'
        90    // 'Z'
    ];

    // Allow lowercase a-z
    if ((event.keyCode >= 65 && event.keyCode <= 90) || 
        (event.keyCode >= 97 && event.keyCode <= 122) || 
        allowedKeys.includes(event.keyCode)) {
        return true;
    }

    // Prevent default if the key is not allowed
    return false;
}

function getIduser(){
	return $("#IDUSER").val();
}

function getData(data){
	var row = $('#dataGrid'+data).DataTable().rows().data();
	var counthakakses = 0;
	var counttambah = 0;
	var countubah = 0;
	var counthapus = 0;
	
	for(var i = 0 ; i< row.length;i++)
	{
		//alert(row[i].HAKAKSES);

		if(row[i].HAKAKSES == 1)
		{
			counthakakses++;
		}
		if(row[i].TAMBAH == 1)
		{
			counttambah++;
		}
		if(row[i].UBAH == 1)
		{
			countubah++;
		}
		if(row[i].HAPUS == 1)
		{
			counthapus++;
		}
	}


	if(counthakakses == row.length)
	{
		$("#hakakses_"+data).prop("checked",true);
	}
	if(counttambah == row.length)
	{
		$("#tambah_"+data).prop("checked",true);
	}
	if(countubah == row.length)
	{
		$("#ubah_"+data).prop("checked",true);
	}
	if(counthapus == row.length)
	{
		$("#hapus_"+data).prop("checked",true);
	}

}

// function exportTableToExcel() {
//   var wb = XLSX.utils.table_to_book(document.getElementById('tableExcel'), {sheet:"Sheet 1"});
//    // Access the worksheet (first sheet)
//   const ws = wb.Sheets[wb.SheetNames[0]];
//   // Set column widths - specify column widths for each column in the 'cols' array
//   ws['!cols'] = [
//     { wpx: 150 }, // Column A width in pixels
//     { wpx: 150 }, // Column B width in pixels
//     { wpx: 100 },  // Column C width in pixels
//     { wpx: 120 }, // Column A width in pixels
//     { wpx: 150 },  // Column C width in pixels
//     { wpx: 100 }, // Column B width in pixels
//     { wpx: 70 }, // Column B width in pixels
//     { wpx: 50 },  // Column C width in pixels
//   ];
//   // Trigger download
//   XLSX.writeFile(wb, 'USER_'+dateNowFormatExcel()+'.xlsx');
// }

function tambah(){
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.TAMBAH==1) {
			$("#mode").val('tambah');
			reset();
			//pindah tab & ganti judul tab
			$('.nav-tabs a[href="#tab_form"]').tab('show');
			$('.nav-tabs a[href="#tab_form"]').html('Tambah');

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
	$("#masterAll").prop('checked',false).iCheck('update');
	$("#competitionAll").prop('checked',false).iCheck('update');
	
    get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.UBAH==1) {
				
				$("#mode").val('ubah');
				// $("#USERID").prop('readonly');
				//pindah tab & ganti judul tab
				$('.nav-tabs a[href="#tab_form"]').tab('show');
				$('.nav-tabs a[href="#tab_form"]').html('Ubah');

                $('.nav-tabs a[href="#tab_umum"]').tab('show'); 

				//load row data to form
				if(row.STATUS == 0) $("#STATUS").prop('checked',false).iCheck('update');
				else if(row.STATUS == 1) $("#STATUS").prop('checked',true).iCheck('update');
				
				if(row.STATUSLOGIN == "TIDAK") $("#LOGIN").val(0);
				else if(row.STATUSLOGIN == "YA")  $("#LOGIN").val(1);
				
				$("#USERID").prop("readonly",true);
				$("#IDUSER").val(row.IDUSER);
				$("#USERID").val(row.USERID);
				$("#USERNAME").val(row.USERNAME);
				$("#HP").val(row.HP);
				$("#EMAIL").val(row.EMAIL);
				$("#CATATAN").val(row.CATATAN);
				
				$.ajax({
					type      : 'POST',
					url       : base_url+'Master/Data/User/getPass',
					data      : {id:row.IDUSER},
					success: function(msg){
						$("#PASS").val(msg);
						$("#RE_PASS").val(msg);
					}
				});
				
				$("#dataGridMaster").DataTable().ajax.reload();
				$("#dataGridCompetition").DataTable().ajax.reload();
				
				getData("Master");
				getData("Competition");
				// getDataLokasi();
					
				 
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
	// var isValid = $('#form_input').form('validate');
	var mode = $("#mode").val();
	
	//MASTER
	var tableMaster = $('#dataGridMaster').DataTable();
	var dataMaster = JSON.stringify(tableMaster.rows().data());
	
	//COMPETITION
	var tableCompetition = $('#dataGridCompetition').DataTable();
	var dataCompetition = JSON.stringify(tableCompetition.rows().data());

	let email = $('#EMAIL').val();
    let telp = $('#HP').val();
	
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

		$.ajax({
			type      : 'POST',
			url       : base_url+'Master/Data/User/simpan',
			data      : $('#form_input :input').serialize(),
			dataType  : 'json',
			success: function(msg){
				if (msg.success) {
					var iduser = msg.iduser;
					$.ajax({
						type      : 'POST',
						url       : base_url+'Master/Data/User/simpanMaster',
						data      : {"dataMaster" : dataMaster,"iduser" : iduser},
						dataType  : 'json',
						success: function(msg){
							if (msg.success) {
		
								$.ajax({
									type      : 'POST',
									url       : base_url+'Master/Data/User/simpanCompetition',
									data      : {"dataCompetition" : dataCompetition,"iduser" : iduser},
									dataType  : 'json',
									success: function(msg){
										if (msg.success) {
		
												Swal.fire({
																			title            : 'Simpan Data Sukses',
																			type             : 'success',
																			showConfirmButton: false,
																			timer            : 1500
																		});
																		reset();
																		$("#dataGrid").DataTable().ajax.reload();
																		$("#dataGridMaster").DataTable().ajax.reload();
																		$("#dataGridCompetition").DataTable().ajax.reload();
		
																		$('.nav-tabs a[href="#tab_umum"]').tab('show');
																		$('.nav-tabs a[href="#tab_grid"]').tab('show'); 
		
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
	
}

function hapus(row){
	
	get_akses_user('<?=$_GET['kode']?>', function(data){
		if (data.HAPUS==1) {
		    
            if (row) {
		     Swal.fire({
            		title: 'Anda Yakin Akan Menghapus User '+row.USERNAME+' ?',
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
                					url     : base_url+"Master/Data/User/hapus",
                					data    : "id="+row.IDUSER + "&kode="+row.KODEUSER,
                					cache   : false,
                					success : function(msg){
                						if (msg.success) {
                							Swal.fire({
                								title            : 'User dengan nama '+row.USERNAME+' telah dihapus',
                								type             : 'success',
                								showConfirmButton: false,
                								timer            : 1500
                							});
                							$("#dataGrid").DataTable().ajax.reload();
                							$('.nav-tabs a[href="#tab_grid"]').tab('show');
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

function reset(){
	//clear form input
	$('.nav-tabs a[href="#tab_form"]').html('Tambah');
	$("#USERID").prop("readonly",false);
	
	$("#masterAll").prop('checked',false).iCheck('update');
	$("#competitionAll").prop('checked',false).iCheck('update');
	
	$("#STATUS").prop('checked',true).iCheck('update');
	$("#IDUSER").val("");
	$("#PASS").val("");
	$("#RE_PASS").val("");
	$("#USERID").val("");
	$("#USERNAME").val("");
	$("#HP").val("");
	$("#EMAIL").val("");
	$("#CATATAN").val("");
	
	$("#dataGridMaster").DataTable().ajax.reload();
	$("#dataGridCompetition").DataTable().ajax.reload();
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
