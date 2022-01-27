<?php

class Event_model extends CI_Model
{

    public function getData($where = array(), $return_row = false)
    {
        $this->db->select('*');
        $this->db->from('tbl_event');
        $this->db->where('is_deleted', 0);
        if (!empty($where)) {
            $this->db->where($where);
        }
        $query = $this->db->get();

        // echo $this->db->last_query();
        // die;
        if ($query->num_rows() > 0) {
            if ($return_row ==  true) {
                return $query->row();
            } else {
                return $query->result();
            }
        }
        return false;
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_event', $data);
        return $this->db->insert_id();
    }

    public function updateData($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('tbl_event');
        return $this->db->affected_rows();
    }

    public function deleteData($id)
    {
        $this->db->set('is_deleted', 1);
        $this->db->where('id', $id);
        $this->db->update('tbl_event');
        return $this->db->affected_rows();
    }
}
