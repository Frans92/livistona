<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>INPUT USER</h5>
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
                            <label class="control-label col-lg-2">username</label>
                            <div class="col-lg-5">
                                <input type="text" name="username" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Password</label>
                            <div class="col-lg-5">
                                <input type="password" name="password" class="form-control" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Level</label>
                            <div class="col-lg-3">
								<select name="level" id="sport" class="form-control">
									<option value="">[Pilih Level]</option>
									<option value="Admin">Admin</option>
									<option value="Administrator">Administrator</option>
									<option value="Gudang">Gudang</option>
									<option value="Kepala Kantor">Kepala Kantor</option>
									<option value="Supervisor Admin">Supervisor Admin</option>
								</select>
                            </div>
                        </div>
                       
						<div class="form-group">
                            <label class="control-label col-lg-2">Karyawan</label>
                            <div class="col-lg-3">
								<select name="karyawan2"  class="form-control">
									<option value="">[Pilih Karyawan]</option>
									<?php 
									$cari_karyawan	= mysql_query("SELECT * FROM karyawan");
									while($hasil_karyawan	= mysql_fetch_array($cari_karyawan)){
									?>
									<option value="<?php echo $hasil_karyawan['nik'];?>"><?php echo $hasil_karyawan['nama_karyawan'];?></option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Email</label>
                            <div class="col-lg-3">
                                <input type="text" name="email2" class="form-control"/>
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
	$username	= $_POST['username'];
	$password	= md5($_POST['password']);
	$level		= $_POST['level'];
	$status		= "Aktif";
	$karyawan2	= $_POST['karyawan2'];
	$email2	= $_POST['email2'];
	
	
		//cek di database apakah user sudah ada sebelumnya
		$cek_user 	= mysql_query("SELECT username FROM user WHERE username = '$username' and nik='$karyawan2'");
		$hasil_cek		= mysql_fetch_array ($cek_user);

		if($hasil_cek['username']==$username){
			echo "<script>alert('Username atau Karyawan ini sudah ada, silakan masukan lainnya..')
			location.href=''</script>";
		}else{
			//simpan user jika belum ada di database
			$simpan	= mysql_query("INSERT INTO user (`username`, `password`, `level`, `status_user`, `nik`,`email`) 
			VALUES ('$username', '$password', '$level', '$status', '$karyawan2','$email2')");
			if($simpan){
				echo "<script>alert('User berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=user'</script>";
			}else{
				echo "<script>alert('User gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
	
}
?>
</div>
<!--END MAIN WRAPPER -->