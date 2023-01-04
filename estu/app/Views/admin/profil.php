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
                        <h2>Kelola Akses</h2>
                        <small>Pengolahan akses log in, masukkan perubahan data lalu pilih tombol <code>Simpan Data</code> untuk menyimpan perubahan</small>
                    </div>
                    <div class="page-breadcrumb">
                        <nav class="c_breadcrumbs">
                            <ul>
                                <li><a href="<?php echo base_url('admin') ?>">Dashboard</a></li>
                                <li class="active"><a href="<?php echo base_url('profil') ?>">Kelola Akses</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="c_panel">
                    <div class="c_title">
                        <h2>Detail Profil</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="c_content">
                        <form action="<?php echo base_url('profil/change') ?>" method="post">
                            <div class="form-group">
                                <label>Tentang Sistem</label>
                                <textarea class="form-control input-sm" name="tentang" placeholder="Deskripsi Tentang Sistem" rows="9" style="resize: none;" required><?php echo $data['tentang'] ?></textarea>
                            </div>
                            <hr>
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control input-sm" name="username" placeholder="Username Akses Log In" required value="<?php echo $data['username'] ?>">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control input-sm" name="password" placeholder="Password Akses Log In (kosongkan jika tidak diubah)">
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-sm btn-flat" style="float: right;"><i class="fa fa-save"></i>&nbsp;&nbsp;Simpan Data</button>
                        </form>
                    </div>
                </div>
            </section>
        </section>
    </section>
    <?php echo view('admin/bagianscript') ?>
</body>
</html>