<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
function showHeader($title){
    echo "<html>";    
    echo "<head>";
    echo "<meta charset=\"UTF-8\">";
    echo "<title>".$title."</title>";
    echo "</head>";
}

function showBodyStart(){
    echo "<body>";
}

function showBodyEnd(){
     echo "</body> </html>";
}

function showForm(){
    echo "<form "
        . "method=\"post\" "
        . "action=\"./controllers/login.php\" >";
    showGebruikersnaam();
    showPassword();
    echo "<input "
        . "type =\"submit\" "
        . "value =\"login\" "
        . "name=\"submit\" />";
    echo "</form>";
}
            
function showGebruikersnaam(){
    echo "<label for= \"gebruikersnaam\">Gebruikersnaam </label><br />";
    echo "<input "
        . "id= \"username\" "
        . "type=\"text\" "
        . "name = \"username\" />"
        . "<br /><br />";       
 }

function showPassword(){
    echo "<label for= \"password\">Password </label> <br />";        
    echo "<input "
        . "id= \"password\" "
        . "type=\"text\" "
        . "name = \"password\" />"
        . "<br /><br />";   
 }
 
 function showWarning(){
     echo "<br />  <br />";
 } 
 
