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
          <div class="col-md-8 col-md-offset-2">
            <h2>Akses Administrator <small>silahkan masukkan akses Username dan Password</small></h2>
            <hr class="colorgraph">
            <form action="<?php echo base_url('getlogin') ?>" method="post" role="form">
              <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username Akses" required />
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password Akses" required />
              </div>
              <?php if(session()->getFlashData('gagal')){ ?>
                <div class="alert alert-danger">
                  <strong>Gagal!</strong> <?php echo session()->getFlashData('gagal'); ?>
                </div>
              <?php } ?>
              <br>
              <div class="text-center"><button type="submit" class="btn btn-theme btn-md">Akses Masuk</button></div>
            </form>
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