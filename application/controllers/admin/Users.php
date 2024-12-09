<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session', 'form_validation', 'email'));
		$this->load->database();
		$this->load->model('admin/User_model', 'User_model');
		$this->load->model('admin/auth_model', 'auth_model');
		$this->load->library('email');
	}

	public function index()
	{

		if ($this->session->has_userdata('is_admin_login')) {
			$data['all_users'] = $this->User_model->get_all_users();
			$data['view'] = 'admin/users/user_list';
			$this->load->view('admin/layout', $data);
		} else {
			redirect('admin/auth/login');
		}
	}

	public function student_view()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$data['all_users'] = $this->User_model->get_all_users();
			$data['view'] = 'admin/users/student';
			$this->load->view('admin/layout', $data);
		} else {
			redirect('admin/auth/login');
		}
	}

	public function user_view()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$data['user_view'] = $this->User_model->get_users();
			$data['view'] = 'admin/users/user_view';
			$this->load->view('admin/layout', $data);
		} else {
			redirect('admin/auth/login');
		}
	}

	public function add()
    {
        if ($this->session->has_userdata('is_admin_login')) {
            if ($this->input->post('submit')) {
                // Form validation rules
                $this->form_validation->set_rules('firstname', 'Username', 'trim|required');
                $this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
                $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
                $this->form_validation->set_rules('captcha', 'CAPTCHA', 'required|callback_check_captcha');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
    
                // Run validation
                if ($this->form_validation->run() == FALSE) {
                    $data['captcha'] = $this->generate_captcha();
                    $data['view'] = 'admin/users/user_add';
                    $this->load->view('admin/layout', $data);
                } else {
                    // Check if email is already registered
                    $email = $this->input->post('email');
                    $existing_user = $this->auth_model->get_user_by_email($email);
    
                    if ($existing_user) {
                        // If email exists, show an error message
                        $data['captcha'] = $this->generate_captcha();
                        $data['msz'] = 'Email is already registered with an account, please try with another email';
                        $data['view'] = 'admin/users/user_add';
                        $this->load->view('admin/layout', $data);
                    } else {
                        // Proceed with registration if email is not registered
                        $data = array(
                            'username' => $this->input->post('firstname') . ' ' . $this->input->post('lastname'),
                            'firstname' => $this->input->post('firstname'),
                            'lastname' => $this->input->post('lastname'),
                            'email' => $email,
                            'mobile_no' => $this->input->post('mobile_no'),
                            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                            'is_admin' => $this->input->post('user_role'),
                            'created_at' => date('Y-m-d : h:m:s'),
                            'updated_at' => date('Y-m-d : h:m:s'),
                        );
    
                        $result = $this->User_model->add_user($data);
    
                        if ($result) {
                            $data['captcha'] = $this->generate_captcha();
                            $data['msz']='Record is added successfully!';
                            $data['view'] = 'admin/users/user_add';
                            $this->load->view('admin/layout', $data);
                        }
                    }
                }
            } else {
                $data['captcha'] = $this->generate_captcha();
                $data['view'] = 'admin/users/user_add';
                $this->load->view('admin/layout', $data);
            }
        } else {
            redirect('admin/auth/login');
        }
    }


	public function edit($id = 0)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			if ($this->input->post('submit')) {
				$this->form_validation->set_rules('firstname', 'Username', 'trim|required');
				$this->form_validation->set_rules('lastname', 'Lastname', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('mobile_no', 'Number', 'trim|required');
				$this->form_validation->set_rules('user_role', 'User Role', 'trim|required');

				if ($this->form_validation->run() == FALSE) {
					$data['user'] = $this->User_model->get_user_by_id($id);
					$data['view'] = 'admin/users/user_edit';
					$this->load->view('admin/layout', $data);
				} else {
					$data = array(
						'username' => $this->input->post('firstname') . ' ' . $this->input->post('lastname'),
						'firstname' => $this->input->post('firstname'),
						'lastname' => $this->input->post('lastname'),
						'email' => $this->input->post('email'),
						'mobile_no' => $this->input->post('mobile_no'),
						'password' => $this->input->post('password') ? password_hash($this->input->post('password'), PASSWORD_BCRYPT) : $data['user']['password'],
						'is_admin' => $this->input->post('user_role'),
						'updated_at' => date('Y-m-d : h:m:s'),
					);
					$data = $this->security->xss_clean($data);
					$result = $this->User_model->edit_user($data, $id);
					if ($result) {
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/users'));
					}
				}
			} else {
				$data['user'] = $this->User_model->get_user_by_id($id);
				$data['view'] = 'admin/users/user_edit';
				$this->load->view('admin/layout', $data);
			}
		} else {
			redirect('admin/auth/login');
		}
	}

	public function del($id = 0)
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$this->db->delete('users', array('id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/users'));
		} else {
			redirect('admin/auth/login');
		}
	}

	function verify($hash = NULL)
	{
		$this->load->helper('url');
		$this->load->model('User_model');

		if ($this->User_model->verifyEmailID($hash)) {

			redirect('admin/auth/login');
		} else {

			redirect('admin/auth/login');
		}
	}

	public function web_view()
	{
		$result = $this->db->query("SELECT * FROM `users`");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function fetch_state()
	{
		if ($this->input->post('country_id')) {
			echo $this->User_model->fetch_state($this->input->post('country_id'));
		}
	}

	public function fetch_city()
	{
		if ($this->input->post('state_id')) {
			echo $this->User_model->fetch_city($this->input->post('state_id'));
		}
	}

	public function student_data()
	{
		if ($this->session->has_userdata('is_admin_login')) {
			$data['getall_users'] = $this->User_model->getall_users();
			$data['view'] = 'admin/users/student';
			$this->load->view('admin/layout', $data);
			
		} else {
			redirect('admin/auth/login');
		}
	}

	public function check_captcha($str)

{

    $user_input = strtolower($str);

    $captcha_code = strtolower($this->session->userdata('captcha_code'));
 
    if ($user_input === $captcha_code) {

        return TRUE;

    } else {

        $this->form_validation->set_message('check_captcha', 'The CAPTCHA code entered is incorrect.');

        return FALSE;

    }

}
 
    private function generate_captcha() {

        $captcha_code = substr(md5(uniqid(mt_rand(), true)), 0, 5); // Generate a random code (you can customize this)

        $this->session->set_userdata('captcha_code', $captcha_code);
 
        $data['captcha']['image'] = $this->create_captcha_image($captcha_code);
 
        return $data['captcha'];

		
    }
 
    private function create_captcha_image($captcha_code) {

        $img_width = 150;

        $img_height = 30;

		$font_size = 18;

        $image = imagecreatetruecolor($img_width, $img_height);

        $text_color = imagecolorallocate($image, 255, 255, 255);

        imagestring($image, 5, 10, 8, $captcha_code, $text_color);
 
        ob_start();

        imagepng($image);

        $image_data = ob_get_clean();
 
        imagedestroy($image);
 
        $base64_image = 'data:image/png;base64,' . base64_encode($image_data);
 
        return $base64_image;

    }
}
?>