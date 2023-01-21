<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo view('situs/bagianhead') ?>
</head>
<body>
  <div id="wrapper">
    <?php echo view('situs/bagianheader') ?>
    <section id="featured" class="bg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div id="main-slider" class="main-slider flexslider">
              <ul class="slides">
                <li>
                  <img src="<?php echo base_url('/assets/gambar/landing.jpg') ?>" />
                  <div class="flex-caption">
                    <h3>Sistem Penilaian Kinerja</h3>
                    <p>analisa proses penentuan karyawan terbaik melalui metode SAW</p>
                    <a href="<?php echo base_url('hasil') ?>" class="btn btn-theme">Hasil Analisa</a>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-sm-12 col-lg-12">
                <h4>Tentang Sistem Penilaian SAW</h4>
                <p><strong>Penilaian Kinerja Karyawan Terbaik BPN</strong></p>
                <p><?php echo nl2br($tentang) ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php echo view('situs/bagianfooter') ?>
  </div>
  <a href="<?php echo base_url('/assets/situs/#') ?>" class="scrollup"><i class="fa fa-angle-up active"></i></a>
  <?php echo view('situs/bagianscript') ?>
</body>
</html>