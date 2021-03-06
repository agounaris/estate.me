<?php

return array(
	
	'admin'=>array(
		'username' => 'admin',
		'password' => crypt('adminpass', self::blowfishSalt()),
		'title' => 'administrator',
		'accessLevel' => 6,
	),

	
);

	/**
 	* Generate a random salt in the crypt(3) standard Blowfish format.
 	*
 	* @param int $cost Cost parameter from 4 to 31.
 	*
 	* @throws Exception on invalid cost parameter.
 	* @return string A Blowfish hash salt for use in PHP's crypt()
 	*/
	function blowfishSalt($cost = 13)
	{
    	if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
        	throw new Exception("cost parameter must be between 4 and 31");
    	}
    	$rand = array();
    	for ($i = 0; $i < 8; $i += 1) {
        	$rand[] = pack('S', mt_rand(0, 0xffff));
    	}
    	$rand[] = substr(microtime(), 2, 6);
    	$rand = sha1(implode('', $rand), true);
    	$salt = '$2a$' . str_pad((int) $cost, 2, '0', STR_PAD_RIGHT) . '$';
    	$salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
    	return $salt;
	}