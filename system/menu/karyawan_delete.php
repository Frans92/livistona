<?php
	//desc variabel form
	$nik	= $_GET['id'];
	
	//hapus karyawan
	$hapus	= mysql_query("DELETE FROM `karyawan` WHERE `nik` = $nik");
	if($hapus){
		echo "<script>alert('Data karyawan berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=karyawan'</script>";
	}else{
		echo "<script>alert('Data karyawan tidak bisa dihapus dikarenakan karyawan ini memiliki data kendaraan atau data konsumen, silakan hapus terlebih dahulu data kendaraan atau konsumen yang dimiliki karyawan ini terlebih dahulu jika ingin menghapus data katyawan ini..')
			 location.href='index.php?menu=master&sub_menu=karyawan'</script>";
	}
?>
