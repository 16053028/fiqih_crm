<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Master_login_model extends CI_Model 
{

    protected $master_login = 'tbl_login';

    public function __construct()
    {
        parent::__construct();
    }




    /**
     * To return all rows according to pagination setup.
     * 
     * @param mixed $limit // limit number of rows
     * @param mixed $start // to start from row.
     * @param mixed $count // if set it will return num_rows
     * @return mixed 
     */
    public function select_all($limit = NULL, $start = NULL, $count = NULL)
    {
      if ($limit != NULL && $start != NULL)
        $this->db->limit($limit, $start);
  
      if ($limit != NULL && $start == NULL)
        $this->db->limit($limit);
      
      $this->db->select('a.id_login, a.username, b. level_text, a. last_login, a.created_at')
              ->from($this->master_login . " as a")
              ->join('tbl_levels as b', 'a.id_level = b.id_level', 'left')
              ->order_by("created_at");
      $query = $this->db->get();
  
      return ($count != NULL) ? $query->num_rows() : (($query->num_rows()) ? $query->result() : false);
    }

    public function get_all_login(){
      $this->db->select('a.id_login, a.username, b. level_text, a. last_login, a.created_at')
              ->from($this->master_login . " as a")->where('a.deleted = 0')
              ->join('tbl_levels as b', 'a.id_level = b.id_level', 'left')
              ->order_by("created_at");
      $query = $this->db->get();

      return $query->result();
    }
  
    /**
     * To select a single row.
     * 
     * @param int $id 
     * @return mixed 
     */
    public function select($id)
    {
      $this->db->where("id_login", $id);
      $query = $this->db->get($this->master_login);
      return ($query->num_rows()) ? $query->row() : false;
    }
  
    /**
     * To insert a row
     * 
     * @param array $data array including data.
     * @return bool|int 
     */
    public function insert($data)
    {
      $this->db->trans_begin();
  
      $this->db->set($data);
      $this->db->insert($this->master_login);
  
      if ($id = $this->db->insert_id())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return $id;
        }
      $this->db->trans_rollback();
      return false;
    }
  
    /**
     * @param array $data array including data.
     * @param int $id 
     * @return bool 
     */
    public function update($data, $id)
    {
      $this->db->trans_begin();
  
      $this->db->set($data);
      $this->db->where("id_login", $id);
      $this->db->update($this->master_login);
  
      if ($this->db->affected_rows())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return true;
        }
      $this->db->trans_rollback();
      return false;
    }
}

/* End of file Master_login_model.php and path \application\models\Master_login_model.php */
                    
