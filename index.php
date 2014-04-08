<?php
/**
 *index page for the Test Tube 
 *
 *contains Bootloader
 * 
 */


include  'config.inc.php';

include lib_add.'/autoloader.php';

spl_autoload_register("autoloaderClass");

$app = new Bootstrap();