<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_customers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_customers_model', 'master_customers');

        if (!$this->session->userdata('id_login') && ($this->session->userdata('id_level') != 3 )) {
			redirect('auth');
		}

        $this->config->load('form_validation');
        $this->form_validation->set_rules($this->config->item('master_level_form'));
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
        $data['results'] = $this->master_customers->get_all_customers();

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

            $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[20]|xss_clean|strip_tags');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|is_unique[master_customers.email]|xss_clean|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => validation_errors()]);
                return;
            }

            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            ];


            if ($this->master_customers->insert($data)) {
                echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
                return;
            } else {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
                return;
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
        $master_customers =  $this->master_customers->select($id);
        if (!$master_customers)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['title'] = "Edit Master_customers";
            $data['subtitle'] = "Modify Master_customers";
            $data['row'] = $master_customers;

            $this->load->view('pages/master_customers/edit', $data);
        } else {

            $this->form_validation->set_rules('username', 'username', 'required|min_length[3]|max_length[20]|xss_clean|strip_tags');
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[10]|max_length[80]|xss_clean|strip_tags');

            if ($this->form_validation->run() == FALSE) {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => validation_errors()]);
                return;
            }

            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
            ];


            if ($this->master_customers->update($data, $id)) {
                echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
                return;
            } else {
                echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
                return;
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
        $master_customers =  $this->master_customers->select($id);
        if (!$master_customers)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_customers->update($data, $id)) {
            echo json_encode(['error' => false, 'message' => 'success', 'response' => true]);
            return;
        } else {
            echo json_encode(['error' => true, 'message' => 'error', 'response' => false]);
            return;
        }
    }

}


/* End of file Master_customers.php and path \application\controllers\Master_customers.php */
