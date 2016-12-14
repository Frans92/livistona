<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>INPUT SUPLIER</h5>
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
                            <label class="control-label col-lg-2">Nama Suplier</label>
                            <div class="col-lg-9">
                                <input type="text" name="nama" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Alamat Suplier</label>
                            <div class="col-lg-9">
                                <textarea name="alamat" class="form-control" rows="8"></textarea>
                            </div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Telepon Suplier</label>
                            <div class="col-lg-9">
                                <input type="text" name="telepon" class="form-control" />
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
	$nama		= $_POST['nama'];
	$alamat		= $_POST['alamat'];
	$telepon	= $_POST['telepon'];
	
	//cek di database apakah suplier sudah ada sebelumnya
	$cek_suplier 	= mysql_query("SELECT nama_suplier as nama FROM suplier WHERE nama_suplier = '$nama'");
	$hasil_cek		= mysql_fetch_array ($cek_suplier);

	if($hasil_cek['nama']==$nama){
		echo "<script>alert('Suplier ini sudah ada, silakan masukan suplier lainnya..')
		location.href=''</script>";
	}else{
		//simpan suplier jika belum ada di database
		$simpan	= mysql_query("INSERT INTO suplier (`id_suplier`, `kode_suplier`, `nama_suplier`, `alamat_suplier`, `telpon_suplier`) 
		VALUES (NULL, NULL, '$nama', '$alamat', '$telepon')");
		if($simpan){
			echo "<script>alert('Suplier berhasil disimpan..')
			location.href='index.php?menu=master&sub_menu=suplier'</script>";
		}else{
			echo "<script>alert('Suplier gagal disimpan, silakan masukan kembali..')
			location.href=''</script>";
		}
	}
}
?>
</div>
<!--END MAIN WRAPPER -->
