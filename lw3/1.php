<?php

require_once "utils.php";

// Проверка на равенство 2 чисел (нахождение минимального)
echo " #1 \n";
$n1 = $n2 = 123;
if (compareFloats($n1, $n2) === 0)
{
    echo $n1 . ' ' . $n2 . ": Числа равны \n";
}
else
{
    echo $n1 . ' ' . $n2 . ": Числа не равны \n";
}

// Определение эквивалентности 2 массивов
echo "\n #2 \n";
$arr1[1] = "PHP"; 
$arr1[2] = "HTML"; 
$arr1[3] = "CSS";

$arr2[1] = "PHP"; 
$arr2[2] = "HTML"; 
$arr2[3] = "CSS";

$arr3[1] = "PHP"; 
$arr3[2] = "PAINT.NET"; 

print_r($arr);
print_r($arr1);
print_r($arr2);

if (arrayEquals($arr1, $arr2))
{
    echo "Массивы 1 и 2 эквивалентны \n";
}
else
{
    echo "Массивы 1 и 2 не эквивалентны \n";
}

if (arrayEquals($arr1, $arr3))
{
    echo "Массивы 1 и 3 эквивалентны \n";
}
else
{
    echo "Массивы 1 и 3 не эквивалентны \n";
}

// Отбор численных элеметов массива
echo "\n #3 \n";
$a = array(1, 2, 'a', 8);
$b = arrayNumberFilter($a);
print_r($b);
?>