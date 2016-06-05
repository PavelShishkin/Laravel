<?php

//функция проверки на пустоту POST данных
function array_get($array, $key, $default = '')
{
    if(isset($array[$key]))
    {
        return $array[$key];
    }
    else
    {
        return $default;
    }
}

function require_error_text($text)
{
	if(mb_strlen($text) < 2)
    { 
    	return false;
    }
    else
    {
    	return true;
    } 
}