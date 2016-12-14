<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>INPUT KARYAWAN</h5>
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
                            <label class="control-label col-lg-2">NIK</label>
                            <div class="col-lg-2">
                                <input type="text" name="nik" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Karyawan</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tanggal Lahir</label>
                            <div class="col-lg-3">
                                 <input type="date" id="date2" name="tgl_lahir" class="form-control" />
                            </div>
						</div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Karyawan</label>
                            <div class="col-lg-5">
                                <textarea name="alamat" class="form-control" rows="8"></textarea>
                            </div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Tanggal Masuk</label>
                            <div class="col-lg-3">
                               <input type="date" id="date2" name="tgl_masuk" class="form-control" />
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Jabatan</label>
                            <div class="col-lg-3">
								<select name="jabatan" id="sport" class="form-control">
									<option value="">[Pilih Jabatan]</option>
									<option value="Admin">Admin</option>
									<option value="Gudang">Gudang</option>
									<option value="Supervisor Admin">Supervisor Admin</option>
									<option value="Kepala Kantor">Kepala Kantor</option>
									<option value="Salesman Agen">Salesman Agen</option>
									<option value="Salesman Kanvas">Salesman Kanvas</option>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Kantor</label>
                            <div class="col-lg-3">
								<select name="kantor" id="sport" class="form-control">
									<option value="">[Pilih Kantor]</option>
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
                                <input type="text" name="telepon" class="form-control"/>
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
	$nama		= $_POST['nama'];
	$tgl_lahir	= $_POST['tgl_lahir'];
	$alamat		= $_POST['alamat'];
	$tgl_masuk	= $_POST['tgl_masuk'];
	$jabatan	= $_POST['jabatan'];
	$kantor		= $_POST['kantor'];
	$telepon	= $_POST['telepon'];
	
	
		//cek di database apakah karyawan sudah ada sebelumnya
		$cek_suplier 	= mysql_query("SELECT nik as nik FROM karyawan WHERE nik = '$nik'");
		$hasil_cek		= mysql_fetch_array ($cek_suplier);

		if($hasil_cek['nik']==$nik){
			echo "<script>alert('Karyawan ini sudah ada, silakan masukan karyawan lainnya..')
			location.href=''</script>";
		}else{
			//simpan karyawan jika belum ada di database
			$simpan	= mysql_query("INSERT INTO karyawan (`nik`, `nama_karyawan`, `tgl_lahir`, `alamat_karyawan`, `tgl_masuk`,`jabatan`,`id_kantor`,`telpon_karyawan`) 
			VALUES ('$nik', '$nama', '$tgl_lahir', '$alamat', '$tgl_masuk','$jabatan','$kantor','$telepon')");
			if($simpan){
				echo "<script>alert('Karyawan berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=karyawan'</script>";
			}else{
				echo "<script>alert('Karyawan gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
	
}
?>
</div>
<!--END MAIN WRAPPER -->