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
      $this->db->select('a.id_psb, b.id_pelanggan, b.nama_pelanggan, c.nama_layanan, d.username, a.status_psb, a.created_at')
              ->from($this->master_project . " as a")->where('a.deleted = 0')
              ->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left')
              ->join('tbl_layanan as c', 'a.id_layanan = c.id_layanan', 'left')
              ->join('tbl_login as d', 'a.id_login = d.id_login', 'left');
      $query = $this->db->get();

      return $query->result();
    }

    public function get_all_customer_project_by_id($id_pelanggan)
    {
      $this->db->select('a.id_psb, b.id_pelanggan, c.id_layanan, b.nama_pelanggan, c.nama_layanan, d.username, a.status_psb, a.created_at')
              ->from($this->master_project . " as a")->where('b.id_pelanggan', $id_pelanggan)
              ->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left')
              ->join('tbl_layanan as c', 'a.id_layanan = c.id_layanan', 'left')
              ->join('tbl_login as d', 'a.id_login = d.id_login', 'left');
      $query = $this->db->get();

      return $query->row();
    } 

    public function get_all_customer_project_by_current_sales($id_user)
    {
      $this->db->select('a.id_psb, b.id_pelanggan, d.id_login, c.id_layanan, b.nama_pelanggan, c.nama_layanan, d.username, a.status_psb, a.created_at')
              ->from($this->master_project . " as a")->where('d.id_login = ' . $id_user)
              ->join('tbl_pelanggan as b', 'a.id_pelanggan = b.id_pelanggan', 'left')
              ->join('tbl_layanan as c', 'a.id_layanan = c.id_layanan', 'left')
              ->join('tbl_login as d', 'a.id_login = d.id_login', 'left');
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
      $this->db->where("id", $id);
      $query = $this->db->get($this->master_project);
      return ($query->num_rows()) ? $query->row() : false;
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
      $this->db->where("id_pelanggan", $id);
      $this->db->update($this->master_project);
  
      if ($this->db->affected_rows())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return true;
        }
      $this->db->trans_rollback();
      return false;
    }
  
}

/* End of file Master_project_model.php and path \application\models\Master_project_model.php */
                    
