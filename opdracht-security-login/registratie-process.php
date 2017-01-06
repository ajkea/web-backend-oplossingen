<?php


	 function generateRandomString() {


		$passwordRequirements = FALSE;

		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-*/$%@#_';
	    
	    while(!$passwordRequirements){




		#maakt random wachtwoord
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < 9; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }

	    #vormt string naar array
	    $arrayCharacters = str_split($randomString);


	    #voorwaarden paswoord requirements voldaan
	    $alfabetSmall = FALSE;
		$alfabetCaps = FALSE;
		$numeric = FALSE;
		$symbol = FALSE;


	    #loopen array
	    foreach ($arrayCharacters as $value) {
	   


		    if($numeric && $alfabetSmall && $alfabetCaps && $symbol ){
		    	$passwordRequirements = TRUE;
		    	$alfabetSmall = FALSE;
				$alfabetCaps = FALSE;
				$numeric = FALSE;
				$symbol = FALSE;
		    }	
		    else
		    {
		    	$passwordRequirements = FALSE;
		    	if (ctype_digit($value)){
		    		$numeric = TRUE;
		    	}

		    	if (ctype_lower($value)){
		    		$alfabetSmall = TRUE;
		    	}

		    	if (ctype_upper($value)){
		    		$alfabetCaps = TRUE;
		    	}

		    	if (ctype_punct($value)){
		    		$symbol = TRUE;
		    	}
		    }//einde else voor controle voorwaarde
		}//foreach loop
	    }//einde while
	    return $randomString;

	echo $randomString;
	}//einde functie

?>