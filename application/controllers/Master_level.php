<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_level_model', 'master_level');
    }
 





    
    /** 
     * This is the default function, it will return all rows
     * Pagingation is set here, you need to add route.
     * 
     * $route["/master_level"]['GET'] = "/master_level";
     * $route["/master_level/(:num)"]['GET'] = "/master_level";
     * 
     * @return void  */
    public function index()
    {
        $data['title'] = "Master level";
        $data['subtitle'] = "All data Master Level";
        $data['results'] = $this->master_level->get_all_levels();

        $data['content'] = 'pages/master_level/list';
        $data['breadcrumb'] = array(
            'Dashboard'		=> 	array(
                'stat'	=> '',
                'text'	=>	'Master Level',
                'link'	=>	'master_Level'
            ),
            'Master Level'		=> 	array(
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
        $data['title'] = "New Master Level";
            $data['subtitle'] = "Create new Master Level";
            $data['content'] = "pages/master_level/create";

            $data['breadcrumb'] = array(
                'List'		=> 	array(
                    'stat'	=> '',
                    'text'	=>	'List',
                    'link'	=>	'master_level'
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
            $this->form_validation->set_rules('inputLevel', 'Level', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['response'] = validation_errors();
            }

            $data = [
                'level_text' => $this->input->post('inputLevel'),
                'keterangan' => $this->input->post('inputDesc'),
            ];

            if ($this->master_level->insert($data)) {
                $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Saved Successfully');
            } else {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Failed to Save');
            }
            redirect(base_url('master_level'));

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
        $master_level =  $this->master_level->select($id);
        if (!$master_level)
            show_404();

        $data['title'] = "Master_level Details";
        $data['subtitle'] = "View Master_level";
        $data['row'] = $master_level;
        $this->load->view('pages/master_level/view', $data);
    }

    /**
     * To view edit form and update on POST request
     * 
     * @param mixed $id 
     * @return void 
     */
    public function update($id)
    {
        $master_level =  $this->master_level->select($id);

        if (!$master_level)
            show_404();

        $data['title'] = "Update Master Level";
        $data['subtitle'] = "Update Data Master Level";
        $data['content'] = "pages/master_level/update";

        $data['breadcrumb'] = array(
            'List'		=> 	array(
                'stat'	=> '',
                'text'	=>	'List',
                'link'	=>	'master_level'
            ),
            'Create'		=> 	array(
                'stat'	=> 'active',
                'text'	=>	'Update',
                'link'	=>	''
            ),
        );

        if (strtoupper($_SERVER['REQUEST_METHOD']) !== 'POST') {
            $data['row'] = $master_level;

            $this->load->view('main', $data);
        } else {

            $this->form_validation->set_rules('inputLevel', 'Level', 'required');

            if ($this->form_validation->run() == FALSE) {
                $data['response'] = validation_errors();
            }

            $data = [
                'level_text' => $this->input->post('inputLevel'),
                'keterangan' => $this->input->post('inputDesc'),
            ];

            var_dump($data);


            if ($this->master_level->update($data, $id)) {
                $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Updated successfully');
            } else {
                $this->session->set_flashdata('status', 'danger');
                $this->session->set_flashdata('msg', 'Failed to update');
            }
        redirect(base_url('master_level'));

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
        $master_level =  $this->master_level->select($id);
        if (!$master_level)
            show_404();

        $data = ['deleted' => 1];

        if ($this->master_level->update($data, $id)) {
            $this->session->set_flashdata('status', 'success');
                $this->session->set_flashdata('msg', 'Deleted successfully');
        } else {
            $this->session->set_flashdata('status', 'danger');
            $this->session->set_flashdata('msg', 'Failed to delete');
        }
        redirect(base_url('master_level'));

    }

    /**
     * To delete row permanently.
     * 
     * @param mixed $id 
     * @return void 
     */
    public function delete($id)
    {
        $master_level =  $this->master_level->select($id);
        if (!$master_level)
            show_404();

        if ($this->master_level->delete($id)) {
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
    /* private function __pagination($url, $total_rows, $uri_segment = 3,  $per_page = 15)
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
    } */
}


/* End of file Master_level.php and path \application\controllers\Master_level.php */
