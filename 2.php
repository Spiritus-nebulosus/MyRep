<?php

function convertString($a,$b){
	$a=strtolower($a);
	$b=strtolower($b);
	if ($a>$b)
		if (substr_count($a,$b)>=2){	
			$length_b = strlen($b);
			$pos= stripos($a, $b);
			$rev=strrev($b);
			$f = stripos($a,$b,($pos+$length_b));
			return substr_replace($a,$rev,$f,$length_b);
			}
		else
			echo "Количество повторения подстроки $b в строке $a меньше двух";
	else 
		echo "Размер строки не может быть меньше размера подстроки";
}


function mySortForKey($a,$b){
	$keys=array();
	$array = array();
		foreach($a as $key => $val)
			$array[$key] = $val[$b];
		$keys=array();
		$null=$array;
		for ($i=0;$i<=count($null);$i++){
			if ($null[$i]!=null)
				unset($null[$i]);
			$keys=array_keys($null);
			$keys_implode = implode(', ',$keys);
		}
			
		try{
			if(array_search(true,$null)===false){
				throw new Exception("Key not found in $keys_implode");				
			}
			else{
				array_multisort($array,$a);
				return $a;
			}
		}catch (Exception $e){
			echo$e->getMessage();
		}
}

