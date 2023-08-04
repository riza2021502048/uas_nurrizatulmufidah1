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
                        <input type="hidden" name="param" id="param" value="<?php echo $edit_data['kd_ustadza']; ?>">
                    <?php
                    }
                    ?>
                    <div class="form-group">
                        <label for="kd_ustadza">Kode ustadza</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('kd_ustadza')) ? (empty($edit_data['kd_ustadza']) ? "" : $edit_data['kd_ustadza']) : set_value('kd_ustadza'); ?>" id="kd_ustadza" name="kd_ustadza">
                    </div>
                    <div class="form-group">
                        <label for="nm_ustdza">nm_ustadza</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('nm_ustdza')) ? (empty($edit_data['nm_ustdza']) ? "" : $edit_data['nm_ustdza']) : set_value('nm_ustdza'); ?>" id="nm_ustdza" name="nm_ustdza">
                    </div>
                    <div class="form-group">
                        <label for="_kd_pelajaran">_kd_pelajaran</label>
                        <input type="text" class="form-control" value="<?php echo empty(set_value('_kd_pelajaran')) ? (empty($edit_data['_kd_pelajaran']) ? "" : $edit_data['_kd_pelajaran']) : set_value('_kd_pelajaran'); ?>" id="_kd_pelajaran" name="_kd_pelajaran">
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
