<?php

class dataTrainer extends CI_Controller {
    public function index(){
        $data = $this->db->query("SELECT * FROM data_trainer")->result();
        var_dump($data);
    }
}
?>