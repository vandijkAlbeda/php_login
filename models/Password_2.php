 <?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Password
 * 2 x cijfer
 * 2 x hoofdletter
 * toegestane speciale tekens: []<>!?#&
 * minimale lengte van 8 en maximaal 25
 *
 * @author H.M. van Dijk
 */
include_once '../models/ascii.php';
include_once '../models/Login.php';

class Password extends Login{
    private $minPasswordLength = 8;
    private $maxPasswordLength = 25;

    private $password;
    private $tellers = array(0,2,0,2,0);
    /*
     * Indexen van de $tellers array:
     * -----------------------------
     * index 0 -> Foutieve tekens
     * index 1 -> Hoofdletters
     * index 2 -> Speciale tekens
     * index 3 -> Cijfers
     * index 4 -> kleine letters
     */
    
    private $foutMelding = array(
        "Bevat een ongeldig karakter",
        "Bevat te weinig hoofdletters",
        "Bevat te weinig speciale tekens",
        "Bevat te weing cijfers",
        "Bevat te weinig kleine letters"
    );
    
    public function __construct($password) {

        if($this->checkLengthBetweenLimits($password)){
            $this->password = $password;             
            $ascii = new Ascii();            
 
            $index = strlen($password)-1;
            do{
                $waarde = $ascii->leesTellerNummer(ord($password[$index]));
                $this->tellers[$waarde] = $this->tellers[$waarde] - 1;                
                $index--;                
            }
            while($index > -1);
            
            $tellers[0] = $tellers[0] * -1;            
            $index = count($this->tellers) - 1;
            $fout = TRUE;
            do{
                $index--;
                if ($this->tellers[$index] > 0){
                    $this->obj_Error = new UserError();
                    $this->obj_Error->setMessage
                       ($this->foutMelding[$index]);
                        $fout = FALSE;                        
                }
                $loop = $fout && boolval($index);
            }while($loop);
            $this->correct = $fout;                
        }
    }
    
    private function checkLengthBetweenLimits($password){
        $returnValue = FALSE;
        $passwordLength = strlen($password);
        if ($passwordLength  < $this->maxPasswordLength + 1
                &&
            $passwordLength  > $this->minPasswordLength - 1){ 
            $returnValue = TRUE;            
        }
        else{
            $this->obj_Error = new UserError();
            $this->obj_Error->setMessage
               ("Password voldoet niet aan de lengte eisen");            
        }
        return $returnValue;
    }  
}
