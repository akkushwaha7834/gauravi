<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Service extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
      
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
        $this->load->model('admin/Service_Model', 'Service_Model');
     
    }

    public function add_service()
    {
        $data['view'] = 'admin/service/addservice';
        $this->load->view('admin/layout', $data);
    }
    public function service_submit_data()
    {
       
        $data = [];
        if ($this->input->post()) 
        {
            $data = $this->input->post();
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config); 
            if($this->upload->do_upload('service_image'))
            {
                $uploadData = $this->upload->data();
                $service_image = $uploadData['file_name'];
            }
            else
            {
                $error = array('error' => $this->upload->display_errors());
            }
            if ($this->Service_Model->service_submit_data($data,$service_image) == true) {
                redirect("admin/service/service_view");
            } ?>
            <?php
        } 
        else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }

    public function service_view()   
    {	
        $data['service_view'] = $this->Service_Model->service_view();
        $data['view'] ='admin/service/viewservice';
        $this->load->view('admin/layout',$data);
    }

    public function service_detail($uid)   
    {   
        $uid = $this->uri->segment(2);
        $data['service_detail'] = $this->Service_Model->service_detail($uid);
        $data['view'] ='admin/service/viewservice';
        $this->load->view('admin/layout',$data);
    }

    public function service_delete($id) 
    {
        $id = $this->uri->segment(4);
        if ($this->Service_Model->service_delete($id) == true) 
        {
            redirect("admin/service/service_view");
        }
    }
    public function service_edit($id)
    {
            $id=$this->uri->segment(4);
            $data['service_view'] = $this->Service_Model->service_edit($id);
            $data['view'] ='admin/service/editservice';
            $this->load->view('admin/layout',$data);
    }

    public function service_update_data()
    {
        $data = [];
        if ($this->input->post()) 
        {
            $data = $this->input->post();
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
            if (isset($_FILES['service_image']['name']) && !empty($_FILES['service_image']['name'])) {
                if ($this->upload->do_upload('service_image')) {
                    $uploadData = $this->upload->data();
                    $service_image = $uploadData['file_name'];
                } else {
                    $error = array('error' => $this->upload->display_errors());
                }
            } else {
                $service_image = $this->input->post('update_image');
            }
            if ($this->Service_Model->service_update_data($data,$service_image) == true) {
                redirect("admin/service/service_view");
            }?>
            <?php
        }
        else {
            $data['message'] = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error!</strong> Sorry Please Try Again.</div>';
        }
    }
}
?>