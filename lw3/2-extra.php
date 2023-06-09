<?php
function mergeFilesInArray($s, array $arr): array
{
    while (!feof($s)) 
    {
        array_push($arr, explode(':', fgets($s)));
    }
    return $arr;
}

function explodeFiles($dir): array
{
    $f = scandir($dir);
    $arr = [];
    for($i = 2; $i < count($f); $i++)
    {
        $filename = $dir . $f[$i];
        $file = fopen($filename, 'r');
        if (!empty($file))
        {
            $arr = mergeFilesInArray($file, $arr);
        } 
        fclose($file); 
    } 
    return $arr; 
}

$dir = __DIR__ . "/dict/";
if(is_dir($dir))
{
    $arrFiles = explodeFiles($dir);

    function cmp($a, $b)
    {
        return strcmp($a[0], $b[0]);
    }
    usort($arrFiles, "cmp");

    $text = '';
    foreach($arrFiles as $elArr)
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
}
?>
