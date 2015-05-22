<?php

include_once APPPATH . '/controllers/Base.php';

class Vesti extends Base {

    private $viewIndicator;

    public function __construct() {
        parent::__construct();
        $this->load->model('vesti_m');
    }

    protected function obrada($data = NULL) {
        if ($this->viewIndicator === 'View') {
            $this->load->view('templates/' . $this->userRole . '/vest', $data);
        } elseif ($this->viewIndicator === 'Insert') {
            $this->load->view('templates/dodajVest', $data);
        } elseif ($this->viewIndicator === 'Update') {
            $this->load->view('templates/izmeniVest', $data);
        } else {
            $data['vesti'] = $this->vesti_m->find();
            $this->load->view('templates/' . $this->userRole . '/vesti', $data);
        }
    }

    public function vest($id) {
        $this->viewIndicator = 'View';
        $data['vest'] = $this->vesti_m->findOne($id);
        $this->view($data);
    }

    public function dodaj() {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->viewIndicator = 'Insert';
            $this->view();
        }
    }

    public function dodajVest() {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->validation();
            if ($this->form_validation->run() === FALSE) {
                $this->dodaj();
            } else {
                $ret = $this->vesti_m->insert($this->session->username);
                if ($ret) {
                    redirect(route_url('vesti/view'));
                } else {
                    $this->dodaj();
                }
            }
        }
    }

    public function izmeni($id) {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->viewIndicator = 'Update';
            $data['vest'] = $this->vesti_m->findOne($id);
            $this->view($data);
        }
    }

    public function izmeniVest() {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->validation();
            if ($this->form_validation->run() === FALSE) {
                $this->izmeni($this->input->post('VestID'));
            } else {
                $ret = $this->vesti_m->update();
                redirect(route_url('vesti/vest/' . $this->input->post('VestID')));
            }
        }
    }

    private function validation() {
        $this->form_validation->set_rules('naslov', 'Naslov', 'required');
        $this->form_validation->set_rules('sadrzaj', 'Sadrzaj', 'required');
    }

    public function obrisi($id) {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->vesti_m->removeOne($id);
            redirect('vesti/view');
        }
    }

}
