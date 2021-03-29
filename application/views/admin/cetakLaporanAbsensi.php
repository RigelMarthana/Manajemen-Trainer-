<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style>
        body{
            font-family: arial;
            color: black;
        }
    </style>
</head>
<body>
    
        <center>
            <h1>DIGICLASS INDONESIA</h1>
            <h2>Laporan Kehadiran Pegawai</h2>
        </center>

        <?php 
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');
        ?> 

        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $bulan ?></td>
            </tr>
            
            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo $tahun ?></td>
            </tr>
        </table>

        <table class="table table-bordered table-stripped">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">NIK</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Sakit</th>
                <th class="text-center">Alpha</th>
            </tr>

            <?php $no=1; foreach($lap_kehadiran as $l): ?>
            <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $l->nama_trainer ?></td>
                <td class="text-center"><?php echo $l->nik ?></td>
                <td class="text-center"><?php echo $l->nama_jabatan ?></td>
                <td class="text-center"><?php echo $l->hadir ?></td>
                <td class="text-center"><?php echo $l->sakit?></td>
                <td class="text-center"><?php echo $l->alpha?></td>
            </tr>

            <?php endforeach; ?>
        </table>
</body>
</html>