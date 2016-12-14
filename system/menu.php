<!-- BEGIN BODY-->
<body class="padTop53 " >
	<!-- MAIN WRAPPER -->
    <div id="wrap">
		<!-- HEADER SECTION -->
        <div id="top">
			<nav class="navbar navbar-inverse navbar-fixed-top " style="padding-top: 10px;">
                <a data-original-title="Show/Hide Menu" data-placement="bottom" data-tooltip="tooltip" class="accordion-toggle btn btn-primary btn-sm visible-xs" data-toggle="collapse" href="#menu" id="menu-toggle">
                    <i class="icon-align-justify"></i>
                </a>
                <!-- LOGO SECTION -->
                <header class="navbar-header">
					<a href="index.html" class="navbar-brand">
                    <img src="assets/img/logo2.png" alt="" /></a>
                </header>
                <!-- END LOGO SECTION -->
            </nav>
		</div>
        <!-- END HEADER SECTION -->
		<!-- MENU SECTION -->
        <div id="left">
            <div class="media user-media well-small">
                <a class="user-link" href="#">
                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/logo.png" style="width: 70px;height: 70px;" />
                </a>
                <br />
                <div class="media-body">
                    <h5 class="media-heading"> <?php echo $_SESSION['username'];?></h5>
                    <ul class="list-unstyled user-info">
                        <li>
                             <a class="btn btn-success btn-xs btn-circle" style="width: 10px;height: 12px;"></a> Online
                        </li>
                    </ul>
                </div>
                <br />
            </div>

            <ul id="menu" class="collapse">
				<li class="panel <?php if($_GET['menu']=="beranda"){echo "active";}?>">
                    <a href="index.php?menu=beranda&sub_menu=beranda" >
                        <i class="icon-table"></i> BERANDA
					</a>                   
                </li>
				<li class="panel <?php if($_GET['menu']=="master"){echo "active";}?>">
                    <a href="#" data-parent="#menu" data-toggle="collapse" class="accordion-toggle" data-target="#blank-nav">
                        <i class="icon-check-empty"></i> MASTER DATA
						<span class="pull-right">
                            <i class="icon-angle-left"></i>
                        </span>
                    </a>
                    <ul class="collapse" id="blank-nav">
						<!-- menu kantor -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL2-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Kantor
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL2-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_kantor"><i class="icon-angle-right"></i> Input Kantor </a></li>
                                <li><a href="index.php?menu=master&sub_menu=kantor"><i class="icon-angle-right"></i> Lihat Kantor </a></li>
							</ul>
						</li>
						<!-- menu karyawan -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL1-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Karyawan
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL1-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_karyawan"><i class="icon-angle-right"></i> Input Karyawan </a></li>
                                <li><a href="index.php?menu=master&sub_menu=karyawan"><i class="icon-angle-right"></i> Lihat Karyawan </a></li>
							</ul>
						</li>
						
						<!-- menu kendaraan -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL3-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Kendaraan
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL3-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_kendaraan"><i class="icon-angle-right"></i> Input Kendaraan </a></li>
                                <li><a href="index.php?menu=master&sub_menu=kendaraan"><i class="icon-angle-right"></i> Lihat Kendaraan </a></li>
							</ul>
						</li>
						<!-- menu outlet agen -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL6-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Outlet Agen
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL6-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_agen"><i class="icon-angle-right"></i> Input Outlet Agen </a></li>
                                <li><a href="index.php?menu=master&sub_menu=agen"><i class="icon-angle-right"></i> Lihat Outlet Agen </a></li>
							</ul>
						</li>
						<!-- menu outlet kanvas -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL7-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Outlet Kanvas
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL7-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_kanvas"><i class="icon-angle-right"></i> Input Outlet Kanvas </a></li>
                                <li><a href="index.php?menu=master&sub_menu=kanvas"><i class="icon-angle-right"></i> Lihat Outlet Kanvas </a></li>
							</ul>
						</li>
						<!-- menu suplier -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL4-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Suplier
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL4-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_suplier"><i class="icon-angle-right"></i> Input Suplier </a></li>
                                <li><a href="index.php?menu=master&sub_menu=suplier"><i class="icon-angle-right"></i> Lihat Suplier </a></li>
							</ul>
						</li>
						<!-- menu barang -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL5-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Barang
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL5-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_barang"><i class="icon-angle-right"></i> Input Barang </a></li>
                                <li><a href="index.php?menu=master&sub_menu=barang"><i class="icon-angle-right"></i> Lihat Barang </a></li>
							</ul>
						</li>
						<!-- menu gudang -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL9-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data Gudang
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL9-nav">
                                <li><a href="index.php?menu=master&sub_menu=gudang"><i class="icon-angle-right"></i> Lihat Gudang </a></li>
							</ul>
						</li>
						<!-- menu user -->
						<li>
                            <a href="#" data-parent="#DDL-nav" data-toggle="collapse" class="accordion-toggle" data-target="#DDL8-nav">
                                <i class="icon-sitemap"></i>&nbsp; Data User
								<span class="pull-right" style="margin-right: 20px;">
									<i class="icon-angle-left"></i>
								</span>
							</a>
                            <ul class="collapse" id="DDL8-nav">
                                <li><a href="index.php?menu=master&sub_menu=input_user"><i class="icon-angle-right"></i> Input User </a></li>
                                <li><a href="index.php?menu=master&sub_menu=user"><i class="icon-angle-right"></i> Lihat User </a></li>
							</ul>
						</li>
                    </ul>
                </li>
				
				<li><a href="../keluar.php"><i class="icon-signin"></i> KELUAR </a></li>
			</ul>
		</div>
        <!--END MENU SECTION -->
