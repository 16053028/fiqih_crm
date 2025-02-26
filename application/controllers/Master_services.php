<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_services extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_services_model', 'master_services');

        if (!$this->session->userdata('id_login') && ($this->session->userdata('id_level') != 3 )) {
			redirect('auth');
		}

        $this->config->load('form_validation');
        $this->form_validation->set_rules($this->config->item('master_layanan_form'));
    }
 
    /** 
     * This is the default function, it will return all rows
     * Pagingation is set here, you need to add route.
     * 
     * $route["/master_services"]['GET'] = "/master_services";
     * $route["/master_services/(:num)"]['GET'] = "/master_services";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Master Services";
        $data['subtitle'] = "All data Master Services";
        $data['results'] = $this->master_services->get_all_services();

        $data['content'] = 'pages/master_services/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Services',
                'link'	=>	'master_services'
            ),
            'Master Services'		=> 	array(
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

        $data['title'] = "Create  Services";
        $data['subtitle'] = "Create new Services";
        $data['results'] = $this->master_services->get_all_services();

        $data['content'] = 'pages/master_services/create';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Services',
                'link'	=>	'master_services'
            ),
            'Master Services'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'List',
                'link'	=>	''
            ),
        );
        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {

            $this->load->view('main', $data);
        } else {

            
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
                return;

            }else{
                $data = [
                    'nama_layanan'  => $this->input->post('inputLayanan'),
                    'deskripsi'  => $this->input->post('inputDesc'),
                    'biaya_layanan'  => $this->input->post('inputBiaya'),
                ];
    
    
                if ($this->master_services->insert($data)) {
                    $this->session->set_flashdata('status', 'success');
                    $this->session->set_flashdata('msg', 'Saved Successfully');
                } else {
                    $this->session->set_flashdata('status', 'danger');
                    $this->session->set_flashdata('msg', 'Failed to Save');
                }
    
                redirect(base_url('master_services'));
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
        $master_services =  $this->master_services->select($id);

        $data['title'] = "Master Services Update";
        $data['subtitle'] = "Update data Master Services";

        $data['content'] = 'pages/master_services/update';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Services',
                'link'	=>	'master_services'
            ),
            'Master Services'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'Update',
                'link'	=>	''
            ),
        );
        if (!$master_services)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['row'] = $master_services;

            $this->load->view('main', $data);
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
                return;
            } else {
                $data = [
                    'nama_layanan'  => $this->input->post('inputLayanan'),
                    'deskripsi'  => $this->input->post('inputDesc'),
                    'biaya_layanan'  => $this->input->post('inputBiaya'),
                ];
    
    
                if ($this->master_services->update($data, $id)) {
                    $this->session->set_flashdata('status', 'success');
                    $this->session->set_flashdata('msg', 'Saved Successfully');
                } else {
                    $this->session->set_flashdata('status', 'danger');
                    $this->session->set_flashdata('msg', 'Failed to Save');
                }
    
                redirect(base_url('master_services'));
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
        $master_services =  $this->master_services->select($id);
        if (!$master_services)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_services->update($data, $id)) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg', 'Deactivated Successfully');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg', 'Failed to Deactivated');
        }

        redirect(base_url('master_services'));
    }

    public function deactivated($id)
    {
        $master_services =  $this->master_services->select($id);
        if (!$master_services)
            show_404();

        $data = ['deleted' => 0];

        if ($this->master_services->update($data, $id)) {
            $this->session->set_flashdata('status', 'success');
            $this->session->set_flashdata('msg', 'Activated Successfully');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg', 'Failed to Activated');
        }

        redirect(base_url('master_services'));

    }
}


/* End of file Master_services.php and path \application\controllers\Master_services.php */
