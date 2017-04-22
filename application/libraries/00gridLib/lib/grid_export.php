<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('query_to_export'))
{
	
	
    function query_to_export(&$Vle3ldyht4v2,$Vpoae2jcihwa, $Vcwdt0qjvmsj = TRUE,&$V3nre3jsr3sn,$Vx21w2sesbf5)
    {
        if ( ! is_object($Vle3ldyht4v2))
        {
            show_error('invalid db');
        }
        
        $Vrdfbcgbrri2 = array();
       
	   	if(!empty($Vx21w2sesbf5)){
			if ($Vcwdt0qjvmsj)
	        {
	        		$Vzt1vytatydb = $Vle3ldyht4v2->query_field_name($Vpoae2jcihwa);
					$Vwvctbaco5e5 = array();
	       
		            $Voach3ypk2tq = array();
		            
		            foreach ($V3nre3jsr3sn as $Vt4jmd4a4vxq => $Vp51e4nhpi1e){
		            	$Ve54ae0gczsk = $Vt4jmd4a4vxq;
		            	$Vt4jmd4a4vxq = str_replace('.', '_', $Vt4jmd4a4vxq);
		            	if(isset($Vx21w2sesbf5[$Vt4jmd4a4vxq])){
		            		if(!$Vp51e4nhpi1e->hide_column){
		            			if(in_array($Vp51e4nhpi1e->alias, $Vzt1vytatydb)){
		            				$Voach3ypk2tq[$Vp51e4nhpi1e->alias] = true;
				            		$Vwvctbaco5e5[] = $Vp51e4nhpi1e->display_front_end;
				      	    	}else
				      	    		unset($V3nre3jsr3sn[$Ve54ae0gczsk]);
				      	   	}else
				      	  		unset($V3nre3jsr3sn[$Ve54ae0gczsk]);
				      	}else
				      	  	 unset($V3nre3jsr3sn[$Ve54ae0gczsk]);
				    }
		            
					$Vrdfbcgbrri2[] = $Vwvctbaco5e5;
			}
        	
			$Vdruamuofwxp = $Vle3ldyht4v2->query($Vpoae2jcihwa);
			
	        foreach ($Vdruamuofwxp as $Vqnevr1zyszc)
	        {
	        	$Vwvctbaco5e5 = array();
	        	foreach ($Vqnevr1zyszc as $Vt4jmd4a4vxq => $Vgpp2pnyqe1h)
	        	{
	        		if(isset($Voach3ypk2tq[$Vt4jmd4a4vxq])){
	        			$Vwvctbaco5e5[] = $Vgpp2pnyqe1h;
	        		}
	        	}
	        	$Vrdfbcgbrri2[] = $Vwvctbaco5e5;
	        }
	   }
        return $Vrdfbcgbrri2;
    }
}
