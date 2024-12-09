<?php 

class Service_Model extends CI_Model
{
    public function service_submit_data($data,$service_image)
    {
        $slug = str_replace(' ', '-', strtolower($data['slug']));
        $slug = str_replace('&', '-', strtolower($slug));
        $data = 
        [
            'service_name'=>$data['service_name'],
            'service_image'=>$service_image,
            'slug'=>  $slug ,
            'seo_title'=>$data['seo_title'],
            'long_desc'=>$data['long_desc'],
            'seo_desc'=>$data['seo_desc'],
            'seo_keywords'=>$data['seo_keywords'],
        ];
    
      
        if ($this->db->insert('service', $data)) 
        {
            return $data; 
        } 
        else
        { 
            return false; 
        }
    }

    public function service_view()
    {
    $result = $this->db->query("SELECT * FROM `service` ");
    if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function service_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('service');
    }

    public function service_update_data($data,$service_image)
    {
        $slug = str_replace(' ', '-', strtolower($data['slug']));
        $slug = str_replace('&', '-', strtolower($slug));
        $newdata =  [
            'service_name'=>$data['service_name'],
            'service_image'=>$service_image,
            'slug'=>  $slug ,
            'seo_title'=>$data['seo_title'],
            'long_desc'=>$data['long_desc'],
            'seo_desc'=>$data['seo_desc'],
            'seo_keywords'=>$data['seo_keywords'],
        ];
        $this->db->where('id', $data['id']);
        if ($this->db->update('service', $newdata)) 
        {
            return $newdata;
        } 
        else 
        {
            return false;
        }
    }

    public function service_edit($id)
    {
        $result = $this->db->query("SELECT * FROM `service` where id=$id ");
        if ($result->num_rows() > 0) 
        {
            return $result->result();
        } 
        else 
        {
            return 0;
        }
    }

    public function service_detail_data_nm()
{
    $uid = $this->uri->segment(2);
    $result = $this->db->query("SELECT * FROM `service` WHERE REPLACE(LOWER(slug), ' ', '-')='$uid' ");

    if ($result->num_rows() > 0) 
    {
        return $result->result(); // Return the fetched data
    } 
    else {
        return 0;
    }
}

public function service_detail_data_seo()
{
    $uid = $this->uri->segment(2);
    $result = $this->db->query("SELECT * FROM `service` WHERE REPLACE(LOWER(slug), ' ', '-')='$uid' ");
    if ($result->num_rows() > 0) 
    {
        return $result->result(); // Return the fetched data
    } 
    else {
        return 0;
    }
}

public function service_details_view($id)
    {
    $result = $this->db->query("SELECT * FROM `service` where id='$id'");
    if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function getservices_data($page)
    {
      
        $query = $this->db->query("SELECT * FROM `service` WHERE slug=? LIMIT 1", array($page));
        // echo $this->db->last_query(); die;
        // print_r($query->result());
        if ($query) {
            return $query->result_array();
        } else {
            return false;
        }
    }
}
?>