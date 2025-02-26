<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Master_project_model extends CI_Model 
{

    protected $master_project = 'tbl_psb';

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_customer_project()
    {
      $this->db->select('a.id_psb, b.nama_pelanggan, c.nama_layanan, d.username, a.status_psb, a.created_at')
              ->from($this->master_project . " as a")->where('a.deleted = 0')
              ->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left')
              ->join('tbl_layanan as c', 'a.id_layanan = c.id_layanan', 'left')
              ->join('tbl_login as d', 'a.id_login = d.id_login', 'left');
      $query = $this->db->get();

      return $query->result();
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
      $this->db->insert($this->master_project);
  
      if ($id = $this->db->insert_id())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return $id;
        }
      $this->db->trans_rollback();
      return false;
    }                      
                        
}


/* End of file Master_project_model.php and path \application\models\Master_project_model.php */
