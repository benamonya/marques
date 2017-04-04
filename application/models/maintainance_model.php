<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Maintainance_model extends CI_Model {

  
        public function __construct()
        {
                // Call the CI_Model constructor
                parent::__construct();
        }


        public function get_maintainance()
        {
                $query = $this->db->get('maintenenace');
                return $query->result();
        }
        public function create($data)
        {
            if($this->db->insert('maintenenace', $data)){
                return true;
            }
            return false;
        }
        public function delete($id)
         {
             $this->db->where('Id', $id);
            if ($this->db->delete('maintenenace')) {
               return TRUE;
            }
            return FALSE;
         }
         public function repair_delete($id)
         {
             $this->db->where('Id', $id);
            if ($this->db->delete('repair')) {
               return TRUE;
            }
            return FALSE;
         }
        public function createRepair($data)
        {
            if($this->db->insert('repair', $data)){
                return true;
            }
            return false;
        }
        public function get_supplier()
        {
                $query = $this->db->get('suppliermaster');
                return $query->result();
        }public function get_maintype()
        {
                $query = $this->db->get('servicetypemaster');
                return $query->result();
        }
        public function edit($id)
        {
           return $this->db->get_where('maintenenace', array('Id'=>$id));
        }
        public function editREpair($id)
        {
           return $this->db->get_where('repair', array('Id'=>$id));
        }
        public function updateRepair($id, $data)
       {
          $this->db->where('Id', $id);
          $this->db->update('repair', $data);
       }public function update($id, $data)
       {
          $this->db->where('Id', $id);
          $this->db->update('maintenenace', $data);
       }
       public function get_repair()
        {
                $query = $this->db->get('repair');
                return $query->result();
        }
}