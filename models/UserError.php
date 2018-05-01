<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserError
 *
 * @author H.M. van Dijk
 */
class UserError {
    
    protected $message;
    
    public function setMessage($message){
        $this->message = $message;
    }
    
    public function getMessage(){
        return $this->message;
    } 
}
