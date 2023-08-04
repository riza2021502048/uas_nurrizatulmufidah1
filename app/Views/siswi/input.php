<?php
echo $this->extend('template/index');
echo $this->section('content');
?>
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?php echo $title_card; ?></h3>
            </div>

            <form action="<?php echo $action; ?>" method="post">
                <div class="card-body">
                    <?php if (validation_errors()) { ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="icon fas fa-ban"></i>Alert!</h5>
                            <?php echo validation_list_errors(); ?>
                        </div>
                    <?php
                    } ?>
                    <?php
                    if (session()->getFlashdata('error')) { ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                            <h5><i class="fa-solid fa-circle-exclamation"></i> Error</h5>
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php
                    } ?>
                    <?php echo csrf_field(); ?>
                    <?php
                    if (current_url(true)->getSegment(2) == 'edit') {
                    ?>
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['kd_siswi']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="kd_siswi">Kd_siswi</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('kd_siswi')) ? (empty($edit_data['kd_siswi']) ? "" : $edit_data['kd_siswi']) : set_value('kd_siswi'); ?>" id="kd_siswi" name="kd_siswi">
                    </div>
                    <div class="form-group">
                        <label for="nama_siswi">Nama siswi</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('nama_siswi')) ? (empty($edit_data['nama_siswi']) ? "" : $edit_data['nama_siswi']) : set_value('nama_siswi'); ?>" id="nama_siswi" name="nama_siswi">
                    </div>
                    <div class="form-group">
                        <label for="TTL">Tempat, Tanggal Lahir</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('TTL')) ? (empty($edit_data['TTL']) ? "" : $edit_data['TTL']) : set_value('TTL'); ?>" id="TTL" name="TTL">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('alamat')) ? (empty($edit_data['alamat']) ? "" : $edit_data['alamat']) : set_value('alamat'); ?>" id="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('jenis_kelamin')) ? (empty($edit_data['jenis_kelamin']) ? "" : $edit_data['jenis_kelamin']) : set_value('jenis_kelamin'); ?>" id="jenis_kelamin" name="jenis_kelamin">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Bagian kelas</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('kelas')) ? (empty($edit_data['kelas']) ? "" : $edit_data['kelas']) : set_value('kelas'); ?>" id="kelas" name="kelas">
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa-regular fa-floppy-disk"></i> Simpan</button>
                        <a class="btn btn-danger float-right" href="javascript:history.back()"><i class="fa-solid fa-chevron-left"></i> Kembali</a>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <?php
    echo $this->endSection();
