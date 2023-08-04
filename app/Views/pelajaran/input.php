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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['kd_pelajaran']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="kd_pelajaran">kd_pelajaran</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('kd_pelajaran')) ? (empty($edit_data['kd_pelajaran']) ? "" : $edit_data['kd_pelajaran']) : set_value('kd_pelajaran'); ?>" id="kd_pelajaran" name="kd_pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('kelas')) ? (empty($edit_data['kelas']) ? "" : $edit_data['kelas']) : set_value('kelas'); ?>" id="kelas" name="kelas">
                    </div>
                    <div class="form-group">
                        <label for="nm_pelajaran">Nm_pelajaran</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('nm_pelajaran')) ? (empty($edit_data['nm_pelajaran']) ? "" : $edit_data['nm_pelajaran']) : set_value('nm_pelajaran'); ?>" id="nm_pelajaran" name="nm_pelajaran">
                    </div>
                    <div class="form-group">
                        <label for="jumlah_item">Jumlah Item</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('jumlah_item')) ? (empty($edit_data['jumlah_item']) ? "" : $edit_data['jumlah_item']) : set_value('jumlah_item'); ?>" id="jumlah_item" name="jumlah_item">
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
