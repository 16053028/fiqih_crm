<?php 
                
defined('BASEPATH') OR exit('No direct script access allowed');
                        
class Master_approval_model extends CI_Model 
{

    protected $master_approval = 'tbl_psb';

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
  
      $this->db->order_by("id", "desc");
      $query = $this->db->get($this->master_approval);
  
      return ($count != NULL) ? $query->num_rows() : (($query->num_rows()) ? $query->result() : false);
    }

    public function get_all_approval(){
      $this->db->select('a.id_psb, b.id_pelanggan, b.nama_pelanggan, c.nama_layanan, d.username, a.status_psb, a.created_at')
              ->from($this->master_approval . " as a")->where('a.deleted = 0 and a.status_psb = 0 and a.id_layanan > 0')
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
      $this->db->where("id_pelanggan", $id);
      $query = $this->db->get($this->master_approval);
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
      $this->db->insert($this->master_approval);
  
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
      $this->db->where("id_pelanggan", $id);
      $this->db->update($this->master_approval);
  
      if ($this->db->affected_rows())
        if ($this->db->trans_status()) {
          $this->db->trans_commit();
          return true;
        }
      $this->db->trans_rollback();
      return false;
    }
  
    
}

/* End of file Master_approval_model.php and path \application\models\Master_approval_model.php */
                    
