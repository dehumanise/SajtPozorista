<?php

include_once APPPATH . '/controllers/Base.php';

class Register extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('user');
    }

    protected function obrada($data = NULL) {
        //this view is for non-registered users only
        if (!checkPermission(array('neregistrovan'), $this->userRole)){
            redirect(route_url(''));
        }else{
            $this->load->view('register', $data);
        }
    }

    public function registerUser() {
        $this->validation();
        if ($this->form_validation->run() === FALSE) {
            $this->view();
        } else {
            $ret = $this->user->insert();
            if ($ret) {
                redirect(route_url('login/successfulRegister'));
            } else {
                $data['dberror'] = $this->db->error();
                $this->view($data);
            }
        }
    }

    private function validation() {
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[5]|max_length[20]|is_unique[korisnik.Username]', array(
            'min_length' => 'Minimum length for Username is 5',
            'max_length' => 'Maximum length for Username is 20',
            'is_unique' => 'Username already exists!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[20]', array(
            'min_length' => 'Minimum length for Password is 6',
            'max_length' => 'Maximum length for Password is 20'
        ));
        $this->form_validation->set_rules('passwordagain', 'Ponovite lozinku', 'trim|required|matches[password]', array(
            'matches' => 'Passwords does not match'
        ));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[30]|is_unique[korisnik.Email]', array(
            'valid_email' => 'Invalid Email',
            'max_length' => 'Maximum length for Email is 30',
            'is_unique' => 'Email already used!'
        ));
        $this->form_validation->set_rules('role', 'Role', 'required');
        $this->form_validation->set_rules('telefon', 'Telefon', 'trim|required|max_length[30]', array(
            'max_length' => 'Maximum length for Telefon is 15'
        ));
        $this->form_validation->set_rules('birthyear', 'Godina rodjenja', 'required');
    }

}
