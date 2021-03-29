<?php
    class DataAbsensi extends CI_Controller{
        public function index()
        {   
            $data['title'] = "Data Absensi Trainer";
            

             
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan = $_GET['bulan'];
            $tahun = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan = date('m');
            $tahun = date('Y');
            $bulantahun = $bulan.$tahun;
        }
            

            $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_trainer.nama_trainer, data_trainer.jenis_kelamin, data_trainer.jabatan
                FROM data_kehadiran
                INNER JOIN data_trainer ON data_kehadiran.nik = data_trainer.nik
                INNER JOIN data_jabatan ON data_trainer.jabatan = data_jabatan.nama_jabatan
                WHERE data_kehadiran.bulan = '$bulantahun'
                ORDER BY data_trainer.nama_trainer ASC
            ")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/dataAbsensi',$data);
            $this->load->view('templates_admin/footer');
        }

        public function inputAbsensi(){
            
            if($this->input->post('submit', TRUE) == 'submit'){

                $post = $this->input->post();
                foreach($post['bulan'] as $key => $value){
                    if($post['bulan'][$key] !='' || $post['nik'][$key] !=''){
                        $simpan[] = array(
                           
                            'bulan'         => $post['bulan'][$key],
                            'nik'           => $post['nik'][$key],
                            'nama_trainer'  => $post['nama_trainer'][$key],
                            'jenis_kelamin' => $post['jenis_kelamin'][$key],
                            'nama_jabatan'  => $post['nama_jabatan'][$key],
                            'hadir'         => $post['hadir'][$key],
                            'sakit'         => $post['sakit'][$key],
                            'alpha'         => $post['alpha'][$key],
                        );
                    }
                }
                $this->penggajianModel->insert_batch('data_kehadiran', $simpan);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Data Berhasil DiTambahkan!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>');
              redirect('/admin/dataAbsensi');

            }

            $data['title'] = "Form Input Absensi";
            
            if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $bulantahun = $bulan.$tahun;
            }else{
                $bulan = date('m');
                $tahun = date('Y');
                $bulantahun = $bulan.$tahun;
            }

            $data['input_absensi'] = $this->db->query("SELECT data_trainer.*, data_jabatan.nama_jabatan FROM data_trainer
            INNER JOIN data_jabatan ON data_trainer.jabatan = data_jabatan.nama_jabatan
            WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_trainer.nik = data_kehadiran.nik ) ORDER BY data_trainer.nama_trainer ASC
            ")->result();
            $this->load->view('templates_admin/header',$data);
            $this->load->view('templates_admin/sidebar');
            $this->load->view('admin/formInputAbsensi',$data);
            $this->load->view('templates_admin/footer');
        }
    }
?>