<?php
$db = db_connect();
$bul = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$periode = $bul[(int)$bulan]." ".$tahun;
$kriteria = $db->query("select kriteria.kodekriteria, kriteria.kriteria from skema join kriteria on skema.kodekriteria = kriteria.kodekriteria where skema.periode = '".$periode."' order by kriteria asc")->getResultArray();
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
                        <h2>Proses Analisa</h2>
                        <small>Pengolahan data analisa, pilih periode tertentu untuk menampilkan detail analisa</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                                <li class="active"><a href="<?php echo base_url('skema') ?>">Data Analisa</a></li>
                            </ul>                            
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_content">
                        <form class="form-horizontal" action="<?php echo base_url('analisa/show') ?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style="text-align: left;"><strong>Periode Penilaian</strong></label>
                                <div class="col-sm-3">
                                    <select class="form-control input-sm" name="bulan" required onchange="this.form.submit();">
                                        <?php for ($i=1; $i <= 12; $i++) { ?>
                                            <option <?php if($bulan == $i){echo "selected";} ?> value="<?php echo $i ?>"><?php echo $bul[$i] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control input-sm" name="tahun" required onchange="this.form.submit();">
                                        <?php for ($i=2020; $i <= date('Y'); $i++) { ?>
                                            <option <?php if($tahun == $i){echo "selected";} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <?php if(count($data) > 0 && $proses == 'on'){ ?>
                                        <a href="<?php echo base_url('analisa/process/'.$bulan."_".$tahun) ?>" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i> Proses Analisa</a>
                                    <?php } ?>
                                    <?php if($status == 'on'){ ?>
                                        <a href="<?php echo base_url('analisa/print/'.$bulan."_".$tahun) ?>" target="blank" class="btn btn-success btn-sm"><i class="fa fa-print"></i> Cetak</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="c_content">
                        <table class="table table-striped table-bordered" style="border-spacing:0px; width:100%">
                            <thead>
                                <tr>
                                    <th>Karyawan</th>
                                    <?php foreach ($kriteria as $k) {?>
                                        <th><?php echo $k['kriteria'] ?></th>
                                    <?php } ?>
                                    <th>NA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($data as $d) {
                                    $na = 0;
                                    if($status == 'on'){
                                        $na = $d['na'];
                                    }
                                    ?>
                                    <tr>
                                        <td>
                                            <strong><?php echo $d['nama'] ?></strong><br>
                                            <small><?php echo $d['nip'] ?></small>
                                        </td>
                                        <?php
                                        foreach ($kriteria as $k) {
                                            $indikator = "-";
                                            $nilai = $db->query("select nilai from nilai where periode = '".$periode."' and kodekriteria = '".$k['kodekriteria']."' and kodekaryawan = '".$d['kodekaryawan']."'")->getResultArray();
                                            if(count($nilai) > 0){
                                                $nilai = $nilai[0]['nilai'];
                                                if($nilai <= 50){
                                                    $indikator = "Buruk";
                                                }else if($nilai <= 60){
                                                    $indikator = "Kurang";
                                                }else if($nilai <= 75){
                                                    $indikator = "Cukup";
                                                }else if($nilai < 90){
                                                    $indikator = "Baik";
                                                }else{
                                                    $indikator = "Sangat Baik";
                                                }
                                            }else{
                                                $nilai = "";
                                            }
                                            ?>
                                            <td><?php echo "[".$nilai."] ".$indikator; ?></td>
                                        <?php } ?>
                                        <td align="center"><?php echo number_format($na,4) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <?php echo view('admin/bagianscript') ?>
</body>
<?php foreach ($data as $d) {?>
    <div class="modal" id="nilai<?php echo $d['kodekaryawan'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                    <h4 class="modal-title">Detail Penilaian <?php echo $d['nama'] ?></h4>
                </div>
                <form class="form-horizontal" action="<?php echo base_url('nilai/save') ?>" method="post">
                    <input type="hidden" name="periode" value="<?php echo $periode ?>">
                    <input type="hidden" name="karyawan" value="<?php echo $d['kodekaryawan'] ?>">
                    <input type="hidden" name="bulan" value="<?php echo $bulan ?>">
                    <input type="hidden" name="tahun" value="<?php echo $tahun ?>">
                    <div class="modal-body">
                        <?php
                        foreach ($kriteria as $k) {
                            $nilai = 0;
                            $nilai = $db->query("select nilai from nilai where periode = '".$periode."' and kodekriteria = '".$k['kodekriteria']."' and kodekaryawan = '".$d['kodekaryawan']."'")->getResultArray();
                            if(count($nilai) > 0){
                                $nilai = $nilai[0]['nilai'];
                            }else{
                                $nilai = 0;
                            }
                            ?>
                            <div class="form-group">
                                <label class="col-sm-9 control-label" style="text-align: left;">Aspek Kriteria <?php echo $k['kriteria'] ?></label>
                                <div class="col-sm-3">
                                    <?php if(date('d') < 25){ ?>
                                        <input type="number" class="form-control input-sm" name="krt<?php echo $k['kodekriteria'] ?>" min="0" max="100" value="<?php echo $nilai ?>" required>
                                    <?php }else{ ?>
                                        <label class="control-label" style="text-align: left;"><?php echo $nilai ?></label>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <?php if(date('d') < 25){ ?>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default btn-sm btn-raised rippler rippler-default" data-dismiss="modal">Batal</button>
                            <button type="sbumit" class="btn btn-primary btn-sm btn-raised rippler rippler-default">Simpan Data</button>
                        </div>
                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
</html>