<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>DATA KANVAS</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Pemilik</th>
                                            <th>Alamat</th>
                                            <th>Wilayah</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Salesman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php
										$i=0;
										$sql = mysql_query("SELECT a.id_kanvas, a.kode_kanvas, a.nama_kanvas, a.pemilik_kanvas, a.alamat_kanvas, a.wilayah_kanvas,a.telpon_kanvas, 
										a.status_kanvas, a.salesman_kanvas, b.nama_karyawan	FROM konsumen_kanvas a, karyawan b where a.salesman_kanvas=b.nik");
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
                                            <td><?php echo $hasil['kode_kanvas'];?></td>
                                            <td><?php echo $hasil['nama_kanvas'];?></td>
                                            <td><?php echo $hasil['pemilik_kanvas'];?></td>
                                            <td><?php echo $hasil['alamat_kanvas'];?></td>
                                            <td><?php echo $hasil['wilayah_kanvas'];?></td>
                                            <td align="center"><?php echo $hasil['telpon_kanvas'];?></td>
                                            <td align="center"><?php echo $hasil['status_kanvas'];?></td>
                                            <td><?php echo $hasil['nama_karyawan'];?></td>
                                            <td align="center">
												<a href="index.php?menu=master&sub_menu=kanvas_edit&id=<?php echo $hasil['id_kanvas'];?>"><i class="icon-edit"></i></a>&nbsp;
												<a href="index.php?menu=master&sub_menu=kanvas_delete&id=<?php echo $hasil['id_kanvas'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icon-remove"></i></a>&nbsp;
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
