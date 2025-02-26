<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_project extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_project_model', 'master_project');
        $this->load->model('master_services_model', 'master_services');

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
     * $route["/master_project"]['GET'] = "/master_project";
     * $route["/master_project/(:num)"]['GET'] = "/master_project";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Master Customer";
        $data['subtitle'] = "All data Master Customer";
        $data['results'] = $this->master_project->get_all_customer_project();

        $data['content'] = 'pages/master_project/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Customer',
                'link'	=>	'master_customers'
            ),
            'Master Customer'		=> 	array(
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
    public function subscription($id)
    {
        $master_project =  $this->master_project->get_all_customer_project_by_id($id);
        $data['layanans'] = $this->master_services->get_all_services();

        $data['title'] = "Subscribe Services";
            $data['subtitle'] = "Subscribe user to a services";
            $data['row'] = $master_project;

            $data['content'] = 'pages/master_project/update';
            $data['breadcrumb'] = array(
                'Dashboard'		=> 	array(
                    'stat'	=> '',
                    'text'	=>	'Master Customer',
                    'link'	=>	'master_customers'
                ),
                'Master Customer'		=> 	array(
                    'stat'	=> 'active',
                    'text'	=>	'List',
                    'link'	=>	''
                ),
            );
        if (!$master_project)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            

            $this->load->view('main', $data);
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }

            $data = [
                'id_layanan' => $this->input->post('inputLayanan'),
            ];


            if ($this->master_project->update($data, $id)) {
                $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Subscribe successfully, Waiting for approval');
            } else {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Failed to subscribe');
            }
            redirect(base_url('master_project'));
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
        $master_project =  $this->master_project->select($id);
        if (!$master_project)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_project->update($data, $id)) {
            echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
            return;
        } else {
            echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
            return;
        }
    }

    /**
     * To delete row permanently.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function delete($id)
    {
        $master_project =  $this->master_project->select($id);
        if (!$master_project)
            show_404();

        if ($this->master_project->delete($id)) {
            echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
            return;
        } else {
            echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
            return;
        }
    }

    /**
     * @param mixed $url base_url('admin/users') etc.
     * @param mixed $total_rows return table total rows
     * @param int $uri_segment which segment will return page no default is 3.
     * @param int $per_page show records per page default is 15.
     * @return mixed 
     */
    private function __pagination($url, $total_rows, $uri_segment = 3,  $per_page = 15)
    {
        $config["base_url"] = $url;
        $config['suffix'] = (count($_GET) > 0) ? '?' . http_build_query($_GET, '', "&") : '';
        $config['first_url'] = $config['base_url'] . '?' . http_build_query($_GET);
        $config["per_page"] = $per_page;
        $config["uri_segment"] = $uri_segment;
        $config['num_links'] = 3;
        $config['use_page_numbers'] = FALSE;
        $config['attributes'] = ['class' => 'page-link'];


        $config['full_tag_open'] = '<nav><ul class="pagination">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = 'Next';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = 'Previous';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"> <a href="#" class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';


        $config["total_rows"] = $total_rows;

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }
}


/* End of file Master_project.php and path \application\controllers\Master_project.php */
