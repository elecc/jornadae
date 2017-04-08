<?php 
/*

$Id: model_div.php, v 1.0.1 2015/07/16

Copyright (C) 2015 Guillermo Omar Martinez Toledo

This file is part of GRID

GRID is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.

If you have any questions or comments, please email:

Guillermo Omar Martinez Toledo
motorokero.om@gmail.com
5526707307
Mexico DF

*/
class Model_map{
		var $div;
        var $id;
        var $name;
        var $class;
		var $style;
        var $arrayElement;
        var $mapID;
		function __construct() {
          $this->initElements();
        }
                       
        public function setId($id){
        	$this->id = " id= '".$id."'";
        	$this->mapID = $id;
        }
        
        public function getId(){
        	return $this->id;
        }
		
		public function setStyle($style){
        	$this->style = " style= '".$style."'";
        }
        
        public function getStyle(){
        	return $this->style;
        }
        
        public function setName($name){
        	$this->name = " name= '".$name."'";
        }
        
        public function getName(){
        	return $this->name;
        }
        
        public function setClass($class){
        	$this->class = " class= '".$class."'";
        }
        
        public function getClass(){
        	return $this->class;
        }
       
        public function addElement($value){
        	$this->arrayElement[] = $value;
        }
        
 		public function buildDiv(){
        	$this->div.= $this->getId(). $this->getStyle() . $this->getClass() . $this->getName() . '>';
        	foreach ($this->arrayElement as $value){
        		$this->div.= $value;
        	}
        	
        	$this->div.='</div><script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQICrE5LsqSKFY3g_fJ1q4sM1CLZBSAWo&signed_in=true&libraries=places&callback='.$this->mapID.'" async defer></script>';
        }

        public function getDiv(){
        	return $this->div;
        }
        
        public function initElements(){
        	$this->div = ' <div ';
        	$this->id = '';
			$this->style = '';
        	$this->name = '';
        	$this->class = '';
        	$this->arrayElement = array();
        }
        
}
?>