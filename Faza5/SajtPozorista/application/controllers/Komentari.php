<?php

include_once APPPATH . '/controllers/Base.php';

class Komentari extends Base {

    public function __construct() {
        parent::__construct();
        $this->load->model('komentari_m');
        $this->load->helper('form');
    }

    protected function obrada($data = NULL) {
        $data['Username'] = $this->session->username;
        $data['Role'] = $this->session->role;
        $data['komentari'] = $this->komentari_m->find(/* TODO ovde ide za odredjenu predstavu */);
        if (checkPermission(array('moderator', 'admin', 'kriticar', 'registrovan'), $this->userRole)) {
            $this->load->view('templates/dodajKomentar');
        }
        $this->load->view('templates/komentari', $data);
    }

    public function dodajKomentar() {
        if (!checkPermission(array('moderator', 'admin', 'kriticar', 'registrovan'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->validation();
            if ($this->form_validation->run() === FALSE) {
                //TODO redirect(route_url('ODREDJENA_PREDSTAVA'));
                //iako na klijentskoj strani isto treba da se proverava
                //i da do ovog nikad ne dodje
                $this->view();
            } else {
                $ret = $this->komentari_m->insert($this->session->username/* ,TODO predstava ID) */);
                if ($ret) {
                    //TODO redirect(route_url('ODREDJENA_PREDSTAVA'));
                    $this->view();
                } else {
                    //TODO redirect(route_url('ODREDJENA_PREDSTAVA'));
                    $this->view();
                }
            }
        }
    }

    private function validation() {
        $this->form_validation->set_rules('tekst', 'Tekst', 'required|trim');
    }

    public function obrisi($id, $creatorUsername) {
        if ((!checkPermission(array('moderator', 'admin'), $this->userRole)) && $this->session->username !== $creatorUsername) {
            redirect(route_url(''));
        } else {
            $this->komentari_m->removeOne($id);
            $this->view();
        }
    }

}
