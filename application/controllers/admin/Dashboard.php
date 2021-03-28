<?php

class Dashboard extends CI_Controller {
    public function index() {
        $data['title'] = "Dashboard";
        $trainer = $this->db->query("SELECT * FROM data_trainer");
        $data['trainer'] = $trainer->num_rows();

        $admin = $this->db->query("SELECT * FROM data_trainer WHERE jabatan = 'Admin'");
        $data['admin'] = $admin->num_rows();

        $jabatan = $this->db->query("SELECT * FROM data_jabatan");
        $data['jabatan'] = $jabatan->num_rows();
        
        $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
        $data['kehadiran'] = $kehadiran->num_rows();

        $this->load->view('templates_admin/header',$data);
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/dashboard',$data);
        $this->load->view('templates_admin/footer');
    }
}
?>