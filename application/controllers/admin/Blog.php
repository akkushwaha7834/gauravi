<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Blog extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Blog_Model', 'Blog_Model');
        $this->load->helper('url');
    }

    public function add_blog()
    {
        $data['view'] = 'admin/blog/addblog';
        $this->load->view('admin/layout', $data);
    }
    public function blog_submit_data()
    {
        $data = [];
        if ($this->input->post()) {
            $data = $this->input->post();
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('blog_image')) {
                $uploadData = $this->upload->data();
                $blog_image = $uploadData['file_name'];
            } else {
                $error = array('error' => $this->upload->display_errors());
            }
            if ($this->Blog_Model->blog_submit_data($data, $blog_image) == true) {
                redirect("admin/blog/blog_view");
            } ?>
            <?php
        } else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }

    public function blog_view()
    {
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $data['view'] = 'admin/blog/viewblog';
        $this->load->view('admin/layout', $data);
    }

    public function blog_detail($uid)
    {
        $uid = $this->uri->segment(2);
        $data['blog_detail'] = $this->Blog_Model->blog_detail($uid);
        $data['view'] = 'admin/blog/viewblog';
        $this->load->view('admin/layout', $data);
    }

    public function blog_delete($id)
    {
        $id = $this->uri->segment(4);
        if ($this->Blog_Model->blog_delete($id) == true) {
            redirect("admin/blog/blog_view");
        }
    }
    public function blog_edit($id)
    {
        $id = $this->uri->segment(4);
        $data['blog_view'] = $this->Blog_Model->blog_edit($id);
        $data['view'] = 'admin/blog/editblog';
        $this->load->view('admin/layout', $data);
    }

    public function blog_update_data()
    {
        $data = [];
        if ($this->input->post()) {
            $data = $this->input->post();
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if (isset($_FILES['blog_image']['name']) && !empty($_FILES['blog_image']['name'])) {
                if ($this->upload->do_upload('blog_image')) {
                    $uploadData = $this->upload->data();
                    $blog_image = $uploadData['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            } else {
                $blog_image = $this->input->post('update_image');
            }
            if ($this->Blog_Model->blog_update_data($data, $blog_image) == true) {
                redirect("admin/blog/blog_view");
            } ?>
            <?php
        } else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }
}
            ?>