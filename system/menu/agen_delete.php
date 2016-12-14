<?php
	//desc variabel form
	$id_agen	= $_GET['id'];
	
	//hapus agen
	$hapus	= mysql_query("DELETE FROM `konsumen_agen` WHERE `id_agen` = $id_agen");
	if($hapus){
		echo "<script>alert('Agen berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=agen'</script>";
	}else{
		echo "<script>alert('Agen gagal dihapus, silakan ulangi kembali..')
			 location.href='index.php?menu=master&sub_menu=agen'</script>";
	}
?>
