<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * This controller only contains functions which retrieve or manipulate user data
 */
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->model('users_model');
	}

    public function students($schoolID)
    {

    }
}
