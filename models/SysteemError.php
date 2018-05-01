<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SysteemError
 *
 * @author H.M
 */
include_once '../models/UserError.php';

class SysteemError extends UserError{
    // SystemError is een subklasse
    private $foutCode;
    private $module;
      
    public function setErrorModule($module){
        $this->module = $module;
    }
}
