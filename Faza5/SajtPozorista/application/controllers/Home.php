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
include_once APPPATH . '/controllers/Base.php';

class Home extends Base {

    protected function obrada($data = NULL) {
        $this->load->view('templates/home',$data);
    }

}
