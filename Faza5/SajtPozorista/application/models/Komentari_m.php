<?php

class Komentari_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert($creatorUsername/* ,TODO $predstavaID) */) {
        $data = array(
            'Tekst' => $this->input->post('tekst'),
            //TODO 'PredID' => $predstavaID
            'Username' => $creatorUsername
        );
        return $this->db->insert('komentar', $data);
    }

    public function find(/* TODO $predstavaID */) {
        //$query = $this->db->get_where('komentar', array('PredID' => $predstavaID));
        $query = $this->db->get('komentar');
        return $query->result_array();
    }

    public function removeOne($id) {
        $this->db->delete('komentar', array('KomID' => $id));
    }

}
