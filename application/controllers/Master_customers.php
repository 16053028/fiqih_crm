<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_customers_model', 'master_customers');
        $this->load->model('master_services_model', 'master_services');
        $this->load->model('master_project_model', 'master_project');

        if (!$this->session->userdata('id_login')) {
			redirect('auth');
		}

        $this->config->load('form_validation');
        $this->form_validation->set_rules($this->config->item('master_services_form'));
    }
 

    /** 
     * This is the default function, it will return all rows
     * Pagingation is set here, you need to add route.
     * 
     * $route["/master_customers"]['GET'] = "/master_customers";
     * $route["/master_customers/(:num)"]['GET'] = "/master_customers";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Master Customer";
        $data['subtitle'] = "All data Master Customer";
        if ($this->session->userdata('id_level') == 3) {
            $data['results'] = $this->master_customers->get_all_customer_by_current_sales($this->session->userdata('id_login'));
        }else{
            $data['results'] = $this->master_customers->get_all_customer();
        }

        $data['content'] = 'pages/master_customers/list';
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
     * To view new form and insert row on POST request.
     * 
     *  @return void  */
    public function create()
    {
        $data['services'] = $this->master_services->get_all_services(1);
        $data['title'] = "Master Customer";
        $data['subtitle'] = "Add new Customer";

        $data['content'] = 'pages/master_customers/create';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Customer',
                'link'	=>	'master_customers'
            ),
            'Master Customer'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'Create',
                'link'	=>	''
            ),
        );

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {

            $this->load->view('main', $data);
        } else {

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }

            $data = [
                'nama_pelanggan' => $this->input->post('inputCustomerName'),
                'telp_pelanggan' => $this->input->post('inputTelp'),
                'alamat_pelanggan' => $this->input->post('inputAddress'),
            ];

            $id_cust = $this->master_customers->insert($data);

            if ($id_cust) {
                $data['psb'] = [
                    'id_pelanggan'  => $id_cust,
                    'id_login'    => $this->session->userdata('id_login'),
                ];
                if ($this->master_project->insert($data['psb'])) {
                    $this->session->set_flashdata('status', 'success');
                    $this->session->set_flashdata('msg', 'Saved Successfully');
                }else{
                    $this->session->set_flashdata('status', 'danger');
                    $this->session->set_flashdata('msg', 'Failed to save data');
                }
            } else {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Failed to save data');
            }

            redirect(base_url('master_customers'));

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
        $master_customers =  $this->master_customers->select($id);

        $data['services'] = $this->master_services->get_all_services(1);
        $data['title'] = "Master Customer";
        $data['subtitle'] = "Add new Customer";

        $data['content'] = 'pages/master_customers/update';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Customer',
                'link'	=>	'master_customers'
            ),
            'Master Customer'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'Create',
                'link'	=>	''
            ),
        );
        if (!$master_customers)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['row'] = $master_customers;

            $this->load->view('main', $data);
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            }

            $data = [
                'nama_pelanggan' => $this->input->post('inputCustomerName'),
                'telp_pelanggan' => $this->input->post('inputTelp'),
                'alamat_pelanggan' => $this->input->post('inputAddress'),
            ];


            if ($this->master_customers->update($data, $id)) {
                $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Saved Successfully');
            } else {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Failed to save data');
            }

            redirect(base_url('master_customers'));
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
        $master_customers =  $this->master_customers->select($id);
        if (!$master_customers)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_customers->update($data, $id)) {
            if ($this->master_project->update($data, $id)) {
                $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Deleted Successfully');
            }
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg', 'Failed to delete data');
        }
        redirect(base_url('master_customers'));

    }

    /**
     * To set column deleted 1.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function follow_up($id)
    {
        $this->session->set_flashdata('status', 'info');
        $this->session->set_flashdata('msg', 'Under developtment');
        redirect(base_url('master_customers'));

    }

}


/* End of file Master_customers.php and path \application\controllers\Master_customers.php */
