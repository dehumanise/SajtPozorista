<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Home
 *
 * @author LukaWin7
 */

abstract class Base extends CI_Controller {

    protected $userRole;
    
    public function __construct() {
        parent::__construct();
        //Rola korisnika (ako nema - neregistrovan)
        $this->userRole = $this->session->role ? $this->session->role : "neregistrovan";
    }
    
    abstract protected function obrada();
    
    public function view($data = NULL) {
        $this->load->view('templates/header');
        $this->load->view('templates/' . $this->userRole . '/menu');
        $this->obrada($data);
        $this->load->view('templates/footer');
    }

}
