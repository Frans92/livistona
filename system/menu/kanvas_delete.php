<?php
	//desc variabel form
	$id_kanvas	= $_GET['id'];
	
	//hapus kanvas
	$hapus	= mysql_query("DELETE FROM `konsumen_kanvas` WHERE `id_kanvas` = $id_kanvas");
	if($hapus){
		echo "<script>alert('kanvas berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=kanvas'</script>";
	}else{
		echo "<script>alert('kanvas gagal dihapus, silakan ulangi kembali..')
			 location.href='index.php?menu=master&sub_menu=kanvas'</script>";
	}
?>
