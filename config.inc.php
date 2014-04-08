<?php
/*
*
*configuration file sfor system
*
*/

//enter the details of theme to load

$theme = 'theme1';

define('_DIR_','controller/');

define('web_add_theme' , 'http://10.9.20.56/view/'.$theme.'/');

define('view_add_theme','view/'.$theme.'/');

define('model_add','model/');

define('lib_add','lib/');

//configuration settings 

define('db_name', 'testube_db');

define('db_service', 'mysql');

define('db_host', 'localhost');

define('db_user', 'root');

define('db_pass', '');



//FOR DEBUGGING change it to true

define('DEBUG', false);

define('tb_strt','tt_');
