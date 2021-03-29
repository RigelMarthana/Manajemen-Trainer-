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
            <h2>Slip Gaji Pegawai</h2>
            <hr style="width: 50%; border-Width: 5px; color: black;">
        </center>

        <?php 

            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulantahun = $bulan.$tahun;

        ?>
        <?php foreach($potongan as $p ): 
            
            $potongan=$p->jml_potongan;
            

        ?>


        <?php foreach($print_slip as $ps):?>

        <?php $potongan_gaji = $ps->alpha * $potongan; ?>
        <table style="width: 100%">
            <tr>
                <td style="width: 20%">Nama Pegawai</td>
                <td style="width: 2%">:</td>
                <td><?php echo $ps->nama_trainer?></td>
            </tr>

            <tr>
                <td>NIK </td>
                <td>:</td>
                <td><?php echo $ps->nik?></td>
            </tr>

            <tr>
                <td>Jabatan </td>
                <td>:</td>
                <td><?php echo $ps->nama_jabatan?></td>
            </tr>

            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $bulan?></td>
            </tr>
            <tr>
                <td>tahun</td>
                <td>:</td>
                <td><?php echo $tahun?></td>
            </tr>
        </table>

        <table class="table table-stripped table-bordered  mt-3">
            <tr>
                <th class="text-center" width="5%">No</th>
                <th class="text-center">Keterangan</th>
                <th class="text-center">Jumlah Gaji</th>
            </tr>
            <tr>
                <td class="text-center">1</td>
                <td class="text-center">Gaji Pokok</td>
                <td class="text-center">Rp. <?php echo number_format($ps->gaji_pokok,0,',','.') ?></td>
            </tr>
            <tr>
                <td class="text-center">2</td>
                <td class="text-center">Tunjangan Transportasi</td>
                <td class="text-center">Rp. <?php echo number_format($ps->tj_transport,0,',','.') ?></td>
            </tr>
            <tr>
                <td class="text-center">3</td>
                <td class="text-center">Uang Makan</td>
                <td class="text-center">Rp. <?php echo number_format($ps->uang_makan,0,',','.') ?></td>
            </tr>
            <tr>
                <td class="text-center">4</td>
                <td class="text-center">Potongan</td>
                <td class="text-center">Rp. <?php echo number_format($potongan_gaji,0,',','.')?></td>
            </tr>
            <tr>
                
                <th colspan="2" style="text-align: right;" >Total Gaji</th>
                <th class="text-center">Rp. <?php echo number_format($ps->gaji_pokok+$ps->tj_transport+$ps->uang_makan-$potongan_gaji,0,',','.')?></th>
            </tr>
        </table>
        <?php endforeach; ?>
        <?php endforeach; ?>

        <table width="100%">
                <tr>
                    <td></td>
                    <td >
                        <p>Pegawai </p>
                        <br>
                        <br>
                        <p>___________________</p>
                        <p class="font-weight-bold"><?php echo $ps->nama_trainer?></p>
                    </td>
                    <td></td>
                    <td width="200px">
                        <p>Jakarta, <?php echo date("d M Y")?> <br> FINANCE </p>
                        <br>
                        <br>
                        <p>___________________</p>
                        
                    </td>
                </tr>
            </table>
</body>
</html>