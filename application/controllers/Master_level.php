<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
        
class Master_level extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('master_level_model', 'master_level');

        if (!$this->session->userdata('id_login') && ($this->session->userdata('id_level') == 1 )) {
			redirect('auth');
		}

        $this->config->load('form_validation');
        $this->form_validation->set_rules($this->config->item('master_level_form'));

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
                'text'	=>	'Master Level',
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

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('main', $data);
            } else {
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
                'text'	=>	'MasterLevel',
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
                $this->load->view('main', $data);

            }else{
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

}


/* End of file Master_level.php and path \application\controllers\Master_level.php */
