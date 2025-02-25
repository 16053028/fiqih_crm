<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Auth_model extends CI_Model 
{

    private $_table = "tbl_login";
	const SESSION_KEY = 'id_login';

	public function proses($username, $password)
	{
		$this->db->where('username', $username);
		$query = $this->db->get($this->_table);
		$user = $query->row();

		if (!$user) {
			return FALSE;
		}

		if (!password_verify($password, $user->password)) {
			return FALSE;
		}

		$this->session->set_userdata([self::SESSION_KEY => $user->id_login]);
		$this->_update_last_login($user->id_login);

		return $this->session->has_userdata(self::SESSION_KEY);
	}

	public function current_user()
	{
		if (!$this->session->has_userdata(self::SESSION_KEY)) {
			return null;
		}

		$id_login = $this->session->userdata(self::SESSION_KEY);
		$query = $this->db->get_where($this->_table, ['id_login' => $id_login]);
		return $query->row();
	}

	public function logout()
	{
		$this->session->unset_userdata(self::SESSION_KEY);
		return !$this->session->has_userdata(self::SESSION_KEY);
	}

	private function _update_last_login($id)
	{
		$data = [
			'last_login' => date("Y-m-d H:i:s"),
		];

		return $this->db->update($this->_table, $data, ['id_login' => $id]);
	}

}

/* End of file Auth_model.php and path \application\models\Auth_model.php */
                    
