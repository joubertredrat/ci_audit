<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
//Load Active Record manually
require_once(BASEPATH.'database/DB_driver.php');
require_once(BASEPATH.'database/DB_active_rec.php');
//Load my version of Active Record 
require_once(APPPATH. 'core/MY_DB_active_rec.php');
////Finally initialize the DB class
class CI_DB extends MY_DB_active_rec {} 
 
//In order to not break the loader class I will create my dummy loader class
class MY_Loader extends CI_Loader {}