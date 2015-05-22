<?php

class User extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert() {
        $zeliPostu = $this->input->post('posta') == 'on' ? 1 : 0;
        $starost = date("Y") - $this->input->post('birthyear');
        $data = array(
            'Username' => $this->input->post('username'),
            'Password' => $this->input->post('password'),
            'Email' => $this->input->post('email'),
            'Role' => $this->input->post('role'),
            'ZeliPostu' => $zeliPostu,
            'Telefon' => $this->input->post('telefon'),
            'Starost' => $starost,
        );
        return $this->db->insert('korisnik', $data);
    }

    public function findOne() {
        $username = $this->input->post('username');
        $query = $this->db->get_where('korisnik', array('Username' => $username));
        return $query->row_array();
    }

    public function makeSession($userData) {
        $this->session->set_userdata($userData);
    }

}
