<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT SUPLIER</h5>
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
				$id_suplier = $_GET['id'];
				
				$cek	= mysql_query ("SELECT * FROM suplier WHERE id_suplier='$id_suplier'");
				$hasil	= mysql_fetch_array($cek);
				?>
				
                    <form action="" class="form-horizontal" method="POST" id="block-validate">
					<input type="hidden" name="id_suplier" value="<?php echo $id_suplier;?>">
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Suplier</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama_baru" class="form-control" value="<?php echo $hasil['nama_suplier'];?>" />
                                <input type="hidden" name="nama" class="form-control" value="<?php echo $hasil['nama_suplier'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Suplier</label>
                            <div class="col-lg-9">
                                <textarea name="alamat" class="form-control" rows="8"><?php echo $hasil['alamat_suplier'];?></textarea>
                            </div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Suplier</label>
                            <div class="col-lg-9">
                                <input type="text" name="telepon" class="form-control" value="<?php echo $hasil['telpon_suplier'];?>" />
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
	$id_suplier	= $_POST['id_suplier'];
	$nama		= $_POST['nama'];
	$nama_baru		= $_POST['nama_baru'];
	$alamat		= $_POST['alamat'];
	$telepon	= $_POST['telepon'];
	
	if($nama<>$nama_baru){
		//cek di database apakah suplier sudah ada sebelumnya
		$cek_suplier 	= mysql_query("SELECT nama_suplier as nama FROM suplier WHERE nama_suplier = '$nama_baru'");
		$hasil_cek		= mysql_fetch_array ($cek_suplier);

		if($hasil_cek['nama']==$nama_baru){
			echo "<script>alert('Suplier ini sudah ada, silakan masukan suplier lainnya..')
			location.href=''</script>";
		}else{
			//simpan suplier jika belum ada di database
			$simpan	= mysql_query("UPDATE `suplier` SET `nama_suplier` = '$nama_baru', `alamat_suplier` = '$alamat', `telpon_suplier` = '$telepon' WHERE `id_suplier` = $id_suplier");
			if($simpan){
				echo "<script>alert('Suplier berhasil diedit..')
				location.href='index.php?menu=master&sub_menu=suplier'</script>";
			}else{
				echo "<script>alert('Suplier gagal disimpan, silakan ulangi kembali..')
				location.href=''</script>";
			}
		}
	}else{
			//simpan suplier jika belum ada di database
			$simpan	= mysql_query("UPDATE `suplier` SET `nama_suplier` = '$nama_baru', `alamat_suplier` = '$alamat', `telpon_suplier` = '$telepon' WHERE `id_suplier` = $id_suplier");
			if($simpan){
				echo "<script>alert('Suplier berhasil diedit..')
				location.href='index.php?menu=master&sub_menu=suplier'</script>";
			}else{
				echo "<script>alert('Suplier gagal disimpan, silakan ulangi kembali..')
				location.href=''</script>";
			}
	}
}
?>
</div>
<!--END MAIN WRAPPER -->
