<?php
$db = db_connect();
$ky = count($db->query("select * from karyawan where status = '1'")->getResultArray());
$kr = count($db->query("select * from kriteria")->getResultArray());
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo view('admin/bagianhead') ?>
</head>
<body id="default-scheme">
    <section id="container">
        <?php echo view('admin/bagianheader') ?>
        <section id="main-content">
            <section class="wrapper">
                <div class="top-page-header">
                    <div class="page-title">
                        <h2>Dashboard</h2>
                        <small>Statistik Data Sistem</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_content">
                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-content bg-white">
                                    <div class="row padding-10">
                                        <div class="col-xs-6">
                                            <h3 class="counter font-bold font-size-38"><?php echo number_format($ky) ?></h3>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="font-size-38"><span class="icon-people pull-right"></span></p>
                                        </div>
                                    </div>
                                    <p class="margin-left-10 margin-right-10">Karyawan Aktif</p>
                                    <a href="<?php echo base_url('karyawan') ?>" class="padding-8 hvr-bounce-to-right bg-success" style="width:100%;">Data Karyawan <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="widget">
                                <div class="widget-content bg-white">
                                    <div class="row padding-10">
                                        <div class="col-xs-6">
                                            <h3 class="counter font-bold font-size-38"><?php echo number_format($kr) ?></h3>
                                        </div>
                                        <div class="col-xs-6">
                                            <p class="font-size-38"><span class="icon-tag pull-right"></span></p>
                                        </div>
                                    </div>
                                    <p class="margin-left-10 margin-right-10">Kriteria</p>
                                    <a href="<?php echo base_url('kriteria') ?>" class="padding-8 hvr-bounce-to-right bg-info" style="width:100%;">Data Kriteria <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <?php echo view('admin/bagianscript') ?>
</body>
</html>