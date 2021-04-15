<?php

class Dashboard extends CI_Controller {
    public function index() {   
        $data['title'] = "Dashboard";
        $id = $this->session->userdata('id_trainer');
        $data['pegawai'] = $this->db->query("SELECT * FROM data_trainer WHERE id_trainer = '$id'")->result();
        $this->load->view('templates_pegawai/header',$data);
        $this->load->view('templates_pegawai/sidebar');
        $this->load->view('pegawai/dashboard',$data);
        $this->load->view('templates_pegawai/footer');
    }
}
?>