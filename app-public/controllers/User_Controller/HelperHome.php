<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HelperHome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('form', 'url', 'text'));
        $this->load->library('session');
        if (!$this->session->userdata('is_logged_in')) {
			redirect(site_url('auth'));
		}

        $userRole = $this->session->userdata('Role');
        if (!($userRole === 'user')) {
            redirect(site_url('dashboard')); 
        }
    }

    public function index()
    {
        $this->data['view_file'] = 'HelperHome_User/Helper-work';
        $this->load->view(THEMES, $this->data);
    }
}
