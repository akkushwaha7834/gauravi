<?php 

class Seo_model extends CI_Model
{
    public function seo_submit_data($data)
    {
        $data = 
        [
            'page_name'=>$data['page_name'],
            'seo_title'=>$data['seo_title'],
            'seo_desc'=>$data['seo_desc'],
            'seo_keywords'=>$data['seo_keywords'],
        ];
        if ($this->db->insert('seo', $data)) 
        {
            return $data; 
        } 
        else
        { 
            return false; 
        }
    }

    public function seo_view()
    {
    $result = $this->db->query("SELECT *,(Select page_name from pages where pages.page_name = seo.page_name) as page_name FROM `seo`;");
    if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function seo_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('seo');
    }

    public function seo_update_data($data)
    {
        $newdata =  [
            'page_name'=>$data['page_name'],
            'seo_title'=>$data['seo_title'],
            'seo_desc'=>$data['seo_desc'],
            'seo_keywords'=>$data['seo_keywords'],
        ];
        $this->db->where('id', $data['id']);
        if ($this->db->update('seo', $newdata)) 
        {
            return $newdata;
        } 
        else 
        {
            return false;
        }
    }

    public function seo_edit($id)
    {
        $result = $this->db->query("SELECT * FROM `seo` where id=$id");
        if ($result->num_rows() > 0) 
        {
            return $result->result();
        } 
        else 
        {
            return 0;
        }
    }

    public function role_fetch()
    {
        $role_data = $this->db->query("SELECT * FROM `pages`");
        $fetch = $role_data->num_rows();
        if ($fetch > 0) {
            return $fetch = $role_data->result_array();
        } else {
            return false;
        }
    }
    
    	public function getseo_data($page)
        {
            $query = $this->db->query("SELECT * FROM `seo` WHERE page_name=?", array($page));

        if ($query) {
        return $query->result();
    } else {
        return false;
    }
}
}
?>