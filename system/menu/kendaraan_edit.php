<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT KENDARAAN</h5>
                    <div class="toolbar">
                    <ul class="nav">
                        <li>
                        <div class="btn-group">
                            <a class="accordion-toggle btn btn-xs minimize-box" data-toggle="collapse" href="#collapseOne">
                                <i class="icon-chevron-up"></i>
                            </a>
                        </div>
                        </li>
                    </ul>
                    </div>
				</header>
                <div id="collapseOne" class="accordion-body collapse in body">
                    <form action="" class="form-horizontal" method="POST" id="block-validate">
					<?php
					$id = $_GET['id'];
					$cek_kendaraan = mysql_query ("SELECT a.id_kendaraan, a.no_polisi, a.nama_kendaraan, a.jenis_kendaraan, a.pengguna_kendaraan, b.nama_karyawan FROM kendaraan a, karyawan b 
										           where a.pengguna_kendaraan=b.nik and a.id_kendaraan='$id'");
					$hasil_kendaraan = mysql_fetch_array($cek_kendaraan);
					?>
                        <div class="form-group">
                            <label class="control-label col-lg-2">No. Polisi</label>
                            <div class="col-lg-2">
                                <input type="text" name="no" class="form-control" value="<?php echo $hasil_kendaraan['no_polisi'];?>" />
                                <input type="hidden" name="no_lama" class="form-control" value="<?php echo $hasil_kendaraan['no_polisi'];?>" />
                                <input type="hidden" name="id" class="form-control" value="<?php echo $hasil_kendaraan['id_kendaraan'];?>" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Nama Kendaraan</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" class="form-control" value="<?php echo $hasil_kendaraan['nama_kendaraan'];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Jenis Kendaraan</label>
                            <div class="col-lg-2">
								<select name="jenis" id="jenis" class="form-control">
									<option value="<?php echo $hasil_kendaraan['jenis_kendaraan'];?>"><?php echo $hasil_kendaraan['jenis_kendaraan'];?></option>
									<?php
									if($hasil_kendaraan['jenis_kendaraan']=="Motor"){
									?>
									<option value="Mobil">Mobil</option>
									<?php }else{?>
									<option value="Motor">Motor</option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Pengguna Kendaraan</label>
                            <div class="col-lg-2">
								<input type="hidden" name="karyawan_lama" value="<?php echo $hasil_kendaraan['pengguna_kendaraan'];?>">
								<select name="karyawan" id="karyawan" class="form-control">
									<option value="<?php echo $hasil_kendaraan['pengguna_kendaraan'];?>"><?php echo $hasil_kendaraan['pengguna_kendaraan'];?> - <?php echo $hasil_kendaraan['nama_karyawan'];?></option>
									<?php
									$cek_karyawan = mysql_query ("SELECT nik,nama_karyawan FROM karyawan where nik<>'".$hasil_kendaraan['pengguna_kendaraan']."'");
									while($hasil_karyawan = mysql_fetch_array($cek_karyawan)){
									?>
									<option value="<?php echo $hasil_karyawan['nik'];?>"><?php echo $hasil_karyawan['nik'];?> - <?php echo $hasil_karyawan['nama_karyawan'];?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<br>
                        <div class="form-actions no-margin-bottom" style="text-align:left;">
                            <input type="submit" value="SIMPAN" name="simpan" class="btn btn-primary btn-sm" />
                        </div>

					</form>
                </div>
                </div>
            </div>
        </div>
	</div>
</div>
<!--END PAGE CONTENT -->
<?php
//cek sudah tekan tombol simpan
if(ISSET($_POST['simpan'])){

	//desc variabel form
	$id				= $_POST['id'];
	$no				= $_POST['no'];
	$no_lama		= $_POST['no_lama'];
	$nama			= $_POST['nama'];
	$jenis			= $_POST['jenis'];
	$karyawan		= $_POST['karyawan'];
	$karyawan_lama	= $_POST['karyawan_lama'];
	
	if($no<>$no_lama){
		//cek di database apakah kendaraan sudah ada sebelumnya
		$cek_kendaraan 	= mysql_query("SELECT no_polisi as nomor FROM kendaraan WHERE no_polisi = '$no'");
		$hasil_cek		= mysql_fetch_array ($cek_kendaraan);

		if($hasil_cek['nomor']==$no){
			echo "<script>alert('Kendaraan ini sudah ada, silakan masukan kendaraan lainnya..')
			location.href=''</script>";
		}else{
			$cek_karyawan = mysql_query("SELECT pengguna_kendaraan from kendaraan where pengguna_kendaraan='$karyawan'");
			$hasil_karyawan = mysql_fetch_array($cek_karyawan);
			
			
				//simpan kendaraan jika belum ada di database
				$simpan	= mysql_query("UPDATE kendaraan SET `no_polisi`='$no', `nama_kendaraan`='$nama', `jenis_kendaraan`='$jenis', `pengguna_kendaraan`='$karyawan' WHERE id_kendaraan='$id'");
				if($simpan){
					echo "<script>alert('Kendaraan berhasil diedit..')
					location.href='index.php?menu=master&sub_menu=kendaraan'</script>";
				}else{
					echo "<script>alert('Kendaraan gagal diedit, silakan masukan kembali..')
					location.href=''</script>";
				}
			
		}
	}else{
		if($karyawan_lama<>$karyawan){
			$cek_karyawan = mysql_query("SELECT pengguna_kendaraan from kendaraan where pengguna_kendaraan='$karyawan'");
			$hasil_karyawan = mysql_fetch_array($cek_karyawan);
			
			if($hasil_karyawan['pengguna_kendaraan']<>$karyawan){
				//simpan kendaraan jika belum ada di database
				$simpan	= mysql_query("UPDATE kendaraan SET `no_polisi`='$no', `nama_kendaraan`='$nama', `jenis_kendaraan`='$jenis', `pengguna_kendaraan`='$karyawan' WHERE id_kendaraan='$id'");
				if($simpan){
					echo "<script>alert('Kendaraan berhasil disimpan..')
					location.href='index.php?menu=master&sub_menu=kendaraan'</script>";
				}else{
					echo "<script>alert('Kendaraan gagal disimpan, silakan masukan kembali..')
					location.href=''</script>";
				}
			}else{
				echo "<script>alert('Karyawan ini sudah menggunakan kendaraan, pilih karyawan lainnya3..')
				location.href=''</script>";
			}
		}else{
				//simpan kendaraan jika belum ada di database
				$simpan	= mysql_query("UPDATE kendaraan SET `no_polisi`='$no', `nama_kendaraan`='$nama', `jenis_kendaraan`='$jenis', `pengguna_kendaraan`='$karyawan' WHERE id_kendaraan='$id'");
				if($simpan){
					echo "<script>alert('Kendaraan berhasil disimpan..')
					location.href='index.php?menu=master&sub_menu=kendaraan'</script>";
				}else{
					echo "<script>alert('Kendaraan gagal disimpan, silakan masukan kembali1..')
					location.href=''</script>";
		}
	}
}
}
?>
</div>
<!--END MAIN WRAPPER -->
