<?php 
	error_reporting(1);
	session_start();  // Start Session
	if ($_SESSION['status_user'] == "Aktif") {
	include "header.php";
	include "menu.php";
	include "../koneksi.php";
	include "fungsi_indotgl.php";
	
	$menu		= $_GET['menu'];
	$sub_menu	= $_GET['sub_menu'];
	$id			= $_GET['id'];
	// Routing Menu System
	if($menu=="beranda"){
		if($sub_menu=="beranda"){
			include "menu/beranda.php";
		}
	}
	elseif($menu=="master"){
		// menu kendaraan
		if($sub_menu=="karyawan"){
			include "menu/karyawan.php";
		}elseif($sub_menu=="input_karyawan"){
			include "menu/karyawan_input.php";
		}elseif($sub_menu=="karyawan_edit"){
			include "menu/karyawan_edit.php";
		}elseif($sub_menu=="karyawan_delete"){
			include "menu/karyawan_delete.php";
		// menu kantor
		}elseif($sub_menu=="input_kantor"){
			include "menu/kantor_input.php";
		}elseif($sub_menu=="kantor"){
			include "menu/kantor.php";
		}elseif($sub_menu=="kantor_edit"){
			include "menu/kantor_edit.php";
		}elseif($sub_menu=="kantor_delete"){
			include "menu/kantor_delete.php";
		// menu kendaraan
		}elseif($sub_menu=="kendaraan"){
			include "menu/kendaraan.php";
		}elseif($sub_menu=="input_kendaraan"){
			include "menu/kendaraan_input.php";
		}elseif($sub_menu=="kendaraan_edit"){
			include "menu/kendaraan_edit.php";
		}elseif($sub_menu=="kendaraan_delete"){
			include "menu/kendaraan_delete.php";
		// menu suplier
		}elseif($sub_menu=="input_suplier"){
			include "menu/suplier_input.php";
		}elseif($sub_menu=="suplier"){
			include "menu/suplier.php";
		}elseif($sub_menu=="suplier_edit"){
			include "menu/suplier_edit.php";
		}elseif($sub_menu=="suplier_delete"){
			include "menu/suplier_delete.php";
		// menu barang
		}elseif($sub_menu=="barang"){
			include "menu/barang.php";
		}elseif($sub_menu=="input_barang"){
			include "menu/barang_input.php";
		}elseif($sub_menu=="barang_edit"){
			include "menu/barang_edit.php";
		}elseif($sub_menu=="barang_delete"){
			include "menu/barang_delete.php";
		// menu agen
		}elseif($sub_menu=="agen"){
			include "menu/agen.php";
		}elseif($sub_menu=="input_agen"){
			include "menu/agen_input.php";
		}elseif($sub_menu=="agen_edit"){
			include "menu/agen_edit.php";
		}elseif($sub_menu=="agen_delete"){
			include "menu/agen_delete.php";
		// menu kanvas
		}elseif($sub_menu=="kanvas"){
			include "menu/kanvas.php";
		}elseif($sub_menu=="input_kanvas"){
			include "menu/kanvas_input.php";
		}elseif($sub_menu=="kanvas_edit"){
			include "menu/kanvas_edit.php";
		}elseif($sub_menu=="kanvas_delete"){
			include "menu/kanvas_delete.php";
		// menu gudang	
		}elseif($sub_menu=="gudang"){
			include "menu/gudang.php";
		}elseif($sub_menu=="user_edit"){
			include "menu/user_edit.php";
		}elseif($sub_menu=="user_delete"){
			include "menu/user_delete.php";
		// menu user
		}elseif($sub_menu=="user"){
			include "menu/user.php";
		}elseif($sub_menu=="input_user"){
			include "menu/user_input.php";
		}elseif($sub_menu=="user_edit"){
			include "menu/user_edit.php";
		}elseif($sub_menu=="user_delete"){
			include "menu/user_delete.php";
		// menu error atau tidak ada 
		}else{
		include "menu/error.php";
		}
	}else{
		include "menu/error.php";
	}
	
	include "footer.php";
	} else{
		 echo "<script>alert('Anda tidak bisa mengakses halaman ini..')
			   location.href='../index.php'</script>";
	}
?>