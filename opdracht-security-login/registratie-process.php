<?php

	function generatePassword($length){
		$passwordLength = 6;
		$passwordCharacters = array();
			
		$passwordCharacters['numeric'] = array(0,1,2,3,4,5,6,7,8,9);
		$passwordCharacters['letterSmall'] = array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
		$passwordCharacters['letterCaps'] = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
		$passwordCharacters['symbols'] = array('+','-','*','/','$','%','@','#','_');
		
		$characterCount = 0;
		
		foreach ($passwordCharacters as $value) {
			$characterCount++;
		//$length =  strlen ($password);
		 
		}
		$password = array_rand($passwordCharacters,$passwordLength);
		//echo ("Je wachtwoord heeft een lengte van $strlen karakters en is: $password");
		echo implode(',',$password);
		
	}

?>