<?php
$db = db_connect();
$bul = array('1' => 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
$periode = $bul[(int)$bulan]." ".$tahun;
$kriteria = $db->query("select kriteria.kodekriteria, kriteria.kriteria, kriteria.bobot from skema join kriteria on skema.kodekriteria = kriteria.kodekriteria where skema.periode = '".$periode."' order by kriteria asc")->getResultArray();
$bobot = 0;
foreach ($kriteria as $k) {
    $bobot += $k['bobot'];
}
$input = false;
if($bobot == 100 && date('d') <= 25 && $bulan == date('m') && $tahun == date('Y')){
    $input = true;
}
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
                        <h2>Data Penilaian</h2>
                        <small>Pengolahan data penilaian, pilih periode tertentu untuk menampilkan detail nilai</small>.<code><strong>PENTING!</strong> jika penilaian tidak dapat diinput atau diubah, silahkan cek Bobot dan Skema Kriteria</code>
                    </div>
                    <div class="c_content">
                        <strong>Range Indikator Nilai :</strong>
                        <ul>
                            <li>0 - 50 : Buruk</li>
                            <li>51 - 60 : Kurang</li>
                            <li>61 - 75 : Cukup</li>
                            <li>76 - 90 : Baik</li>
                            <li>91 - 100 : Sangat Baik</li>
                        </ul>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                                <li class="active"><a href="<?php echo base_url('skema') ?>">Data Skema</a></li>
                            </ul>                            
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_content">
                        <form class="form-horizontal" action="<?php echo base_url('nilai/show') ?>" method="post">
                            <div class="form-group">
                                <label class="col-sm-2 control-label" style="text-align: left;"><strong>Periode Penilaian</strong></label>
                                <div class="col-sm-5">
                                    <select class="form-control input-sm" name="bulan" required onchange="this.form.submit();">
                                        <?php for ($i=1; $i <= 12; $i++) { ?>
                                            <option <?php if($bulan == $i){echo "selected";} ?> value="<?php echo $i ?>"><?php echo $bul[$i] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control input-sm" name="tahun" required onchange="this.form.submit();">
                                        <?php for ($i=2020; $i <= date('Y'); $i++) { ?>
                                            <option <?php if($tahun == $i){echo "selected";} ?> value="<?php echo $i ?>"><?php echo $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>                                
                            </div>
                        </form>
                    </div>
                    <div class="c_content">
                        <?php
                        $keterangan = "";
                        if($bobot != 100){
                            $keterangan = "Total Bobot Periode Harus 100% (total bobot periode sekarang belum sesuai : ".number_format($bobot)."%)!!!";
                        }else if(date('d') > 25){
                            $keterangan = "Pengolahan data penilaian hanya bisa dilakukan pada tanggal 1 s.d 25 setiap periode";
                        }else if($bulan != date('m') || $tahun != date('Y')){
                            $keterangan = "Pengolahan data penilaian hanya bisa dilakukan pada periode aktif sistem, yaitu ".$bul[date('m')]." ".date('Y');
                        }
                        if(!$input){
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <strong>PERINGATAN! </strong><?php echo $keterangan; ?>
                            </div>
                        <?php } ?>
                        <table id="example" class="table table-striped table-bordered" style="border-spacing:0px; width:100%">
                            <thead>
                                <tr>
                                    <th>Karyawan</th>
                                    <?php foreach ($kriteria as $k) {?>
                                        <th><?php echo $k['kriteria'] ?></th>
                                    <?php } ?>
                                    <?php if($input){ ?>
                                        <th>**</th>
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $d) {?>
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
                                        <?php if($input){ ?>
                                            <td align="center">
                                                <button type="button" data-toggle="modal" data-target="#nilai<?php echo $d['kodekaryawan'] ?>" class="btn btn-warning btn-xs">Detail</button>
                                            </td>
                                        <?php } ?>
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