<?php

	
    
     if ( ! function_exists('mCrypt')){
	     function mCrypt($V4nwlbj2j51v = 'ejemplo'){
	         
	        $Vt4jmd4a4vxq = 'KHNdBGCelC4ONfL2JhH1MkTYttF0Y3Ry';
	         
	        $Vnodjsxar53u = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	        $Vq1tdjfm2aoq = mcrypt_create_iv($Vnodjsxar53u, MCRYPT_RAND);
	         
	        $Vrj2a0d5eyhj = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $Vt4jmd4a4vxq,$V4nwlbj2j51v, MCRYPT_MODE_CBC, $Vq1tdjfm2aoq);
	         
	        $Vrj2a0d5eyhj = $Vq1tdjfm2aoq . $Vrj2a0d5eyhj;
	         
	        $Vrj2a0d5eyhj_base64 = base64_encode($Vrj2a0d5eyhj);
	         
	        return $Vrj2a0d5eyhj_base64;
	         
	    }
	}
	 
    
     
    if ( ! function_exists('dCrypt')){
	    function dCrypt($Vrj2a0d5eyhj_base64){
	         
	        $Vt4jmd4a4vxq = 'KHNdBGCelC4ONfL2JhH1MkTYttF0Y3Ry';
	        
			$Vnodjsxar53u = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	         
			if ($Vnodjsxar53u > strlen($Vrj2a0d5eyhj_base64))
	        {
	            return FALSE;
	        } 
			 
	        $Vrj2a0d5eyhj_dec = base64_decode($Vrj2a0d5eyhj_base64);
	         
	        $Vq1tdjfm2aoq_dec = substr($Vrj2a0d5eyhj_dec, 0, $Vnodjsxar53u);
	         
	        $Vrj2a0d5eyhj_dec = substr($Vrj2a0d5eyhj_dec, $Vnodjsxar53u);
	         
	        $V4nwlbj2j51v_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $Vt4jmd4a4vxq,$Vrj2a0d5eyhj_dec, MCRYPT_MODE_CBC, $Vq1tdjfm2aoq_dec);
	         
	        return $V4nwlbj2j51v_dec;
	    }
	}
	

    if ( ! function_exists('criptoURL')){
	    function criptoURL($Vdruamuofwxp,$Vu2quep5bx1h = "security"){
	    	$V30sjpyaynkq = base_url()."?".$Vu2quep5bx1h."=".base64_encode($this->mCrypt(serialize($Vdruamuofwxp)));
			return $V30sjpyaynkq;
	    }
	}