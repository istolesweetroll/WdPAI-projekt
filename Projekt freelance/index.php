<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('main', 'DefaultController');
Router::get('signup', 'DefaultController');
Router::post('register', 'SecurityController');
Router::get('accountsettings', 'DefaultController');
Router::get('deleteproject', 'DefaultController');
Router::get('newproject', 'DefaultController');
Router::post('addnewproject', 'SecurityController');
Router::post('saveEntry', 'SecurityController');
Router::get('newentry', 'DefaultController');
Router::get('projectentries', 'DefaultController');
Router::get('addentrymanually', 'DefaultController');
Router::get('forgotpassword1', 'DefaultController');
Router::get('forgotpassword2', 'DefaultController');
Router::get('forgotpassword3', 'DefaultController');
Router::get('editproject', 'DefaultController');
Router::get('completeproject', 'DefaultController');
Router::get('seeprojectinfo', 'DefaultController');
Router::get('starttimer', 'DefaultController');
Router::get('timer', 'DefaultController');
Router::get('manageprojects', 'DefaultController');

Router::run($path);