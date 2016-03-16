<?php
/*
 * Version: 1.0, 31.05.2012
 * by Adam Wysocki, goldpaid777@gmail.com
 *
 * Copyright (c) 2012 Adam Wysocki
 *
 *	This is simply JS -> PHP connector
 *
*/

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
//header('Access-Control-Max-Age: 604800');
//if you need special headers
header('Access-Control-Allow-Headers: x-requested-with');

// Some xampp fixing :/
$_GET['o'] = isset($_GET['o']) ? $_GET['o'] : '';
$_GET['c'] = isset($_GET['c']) ? $_GET['c'] : '';

if($_GET['o']!='exec_AJAX') ob_start();


//ob_start("ob_gzhandler"):

//ini_set('zlib.output_compression_level', 4);


$home=true;
//session_unset();session_destroy();
// print_r($_SESSION);
session_start();

// Require some usefull functions
require_once('func/once.php');

// Config need to be inclued with $_SESSION['project_id'] inside and name to identify project
require_once('config.php');

// Required classes
require_once('class/core.class.php');

// Require connector class on type
require_once('class/'.$_GET['c'].'.class.php');

// CREATE OBJECT CLASS -------------------
$once = new once($_CONFIG);

// Require connector depends on type and let it do work
require_once('view/'.$_GET['c'].''.($_GET['o']==''?'':'-'.$_GET['o']).'.php');
?>