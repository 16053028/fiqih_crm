<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');

		if (!$this->session->userdata('id_login')) {
			redirect('auth');
		}
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$data['akses'] = $this->session->userdata('id_level');

		if ($data['akses'] == 1) {
			$content = 'pages/dashboard/super';
			$subtitle = 'Super admin dashboard';
		} else if ($data['akses'] == 2) {
			$content = 'pages/dashboard/sales';
			$subtitle = 'Sales dashboard';

		}else if ($data['akses'] == 4){
			$content = 'pages/dashboard/manager';	
			$subtitle = 'Manager dashboard';

		}else{
			echo "under construction";
			return;	
		}
		
		
		$data = array(
				'title'			=>	'Dashboard',
				'subtitle'		=>	$subtitle,
				'content' 		=>	$content,
				'breadcrumb'	=>	array(
						'Home'		=> 	array(
							'stat'	=> '',
							'text'	=>	'Home',
							'link'	=>	'dashboard'
						),
						'Dashboard'		=> 	array(
							'stat'	=> 'active',
							'text'	=>	'Dashboard',
							'link'	=>	''
						),
				)
		);
		$this->load->view('main', $data);
	}
}
