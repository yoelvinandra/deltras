<?php
session_start();
if ($excel == 'ya'){
	include dirname(__FILE__)."/../export_to_excel.php";
}

if($errorMsg != ''){
	echo "<script>alert('$errorMsg'); window.close();</script>";
}

$CI =& get_instance();	
$CI->load->database($_SESSION[NAMAPROGRAM]['CONFIG']);
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>..:: Laporan Master History ::..</title>
    <style>
   #header {
		font-family: Verdana, Geneva, sans-serif;
		font-size: 16px;
		font-weight: bold;
	}
	
	#detail{
		font-family: Tahoma, Geneva, sans-serif;
		font-size:9px;
		padding:5px;
	}
	.tebal{
		font-weight:bold;
	}
	.kanan{
		text-align:right;
	}
	.tengah{
		text-align:center;
	}
    
    </style>
</head>
<body>
	<div align="left">
		<div id="header">
		<?php if($tampil == "REGISTER"){ 
            $query = $CI->db->query($sql)->result();
            echo "LAPORAN HISTORY PROGRAM";
            }else{
            echo "LAPORAN HISTORY PROGRAM BARANG";
            
            $sqlLokasi = "select NAMALOKASI from mlokasi where idlokasi in ($whereLokasi)";
            echo "<br>Lokasi : ".$CI->db->query($sqlLokasi)->row()->NAMALOKASI;
            
            $sqlBarang = "select NAMABARANG from mbarang where kodebarang = '$kodeBarang'";
            echo "<br>Barang : ".$CI->db->query($sqlBarang)->row()->NAMABARANG;
            } 
        ?>
        </div>
		<hr>
		<?php
			$tbl = new html_table();
	        if($tampil == "REGISTER")
	        {
            
    			$tbl->set_tr(array('bgcolor'=>'#9CD0ED'));
    			$tbl->set_th(array(
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>150,  'values'=>'Tanggal Entry'),
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>120,  'values'=>'Kode Trans'),
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>80,  'values'=>'Aksi'),
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>80,  'values'=>'User Entry'),
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>400,  'values'=>'Nama File'),
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>80,  'values'=>'Mac Address'),
    				array('id'=>'detail', 'class'=>'tebal', 'align'=>'center', 'width'=>80,  'values'=>'IP Address'),
    
    			));
    			
    			foreach($query as $item) {
    				$urutan++;
    				$warna = ($urutan % 2==0) ? '#FFFFCC' : '#FFFFFF';
    				$warna = ($item->STATUS==0) ? '#bdbdbd' : $warna;
    				
    				$tbl->set_tr(array('bgcolor'=>$warna));
    				$tbl->set_td(array(
    					array('id'=>'detail', 'align'=>'center', 'values'=>$item->TGLHISTORY),
    					array('id'=>'detail', 'align'=>'center','values'=>$item->KODETRANS),
    					array('id'=>'detail', 'align'=>'center','values'=>$item->AKSI),
    					array('id'=>'detail', 'align'=>'center','values'=>$item->USERNAME),
    					array('id'=>'detail', 'values'=>$item->NAMAFILE),
    					array('id'=>'detail', 'align'=>'center','values'=>$item->MACADDRESS),
    					array('id'=>'detail', 'align'=>'center','values'=>$item->IPADDRESS),
    				));
    			}
	        }
    			
    		echo $tbl->generate_table();
		?>
	</div>
</body>
</html>