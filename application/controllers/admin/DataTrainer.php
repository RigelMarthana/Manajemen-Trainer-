<?php

class dataTrainer extends CI_Controller {
    public function index()
    {
        $data['title'] = "Data Pegawai";
        $data['trainer'] = $this->penggajianModel->get_data('data_trainer')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dataTrainer',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahData()
    {
        $data['title'] = "Tambah Data";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formTambahTrainer',$data);
        $this->load->view('templates_admin/footer');
    }

    public function tambahDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->tambahData();
        }else{
            $nik                = $this->input->post('nik');
            $nama_trainer       = $this->input->post('nama_trainer');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $tanggal_masuk      = $this->input->post('tanggal_masuk');
            $jabatan            = $this->input->post('jabatan');
            $status             = $this->input->post('status');
            $photo              = $_FILES['photo']['name'];
            if($photo='' ){}else{
                $config ['upload_path'] = 'assets/photo';
                $config ['allowed_types'] = 'jpg|jpeg|png|tif';
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('photo')){
                    echo "Photo Gagal Diupload";
                }else{
                    $photo=$this->upload->data('file_name');
                }
            }

            $data = array(
                'nik'               => $nik,
                'nama_trainer'      => $nama_trainer,
                'jenis_kelamin'     => $jenis_kelamin,
                'jabatan'           => $jabatan,
                'tanggal_masuk'     => $tanggal_masuk,
                'status'            => $status,
                'photo'             => $photo,
            );

            $this->penggajianModel->insert_data($data, 'data_trainer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil DiTambahkan!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
          redirect('/admin/dataTrainer');
        }
    }

    public function updateData($id)
    {
        $where = array('id_trainer' => $id);
        $data['title'] = "Update Data Pegawai";
        $data['jabatan'] = $this->penggajianModel->get_data('data_jabatan')->result();
        $data['trainer'] = $this->db->query("SELECT * FROM data_trainer WHERE id_trainer = '$id'")->result();
        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/formUpdateTrainer',$data);
        $this->load->view('templates_admin/footer');
    }

    public function updateDataAksi()
    {
        $this->_rules();

        if($this->form_validation->run() == FALSE){
            $this->updateData();
        }else{
            $id                 = $this->input->post('id_trainer');
            $nik                = $this->input->post('nik');
            $nama_trainer       = $this->input->post('nama_trainer');
            $jenis_kelamin      = $this->input->post('jenis_kelamin');
            $tanggal_masuk      = $this->input->post('tanggal_masuk');
            $jabatan            = $this->input->post('jabatan');
            $status             = $this->input->post('status');
            $photo              = $_FILES['photo']['name'];
            if($photo){
                $config ['upload_path'] = 'assets/photo';
                $config ['allowed_types'] = 'jpg|jpeg|png|tif';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('photo')){
                    $photo=$this->upload->data('file_name');
                    $this->db->set('photo',$photo);
                }else{
                    echo $this->upload->display_errors();
                }
            }

            $data = array(
                'nik'               => $nik,
                'nama_trainer'      => $nama_trainer,
                'jenis_kelamin'     => $jenis_kelamin,
                'jabatan'           => $jabatan,
                'tanggal_masuk'     => $tanggal_masuk,
                'status'            => $status,
            );

            $where = array(
                'id_trainer' => $id
            );



            $this->penggajianModel->update_data('data_trainer', $data, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Data Berhasil DiUpdate</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
          redirect('/admin/dataTrainer');
        }
    }

    public function _rules()
    {
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('nama_trainer','nama trainer','required');
        $this->form_validation->set_rules('jenis_kelamin','jenis kelamin','required');
        $this->form_validation->set_rules('jabatan','jabatan','required');
        $this->form_validation->set_rules('tanggal_masuk','tangal masuk','required');
        $this->form_validation->set_rules('status','status','required');

    }

        public function deleteData($id){
        $where = array('id_trainer' => $id);
        $this->penggajianModel->delete_data($where, 'data_trainer');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Data Berhasil DiHapus!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>');
          redirect('/admin/dataTrainer');
    }
}
?>