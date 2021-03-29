<?php
    class DataPenggajian extends CI_Controller{
        public function index()
        {
            $data['title'] = "Data Penggajian";

             
            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
            
            $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result(); 
            $data['gaji'] = $this->db->query("SELECT data_trainer.nik, data_trainer.nama_trainer, data_trainer.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha FROM data_trainer
            INNER JOIN data_kehadiran ON data_kehadiran.nik = data_trainer.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_trainer.jabatan
            WHERE data_kehadiran.bulan = '$bulantahun' ORDER BY data_trainer.nama_trainer ASC
             ")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dataGaji',$data);
            $this->load->view('templates_admin/footer');
        }

        public function cetakGaji()
        {
            $data['title'] = "Cetak Data Gaji Pegawai";

             
            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }
            
            $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result(); 
            $data['cetakGaji'] = $this->db->query("SELECT data_trainer.nik, data_trainer.nama_trainer, data_trainer.jenis_kelamin, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha FROM data_trainer
            INNER JOIN data_kehadiran ON data_kehadiran.nik = data_trainer.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_trainer.jabatan
            WHERE data_kehadiran.bulan = '$bulantahun' ORDER BY data_trainer.nama_trainer ASC
             ")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('admin/cetakDataGaji',$data);
            
        }
    }
?>