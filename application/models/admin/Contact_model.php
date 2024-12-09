<?php

class Contact_model extends CI_Model
{
    
    public function contact_view()
    {
        $result = $this->db->query("SELECT * FROM `contact_form` order by id DESC;");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function contact_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('contact_form');
    }

    public function consultation_view()
    {
        $result = $this->db->query("SELECT * FROM `consultation_data` order by id DESC;");
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function consultation_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('consultation_data');
    }

    public function consultation_del($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('consultation_data');
    }


}
?>