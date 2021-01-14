<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>omg</b></span>
      <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>OMEGA</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
   
          <!-- Notifications: style can be found in dropdown.less -->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                </p>
              </li>
              <!-- Menu Body -->
                            <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="pwd.php?id=" class="btn btn-default btn-flat">Ganti Password</a>
                </div>
                <div class="pull-right">
                  <a href="config/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
           <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <li class="header">MENU UTAMA</li>
        <li>
          <a href="home.php">
            <i class="fa fa-dashboard"></i> <span>Home</span>
                    </a>
          <!-- She's just being nice with you. Stop getting emotional about it !! -->
        </li>
<li class="treeview <?php if ($page=="memori" || $page=="penjualan"||$page=="penjualanspd"||$page=="pembelian") echo "active" ?>">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Jurnal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($page=="memori") echo "active" ?>" ><a href="<?=base_url()?>jurnal/"><i class="fa fa-circle-o"></i> Jurnal Memori</a></li>
            <li class="<?php if ($page=="penjualan" || $page=="penjualanspd") echo "active" ?>"><a href='jualan.php'><i class="fa fa-circle-o"></i> Jurnal Penjualan</a>
            </li>
            <li class="<?php if ($page=="pembelian") echo "active" ?>"><a href="jurnalPembelianStart.php"><i class="fa fa-circle-o"></i> Jurnal Pembelian</a></li>
          </ul>
        </li>
        <li class="treeview <?php if ($page=="perkiraan" || $page=="subacc" || $page=="inv" || $page=="persediaan") echo "active" ?>">
          <a href="#">
            <i class="fa fa-tasks"></i>
            <span>Tabel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($page=="perkiraan") echo "active" ?>"><a href="<?=base_url()?>tabel/perkiraan/"><i class="fa fa-circle-o"></i> Tabel Perkiraan</a></li>
            <li class="<?php if ($page=="subacc") echo "active" ?>"><a href="<?=base_url()?>tabel/subacc/"><i class="fa fa-circle-o"></i> Tabel Subacc</a></li>
            <li class="<?php if ($page=="inv") echo "active" ?>"><a href="<?=base_url()?>tabel/inv/"><i class="fa fa-circle-o"></i> Tabel Inventory</a></li>
            <li class="<?php if ($page=="persediaan") echo "active" ?>"><a href="<?=base_url()?>tabel/persediaan/"><i class="fa fa-circle-o"></i> Tabel Akun Persediaan</a></li>
          </ul>
        </li>
        <li class="treeview <?php if ($page=="pembantu" || $page=="pembantuInv" || $page=="dftrmemori") echo "active" ?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Buku Pembantu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($page=="pembantu") echo "active" ?>"><a href="bukuPembantu_.php"><i class="fa fa-circle-o"></i> Pembantu ACC</a></li>
            <li class="<?php if ($page=="pembantuInv") echo "active" ?>"><a href="bukuPembantuInv_.php"><i class="fa fa-circle-o"></i> Pembantu INV</a></li>
             </ul>
        </li>
        <li class="treeview <?php if ($page=="neraca" || $page=="labarugi") echo "active" ?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Monthly Report</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($page=="neraca") echo "active" ?>"><a href="LaporanNeraca.php"><i class="fa fa-circle-o"></i> Neraca Konsolidasi</a></li>
            <li class="<?php if ($page=="labarugi") echo "active" ?>"><a href="LabaRugi.php"><i class="fa fa-circle-o"></i> Laba Rugi Konsolidasi</a></li>
          </ul>
        </li>
        <li class="treeview <?php if ($page=="kas" || $page=="bank" || $page=="jurnalkas" || $page=="laporankas") echo "active" ?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>KAS/BANK</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if ($page=="kas") echo "active" ?>"><a href="<?=base_url()?>jurnal/kasbank/"><i class="fa fa-circle-o"></i> KAS/BANK Masuk</a></li>
            <li class="<?php if ($page=="bank") echo "active" ?>"><a href="bank.php"><i class="fa fa-circle-o"></i> KAS/BANK Keluar</a></li>
           <!--  <li class=""><a href="jurnalKas.php"><i class="fa fa-circle-o"></i> Jurnal KAS/BANK</a></li> -->
            <li class="<?php if ($page=="laporankas") echo "active" ?>"><a href="laporanKas.php"><i class="fa fa-circle-o"></i> Laporan KAS/BANK</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>