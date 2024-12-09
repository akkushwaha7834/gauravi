<?php 

class Blog_Model extends CI_Model
{
    public function blog_submit_data($data,$blog_image)
    {
        $data = 
        [
            'blog_name'=>$data['blog_name'],
            'blog_image'=>$blog_image,
            'slug'=>$data['slug'],
            'blog_author'=>$data['blog_author'],
            'blog_date'=>$data['blog_date'],
            // 'blog_desc'=>$data['blog_desc'],
            'long_desc'=>$data['long_desc'],
            // 'seo_title'=>$data['seo_title'],
            'seo_desc'=>$data['seo_desc'],
            'seo_keywords'=>$data['seo_keywords'],
        ];
       
        if ($this->db->insert('blog', $data)) 
        {
            return $data; 
        } 
        else
        { 
            return false; 
        }
    }

    public function blog_view()
    {
    $result = $this->db->query("SELECT * FROM `blog` ORDER BY `blog`.`blog_date` DESC");
    if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

    public function blog_delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('blog');
    }

    public function blog_update_data($data,$blog_image)
    {
        $newdata =  [
            'blog_name'=>$data['blog_name'],
            'blog_image'=>$blog_image,
            'slug'=>$data['slug'],
            'blog_author'=>$data['blog_author'],
            'blog_date'=>$data['blog_date'],
            // 'blog_desc'=>$data['blog_desc'],
            'long_desc'=>$data['long_desc'],
            // 'seo_title'=>$data['seo_title'],
            'seo_desc'=>$data['seo_desc'],
            'seo_keywords'=>$data['seo_keywords'],
        ];
        $this->db->where('id', $data['id']);
        if ($this->db->update('blog', $newdata)) 
        {
            return $newdata;
        } 
        else 
        {
            return false;
        }
    }

    public function blog_edit($id)
    {
        $result = $this->db->query("SELECT * FROM `blog` where id=$id ORDER BY `blog`.`blog_date` DESC");
        if ($result->num_rows() > 0) 
        {
            return $result->result();
        } 
        else 
        {
            return 0;
        }
    }

    public function blog_detail_data_nm()
{
    $uid = $this->uri->segment(2);
    $result = $this->db->query("SELECT * FROM `blog` WHERE REPLACE(LOWER(slug), ' ', '-')='$uid' ORDER BY `blog`.`blog_date` DESC");

    if ($result->num_rows() > 0) 
    {
        return $result->result(); // Return the fetched data
    } 
    else {
        return 0;
    }
}

public function blog_detail_data_seo()
{
    $uid = $this->uri->segment(2);
    $result = $this->db->query("SELECT * FROM `blog` WHERE REPLACE(LOWER(slug), ' ', '-')='$uid' ORDER BY `blog`.`blog_date` DESC");
    if ($result->num_rows() > 0) 
    {
        return $result->result(); // Return the fetched data
    } 
    else {
        return 0;
    }
}

public function blog_details_view($id)
    {
    $result = $this->db->query("SELECT * FROM `blog` where id='$id'");
    if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return 0;
        }
    }

}
?>