<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/9/5
 * Time: 14:18
 */

$format = '(%1$2d = %1$04b) = (%2$2d = %2$04b)'
    . ' %3$s (%4$2d = %4$04b)' . "\n";

echo <<<EOH
 ---------     ---------  -- ---------
 result        value      op test
 ---------     ---------  -- ---------
EOH;


/*
 * Here are the examples.
 */

$values = array(0, 1, 2, 4, 8);
$test = 1 + 4;

echo "\n Bitwise AND \n";
foreach ($values as $value) {
    $result = $value & $test;
    printf($format, $result, $value, '&', $test);
}

echo "\n Bitwise Inclusive OR \n";
foreach ($values as $value) {
    $result = $value | $test;
    printf($format, $result, $value, '|', $test);
}

echo "\n Bitwise Exclusive OR (XOR) \n";
foreach ($values as $value) {
    $result = $value ^ $test;
    printf($format, $result, $value, '^', $test);
}


echo "\n--- BIT SHIFT RIGHT ON POSITIVE INTEGERS ---\n";

$val = 4;
$places = 1;
$res = $val >> $places;
printf($res, $val, '>>', $places, 'copy of sign bit shifted into left side');

$val = 4;
$places = 2;
$res = $val >> $places;
printf($res, $val, '>>', $places);

$val = 4;
$places = 3;
$res = $val >> $places;
printf($res, $val, '>>', $places, 'bits shift out right side');

$val = 4;
$places = 4;
$res = $val >> $places;
printf($res, $val, '>>', $places, 'same result as above; can not shift beyond 0');


echo "\n--- BIT SHIFT RIGHT ON NEGATIVE INTEGERS ---\n";

$val = -4;
$places = 1;
$res = $val >> $places;
printf($res, $val, '>>', $places, 'copy of sign bit shifted into left side');

$val = -4;
$places = 2;
$res = $val >> $places;
printf($res, $val, '>>', $places, 'bits shift out right side');

$val = -4;
$places = 3;
$res = $val >> $places;
printf($res, $val, '>>', $places, 'same result as above; can not shift beyond -1');


echo "\n--- BIT SHIFT LEFT ON POSITIVE INTEGERS ---\n";

$val = 4;
$places = 1;
$res = $val << $places;
printf($res, $val, '<<', $places, 'zeros fill in right side');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 4;
$res = $val << $places;
printf($res, $val, '<<', $places);

$val = 4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
printf($res, $val, '<<', $places, 'sign bits get shifted out');

$val = 4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
printf($res, $val, '<<', $places, 'bits shift out left side');


echo "\n--- BIT SHIFT LEFT ON NEGATIVE INTEGERS ---\n";

$val = -4;
$places = 1;
$res = $val << $places;
printf($res, $val, '<<', $places, 'zeros fill in right side');

$val = -4;
$places = (PHP_INT_SIZE * 8) - 3;
$res = $val << $places;
printf($res, $val, '<<', $places);

$val = -4;
$places = (PHP_INT_SIZE * 8) - 2;
$res = $val << $places;
printf($res, $val, '<<', $places, 'bits shift out left side, including sign bit');


$a=array("a"=>"red","b"=>"green");
array_unshift($a,"blue");
var_dump($a);