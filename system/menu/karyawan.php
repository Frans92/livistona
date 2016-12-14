<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>DATA KARYAWAN</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Karyawan</th>
                                            <th>Tgl Lahir</th>
                                            <th>Alamat Karyawan</th>
                                            <th>Tgl Masuk</th>
                                            <th>Jabatan</th>
                                            <th>Kantor</th>
                                            <th>Telpon</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php
										$i=0;
										$sql = mysql_query("SELECT a.nik, a.nama_karyawan, a.tgl_lahir, a.alamat_karyawan, a.tgl_masuk, a.jabatan, b.nama_kantor, a.telpon_karyawan, a.status_karyawan
										FROM karyawan a, kantor b where a.id_kantor=b.id_kantor");
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
                                            <td><?php echo $hasil['nik'];?></td>
                                            <td><?php echo $hasil['nama_karyawan'];?></td>
                                            <td><?php echo tgl_indo($hasil['tgl_lahir']);?></td>
                                            <td><?php echo $hasil['alamat_karyawan'];?></td>
                                            <td><?php echo tgl_indo($hasil['tgl_masuk']);?></td>
                                            <td><?php echo $hasil['jabatan'];?></td>
                                            <td><?php echo $hasil['nama_kantor'];?></td>
                                            <td><?php echo $hasil['telpon_karyawan'];?></td>
                                            <td><?php echo $hasil['status_karyawan'];?></td>
                                            <td align="center">
												<a href="index.php?menu=master&sub_menu=karyawan_edit&id=<?php echo $hasil['nik'];?>"><i class="icon-edit"></i></a>&nbsp;
												<a href="index.php?menu=master&sub_menu=karyawan_delete&id=<?php echo $hasil['nik'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icon-remove"></i></a>&nbsp;
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
