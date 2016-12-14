<?php
	//desc variabel form
	$id_suplier	= $_GET['id'];
	
	//hapus suplier j
	$hapus	= mysql_query("DELETE FROM `suplier` WHERE `id_suplier` = $id_suplier");
	if($hapus){
		echo "<script>alert('Suplier berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=suplier'</script>";
	}else{
		echo "<script>alert('Suplier gagal dihapus, silakan ulangi kembali..')
			 location.href='index.php?menu=master&sub_menu=suplier'</script>";
	}
?>
