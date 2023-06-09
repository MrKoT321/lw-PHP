<?php
for ($i = 1; $i < $argc; $i ++)
{
    echo $argv[$i];
    if ($i + 1 != $argc)
    {
        echo " ";
    }
}
echo "\n";
