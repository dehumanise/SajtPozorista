<?php

include_once APPPATH . '/controllers/Base.php';

class Predstave extends Base {

    private $viewIndicator;

    public function __construct() {
        parent::__construct();
        $this->load->model('predstave_m');
        /*$this->load->model('pozorista_m');*/
        $this->load->helper('form');
    }

    protected function obrada($data = NULL) {
        if ($this->viewIndicator === 'View') {
            $this->load->view('templates/' . $this->userRole . '/predstava', $data);
        } elseif ($this->viewIndicator === 'ViewSpecific') {
            $this->load->view('templates/' . $this->userRole . '/predstave', $data);
        } elseif ($this->viewIndicator === 'Insert') {
            /*$data['pozorista'] = $this->predstave_m->find();*/
            $data['pozorista'] = array(0 => array("PozID" => "1","Naziv" => "Srpsko Narodno Pozoriste"),1 => array("PozID" => "2","Naziv" => "Neko Drugo Pozoriste"));
            $this->load->view('templates/dodajPredstavu', $data);
        } elseif ($this->viewIndicator === 'Update') {
            /*$data['pozorista'] = $this->predstave_m->find();*/
            $data['pozorista'] = array(0 => array("PozID" => "1","Naziv" => "Srpsko Narodno Pozoriste"),1 => array("PozID" => "2","Naziv" => "Neko Drugo Pozoriste"));
            $this->load->view('templates/izmeniPredstavu', $data);
        } else {
            $data['predstave'] = $this->predstave_m->find();
            $this->load->view('templates/' . $this->userRole . '/predstave', $data);
        }
    }

    public function predstave($id) {
        $this->viewIndicator = 'ViewSpecific';
        $data['predstave'] = $this->predstave_m->findSpecific($id);
        $this->view($data);
    } 

    public function predstava($id) {
        $this->viewIndicator = 'View';
        $data['predstava'] = $this->predstave_m->findOne($id);
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

    public function dodajPredstavu() {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->validation();
            if ($this->form_validation->run() === FALSE) {
                $this->dodaj();
            } else {
                $this->loadUploadLibrary('predstave/');
                //Uploading image is NOT required!
                //So, first I check if the file exists
                //Only if the image IS uploaded AND there is an error in uploading I report error
                //More info https://blog.smalldo.gs/2013/03/optional-file-upload-field-codeigniter/
                if ($_FILES['slika'] && ($_FILES['slika']['size'] > 0) && !$this->upload->do_upload('slika')) {
                    $data = array('error' => $this->upload->display_errors());
                    $this->dodaj($data);
                } else {
                    $image = $this->upload->data();
                    $ret = $this->predstave_m->insert($this->session->username, $image['file_name']);
                    if ($ret) {
                        redirect(route_url('predstave/view'));
                    } else {
                        $this->dodaj();
                    }
                }
            }
        }
    }

    public function izmeni($id) {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->viewIndicator = 'Update';
            $data['predstava'] = $this->predstave_m->findOne($id);
            $this->view($data);
        }
    }

    public function izmeniPredstavu() {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->validation();
            if ($this->form_validation->run() === FALSE) {
                $this->izmeni($this->input->post('PredID'));
            } else {
                $this->loadUploadLibrary('predstave/');
                if ($_FILES['slika'] && ($_FILES['slika']['size'] > 0) && !$this->upload->do_upload('slika')) {
                    $data = array('error' => $this->upload->display_errors());
                    $this->dodaj($data);
                } else {
                    $image = $this->upload->data();
                    $fileName = $image['file_name'] ? $image['file_name'] : $_FILES['slika']['name'];
                    $this->predstave_m->update($fileName);
                    redirect(route_url('predstave/predstava/' . $this->input->post('PredID')));
                }
            }
        }
    }

    private function validation() {
        $this->form_validation->set_rules('naziv', 'Naziv', 'required');
    }

    public function obrisi($id) {
        if (!checkPermission(array('moderator', 'admin'), $this->userRole)) {
            redirect(route_url(''));
        } else {
            $this->predstave_m->removeOne($id);
            redirect('predstave/view');
        }
    }

}
