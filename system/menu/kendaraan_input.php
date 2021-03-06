<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>INPUT KENDARAAN</h5>
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
                        <div class="form-group">
                            <label class="control-label col-lg-2">No. Polisi</label>
                            <div class="col-lg-2">
                                <input type="text" name="no" class="form-control" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Nama Kendaraan</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Jenis Kendaraan</label>
                            <div class="col-lg-2">
								<select name="jenis" id="jenis" class="form-control">
									<option value="">[Pilih Jenis]</option>
									<option value="Mobil">Mobil</option>
									<option value="Motor">Motor</option>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Pengguna Kendaraan</label>
                            <div class="col-lg-2">
								<select name="karyawan" id="karyawan" class="form-control">
									<option value="">[Pilih Karyawan]</option>
									<?php
									$cek_karyawan = mysql_query ("SELECT nik,nama_karyawan FROM karyawan");
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
	$no		= $_POST['no'];
	$nama		= $_POST['nama'];
	$jenis		= $_POST['jenis'];
	$karyawan	= $_POST['karyawan'];
	
	//cek di database apakah kendaraan sudah ada sebelumnya
	$cek_kendaraan 	= mysql_query("SELECT no_polisi as nomor FROM kendaraan WHERE no_polisi = '$no'");
	$hasil_cek		= mysql_fetch_array ($cek_kendaraan);

	if($hasil_cek['nomor']==$no){
		echo "<script>alert('Kendaraan ini sudah ada, silakan masukan kendaraan lainnya..')
		location.href=''</script>";
	}else{
		$cek_karyawan = mysql_query("SELECT pengguna_kendaraan from kendaraan where pengguna_kendaraan='$karyawan'");
		$hasil_karyawan = mysql_fetch_array($cek_karyawan);
		
		if($hasil_karyawan['pengguna_kendaraan']<>$karyawan){
			//simpan kendaraan jika belum ada di database
			$simpan	= mysql_query("INSERT INTO kendaraan (`id_kendaraan`, `no_polisi`, `nama_kendaraan`, `jenis_kendaraan`, `pengguna_kendaraan`) 
			VALUES (NULL, '$no', '$nama', '$jenis', '$karyawan')");
			if($simpan){
				echo "<script>alert('Kendaraan berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=kendaraan'</script>";
			}else{
				echo "<script>alert('Kendaraan gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}else{
			echo "<script>alert('Karyawan ini sudah menggunakan kendaraan, pilih karyawan lainnya..')
			location.href=''</script>";
		}
	}
}
?>
</div>
<!--END MAIN WRAPPER -->
