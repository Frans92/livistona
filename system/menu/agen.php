<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>DATA AGEN</b>
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
                                            <th>Limit (Rp)</th>
                                            <th>Tempo</th>
                                            <th>Status</th>
                                            <th>Salesman</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php
										$i=0;
										$sql = mysql_query("SELECT a.id_agen, a.kode_agen, a.nama_agen, a.pemilik_agen, a.alamat_agen, a.wilayah_agen,a.telpon_agen,a.limit_agen, a.tempo_agen, 
										a.status_agen, a.salesman_agen, b.nama_karyawan	FROM konsumen_agen a, karyawan b where a.salesman_agen=b.nik");
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
                                            <td><?php echo $hasil['kode_agen'];?></td>
                                            <td><?php echo $hasil['nama_agen'];?></td>
                                            <td><?php echo $hasil['pemilik_agen'];?></td>
                                            <td><?php echo $hasil['alamat_agen'];?></td>
                                            <td><?php echo $hasil['wilayah_agen'];?></td>
                                            <td><?php echo $hasil['telpon_agen'];?></td>
                                            <td align="right"><?php echo number_format($hasil['limit_agen']);?></td>
                                            <td align="center"><?php echo $hasil['tempo_agen'];?></td>
                                            <td><?php echo $hasil['status_agen'];?></td>
                                            <td><?php echo $hasil['nama_karyawan'];?></td>
                                            <td align="center">
												<a href="index.php?menu=master&sub_menu=agen_edit&id=<?php echo $hasil['id_agen'];?>"><i class="icon-edit"></i></a>&nbsp;
												<a href="index.php?menu=master&sub_menu=agen_delete&id=<?php echo $hasil['id_agen'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icon-remove"></i></a>&nbsp;
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
