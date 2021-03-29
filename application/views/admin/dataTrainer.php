<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>

    <a class="mb-3 mt-3 btn btn-sm btn-success" href="<?php echo base_url('admin/dataTrainer/tambahData') ?>">
        <i class="fas fa-plus">Tambah Pegawai</i>
    </a>    

    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nik</th>
            <th class="text-center">Nama pegawai</th>
            <th class="text-center">Jenis Kelamin</th>
            <th class="text-center">Jabatan</th>
            <th class="text-center">Tanggal Masuk</th>
            <th class="text-center">Status</th>
            <th class="text-center">Photo</th>
            <th class="text-center">Action</th>
        </tr>

        <?php $no=1; foreach($trainer as $t) : ?>

            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $t->nik ?></td>
                <td class="text-center"><?php echo $t->nama_trainer ?></td>
                <td class="text-center"><?php echo $t->jenis_kelamin ?></td>
                <td class="text-center"><?php echo $t->jabatan ?></td>
                <td class="text-center"><?php echo $t->tanggal_masuk ?></td>
                <td class="text-center"><?php echo $t->status ?></td>
                <td class="text-center">
                    <img src="<?php echo base_url().'assets/photo/'.$t->photo?>" width="50px" alt="">
                </td>
                <td>
                     <center>
                        <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataTrainer/updateData/'.$t->id_trainer); ?>">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a onclick="return confirm('Yakin Hapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataTrainer/deleteData/'.$t->id_trainer); ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </center>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
    

</div>