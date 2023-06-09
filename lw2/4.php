<?php 
if (isset($_GET["password"]))
{
    $password = $_GET["password"];
    $complexity = 0;
    $len = strlen($password);
    $complexity += 4 * $len;
    $count = 0;
    echo "Your password: " . $password . "." . "\n";
    for ($i = 0; $i < $len; $i++)
    {
        if (is_numeric($password[$i]))
        {
            $count ++;
        }
    }
    if ($count != 0)
    {
        $complexity += 4 * $count;
    }
    else
    {
        $complexity -= $len; 
    }
    if ($count == $len)
    {
        $complexity -= $len;
    }
    
    $count = 0;
    for ($i = 0; $i < $len; $i++)
    {
        if (ctype_upper($password[$i]))
        {
            $count ++;
        }
    }
    if ($count != 0)
    {
        $complexity += (($len - $count) * 2);
    }
    if (($len - $count) > 0)
    {
        $complexity += ($count * 2);
    } 
    foreach (count_chars($password, 1) as $val) 
    {
        if ($val > 1)
        {
            $complexity -= ($val - 1);
        }
    }
    echo "Complexity: " . $complexity . "." ."\n";
}
