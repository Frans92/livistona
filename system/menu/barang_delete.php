<?php
	//desc variabel form
	$id_barang	= $_GET['id'];
	
	//hapus barang
	$hapus	= mysql_query("DELETE FROM `barang` WHERE `id_barang` = $id_barang");
	if($hapus){
		echo "<script>alert('Barang berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=barang'</script>";
	}else{
		echo "<script>alert('Barang gagal dihapus, silakan ulangi kembali..')
			 location.href='index.php?menu=master&sub_menu=barang'</script>";
	}
?>
