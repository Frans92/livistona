<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<div class="row">
            <div class="col-lg-12">
                <div class="box">
				<header>
                    <div class="icons"><i class="icon-th-large"></i></div>
                        <h5>EDIT BARANG</h5>
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
					$id_barang = $_GET['id'];
					$cek_barang 	= mysql_query("SELECT * FROM barang WHERE id_barang='$id_barang'");
					$hasil_barang 	= mysql_fetch_array($cek_barang);
					?>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Kode Barang</label>
                            <div class="col-lg-2">
                                <input type="text" name="kode" class="form-control" value="<?php echo $hasil_barang['kode_barang'];?>" />
                                <input type="hidden" name="kode_lama" class="form-control" value="<?php echo $hasil_barang['kode_barang'];?>" />
                                <input type="hidden" name="id_barang" class="form-control" value="<?php echo $hasil_barang['id_barang'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Nama Barang</label>
                            <div class="col-lg-5">
                                <input type="text" name="nama" class="form-control" value="<?php echo $hasil_barang['nama_barang'];?>" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-lg-2">Jenis Barang</label>
                            <div class="col-lg-2">
								<select name="jenis" id="sport" class="form-control">
									<option value="<?php echo $hasil_barang['jenis_barang'];?>"><?php echo $hasil_barang['jenis_barang'];?></option>
									<option value="Biskuit">Biskuit</option>
									<option value="Yuppi">Yuppi</option>
									<option value="Rokok">Rokok</option>
								</select>
                            </div>
                        </div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Isi Per Kardus</label>
                            <div class="col-lg-2">
                                <input type="text" name="range" class="form-control" value="<?php echo $hasil_barang['isi_barang'];?>"/>
                            </div>
						</div>
						 <div class="form-group">
                            <label class="control-label col-lg-2">Harga Pokok Penjualan (HPP)</label>
                            <div class="col-lg-4">
                                <input type="text" name="hpp" class="form-control" value="<?php echo $hasil_barang['hpp'];?>"/>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Harga Agen</label>
                            <div class="col-lg-4">
                                <input type="text" name="agen" class="form-control" value="<?php echo $hasil_barang['harga_agen'];?>"/>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Harga Kanvas</label>
                            <div class="col-lg-4">
                                <input type="text" name="kanvas" class="form-control" value="<?php echo $hasil_barang['harga_kanvas'];?>"/>
                            </div>
						</div>
						<div class="form-group">
                            <label class="control-label col-lg-2">Harga Konsumen</label>
                            <div class="col-lg-4">
                                <input type="text" name="konsumen" class="form-control" value="<?php echo $hasil_barang['harga_konsumen'];?>"/>
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
	$id_barang	= $_POST['id_barang'];
	$kode_lama	= $_POST['kode_lama'];
	$kode		= $_POST['kode'];
	$nama		= $_POST['nama'];
	$jenis		= $_POST['jenis'];
	$range		= $_POST['range'];
	$hpp		= $_POST['hpp'];
	$agen		= $_POST['agen'];
	$kanvas		= $_POST['kanvas'];
	$konsumen	= $_POST['konsumen'];
	
		if($kode_lama<>$kode){
		//cek di database apakah barang sudah ada sebelumnya
		$cek_barang 	= mysql_query("SELECT kode_barang as kode, nama_barang as nama FROM karyawan WHERE kode_barang = '$kode' or nama_barang='$nama'");
		$hasil_cek		= mysql_fetch_array ($cek_barang);

		if(($hasil_cek['kode']==$kode)or($hasil_cek['nama']==$nama)){
			echo "<script>alert('Barang ini sudah ada, silakan masukan barang lainnya..')
			location.href=''</script>";
		}else{
			//simpan barang jika belum ada di database
			$simpan	= mysql_query("UPDATE barang SET `kode_barang`='$kode', `nama_barang`='$nama', `jenis_barang`='$jenis', `isi_barang`='$range', `hpp`='$hpp',`harga_agen`='$agen',
			`harga_kanvas`='$kanvas',`harga_konsumen`='$konsumen' WHERE id_barang='$id_barang'"); 
			if($simpan){
				echo "<script>alert('Barang berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=barang'</script>";
			}else{
				echo "<script>alert('Barang gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
		}
		
	}else{
		//simpan barang jika belum ada di database
			$simpan	= mysql_query("UPDATE barang SET `kode_barang`='$kode', `nama_barang`='$nama', `jenis_barang`='$jenis', `isi_barang`='$range', `hpp`='$hpp',`harga_agen`='$agen',
			`harga_kanvas`='$kanvas',`harga_konsumen`='$konsumen' WHERE id_barang='$id_barang'"); 
			if($simpan){
				echo "<script>alert('Barang berhasil disimpan..')
				location.href='index.php?menu=master&sub_menu=barang'</script>";
			}else{
				echo "<script>alert('Barang gagal disimpan, silakan masukan kembali..')
				location.href=''</script>";
			}
	
	}
}
?>
</div>
<!--END MAIN WRAPPER -->