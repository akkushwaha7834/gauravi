<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Seo extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Seo_model', 'Seo_model');
        $this->load->helper('url');
    }

    public function add_seo()
    {
        $data['view'] = 'admin/seo/add_seo';
        $this->load->view('admin/layout', $data);
    }
    public function seo_submit_data()
    {
        $data = [];
        if ($this->input->post()) 
        {
            $data = $this->input->post();
            if ($this->Seo_model->seo_submit_data($data) == true) {
                redirect("admin/seo/seo_view");
            } ?>
            <?php
        } 
        else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }
    
    public function seo_view()   
    {	
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['view'] ='admin/seo/view_seo';
        $this->load->view('admin/layout',$data);
    }
    public function seo_delete($id) 
    {
        $id = $this->uri->segment(4);
        if ($this->Seo_model->seo_delete($id) == true) 
        {
            redirect("admin/seo/seo_view");
        }
    }
    public function seo_edit($id)
    {
            $id=$this->uri->segment(4);
            $data['seo_view'] = $this->Seo_model->seo_edit($id);
            $data['view'] ='admin/seo/edit_seo';
            $this->load->view('admin/layout',$data);
    }

    public function seo_update_data()
    {
        $data = [];
        if ($this->input->post()) 
        {
            $data = $this->input->post();
            if ($this->Seo_model->seo_update_data($data) == true) {
                redirect("admin/seo/seo_view");
            } ?>
            <?php
        } 
        else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }
}
?>