<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_project extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        parent::__construct();
        $this->load->model('master_project_model', 'master_project');
        if (!$this->session->userdata('id_login') && ($this->session->userdata('id_level') != 3 )) {
			redirect('auth');
		}
    }

    public function index()
    {
        $data['title'] = "Master Project";
        $data['subtitle'] = "All data Master Project";
        $data['results'] = $this->master_project->get_all_project();

        $data['content'] = 'pages/master_project/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Project',
                'link'	=>	'master_project'
            ),
            'Master Project'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'List',
                'link'	=>	''
            ),
        );
        $this->load->view('main', $data);
    }
}

/* End of file Master_project.php and path \application\controllers\Master_project.php */
