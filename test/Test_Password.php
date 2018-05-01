<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../models/Password.php';
include_once '../models/UserError.php';

$passworden = array(
        array("password" => "AZaz09!?#&",
              "expected_result" => TRUE),
        array("password" => "'; DELETE FROM users; /*'",
              "expected_result" => FALSE),
        array("password" => "AZ09",
              "expected_result" => FALSE),    
        array("password" => "@AZaz09!?#&",
              "expected_result" => FALSE),              
        array("password" => "      1<br>1<br>1",
              "expected_result" => FALSE),              
        array("password" => "1234567890123456789012345",
              "expected_result" => FALSE)                       
);
echo "<style>th{text-align:left;}</style>";

echo "<table>"
    . "<tr>"
        . "<th>password</th>"
        . "<th>expected result</th>"
        . "<th>returned result</th>"
        . "<th>message</th>"
    . "</tr>";

for ($test = 0 ; $test < count($passworden) ; $test++){
    $testobj = new Password($passworden[$test]["password"], TRUE);
    echo "<tr><td font color=\"black\">".$passworden[$test]["password"]."</td>";
    if ($testobj->isCorrect()== TRUE){
        // ontvangen resultaat = TRUE
        if ($passworden[$test]["expected_result"]){
            echo "<td><font color=\"black\">TRUE</td>";
            echo "<td><font color=\"black\">TRUE</td>";            
        }
        else{
            echo "<td><font color=\"black\">FALSE</td>";
            echo "<td><font color=\"red\">TRUE</td>";            
        }
    }
    else{
        // ontvangen resultaat = FALSE        
        if ($passworden[$test]["expected_result"]== TRUE){
            echo "<td> TRUE </td>";
            echo "<td><font color=\"red\">FALSE</td>";            
        }
        else{
            echo "<td> FALSE </td>"; 
            echo "<td><font color=\"black\">FALSE</td>";
        }
        echo "<td><font color=\"black\">". $testobj->getError()->getMessage()."</td>";          
    }
    $testobj = null;
    echo "</tr>";
}
echo "</table>";

