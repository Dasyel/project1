<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_numbers($numberAmount)
{
    $numberArray = array();
    
    for ($i=1; $i<=$numberAmount; $i++)
    {
        array_push($numberArray,rand(0,10));
    }
    return $numberArray;
    }

function generate_operators($operatorLevel, $operatorAmount)
{
    $operatorArray = array();
    for ($i=1; $i<=$operatorAmount; $i++)
    { 
        switch ($operatorLevel)
        {
        case 1:
            $rand = 1;
            break;
        case 2:
            $rand = 2;
            break;
        case 3:
            $rand = 3;
            break;
        case 4:
            $rand = 4;
            break;
        case 5:
            $rand = rand(1,2);
            break;
        case 6:
            $rand = rand(3,4);
            break;
        case 7:
            $rand = rand(1,3);
            break;
        case 8:
            $rand = rand(1,4);
            break;
        default:
            return FALSE;
        }
        
        switch ($rand)
        {
        case 1:
            $operator = '+';
            break;
        case 2:
            $operator = '-';
            break;
        case 3:
            $operator = '*';
            break;
        case 4:
            $operator = '/';
            break;
        default:
            return FALSE;
        }
    
        array_push($operatorArray,$operator);
    }
    array_push($operatorArray, '=');
    return $operatorArray;
}
