<?php 

    class SlipGaji extends CI_Controller{
        public function index(){
            $data['title'] = "Filter Slip Gaji Pengawai";
            $data['pegawai'] = $this->penggajianModel->get_data('data_trainer')->result();

            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/filterSlipGaji',$data);
            $this->load->view('templates_admin/footer');

        }
        
        public function cetakSlipGaji(){

            $data['title'] = "Cetak Slip Gaji";
            $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
            $nama = $this->input->post('nama_trainer');
            $bulan = $this->input->post('bulan');
            $tahun = $this->input->post('tahun');
            $bulantahun = $bulan.$tahun;

            $data['print_slip'] = $this->db->query("SELECT data_trainer.nik, data_trainer.nama_trainer, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha
            FROM data_trainer
            INNER JOIN data_kehadiran ON data_kehadiran.nik = data_trainer.nik
            INNER JOIN data_jabatan ON data_jabatan.nama_jabatan = data_trainer.jabatan
            WHERE data_kehadiran.bulan = '$bulantahun' AND data_kehadiran.nama_trainer='$nama'")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('admin/cetakSlipGaji',$data);
            
        }
    }