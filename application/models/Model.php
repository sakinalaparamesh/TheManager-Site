<?php
class Model extends CI_Model{
    
    
    public function save($table,$data)
    {
        return $this->db->insert($table, $data);
    }
    public function fetch($table)
    {
        return $this->db->get($table);
    }
    public function check($table,$data)
    {
        $this->db->where($data);
        return $this->db->get($table);
    }
    public function update($table,$check,$data)
    {
        $this->db->where($check);
        return $this->db->update($table, $data); 
    }
    public function delete($table,$check)
    {
        $this->db->where($check);
        return $this->db->delete($table); 
    }
}