<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function generate_equation($numberAmount, $operatorLevel)
{
    $equationArray = array();
    
    for ($i=1; $i<$numberAmount; $i++)
    {
        array_push($equationArray,rand(0,10));
        array_push($equationArray,generate_operator($operatorLevel));
    }
    
    array_push($equationArray,rand(0,10));
    return $equationArray;
}

function generate_operator($operatorLevel)
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
        
    return $operator;
}
function equationArray_to_string($equationArray, $translate = FALSE)
{
    $equation = '';
    foreach($equationArray as $equationPart)
    {
        $equation = $equation . $equationPart . ' ';
    }
    
    return $equation;
}

function answer_check($equationArray, $answer)
{
    $equation = equationArray_to_string($equationArray);
    $rightAnswer = calc_string($equation);
    if($rightAnswer == $answer)
    {
        return 'TRUE';
    }
    else
    {
        return 'FALSE';
    }
}

//http://www.gamedev.net/topic/436613-php-interpret-math-string-and-return-value/
function calc_string( $mathString )
{
	$cf_DoCalc = create_function("", "return (" . $mathString . ");" );
	
	return $cf_DoCalc();
};
