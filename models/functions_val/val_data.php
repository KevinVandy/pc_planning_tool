<?php

function isArrayNull($array)
{
    if(is_array($array))
    {
        foreach($array as $a) if($a != NULL) return FALSE;
        return TRUE;
    }
    return FALSE;
}

function isStringBlank($thing)
{
    if($thing === null || $thing === '') return TRUE;
    return FALSE;
}

function validateNumRange($num, $min, $max)
{
    try
    {
        $num = (float)$num;
        $min = (float)$min;
        $max = (float)$max;
    }
    catch(Exception $ex)
    {
        return FALSE;
    }
    if($num >= $min && $num <= $max) return TRUE;
    else return FALSE;
}

function validateStringLength($string, $length)
{
    if($string == NULL || strlen((string)$string) <= $length) return TRUE;
    else return FALSE;
}

?>