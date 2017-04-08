<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH.'/libraries/map/lib/class.model_engine_map.php';
    	
class Map extends Model_engine_map{ 
    public function __construct() { 
        parent::__construct(); 
    }
}
?>