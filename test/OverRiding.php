<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once '../models/StandardError.php';
include_once '../models/UserError.php';

$obj = new StandardError();
echo "Ik maak een object van de klasse StandardError <br />";
$obj->setMessage("test");
echo $obj->getMessage();
echo "<br />-----------------------------------<br />";
echo "Ik maak een object van de klasse UserError <br />";
$obj = new UserError();
$obj->setMessage("test");
echo $obj->getMessage();
