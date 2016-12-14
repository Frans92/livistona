<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT KARYAWAN</h5>
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
					$nik	= $_GET['id'];
					
					$cek_karyawan	= mysql_query("SELECT a.nik, a.nama_karyawan, a.tgl_lahir, a.alamat_karyawan, a.tgl_masuk, a.jabatan, a.id_kantor, b.nama_kantor, a.telpon_karyawan, a.status_karyawan
										FROM karyawan a, kantor b where a.id_kantor=b.id_kantor and a.nik='$nik'");
					$hasil_karyawan = mysql_fetch_array($cek_karyawan);
					?>
						 <div class="form-group">
                            <label class="control-label col-lg-2">NIK</label>
                            <div class="col-lg-2">
                                <input type="text" name="nik" class="form-control" value="<?php echo $hasil_karyawan['nik'];?>" />
                                <input type="hidden" name="nik_lama" class="form-control" value="<?php echo $hasil_karyawan['nik'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Karyawan</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" class="form-control" value="<?php echo $hasil_karyawan['nama_karyawan'];?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tanggal Lahir</label>
                            <div class="col-lg-3">
                                 <input type="date" id="date2" name="tgl_lahir" class="form-control" value="<?php echo $hasil_karyawan['tgl_lahir'];?>" />
                            </div>
						</div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Karyawan</label>
                            <div class="col-lg-5">
                                <textarea name="alamat" class="form-control" rows="8"><?php echo $hasil_karyawan['alamat_karyawan'];?></textarea>
                            </div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tanggal Masuk</label>
                            <div class="col-lg-3">
                               <input type="date" id="date2" name="tgl_masuk" class="form-control" value="<?php echo $hasil_karyawan['tgl_masuk'];?>" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Jabatan</label>
                            <div class="col-lg-3">
								<select name="jabatan" id="sport" class="form-control">
									<option value="<?php echo $hasil_karyawan['jabatan'];?>"><?php echo $hasil_karyawan['jabatan'];?></option>
									<option value="Admin">Admin</option>
									<option value="Gudang">Gudang</option>
									<option value="Supervisor Admin">Supervisor Admin</option>
									<option value="Kepala Kantor">Kepala Kantor</option>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Kantor</label>
                            <div class="col-lg-3">
								<select name="kantor" id="sport" class="form-control">
									<option value="<?php echo $hasil_karyawan['id_kantor'];?>"><?php echo $hasil_karyawan['nama_kantor'];?></option>
									<?php 
									$cari_kantor	= mysql_query("SELECT * FROM kantor");
									while($hasil_kantor	= mysql_fetch_array($cari_kantor)){
									?>
									<option value="<?php echo $hasil_kantor['id_kantor'];?>"><?php echo $hasil_kantor['nama_kantor'];?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Karyawan</label>
                            <div class="col-lg-3">
                                <input type="text" name="telepon" class="form-control" value="<?php echo $hasil_karyawan['telpon_karyawan'];?>" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Status</label>
                            <div class="col-lg-3">
								<select name="status" id="sport" class="form-control">
									<option value="<?php echo $hasil_karyawan['status_karyawan'];?>"><?php echo $hasil_karyawan['status_karyawan'];?></option>
									<?php
									if($hasil_karyawan['status_karyawan']=="Aktif"){
									?>
									<option value="Tidak Aktif">Tidak Aktif</option>
									<?php } else { ?>
									<option value="Aktif">Aktif</option>
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
	$nik		= $_POST['nik'];
	$nik_lama	= $_POST['nik_lama'];
	$nama		= $_POST['nama'];
	$tgl_lahir	= $_POST['tgl_lahir'];
	$alamat		= $_POST['alamat'];
	$tgl_masuk	= $_POST['tgl_masuk'];
	$jabatan	= $_POST['jabatan'];
	$kantor		= $_POST['kantor'];
	$telpon		= $_POST['telepon'];
	$status		= $_POST['status'];
	
	if($nik_lama<>$nik){
		//cek di database apakah karyawan sudah ada sebelumnya
		$cek_suplier 	= mysql_query("SELECT nik as nik FROM karyawan WHERE nik = '$nik'");
		$hasil_cek		= mysql_fetch_array ($cek_suplier);

		if($hasil_cek['nik']==$nik){
			echo "<script>alert('Karyawan ini sudah ada, silakan masukan karyawan lainnya..')
			location.href=''</script>";
		}else{
			//simpan karyawan jika belum ada di database
			$simpan	= mysql_query("UPDATE karyawan SET `nik`='$nik', `nama_karyawan`='$nama', `tgl_lahir`='$tgl_lahir', `alamat_karyawan`='$alamat', `tgl_masuk`='$tgl_masuk',`jabatan`='$jabatan',
			`id_kantor`='$kantor', `telpon_karyawan`='$telpon', `status_karyawan`='$status' where nik = '$nik_lama'");
			if($simpan){
				echo "<script>alert('Karyawan berhasil diedit..')
				location.href='index.php?menu=master&sub_menu=karyawan'</script>";
			}else{
				echo "<script>alert('Karyawan gagal diedit, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
	}else{
		//simpan karyawan jika belum ada di database
			$simpan	= mysql_query("UPDATE karyawan SET `nama_karyawan`='$nama', `tgl_lahir`='$tgl_lahir', `alamat_karyawan`='$alamat', `tgl_masuk`='$tgl_masuk',`jabatan`='$jabatan',
			`id_kantor`='$kantor', `telpon_karyawan`='$telpon', `status_karyawan`='$status' where nik = '$nik_lama'");
			if($simpan){
				echo "<script>alert('Karyawan berhasil diedit..')
				location.href='index.php?menu=master&sub_menu=karyawan'</script>";
			}else{
				echo "<script>alert('Karyawan gagal diedit, silakan masukan kembali..')
				location.href=''</script>";
			}
	}
}
?>
</div>
<!--END MAIN WRAPPER -->