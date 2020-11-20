<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
Tested working with PHP5.4 and above (including PHP 7 )

 */
require_once './vendor/autoload.php';

use FormGuide\Handlx\FormHandler;


$pp = new FormHandler(); 

$validator = $pp->getValidator();
$validator->fields(['name','email','telnum','comments'])->areRequired()->maxLength(50);
$validator->field('email')->isEmail();
$validator->field('comments')->maxLength(5000);
$validator->field('telnum')->is_numeric();



#$pp->sendEmailTo(['acs_systems@yahoo.com','apexcontrolsystems@gmail.com']); // ← Your email here
$pp->sendEmailTo(['apexcontrolsystems@gmail.com']); // ← Your email here

echo $pp->process($_POST);