<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_level_model', 'master_level');
        $this->load->model('master_login_model', 'master_login');
        if (!$this->session->userdata('id_login') && ($this->session->userdata('id_level') != 3 )) {
			redirect('auth');
		}

        $this->config->load('form_validation');
    }
 

    /** 
     * This is the default function, it will return all rows
     * Pagingation is set here, you need to add route.
     * 
     * $route["/master_login"]['GET'] = "/master_login";
     * $route["/master_login/(:num)"]['GET'] = "/master_login";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Master Login";
        $data['subtitle'] = "All data Master login";
        $data['results'] = $this->master_login->get_all_login();

        $data['content'] = 'pages/master_login/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Login',
                'link'	=>	'master_login'
            ),
            'Master Login'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'List',
                'link'	=>	''
            ),
        );
        $this->load->view('main', $data);
    }

    /**
     * To view new form and insert row on POST request.
     * 
     *  @return void  */
    public function create()
    {
        $data['levels'] = $this->master_level->get_all_levels();
        $data['title'] = "New Master Login";
        $data['subtitle'] = "Create new Master Login";
        $data['content'] = "pages/master_login/create";

        $data['breadcrumb'] = array(
            'List'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Level',
                'link'	=>	'master_login'
            ),
            'Create'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'Create',
                'link'	=>	''
            ),
        );

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $this->load->view('main', $data);
        } else {
            $this->form_validation->set_rules($this->config->item('master_login_form'));
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);

            } else {
                $data = [
                    'username' => $this->input->post('inputUsername'),
                    'password' => password_hash($this->input->post('inputPassword'), PASSWORD_DEFAULT),
                    'id_level' => $this->input->post('inputLevel'),
                ];
    
                if ($this->master_login->insert($data)) {
                    $this->session->set_flashdata('status', 'success');
                    $this->session->set_flashdata('msg', 'Saved Successfully');
                } else {
                    $this->session->set_flashdata('status', 'danger');
                    $this->session->set_flashdata('msg', 'Failed to Save');
                }
                redirect(base_url('master_login'));
            }
        }
    }


    /**
     * To view edit form and update on POST request
     * 
     * @param mixed $id 
     * @return void 
     */
    public function update($id)
    {
        $master_login =  $this->master_login->select($id);

        $data['title'] = "Update Master login";
        $data['subtitle'] = "Modify Master login";
        $data['content'] = "pages/master_login/update";
        $data['row'] = $master_login;
        $data['levels'] = $this->master_level->get_all_levels();

        $data['breadcrumb'] = array(
            'List'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Login',
                'link'	=>	'master_login'
            ),
            'Create'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'Update',
                'link'	=>	''
            ),
        );


        if (!$master_login)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $this->load->view('main', $data);
        } else {
            $this->form_validation->set_rules($this->config->item('master_login_form_update'));
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }else{
                $data = [
                    'username' => $this->input->post('inputUsernameUpdate'),
                    'password' => password_hash($this->input->post('inputPassword'), PASSWORD_DEFAULT),
                    'id_level' => $this->input->post('inputLevel'),
                ];
    
    
                if ($this->master_login->update($data, $id)) {
                    $this->session->set_flashdata('status', 'success');
                    $this->session->set_flashdata('msg', 'Saved Successfully');
                } else {
                    $this->session->set_flashdata('status', 'danger');
                    $this->session->set_flashdata('msg', 'Failed to Save');
                }
    
                redirect(base_url('master_login'));
            }            
        }
    }

    /**
     * To set column deleted 1.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function soft_delete($id)
    {
        $master_login =  $this->master_login->select($id);
        if (!$master_login)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_login->update($data, $id)) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg', 'Saved Successfully');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg', 'Failed to Save');
        }
        redirect(base_url('master_login'));

    }

}


/* End of file Master_login.php and path \application\controllers\Master_login.php */
