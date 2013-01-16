<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function if_not_logged_in_redirect($uidSession)
{
    if($uidSession == FALSE)
    {
        redirect('teacher/login');
        return FALSE;
    }
    else
    {
         return TRUE;
}

}
