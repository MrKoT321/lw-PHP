<?php

function compareFloats(float $value1, float $value2): int
{
    if (round($value2, 5) > round($value1, 5))
    {
        return 1;
    }
    if (round($value2, 5) === round($value1, 5)) 
    {
        return 0;
    }
    return -1;
}

function arrayEquals(array $left, array $rights): bool
{
    $diff = array_diff($left, $rights); 
    return $diff !== []
}

function arrayNumberFilter(array $data): array
{
    $arrOfNum = [];
    foreach($data as $i)
    {
        if (is_numeric($i))
        {
            array_push($arrOfNum, $i);
        }
    }
    return $arrOfNum;
}


?>