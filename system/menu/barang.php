<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>DATA BARANG</b>
                        </div><br>
						<div class="col-lg-12">
							<form action="" class="form-horizontal" method="POST" id="block-validate">
								 <div class="form-group">
									<label class="control-label col-lg-2"><font size="2px">&nbsp;Nama Barang</font></label>
									<div class="col-lg-4">
										<input type="text" name="nama3" class="form-control" />
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-lg-2"><font size="2px">&nbsp;Jenis Barang</font></label>
									<div class="col-lg-3">
										<select name="jenis2" id="jenis" class="form-control">
											<option value=""></option>
											<option value="Yuppi">Yuppi</option>
											<option value="Biskuit">Biskuit</option>
											<option value="Rokok">Rokok</option>
										</select>
									</div>
								</div>
								<label class="control-label col-lg-2"></label>
								<div class="form-actions no-margin-bottom col-lg-3" style="text-align:left;">
									<input type="submit" value="Lihat Barang" name="simpan" class="btn btn-primary btn-sm" />
								</div>
							</form>
						</div>
						<br>
						<br>
						<hr>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Jenis Barang</th>
                                            <th>Isi Barang</th>
                                            <th>Harga Pokok</th>
                                            <th>Harga Agen</th>
                                            <th>Harga Kanvas</th>
                                            <th>Harga Konsumen</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php
										$nama3 = $_POST['nama3'];
										$jenis2 = $_POST['jenis2'];
										$i=0;
										if(($jenis2<>'')and($nama3<>'')){
										$sql = mysql_query("SELECT * FROM barang where jenis_barang='$jenis2' and nama_barang like '%$nama3%'");
										}elseif($nama3<>''){
										$sql = mysql_query("SELECT * FROM barang where nama_barang like '%$nama3%'");
										}elseif($jenis2<>''){
										$sql = mysql_query("SELECT * FROM barang where jenis_barang='$jenis2'");
										}else{
										$sql = mysql_query("SELECT * FROM barang");
										}
										while($hasil=mysql_fetch_array($sql)){
										$i+=1;
										$sisa=$i%2;
										if ($sisa == 0)  {
											$class = "class='success'";
										}else {
											$class = "class='gradeX'";
										 }
										?>
                                        <tr <?php echo $class;?> >
                                            <td align="center"><?php echo $i;?></td>
                                            <td><?php echo $hasil['kode_barang'];?></td>
                                            <td><?php echo $hasil['nama_barang'];?></td>
                                            <td align="center"><?php echo $hasil['jenis_barang'];?></td>
                                            <td align="center"><?php echo number_format($hasil['isi_barang']);?></td>
                                            <td align="right"><?php echo number_format($hasil['hpp']);?></td>
                                            <td align="right"><?php echo number_format($hasil['harga_agen']);?></td>
                                            <td align="right"><?php echo number_format($hasil['harga_kanvas']);?></td>
                                            <td align="right"><?php echo number_format($hasil['harga_konsumen']);?></td>
                                            <td align="center">
												<a href="index.php?menu=master&sub_menu=barang_edit&id=<?php echo $hasil['id_barang'];?>"><i class="icon-edit"></i></a>&nbsp;
												<a href="index.php?menu=master&sub_menu=barang_delete&id=<?php echo $hasil['id_barang'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icon-remove"></i></a>&nbsp;
											</td>
                                        </tr>
										<?php } ?>
                                    </tbody>
								</table>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
	  
	</div>
</div>
<!--END PAGE CONTENT -->

</div>
