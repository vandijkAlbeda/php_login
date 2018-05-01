<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '../models/Username.php';
include_once '../models/Password.php';
include_once '../models/UserError.php';

$username = new Username($_POST['username']);
$password = new Password($_POST['password']);

if ($username->isCorrect()){
    if($password->isCorrect()){
        echo "hoi - I am ready to search...";        
    }
    else{
        echo $password->getError()->getMessage();       
    }
}
else{
   echo $username->getError()->getMessage();
}
