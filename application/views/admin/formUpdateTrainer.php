<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="margin-boottom: 100px">
        <div class="card-body">
            <?php foreach($trainer as $t): ?>
            <form method="POST"  action="<?php echo base_url('admin/dataTrainer/updateDataAksi') ?> " enctype="multipart/form-data">

                <div class="form-group">
                    <label>NIK</label>
                    <input type="hidden" name="id_trainer" class="form-control" value="<?php echo $t->id_trainer ?>">
                    <input type="number" name="nik" class="form-control" value="<?php echo $t->nik ?>">
                    <?php echo form_error('nik','<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama pegawai</label>
                    <input type="text" name="nama_trainer" class="form-control" value="<?php echo $t->nama_trainer ?>">
                    <?php echo form_error('nama_trainer','<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="<?php echo $t->jenis_kelamin ?>"><?php echo $t->jenis_kelamin ?></option>
                        <option value="laki-laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Jabatan</label>
                    <select name="jabatan" class="form-control">
                        <option value="<?php echo $t->jabatan ?>"><?php echo $t->jabatan ?></option>
                            <?php foreach($jabatan as $j): ?>
                        <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                            <?php endforeach; ?>
                    </select>
                    <?php echo form_error('jabatan','<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $t->tanggal_masuk ?>">
                    <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option value="<?php echo $t->status ?>"><?php echo $t->status ?></option>
                        <option value="Pegawai Tetap">Pegawai Tetap</option>
                        <option value="Pegawai Tidak Tetap">Pegawai Tidak Tetap</option>
                    </select>
                    <?php echo form_error('status','<div class="text-small text-danger"> </div>') ?>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" >
                </div>

                <button type="submit" class="btn btn-primary mt-3">SIMPAN</button>


            </form>
                <?php endforeach;?>
        </div>
    </div>
    

</div>