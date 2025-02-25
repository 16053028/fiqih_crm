<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_login_model', 'master_login');
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
        // $this->session->set_flashdata('status', 'danger');
        // $this->session->set_flashdata('msg', 'Data gagal disimpan');
        $this->load->view('main', $data);
    }

    /**
     * To view new form and insert row on POST request.
     * 
     *  @return void  */
    public function create()
    {
        $this->load->model('master_level_model', 'master_level');
        $data['levels'] = $this->master_level->get_all_levels();
        $data['title'] = "New Master Login";
        $data['subtitle'] = "Create new Master Login";
        $data['content'] = "pages/master_login/create";

        $data['breadcrumb'] = array(
            'List'		=> 	array(
                'stat'	=> '',
                'text'	=>	'List',
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
            $this->form_validation->set_rules('inputUsername', 'Username', 'required');
                $this->form_validation->set_rules('inputPassword', 'Password', 'required',
                        array('required' => 'You must provide a %s.')
                );
                $this->form_validation->set_rules('inputConfirmPass', 'Password Confirmation', 'required|matches[inputPassword]');
                $this->form_validation->set_rules('levelSelect', 'Level Select', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['response'] = validation_errors();
            }

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

    /**
     * To view single row detail.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function view($id)
    {
        $master_login =  $this->master_login->select($id);
        if (!$master_login)
            show_404();

        $data['title'] = "Master_login Details";
        $data['subtitle'] = "View Master_login";
        $data['row'] = $master_login;
        $this->load->view('pages/master_login/view', $data);
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
        if (!$master_login)
            show_404();

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['title'] = "Edit Master_login";
            $data['subtitle'] = "Modify Master_login";
            $data['row'] = $master_login;

            $this->load->view('pages/master_login/edit', $data);
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


            if ($this->master_login->update($data, $id)) {
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
        $master_login =  $this->master_login->select($id);
        if (!$master_login)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_login->update($data, $id)) {
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
        $master_login =  $this->master_login->select($id);
        if (!$master_login)
            show_404();

        if ($this->master_login->delete($id)) {
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
    /* private function __pagination($total_rows, $uri_segment = 3,  $per_page = 15)
    {
        $config["base_url"] = base_url("master_login/index");
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
    } */
}


/* End of file Master_login.php and path \application\controllers\Master_login.php */
