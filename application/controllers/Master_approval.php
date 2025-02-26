<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_approval extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_approval_model', 'master_approval');

        if (!$this->session->userdata('id_login') && ($this->session->userdata('id_level') != 3 )) {
			redirect('auth');
		}

        $this->config->load('form_validation');
        $this->form_validation->set_rules($this->config->item('master_services_form'));
    }
 





    
    /** 
     * This is the default function, it will return all rows
     * Pagingation is set here, you need to add route.
     * 
     * $route["/master_approval"]['GET'] = "/master_approval";
     * $route["/master_approval/(:num)"]['GET'] = "/master_approval";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Master Aprroval";
        $data['subtitle'] = "All data Master Aprroval";
        $data['results'] = $this->master_approval->get_all_approval();

        $data['content'] = 'pages/master_approval/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Aprroval',
                'link'	=>	'master_approval'
            ),
            'Master Aprroval'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'List',
                'link'	=>	''
            ),
        );
        $this->load->view('main', $data);
    }

    /**
     * To view edit form and update on POST request
     * 
     * @param mixed $id 
     * @return void 
     */
    public function approve($id)
    {
        $master_approval =  $this->master_approval->select($id);
        $data['title'] = "Master Aprroval";
        $data['subtitle'] = "All data Master Aprroval";
        $data['results'] = $this->master_approval->get_all_approval();

        $data['content'] = 'pages/master_approval/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Aprroval',
                'link'	=>	'master_approval'
            ),
            'Master Aprroval'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'List',
                'link'	=>	''
            ),
        );
        if (!$master_approval)
            show_404();

            $data = [
                'status_psb' => 1,
            ];

            if ($this->master_approval->update($data, $id)) {
            $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Saved Successfully');
            }else{
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Failed to save data');
            }
            redirect(base_url('master_approval'));
    }

    /**
     * To set column deleted 1.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function soft_delete($id)
    {
        $master_approval =  $this->master_approval->select($id);
        if (!$master_approval)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_approval->update($data, $id)) {
            echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
            return;
        } else {
            echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
            return;
        }
    }
}


/* End of file Master_approval.php and path \application\controllers\Master_approval.php */
