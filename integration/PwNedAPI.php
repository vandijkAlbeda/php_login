<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PwnedAPI
 *
 * @author H.M
 */
class PwNedAPI {
    private $URL ="https://haveibeenpwned.com/api/v2/breachedaccount/";
    private $emailAdress;
    private $jsonData;
    private $curlObj;
    
    public function __construct($emailAdress) {
        $this->emailAdress = $emailAdress;
        $this->curlObj = curl_init();
        $this->setOptions(); 
        $this->executeApi();
    }

    public function isPwned(){                   
        return boolval($this->jsonData);
    }
    
    public function getAantal(){
        return count($this->jsonData);
    }
    
    private function setOptions(){           
        curl_setopt($this->curlObj, CURLOPT_URL,$this->URL.$this->emailAdress);
        curl_setopt($this->curlObj, CURLOPT_USERAGENT, 'Pwnage-Checker-For-Android');
        curl_setopt($this->curlObj, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($this->curlObj, CURLOPT_RETURNTRANSFER, true );         
    }
    
    private function executeApi(){
        $tmp = curl_exec($this->curlObj);            
        if($tmp === false)
        {
            // some code
        }
        else
        {
            $this->jsonData = json_decode($tmp,TRUE);
        }
    }
}
