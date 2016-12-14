<?php
	//desc variabel form
	$id_kendaraan	= $_GET['id'];
	
	//hapus kendaraan
	$hapus	= mysql_query("DELETE FROM `kendaraan` WHERE `id_kendaraan` = $id_kendaraan");
	if($hapus){
		echo "<script>alert('Data kendaraan berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=kendaraan'</script>";
	}else{
		echo "<script>alert('Data kendaraan gagal dihapus, silakan ulangi kembali..')
			 location.href='index.php?menu=master&sub_menu=kendaraan'</script>";
	}
?>
