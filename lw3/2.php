<?php

$filename = __DIR__ . '/dict1.txt';
$f1 = fopen($filename, 'r');
$filename = __DIR__ . '/dict2.txt';
$f2 = fopen($filename, 'r');

$arr = [];
while (!feof($f1)) 
{
	$line = fgets($f1);
	if ($line !== '\n')
	{
        array_push($arr, explode(':', $line));
    }
}
while (!feof($f2)) 
{
	$line = fgets($f2);
    if ($line !== '\n')
	{
        array_push($arr, explode(':', $line));
    }
}

fclose($f1);
fclose($f2);

function cmp($a, $b)
{
    return strcmp($a[0], $b[0]);
}
usort($arr, "cmp");

$text = '';
foreach($arr as $elArr)
{
    if (!empty($elArr[1]))
    {
        $text .= $elArr[0] . ':' . $elArr[1];
    }
}

$filename = __DIR__ . '/result.txt';
$f = fopen($filename, 'w');
fwrite($f, $text);
fclose($f);
?>