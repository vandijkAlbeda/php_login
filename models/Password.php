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
    
    private $foutMelding = array(
        "Bevat ongeldige tekens",
        "Bevat te weinig hoofdletters",
        "Bevat te weinig speciale tekens",
        "Bevat te weinig cijfers",
        "Bevat te weinig kleine letters"
    );
    
    public function __construct($password, $ErrorOn) {
        if ($ErrorOn==TRUE){
            parent::setStandardWarningOn();
        }
        else{
            parent::setStandardWarningOff();            
        }
        
        if($this->checkLengthBetweenLimits($password)){
            $ascii = new Ascii();
            $tellers = $ascii->getVoorwaarden();
            $this->password = $password;  
            $index = strlen($password)-1;
            do{
                $waarde = $ascii->leesTellerNummer(ord($password[$index]));
                
                $tellers[$waarde] = $tellers[$waarde] - 1;
                
                $index--;                
            }
            while($index > -1);
            $tellers[0] = $tellers[0] * -1;
            
            /*
             * De boolval functie maakt van het getal 0 een FALSE. Gedurende
             * de loop is de waarde van de index > 0 en dus TRUE.
             * 
             * De while loop moet worden verlaten als $goed FALSE wordt en de
             * $index 0 wordt. Of als beide FALSE zijn (als het eerste teken van
             * het password verkeerd is.
             * 
             * $goed  | boolval($index) | uitkomst
             * -----------------------------------------
             * false  |     false       | false
             * false  |     true        | false
             * true   |     false       | false
             * true   |     true        | true  (= loop)
             * -----------------------------------------
            */        
            $index = count($tellers);
            $correct = TRUE;
            do{
                $index--;
                if ($tellers[$index] > 0){
                    $this->obj_Error->setMessage ($this->foutMelding[$index]);
                    $correct = FALSE;                        
                }
                $doorgaan = $correct && boolval($index);
            }while($doorgaan);
            $this->correct = $correct;                
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
            $this->obj_Error->setMessage
               ("Password voldoet niet aan de lengte eisen");            
        }
        return $returnValue;
    } 
}
