<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT USER</h5>
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
					$username = $_GET['id'];
					$cek_user	= mysql_query("SELECT b.nik, b.nama_karyawan, a.username, a.level, a.status_user, a.email
										FROM user a LEFT JOIN karyawan b ON a.nik=b.nik WHERE a.username='$username'");
					$hasil_user	= mysql_fetch_array($cek_user);
					?>
						 <div class="form-group">
                            <label class="control-label col-lg-2">username</label>
                            <div class="col-lg-5">
                                <input type="text" name="username" class="form-control" value="<?php echo $hasil_user['username']?>"/>
                                <input type="hidden" name="username_lama" class="form-control" value="<?php echo $hasil_user['username']?>"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Password</label>
                            <div class="col-lg-5">
                                <input type="password" name="password2" class="form-control" />
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Level</label>
                            <div class="col-lg-3">
								<select name="level" id="sport" class="form-control">
									<option value="<?php echo $hasil_user['level'];?>"><?php echo $hasil_user['level'];?></option>
									<option value="Admin">Admin</option>
									<option value="Administrator">Administrator</option>
									<option value="Gudang">Gudang</option>
									<option value="Kepala Kantor">Kepala Kantor</option>
									<option value="Supervisor Admin">Supervisor Admin</option>
								</select>
                            </div>
                        </div>
                       <div class="form-group">
                            <label class="control-label col-lg-2">Status User</label>
                            <div class="col-lg-2">
								<select name="status" id="sport" class="form-control">
									<option value="<?php echo $hasil_user['status_user'];?>"><?php echo $hasil_user['status_user'];?></option>
									<?php
									if($hasil_user['status_user']=="Aktif"){
									?>
									<option value="Tidak Aktif">Tidak Aktif</option>
									<?php } else { ?>
									<option value="Aktif">Aktif</option>
									<?php } ?>
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Karyawan</label>
                            <div class="col-lg-3">
								<select name="karyawan2"  class="form-control">
									<option value="<?php echo $hasil_user['nik'];?>"><?php echo $hasil_user['nama_karyawan'];?></option>
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
                                <input type="text" name="email2" class="form-control" value="<?php echo $hasil_user['email']?>"/>
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
	$username_lama	= $_POST['username_lama'];
	if($_POST['password2']<>""){
	$password	= md5($_POST['password2']);
	}
	$level		= $_POST['level'];
	$status		= $_POST['status'];
	$karyawan2	= $_POST['karyawan2'];
	$email2		= $_POST['email2'];
	
	if($username_lama<>$username){
		//cek di database apakah user sudah ada sebelumnya
		$cek_user 	= mysql_query("SELECT username FROM user WHERE username = '$username'");
		$hasil_cek		= mysql_fetch_array ($cek_user);

		if($hasil_cek['username']==$username){
			echo "<script>alert('Username sudah ada, silakan masukan lainnya..')
			location.href=''</script>";
		}else{
			//simpan user jika belum ada di database
			if($password<>""){
				$simpan	= mysql_query("UPDATE user SET `username`='$username', `password`='$password', `level`='$level', `status_user`='$status', `nik`='$karyawan2'
				,`email`='$email2' WHERE username='$username_lama'");
				if($simpan){
					echo "<script>alert('User berhasil disimpan..')
					location.href='index.php?menu=master&sub_menu=user'</script>";
				}else{
					echo "<script>alert('User gagal disimpan, silakan masukan kembali..')
					location.href=''</script>";
				}
			}else{
				$simpan	= mysql_query("UPDATE user SET `username`='$username', `level`='$level', `status_user`='$status', `nik`='$karyawan2'
				,`email`='$email2' WHERE username='$username_lama'");
				if($simpan){
					echo "<script>alert('User berhasil disimpan..')
					location.href='index.php?menu=master&sub_menu=user'</script>";
				}else{
					echo "<script>alert('User gagal disimpan, silakan masukan kembali2..')
					location.href=''</script>";
				}
			}
		}
	}else{
		//simpan user jika belum ada di database
			if($password<>""){
				$simpan	= mysql_query("UPDATE user SET `password`='$password', `level`='$level', `status_user`='$status', `nik`='$karyawan2'
				,`email`='$email2' WHERE username='$username_lama'");
				if($simpan){
					echo "<script>alert('User berhasil disimpan..')
					location.href='index.php?menu=master&sub_menu=user'</script>";
				}else{
					echo "<script>alert('User gagal disimpan, silakan masukan kembali..')
					location.href=''</script>";
				}
			}else{
				$simpan	= mysql_query("UPDATE user SET `level`='$level', `status_user`='$status', `nik`='$karyawan2',`email`='$email2' WHERE username='$username_lama'");
				if($simpan){
					echo "<script>alert('User berhasil disimpan..')
					location.href='index.php?menu=master&sub_menu=user'</script>";
				}else{
					echo "<script>alert('User gagal disimpan, silakan masukan kembali..')
					location.href=''</script>";
				}
			}
	}
}
?>
</div>
<!--END MAIN WRAPPER -->