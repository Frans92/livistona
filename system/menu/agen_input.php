<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>INPUT AGEN</h5>
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
                            <label class="control-label col-lg-2">Kode Agen</label>
                            <div class="col-lg-2">
                                <input type="text" name="kode" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Agen</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Pemilik Agen</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama2" class="form-control" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Agen</label>
                            <div class="col-lg-5">
                                <textarea name="alamat" class="form-control" rows="8"></textarea>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Wilayah Agen</label>
                            <div class="col-lg-5">
                                <input type="text" name="wilayah" class="form-control" />
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Agen</label>
                            <div class="col-lg-3">
                                <input type="text" name="telepon" class="form-control"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Limit Agen (Rp)</label>
                            <div class="col-lg-3">
                                <input type="text" name="limit" class="form-control"/>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Tempo Agen (Hari)</label>
                            <div class="col-lg-3">
                                <input type="text" name="tempo" class="form-control"/>
                            </div>
                        </div>
						
						 <div class="form-group">
                            <label class="control-label col-lg-2">Salesman</label>
                            <div class="col-lg-3">
								<select name="karyawan" id="sport" class="form-control">
									<option value="">[Pilih Salesman]</option>
									<?php 
									$cari_karyawan	= mysql_query("SELECT * FROM karyawan");
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
	$kode		= $_POST['kode'];
	$nama		= $_POST['nama'];
	$nama2		= $_POST['nama2'];
	$alamat		= $_POST['alamat'];
	$wilayah	= $_POST['wilayah'];
	$telepon	= $_POST['telepon'];
	$limit		= $_POST['limit'];
	$tempo		= $_POST['tempo'];
	$karyawan	= $_POST['karyawan'];
	
	
		//cek di database apakah agen sudah ada sebelumnya
		$cek_agen 	= mysql_query("SELECT kode_agen as kode, nama_agen as nama FROM konsumen_agen WHERE kode_agen = '$kode' and nama_agen='$nama'");
		$hasil_cek		= mysql_fetch_array ($cek_agen);

		if($hasil_cek['kode']==$kode){
			echo "<script>alert('Agen ini sudah ada, silakan masukan agen lainnya..')
			location.href=''</script>";
		}else{
			//simpan agen jika belum ada di database
			$simpan	= mysql_query("INSERT INTO konsumen_agen (`kode_agen`, `nama_agen`, `pemilik_agen`, `alamat_agen`, `wilayah_agen`,`telpon_agen`,`limit_agen`,`tempo_agen`,`status_agen`,`salesman_agen`) 
			VALUES ('$kode', '$nama', '$nama2', '$alamat', '$wilayah','$telepon','$limit','$tempo','Aktif','$karyawan')");
			if($simpan){
				echo "<script>alert('Data agen berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=agen'</script>";
			}else{
				echo "<script>alert('Data agen gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
}
?>
</div>
<!--END MAIN WRAPPER -->