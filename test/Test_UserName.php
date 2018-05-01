<?php
/* 
 * Test voor de klasse Username.
 * 
 * Test designed by H.M. van Dijk
 */
include_once '../models/Username.php';
include_once '../models/UserError.php';

$emailadressen = array(
        array("emailadress" => "vandijk.albeda@gmail.com",
              "expected_result" => TRUE),
        array("emailadress" => "vandijk.albeda@gmailcom",
              "expected_result" => FALSE),            
        array("emailadress" => "vandijk.albeda@gmail@com",
              "expected_result" => FALSE),              
        array("emailadress" => "vandijk.albeda@gmail@.com",
              "expected_result" => FALSE),              
        array("emailadress" => "vandijk.albeda@gmail..com",
              "expected_result" => FALSE),              
        array("emailadress" => "vandijk.albeda@g.@mail",
              "expected_result" => FALSE),              
        array("emailadress" => "@gmailcom",
              "expected_result" => FALSE),              
        array("emailadress" => "@gmail..com",
              "expected_result" => FALSE),              
        array("emailadress" => "eda@g.com",
              "expected_result" => TRUE),              
        array("emailadress" => "vandijk.albedagmail.com",
              "expected_result" => FALSE),          
);
echo "<style>th{text-align:left;}</style>";

echo "<table>"
    . "<tr>"
        . "<th>email adress</th>"
        . "<th>expected result</th>"
        . "<th>returned result</th>"
        . "<th>message</th>"
    . "</tr>";

for ($test = 0 ; $test < count($emailadressen) ; $test++){
    $testobj = new Username($emailadressen[$test]["emailadress"]);
    echo "<tr><td font color=\"black\">".$emailadressen[$test]["emailadress"]."</td>";
    if ($testobj->isCorrect()== TRUE){
        if ($emailadressen[$test]["expected_result"]){
            echo "<td><font color=\"black\">TRUE</td>";
            echo "<td><font color=\"black\">TRUE</td>";            
        }
        else{
            echo "<td><font color=\"black\">TRUE</td>";
            echo "<td><font color=\"red\">FALSE</td>";            
        }
    }
    else{
        if ($emailadressen[$test]["expected_result"]== TRUE){
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