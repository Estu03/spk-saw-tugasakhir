<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo view('situs/bagianhead') ?>
</head>
<body>
  <div id="wrapper">
    <?php echo view('situs/bagianheader') ?>
    <section id="content">
      <div class="container">
        <div class="row">
          <h5>Hasil Analisis Karyawan Terbaik Periode <?php echo $periode ?></h5>
          <table class="table table-hover">
            <thead>
              <tr>
                <th>Ranking</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>NA</th>
              </tr>
            </thead>
            <tbody>
              <?php
              if(count($data) > 0){
                $x = 1;
                foreach ($data as $d) {
                  ?>
                  <tr>
                    <td align="center"><?php echo $x ?></td>
                    <td><?php echo $d['nip'] ?></td>
                    <td><?php echo $d['nama'] ?></td>
                    <td><?php echo $d['jabatan'] ?></td>
                    <td><?php echo $d['golongan'] ?></td>
                    <td><?php echo number_format($d['na'], 3) ?></td>
                  </tr>
                  <?php 
                  $x++;
                } ?>
              <?php }else{ ?>
                <tr>
                  <td colspan="6" align="center">Data Belum Tersedia.....</td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>
    <?php echo view('situs/bagianfooter') ?>
  </div>
  <a href="<?php echo base_url('/assets/situs/#') ?>" class="scrollup"><i class="fa fa-angle-up active"></i></a>
  <?php echo view('situs/bagianscript') ?>
</body>
</html>