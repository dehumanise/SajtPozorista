<?php

class Predstave_m extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function insert($creatorUsername, $fileName) {
        $data = array(
            'PozID' => $this->input->post('pozID'),
            'Naziv' => $this->input->post('naziv'),
            'Glumci' => $this->input->post('glumci'),
            'Reziser' => $this->input->post('reziser'),
            'Slika' => $fileName,
            'Username' => $creatorUsername
        );
        return $this->db->insert('predstava', $data);
    }

    public function findOne($id) {
        $query = $this->db
        ->select('predstava.PozID, predstava.predID AS PredID, pozoriste.Naziv AS Pozoriste, predstava.Naziv 
        AS Naziv, predstava.Glumci as Glumci, predstava.Reziser AS Reziser, predstava.Slika AS Slika')
        ->from('predstava')
        ->join('pozoriste','pozoriste.PozID = predstava.PozID')
        ->where(array('PredID' => $id))
        ->get();
        return $query->row_array();
    }

    public function find() {
        $this->db->select('PredID, Naziv, Slika');
        $query = $this->db->get('predstava');
        return $query->result_array();
    }

    public function findSpecific($pozID) {
        $this->db->select('PredID, Naziv, Slika')
        ->where(array('PozID' => $pozID));
        $query = $this->db->get('predstava');
        return $query->result_array();
    }

    public function removeOne($id) {
        $this->db->delete('predstava', array('PredID' => $id));
    }

    public function update($fileName) {
        $data = array(
            'PozID' => $this->input->post('pozID'),
            'Naziv' => $this->input->post('naziv'),
            'Glumci' => $this->input->post('glumci'),
            'Reziser' => $this->input->post('reziser')
        );
        if($fileName){
            $data['Slika'] = $fileName;
        }
        $this->db->where('PredID', $this->input->post('PredID'));
        $this->db->update('predstava', $data);
    }

}
