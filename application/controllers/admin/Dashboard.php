<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {
		public function __construct(){
			parent::__construct();
			
			$this->load->model('admin/Blog_Model', 'Blog_Model');
			
			
		}

		public function index(){
			if ($this->session->userdata('role') === '2'){
				$data['view'] = 'admin/dashboard/user';
			}else{
				$data['view'] = 'admin/dashboard/index';
			}
			
			$this->load->view('admin/layout', $data);
		}

		public function index2(){
			$data['view'] = 'admin/dashboard/index2';
			$this->load->view('admin/layout', $data);
		}
	}

?>	