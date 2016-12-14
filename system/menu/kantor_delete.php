<?php
	//desc variabel form
	$id_kantor	= $_GET['id'];
	
	//hapus kantor
	$hapus	= mysql_query("DELETE FROM `kantor` WHERE `id_kantor` = $id_kantor");
	if($hapus){
		echo "<script>alert('Data Kantor berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=kantor'</script>";
	}else{
		echo "<script>alert('Data kantor tidak bisa dihapus dikarenakan masih ada data karyawan yang berkantor disini..')
			 location.href='index.php?menu=master&sub_menu=kantor'</script>";
	}
?>
