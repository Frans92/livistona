<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT AGEN</h5>
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
					$id_agen = $_GET['id'];
					$cek_agen	= mysql_query("SELECT a.id_agen, a.kode_agen, a.nama_agen, a.pemilik_agen, a.alamat_agen, a.wilayah_agen,a.telpon_agen,a.limit_agen, a.tempo_agen, 
										a.status_agen, a.salesman_agen, a.salesman_agen, b.nama_karyawan FROM konsumen_agen a, karyawan b where a.salesman_agen=b.nik and a.id_agen='$id_agen'");
					$hasil_agen = mysql_fetch_array($cek_agen);
					?>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Kode Agen</label>
                            <div class="col-lg-2">
                                <input type="text" name="kode" value="<?php echo $hasil_agen['kode_agen'];?>" class="form-control" />
                                <input type="hidden" name="kode_lama" value="<?php echo $hasil_agen['kode_agen'];?>" class="form-control" />
                                <input type="hidden" name="id_agen" value="<?php echo $hasil_agen['id_agen'];?>" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Agen</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" value="<?php echo $hasil_agen['nama_agen'];?>" class="form-control" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Pemilik Agen</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama2" value="<?php echo $hasil_agen['pemilik_agen'];?>" class="form-control" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Agen</label>
                            <div class="col-lg-5">
                                <textarea name="alamat" class="form-control" rows="8"><?php echo $hasil_agen['alamat_agen'];?></textarea>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Wilayah Agen</label>
                            <div class="col-lg-5">
                                <input type="text" name="wilayah" class="form-control" value="<?php echo $hasil_agen['kode_agen'];?>"/>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Agen</label>
                            <div class="col-lg-3">
                                <input type="text" name="telepon" class="form-control" value="<?php echo $hasil_agen['telpon_agen'];?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Limit Agen (Rp)</label>
                            <div class="col-lg-3">
                                <input type="text" name="limit" class="form-control" value="<?php echo $hasil_agen['limit_agen'];?>"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Tempo Agen (Hari)</label>
                            <div class="col-lg-3">
                                <input type="text" name="tempo" class="form-control" value="<?php echo $hasil_agen['tempo_agen'];?>"/>
                            </div>
                        </div>
							<div class="form-group">
                            <label class="control-label col-lg-2">Status Agen</label>
                            <div class="col-lg-2">
								<select name="status" id="sport" class="form-control">
									<option value="<?php echo $hasil_agen['status_agen'];?>"><?php echo $hasil_agen['status_agen'];?></option>
									<?php
									if($hasil_agen['status_agen']=="Aktif"){
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
									<option value="<?php echo $hasil_agen['salesman_agen'];?>"><?php echo $hasil_agen['salesman_agen'];?> - <?php echo $hasil_agen['nama_karyawan'];?></option>
									<?php 
									$cari_karyawan	= mysql_query("SELECT * FROM karyawan where nik<>'".$hasil_agen['salesman_agen']."'");
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
	$id_agen	= $_POST['id_agen'];
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
		//cek di database apakah agen sudah ada sebelumnya
		$cek_agen 	= mysql_query("SELECT kode_agen as kode, nama_agen as nama FROM konsumen_agen WHERE kode_agen = '$kode' and nama_agen='$nama'");
		$hasil_cek		= mysql_fetch_array ($cek_agen);

		if($hasil_cek['kode']==$kode){
			echo "<script>alert('Agen ini sudah ada, silakan masukan agen lainnya..')
			location.href=''</script>";
		}else{
			//simpan agen jika belum ada di database
			$simpan	= mysql_query("UPDATE konsumen_agen SET `kode_agen`='$kode', `nama_agen`='$nama', `pemilik_agen`='$nama2', `alamat_agen`='$alamat', `wilayah_agen`='$wilayah',
			`telpon_agen`='$telepon',`limit_agen`='$limit',`tempo_agen`='$tempo',`status_agen`='$status',`salesman_agen`='$karyawan' WHERE id_agen='$id_agen'");
			if($simpan){
				echo "<script>alert('Data agen berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=agen'</script>";
			}else{
				echo "<script>alert('Data agen gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
	}
			//simpan agen jika belum ada di database
			$simpan	= mysql_query("UPDATE konsumen_agen SET `kode_agen`='$kode', `nama_agen`='$nama', `pemilik_agen`='$nama2', `alamat_agen`='$alamat', `wilayah_agen`='$wilayah',
			`telpon_agen`='$telepon',`limit_agen`='$limit',`tempo_agen`='$tempo',`status_agen`='$status',`salesman_agen`='$karyawan' WHERE id_agen='$id_agen'");
			if($simpan){
				echo "<script>alert('Data agen berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=agen'</script>";
			}else{
				echo "<script>alert('Data agen gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
}
?>
</div>
<!--END MAIN WRAPPER -->