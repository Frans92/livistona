<?php
	//desc variabel form
	$username	= $_GET['id'];
	
	//hapus user
	$hapus	= mysql_query("DELETE FROM `user` WHERE `username` = '$username'");
	if($hapus){
		echo "<script>alert('User berhasil dihapus..')
			  location.href='index.php?menu=master&sub_menu=user'</script>";
	}else{
		echo "<script>alert('User gagal dihapus, silakan ulangi kembali..')
			 location.href='index.php?menu=master&sub_menu=user'</script>";
	}
?>
