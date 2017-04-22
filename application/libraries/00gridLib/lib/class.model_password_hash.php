<?php 

define("PBKDF2_HASH_ALGORITHM", "sha256");
define("PBKDF2_ITERATIONS", 1000);
define("PBKDF2_SALT_BYTE_SIZE", 24);
define("PBKDF2_HASH_BYTE_SIZE", 24);

define("HASH_SECTIONS", 4);
define("HASH_ALGORITHM_INDEX", 0);
define("HASH_ITERATION_INDEX", 1);
define("HASH_SALT_INDEX", 2);
define("HASH_PBKDF2_INDEX", 3);

class Model_password_hash {
	
	function __construct() {

	}
	
	function create_hash($Vbyml21jpnl2)
	{
		
		$Vxwol3nzryif = base64_encode(mcrypt_create_iv(PBKDF2_SALT_BYTE_SIZE, MCRYPT_DEV_URANDOM));
		return PBKDF2_HASH_ALGORITHM . ":" . PBKDF2_ITERATIONS . ":" .  $Vxwol3nzryif . ":" .
				base64_encode($this->pbkdf2(
						PBKDF2_HASH_ALGORITHM,
						$Vbyml21jpnl2,
						$Vxwol3nzryif,
						PBKDF2_ITERATIONS,
						PBKDF2_HASH_BYTE_SIZE,
						true
				));
	}
	
	function validate_password($Vbyml21jpnl2, $V1eynhhwvipi)
	{
		$Vecef1dpvg1b = explode(":", $V1eynhhwvipi);
		if(count($Vecef1dpvg1b) < HASH_SECTIONS)
			return false;
		$Vnvzcgo3ckzb = base64_decode($Vecef1dpvg1b[HASH_PBKDF2_INDEX]);
		return $this->slow_equals(
				$Vnvzcgo3ckzb,
				$this->pbkdf2(
						$Vecef1dpvg1b[HASH_ALGORITHM_INDEX],
						$Vbyml21jpnl2,
						$Vecef1dpvg1b[HASH_SALT_INDEX],
						(int)$Vecef1dpvg1b[HASH_ITERATION_INDEX],
						strlen($Vnvzcgo3ckzb),
						true
				)
		);
	}
	
	
	function slow_equals($Vtdaxmbh0m5p, $Vfyfpggerg2t)
	{
		$Vg4hp2ffyuod = strlen($Vtdaxmbh0m5p) ^ strlen($Vfyfpggerg2t);
		for($Vi0oyq1lze1p = 0; $Vi0oyq1lze1p < strlen($Vtdaxmbh0m5p) && $Vi0oyq1lze1p < strlen($Vfyfpggerg2t); $Vi0oyq1lze1p++)
		{
		$Vg4hp2ffyuod |= ord($Vtdaxmbh0m5p[$Vi0oyq1lze1p]) ^ ord($Vfyfpggerg2t[$Vi0oyq1lze1p]);
		}
		return $Vg4hp2ffyuod === 0;
	}
	
	
		function pbkdf2($Vtdaxmbh0m5plgorithm, $Vbyml21jpnl2, $Vxwol3nzryif, $Vclgz3agjbsh, $Vvusxsaebkkb, $V5bllvs4akrj = false)
		{
		$Vtdaxmbh0m5plgorithm = strtolower($Vtdaxmbh0m5plgorithm);
		if(!in_array($Vtdaxmbh0m5plgorithm, hash_algos(), true))
			trigger_error('PBKDF2 ERROR: Invalid hash algorithm.', E_USER_ERROR);
    if($Vclgz3agjbsh <= 0 || $Vvusxsaebkkb <= 0)
	    trigger_error('PBKDF2 ERROR: Invalid parameters.', E_USER_ERROR);
	
    if (function_exists("hash_pbkdf2")) {
	    
			if (!$V5bllvs4akrj) {
			$Vvusxsaebkkb = $Vvusxsaebkkb * 2;
		}
		return hash_pbkdf2($Vtdaxmbh0m5plgorithm, $Vbyml21jpnl2, $Vxwol3nzryif, $Vclgz3agjbsh, $Vvusxsaebkkb, $V5bllvs4akrj);
	}
	
	$Viaiy3byi5tx = strlen(hash($Vtdaxmbh0m5plgorithm, "", true));
	$Vfyfpggerg2tlock_count = ceil($Vvusxsaebkkb / $Viaiy3byi5tx);
	
	$Vyrf3lp3ic15 = "";
	for($Vi0oyq1lze1p = 1; $Vi0oyq1lze1p <= $Vfyfpggerg2tlock_count; $Vi0oyq1lze1p++) {
	
	$V0yq3hmdqzvi = $Vxwol3nzryif . pack("N", $Vi0oyq1lze1p);
	
	$V0yq3hmdqzvi = $Vwjmd2a2dlsf = hash_hmac($Vtdaxmbh0m5plgorithm, $V0yq3hmdqzvi, $Vbyml21jpnl2, true);
	
	for ($Vecdht12zkpt = 1; $Vecdht12zkpt < $Vclgz3agjbsh; $Vecdht12zkpt++) {
	$Vwjmd2a2dlsf ^= ($V0yq3hmdqzvi = hash_hmac($Vtdaxmbh0m5plgorithm, $V0yq3hmdqzvi, $Vbyml21jpnl2, true));
	}
	$Vyrf3lp3ic15 .= $Vwjmd2a2dlsf;
	}
	
	if($V5bllvs4akrj)
		return substr($Vyrf3lp3ic15, 0, $Vvusxsaebkkb);
		else
		return bin2hex(substr($Vyrf3lp3ic15, 0, $Vvusxsaebkkb));
	}
	
	
}

?>