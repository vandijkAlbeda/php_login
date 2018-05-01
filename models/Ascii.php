<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Ascii
 *
 * @author H.M
 */
class Ascii {
    const AANTAL_HOOFDLETTERS = 2;
    const AANTAL_SPECIALE_TEKENS = 0;
    const AANTAL_CIJFERS = 2;
    const AANTAL_KLEINE_LETTERS = 0;
    
    private $tellers = array(0,
        self::AANTAL_HOOFDLETTERS,
        self::AANTAL_SPECIALE_TEKENS,
        self::AANTAL_CIJFERS,
        self::AANTAL_KLEINE_LETTERS);
    
    private $m_ascii = array( 
        0,0,0,0,0,0,0,0,0,0,  // 0
        0,0,0,0,0,0,0,0,0,0,  // 10
        0,0,0,0,0,0,0,0,0,0,  // 20
        0,0,0,2,0,2,0,0,2,0,  // 30
        0,0,0,0,0,0,0,0,3,3,  // 40
        3,3,3,3,3,3,3,3,0,0,  // 50
        2,0,2,2,0,1,1,1,1,1,  // 60
        1,1,1,1,1,1,1,1,1,1,  // 70
        1,1,1,1,1,1,1,1,1,1,  // 80
        1,1,0,2,0,0,0,4,4,4,  // 90
        4,4,4,4,4,4,4,4,4,4,  // 100
        4,4,4,4,4,4,4,4,4,4,  // 110
        4,4,4,0,0,0,0,0,0,0,  // 120
        0,0,0,0,0,0,0,0,0,0,  // 130
        0,0,0,0,0,0,0,0,0,0,  // 140
        0,0,0,0,0,0,0,0,0,0,  // 150
        0,0,0,0,0,0,0,0,0,0,  // 160
        0,0,0,0,0,0,0,0,0,0,  // 180
        0,0,0,0,0,0,0,0,0,0,  // 190
        0,0,0,0,0,0,0,0,0,0,  // 200
        0,0,0,0,0,0,0,0,0,0,  // 210
        0,0,0,0,0,0,0,0,0,0,  // 220
        0,0,0,0,0,0,0,0,0,0,  // 230
        0,0,0,0,0,0,0,0,0,0,  // 240
        0,0,0,0,0,0,0,0,0,0,  // 250
        0,0,0,0,0,0);  // 255      

        public function leesTellerNummer($asciiWaarde){
            return $this->m_ascii[$asciiWaarde];
        }
        public function getVoorwaarden(){
            return $this->tellers;
        }

}
