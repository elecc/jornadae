<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	/*
     * Encode
     * */
    if ( ! function_exists('mCrypt')){
	     function mCrypt($plaintext = 'ejemplo'){
	         
	        $key = 'KHNdBGCelC4ONfL2JhH1MkTYttF0Y3Ry';
	         
	        $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	         
	        $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);
	         
	        $ciphertext = $iv . $ciphertext;
	         
	        $ciphertext_base64 = base64_encode($ciphertext);
	         
	        return $ciphertext_base64;
	         
	    }
	}
    /*
     * Decode
     * */
    if ( ! function_exists('dCrypt')){
	    function dCrypt($ciphertext_base64){
	         
	        $key = 'KHNdBGCelC4ONfL2JhH1MkTYttF0Y3Ry';
	        
			$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	         
			if ($iv_size > strlen($ciphertext_base64))
	        {
	            return FALSE;
	        } 
			 
	        $ciphertext_dec = base64_decode($ciphertext_base64);
	         
	        $iv_dec = substr($ciphertext_dec, 0, $iv_size);
	         
	        $ciphertext_dec = substr($ciphertext_dec, $iv_size);
	         
	        $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,$ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
	         
	        return $plaintext_dec;
	    }
	}
	
	if ( ! function_exists('cryptURL')){
		function cryptURL($data,$var = "security"){
	    	$url = base_url()."?".$var."=".base64_encode(mCrypt(serialize($data)));
			return $url;
	    }
	}
	
	if ( ! function_exists('dcryptURL')){
		function dcryptURL($entity){
			
			if(base64_decode($entity) == true){
						$text = base64_decode($entity);
						try{
							$text = dCrypt($text);
							if(!is_bool($text)){
								$data = unserialize($text);
								return $data;
							}else{
								return false;
							}
						}catch(Exception $e){
							return false;
						}
			}else{
				return false;
			}
			
		}
	}
