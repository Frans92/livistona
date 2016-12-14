<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT KANTOR</h5>
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
				<?php 
				$id_kantor = $_GET['id'];
				
				$cek	= mysql_query ("SELECT * FROM kantor WHERE id_kantor='$id_kantor'");
				$hasil	= mysql_fetch_array($cek);
				?>
				
                    <form action="" class="form-horizontal" method="POST" id="block-validate">
					<input type="hidden" name="id_kantor" value="<?php echo $id_kantor;?>">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Kantor</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama_baru" class="form-control" value="<?php echo $hasil['nama_kantor'];?>" />
                                <input type="hidden" name="nama" class="form-control" value="<?php echo $hasil['nama_kantor'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Kantor</label>
                            <div class="col-lg-9">
                                <textarea name="alamat" class="form-control" rows="8"><?php echo $hasil['alamat_kantor'];?></textarea>
                            </div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Kantor</label>
                            <div class="col-lg-9">
                                <input type="text" name="telepon" class="form-control" value="<?php echo $hasil['telpon_kantor'];?>" />
                            </div>
                        </div><br>
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
	$id_kantor	= $_POST['id_kantor'];
	$nama		= $_POST['nama'];
	$nama_baru	= $_POST['nama_baru'];
	$alamat		= $_POST['alamat'];
	$telepon	= $_POST['telepon'];
	
	if($nama<>$nama_baru){
		//cek di database apakah kantor sudah ada sebelumnya
		$cek_kantor 	= mysql_query("SELECT nama_kantor as nama FROM kantor WHERE nama_kantor = '$nama_baru'");
		$hasil_cek		= mysql_fetch_array ($cek_kantor);

		if($hasil_cek['nama']==$nama_baru){
			echo "<script>alert('Data kantor ini sudah ada, silakan masukan kantor lainnya..')
			location.href=''</script>";
		}else{
			//simpan kantor jika belum ada di database
			$simpan	= mysql_query("UPDATE `kantor` SET `nama_kantor` = '$nama_baru', `alamat_kantor` = '$alamat', `telpon_kantor` = '$telepon' WHERE `id_kantor` = $id_kantor");
			if($simpan){
				echo "<script>alert('Data kantor berhasil diedit..')
				location.href='index.php?menu=master&sub_menu=kantor'</script>";
			}else{
				echo "<script>alert('Data kantor gagal disimpan, silakan ulangi kembali..')
				location.href=''</script>";
			}
		}
	}else{
			//simpan kantor jika belum ada di database
			$simpan	= mysql_query("UPDATE `kantor` SET `nama_kantor` = '$nama_baru', `alamat_kantor` = '$alamat', `telpon_kantor` = '$telepon' WHERE `id_kantor` = $id_kantor");
			if($simpan){
				echo "<script>alert('Data kantor berhasil diedit..')
				location.href='index.php?menu=master&sub_menu=kantor'</script>";
			}else{
				echo "<script>alert('Data kantor gagal disimpan, silakan ulangi kembali..')
				location.href=''</script>";
			}
	}
}
?>
</div>
<!--END MAIN WRAPPER -->
