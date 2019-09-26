<?php 

//Directory
const ROOT_DIR = 'http://localhost/azfestival/';
const IMAGE_DIR = 'http://localhost/azfestival/images/';

//Session timeout variable
$config['session_timeout'] = 1099999 * 60; //seconds

//Mailer Variables
const SMTP_HOST = 'smtp.mailtrap.io';
const SMTP_PORT = 2525;
const SMTP_USER = '81b1fb911c1cb9';
const SMTP_PASS = 'e5db0ec8da2826';

//Include Objects
include('includes/Dbh.class.php');
include('includes/Leader.class.php');
include('includes/Group.class.php');

//Create Objects
$Leader = new Leader();
$Group = new Group();
