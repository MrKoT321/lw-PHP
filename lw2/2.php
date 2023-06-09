<?php 
for ($i = 1; $i < $argc; $i++)
{
    $mas[$i - 1] = $argv[$i];
}

$max = 0;
$max_key = " ";
$min = pow(10, 10);
$min_key = " ";

for ($i = 0; $i < count($mas); $i++)
{
    $key_value = explode("=", $mas[$i]);
    if ($max < $key_value[1])
    {
        $max = $key_value[1];
        $max_key = (string)$key_value[0];
    }
    if ($min > $key_value[1])
    {
        $min = $key_value[1];
        $min_key = (string)$key_value[0];
    }
}
echo "min: " . " " . $min_key . "\n";
echo "max: " . " " . $max_key . "\n";