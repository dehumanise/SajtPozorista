<?php

class Vesti_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert($creatorUsername) {
        $data = array(
            'Naslov' => $this->input->post('naslov'),
            'Sadrzaj' => $this->input->post('sadrzaj'),
            //TODO 'Slika' => ...,
            'Username' => $creatorUsername
        );
        return $this->db->insert('vest', $data);
    }

    public function findOne($id) {
        $query = $this->db->get_where('vest', array('VestID' => $id));
        return $query->row_array();
    }

    public function find() {
        $this->db->select('VestID, Naslov');
        $query = $this->db->get('vest');
        return $query->result_array();
    }

    public function removeOne($id) {
        $this->db->delete('vest', array('VestId' => $id));
    }

    public function update() {
        $data = array(
            'Naslov' => $this->input->post('naslov'),
            'Sadrzaj' => $this->input->post('sadrzaj'),
            //TODO 'Slika' => ...
        );
        $this->db->where('VestID', $this->input->post('VestID'));
        $this->db->update('vest', $data);
    }

}
