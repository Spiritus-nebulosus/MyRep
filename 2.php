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