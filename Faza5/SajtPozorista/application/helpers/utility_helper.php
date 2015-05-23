<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function asset_url($path) {
    return base_url() . 'assets/' . $path;
}

function route_url($path) {
    return base_url() . 'index.php/' . $path;
}

function checkPermission($allowed, $role) {
    if (!is_array($allowed) || !is_string($role)) {
        return FALSE;
    }
    return in_array($role, $allowed);
}

function display_image($folder, $fileName, $replaceImg) {
    $filePath = './assets/img/' . $folder . '/' . $fileName;
    if (file_exists($filePath) && $fileName){
        return base_url() . 'assets/img/' . $folder . '/' . $fileName;
    }else{
        return asset_url('img/' . $replaceImg);
    }
}
