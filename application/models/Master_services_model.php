<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Master_services_model extends CI_Model 
{

    protected $master_services = 'tbl_layanan';

    public function __construct()
    {
        parent::__construct();
    }


    public function get_all_services(){
      $query = $this->db->get($this->master_services);

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
      $this->db->where("id_layanan", $id);
      $query = $this->db->get($this->master_services);
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
      $this->db->insert($this->master_services);
  
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
      $this->db->where("id_layanan", $id);
      $this->db->update($this->master_services);
  
      if ($this->db->affected_rows())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return true;
        }
      $this->db->trans_rollback();
      return false;
    }
  
}

/* End of file Master_services_model.php and path \application\models\Master_services_model.php */
                    
