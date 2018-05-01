<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author H.M
 */
require_once '../models/UserError.php';
require_once '../models/StandardError.php';

abstract class Login {
    protected $obj_Error;
    protected $correct = FALSE;
    
    public function isCorrect(){
        return $this->correct;
    }
    
    public function getError(){
        return $this->obj_Error;
    }
    
    // beschikbaar alleen in sub klassen
    protected function setStandardWarningOn(){
        $this->obj_Error = new StandardError();        
    }
    
    //beschikbaar alleen in subklassen
    protected function setStandardWarningOff(){
        $this->obj_Error = new UserError();       
    }  
}
