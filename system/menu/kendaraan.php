<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>DATA KENDARAAN</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr align="center">
                                            <th>No.</th>
                                            <th>No. Polisi</th>
                                            <th>Nama Kendaraan</th>
                                            <th>Jenis Kendaraan</th>
                                            <th>Pengguna Kendaraan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php
										$i=0;
										$sql = mysql_query("SELECT a.id_kendaraan, a.no_polisi, a.nama_kendaraan, a.jenis_kendaraan, b.nama_karyawan FROM kendaraan a, karyawan b 
										where a.pengguna_kendaraan=b.nik");
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
                                            <td><?php echo $hasil['no_polisi'];?></td>
                                            <td><?php echo $hasil['nama_kendaraan'];?></td>
                                            <td><?php echo $hasil['jenis_kendaraan'];?></td>
                                            <td><?php echo $hasil['nama_karyawan'];?></td>
                                            <td align="center">
												<a href="index.php?menu=master&sub_menu=kendaraan_edit&id=<?php echo $hasil['id_kendaraan'];?>"><i class="icon-edit"></i></a>&nbsp;
												<a href="index.php?menu=master&sub_menu=kendaraan_delete&id=<?php echo $hasil['id_kendaraan'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icon-remove"></i></a>&nbsp;
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
