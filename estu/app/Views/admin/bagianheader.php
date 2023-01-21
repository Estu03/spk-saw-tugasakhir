<?php
$uri = current_url(true);
$db = db_connect();
?>
<header class="header fixed-top clearfix">
    <div class="brand">
        <a href="<?php echo base_url('admin') ?>" class="logo">
            Penilaian Kinerja
        </a>
    </div>
</header>    
<aside>
    <div id="sidebar" class="nav-collapse md-box-shadowed">
        <div class="leftside-navigation leftside-navigation-scroll">
            <ul class="sidebar-menu" id="nav-accordion">
                <li class="sidebar-profile">
                    <div class="profile-main">
                        <p class="image">
                            <img alt="image" src="<?php echo base_url('/assets/gambar/logo.jpeg') ?>" width="80">
                        </p>
                        <p>
                            <span class="name">Administrator</span><br>
                            <span class="position" style="font-family: monospace;">Akses Admin</span>
                        </p>
                    </div>
                </li>
                <li><a href="<?php echo base_url('admin') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-home fa-2x'></span><span>Dashboard</span></a></li>
                <li><a href="<?php echo base_url('karyawan') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-users fa-2x'></span><span>Data Karyawan</span></a></li>
                <li><a href="<?php echo base_url('kriteria') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-ribbon fa-2x'></span><span>Data Kriteria</span></a></li>
                <li><a href="<?php echo base_url('skema') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-display2 fa-2x'></span><span>Skema Penilaian</span></a></li>
                <li><a href="<?php echo base_url('nilai') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-note fa-2x'></span><span>Penilaian</span></a></li>
                <li><a href="<?php echo base_url('analisa') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-albums fa-2x'></span><span>Proses Analisa</span></a></li>
                <li><a href="<?php echo base_url('profil') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-tools fa-2x'></span><span>Kelola Akses</span></a></li>
                <li><a href="<?php echo base_url('getlogout') ?>" class="hvr-bounce-to-right-sidebar-parent"><span class='icon-sidebar pe-7s-upload fa-2x'></span><span>Log Out</span></a></li>
            </ul>        
        </div>
    </div>
</aside>