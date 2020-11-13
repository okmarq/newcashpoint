<?php
class Utils{
	function crypto_rand_secure($min, $max) {
	  $range = $max - $min;
	  if ($range < 0) return $min; // not so random...
	  $log = log($range, 2);
	  $bytes = (int) ($log / 8) + 1; // length in bytes
	  $bits = (int) $log + 1; // length in bits
	  $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
	  do {
	    $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
	    $rnd = $rnd & $filter; // discard irrelevant bits
	  } while ($rnd >= $range);
	  return $min + $rnd;
	}
	function getToken($length=32){
	  $token = "";
	  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	  $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	  $codeAlphabet.= "0123456789";
	  for($i=0;$i<$length;$i++){
	    $token .= $codeAlphabet[$this->crypto_rand_secure(0,strlen($codeAlphabet))];
	  }
	  return $token;
	}
	// send email using built in php mail function
	public function sendEmailViaPhpMail($send_to_email, $subject, $body){
	  $from_name="New Cashpoint";
	  $from_email="newcashpoint@newcashpoint.com";
	  $headers  = "MIME-Version: 1.0\r\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	  $headers .= "From: {$from_name} <{$from_email}> \n";
	  if(mail($send_to_email, $subject, $body, $headers)){
	    return true;
	  }
	  return false;
	}
	// send email using built in php mail function
	public function receiveEmailViaPhpMail($send_to_email, $subject, $body, $name, $email){
	  $from_name=$name;
	  $from_email=$email;
	  $headers  = "MIME-Version: 1.0\r\n";
	  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	  $headers .= "From: {$from_name} <{$from_email}> \n";
	  if(mail($send_to_email, $subject, $body, $headers)){
	    return true;
	  }
	  return false;
	}
	// Receives a string like 'Some Sample String'
	// and returns 'some-sample-string'
	function makeSlug(String $string){
		$string = strtolower($string);
		$slug = preg_replace('/[^A-Za-z0-9-]+/', '-', $string);
		return $slug;
	}
}
?>