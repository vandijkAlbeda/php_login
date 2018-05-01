<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of StandardError
 *
 * @author H.M. van Dijk
 */
require_once '../models/UserError.php';

class StandardError extends UserError{
    
    // override de getMessage() in the superklasse
    public function getMessage(){
        return "De inlogegevens zijn niet correct";
    }  
}
