<!--PAGE CONTENT -->
<div id="content">
	<div class="inner" style="min-height: 700px;">
		<br>
                <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <b>DATA USER</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>NIK</th>
                                            <th>Nama Karyawan</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Status</th>
                                            <th>Email</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
									<tbody>
										<?php
										$i=0;
										$sql = mysql_query("SELECT b.nik, b.nama_karyawan, a.username, a.level, a.status_user, a.email
										FROM user a LEFT JOIN karyawan b ON a.nik=b.nik");
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
                                            <td><?php echo $hasil['username'];?></td>
                                            <td><?php echo $hasil['level'];?></td>
                                            <td><?php echo $hasil['status_user'];?></td>
                                            <td><?php echo $hasil['email'];?></td>
                                            <td align="center">
												<a href="index.php?menu=master&sub_menu=user_edit&id=<?php echo $hasil['username'];?>"><i class="icon-edit"></i></a>&nbsp;
												<a href="index.php?menu=master&sub_menu=user_delete&id=<?php echo $hasil['username'];?>" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="icon-remove"></i></a>&nbsp;
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
