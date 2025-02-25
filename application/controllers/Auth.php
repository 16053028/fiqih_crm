<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
    }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->view('pages/auth/index');
	}

    public function proses(){
        
		$this->form_validation->set_rules('username', 'Username', 'required',
										array(
											'required'      => '* The Username field cannot be empty',
										)
								);

		$this->form_validation->set_rules('password', 'Password', 'required',
										array(
											'required'      => '* The Password field cannot be empty',
										)
								);

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('pages/auth/index');
            }else{
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				if($this->auth->proses($username, $password)) {
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('status', 'danger');
					$this->session->set_flashdata('msg', 'Your username or password may be wrong');
					$this->load->view('pages/auth/index');


				}
			}
    }

	public function logout()
	{
		$this->auth->logout();
		redirect(base_url('auth'));
	}
}
