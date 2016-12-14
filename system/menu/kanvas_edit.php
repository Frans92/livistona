<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT KANVAS</h5>
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
					$id_kanvas = $_GET['id'];
					$cek_kanvas	= mysql_query("SELECT a.id_kanvas, a.kode_kanvas, a.nama_kanvas, a.pemilik_kanvas, a.alamat_kanvas, a.wilayah_kanvas,a.telpon_kanvas,a.status_kanvas, a.salesman_kanvas, 
					a.salesman_kanvas, b.nama_karyawan FROM konsumen_kanvas a, karyawan b where a.salesman_kanvas=b.nik and a.id_kanvas='$id_kanvas'");
					$hasil_kanvas = mysql_fetch_array($cek_kanvas);
					?>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Kode Kanvas</label>
                            <div class="col-lg-2">
                                <input type="text" name="kode" value="<?php echo $hasil_kanvas['kode_kanvas'];?>" class="form-control" />
                                <input type="hidden" name="kode_lama" value="<?php echo $hasil_kanvas['kode_kanvas'];?>" class="form-control" />
                                <input type="hidden" name="id_kanvas" value="<?php echo $hasil_kanvas['id_kanvas'];?>" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Kanvas</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" value="<?php echo $hasil_kanvas['nama_kanvas'];?>" class="form-control" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Pemilik Kanvas</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama2" value="<?php echo $hasil_kanvas['pemilik_kanvas'];?>" class="form-control" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Kanvas</label>
                            <div class="col-lg-5">
                                <textarea name="alamat" class="form-control" rows="8"><?php echo $hasil_kanvas['alamat_kanvas'];?></textarea>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Wilayah Kanvas</label>
                            <div class="col-lg-5">
                                <input type="text" name="wilayah" class="form-control" value="<?php echo $hasil_kanvas['kode_kanvas'];?>"/>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Kanvas</label>
                            <div class="col-lg-3">
                                <input type="text" name="telepon" class="form-control" value="<?php echo $hasil_kanvas['telpon_kanvas'];?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Status Kanvas</label>
                            <div class="col-lg-2">
								<select name="status" id="sport" class="form-control">
									<option value="<?php echo $hasil_kanvas['status_kanvas'];?>"><?php echo $hasil_kanvas['status_kanvas'];?></option>
									<?php
									if($hasil_kanvas['status_kanvas']=="Aktif"){
									?>
									<option value="Tidak Aktif">Tidak Aktif</option>
									<?php } else { ?>
									<option value="Aktif">Aktif</option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Salesman</label>
                            <div class="col-lg-3">
								<select name="karyawan" id="sport" class="form-control">
									<option value="<?php echo $hasil_kanvas['salesman_kanvas'];?>"><?php echo $hasil_kanvas['salesman_kanvas'];?> - <?php echo $hasil_kanvas['nama_karyawan'];?></option>
									<?php 
									$cari_karyawan	= mysql_query("SELECT * FROM karyawan where nik<>'".$hasil_kanvas['salesman_kanvas']."'");
									while($hasil_karyawan	= mysql_fetch_array($cari_karyawan)){
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
	$id_kanvas	= $_POST['id_kanvas'];
	$kode		= $_POST['kode'];
	$kode_lama	= $_POST['kode_lama'];
	$nama		= $_POST['nama'];
	$nama2		= $_POST['nama2'];
	$alamat		= $_POST['alamat'];
	$wilayah	= $_POST['wilayah'];
	$telepon	= $_POST['telepon'];
	$limit		= $_POST['limit'];
	$tempo		= $_POST['tempo'];
	$status		= $_POST['status'];
	$karyawan	= $_POST['karyawan'];
	
		if($kode<>$kode_lama){
		//cek di database apakah kanvas sudah ada sebelumnya
		$cek_kanvas 	= mysql_query("SELECT kode_kanvas as kode, nama_kanvas as nama FROM konsumen_kanvas WHERE kode_kanvas = '$kode' and nama_kanvas='$nama'");
		$hasil_cek		= mysql_fetch_array ($cek_kanvas);

		if($hasil_cek['kode']==$kode){
			echo "<script>alert('kanvas ini sudah ada, silakan masukan kanvas lainnya..')
			location.href=''</script>";
		}else{
			//simpan kanvas jika belum ada di database
			$simpan	= mysql_query("UPDATE konsumen_kanvas SET `kode_kanvas`='$kode', `nama_kanvas`='$nama', `pemilik_kanvas`='$nama2', `alamat_kanvas`='$alamat', `wilayah_kanvas`='$wilayah',
			`telpon_kanvas`='$telepon',`status_kanvas`='$status',`salesman_kanvas`='$karyawan' WHERE id_kanvas='$id_kanvas'");
			if($simpan){
				echo "<script>alert('Data kanvas berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=kanvas'</script>";
			}else{
				echo "<script>alert('Data kanvas gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
	}
			//simpan kanvas jika belum ada di database
			$simpan	= mysql_query("UPDATE konsumen_kanvas SET `kode_kanvas`='$kode', `nama_kanvas`='$nama', `pemilik_kanvas`='$nama2', `alamat_kanvas`='$alamat', `wilayah_kanvas`='$wilayah',
			`telpon_kanvas`='$telepon',`status_kanvas`='$status',`salesman_kanvas`='$karyawan' WHERE id_kanvas='$id_kanvas'");
			if($simpan){
				echo "<script>alert('Data kanvas berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=kanvas'</script>";
			}else{
				echo "<script>alert('Data kanvas gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
}
?>
</div>
<!--END MAIN WRAPPER -->