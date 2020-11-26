<?php

function findSimple($a,$b){
	$Array = array();
	if($b > $a)
		for ($i = $a; $i < $b + 1; $i++) $Array[] = $i;
	elseif($a == $b)
		$Array[] = $a;
	else
		for ($j = $b; $j > $a - 1; $j--) $Array[] = $j;
	return($Array);
}
echo "Реализация функции findSimple():\n";
print_r(findSimple(1,15));
echo "\n";

function createTrapeze($a){
	$keys = array('a','b','c');
	$b = array();
	for ($i=0; $i<count($a);$i++)
		$b[$i/3][$keys[$i%3]] = $a[$i];
	return $b;
}
$s = createTrapeze(findSimple(1,15));
echo "Реализация функции createTrapeze():\n";
print_r($s);
echo "\n";
function squareTrapeze($a){
	for ($i=0; $i<count($a); $i++)
		$a[$i]['s'] = ($a[$i]['a']*$a[$i]['b'])/2*$a[$i]['c'];
	return $a;
}
echo "Реализация функции squareTrapeze():\n";
print_r (squareTrapeze($s));
echo "\n";

function getSizeForLimit($a,$b){
	for ($j=0;$j<count($a) && $a[$j]['s']<$b;$j++)
		$key=$j;			
	print_r ($a[$key]);
}
echo "Реализация функции getSizeForLimit():\n";
getSizeForLimit(squareTrapeze($s), 70);
echo "\n";

function getMin($a){
	$min = 0;
	$min_key = 0;
	foreach($a as $k => $v){
		if($v<$min or $min == 0){
			$min = $v;
			$min_key = $k;
		}
	}
	echo "Минимальное число в массиве: $min. Минимальный ключ: $min_key\n";
}
echo "Реализация функции getMin():\n";
getMin([4,3,6,5,8,9,'odin'=>1,708,14,12]);
echo "\n";

function printTrapeze($a){
	for ($i=0;$i<count($a);$i++){
		$q = $a[$i]['a'];
		$w = $a[$i]['b'];
		$e = $a[$i]['c'];
		$r = $a[$i]['s'];
		if ($r%2==0)
			echo "a=$q\nb=$w\nc=$e\nS=$r\n\n";
		else 
			echo "a=$q\nb=$w\nc=$e\nS=$r - нечетная площадь\n\n";
	}
}
echo "Реализация функции printTrapeze():\n";
printTrapeze(squareTrapeze($s));

abstract class BaseMath{
	public function exp1($a,$b,$c){
		return $a*($b**$c);
	}
	
	public function exp2($a,$b,$c){
		return ($a/$b)**$c;
	}
	abstract function getValue();
}
class F1 extends BaseMath{
	function __construct($a,$b,$c){
		$this->a = $a;
		$this->b = $b;
		$this->c = $c;
	}
	public function getValue(){
		return ($this->exp1($this->a,$this->b,$this->c)+((($this->a/$this->c)**$this->b)%3)**min($this->a,$this->b,$this->c));
	}
}
echo "Реализация абстрактного класса BaseMath и класса F1, наследующего методы BathMath:\n";
$text = new F1(2,50,2);
echo ($text->getValue());



