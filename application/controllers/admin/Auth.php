<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
        $this->load->model('admin/Seo_model', 'Seo_model');
        $this->load->model('admin/Blog_Model', 'Blog_Model');
        $this->load->model('admin/Service_Model', 'Service_Model');
		$this->load->model('admin/auth_model', 'auth_model');
		$this->load->model('admin/User_model', 'User_model');
	

	}

	public function index()
	{

		if ($this->session->has_userdata('is_admin_login')) {

			redirect('admin/dashboard');

		} else {

			redirect('admin/auth/login');

		}

	}

	public function login()
    {
        if ($this->input->post('submit')) {
            // Validate form input
            $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('captcha', 'CAPTCHA', 'required|callback_check_captcha');
    
            if ($this->form_validation->run() == FALSE) {
                // If validation fails, generate a new captcha and reload the login page with errors
                $data['captcha'] = $this->generate_captcha();
                $this->load->view('frontend/include/header');
                $this->load->view('frontend/login', $data);
                $this->load->view('frontend/include/footer');
    
            } else {
                // Retrieve the email and password from the form
                $email = $this->input->post('email');
                $password = $this->input->post('password');
    
                // Check if email exists
                $user = $this->auth_model->get_user_by_email($email);
    
                if ($user) {
                    // If email exists, check if the password matches
                    $result = $this->auth_model->check_password($email, $password);
    
                    if ($result) {
                        // If password is correct, set session data and redirect to the admin dashboard
                        $admin_data = array(
                            'admin_id' => $user['id'],
                            'username' => $user['username'],
                            'name' => $user['firstname'] . '&nbsp;' . $user['lastname'],
                            'role' => $user['is_admin'],
                            'role_name' => $user['role_name'],
                            'refer_code' => $user['refer_code'],
                            'is_admin_login' => TRUE
                        );
                        $this->session->set_userdata($admin_data);
                        redirect(base_url('admin/dashboard'), 'refresh');
                    } else {
                        // Password is incorrect, load the login page with password error
                        $data['captcha'] = $this->generate_captcha();
                        $data['msg_password'] = 'Incorrect password!';
                        $this->load->view('frontend/include/header');
                        $this->load->view('frontend/login', $data);
                        $this->load->view('frontend/include/footer');
                    }
                } else {
                    // Email doesn't exist, load the login page with email error
                    $data['captcha'] = $this->generate_captcha();
                    $data['msg_email'] = 'Email not found!';
                    $this->load->view('frontend/include/header');
                    $this->load->view('frontend/login', $data);
                    $this->load->view('frontend/include/footer');
                }
            }
    
        } else {
            // Initial load of the login page, generate the captcha
            $data['captcha'] = $this->generate_captcha();
            $this->load->view('frontend/include/header');
            $this->load->view('frontend/login', $data);
            $this->load->view('frontend/include/footer');
        }
    }



	

	
	public function logout()
	{

		$this->session->sess_destroy();

		redirect(base_url('login'), 'refresh');

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

	private function generate_captcha()
	{

		$captcha_code = substr(md5(uniqid(mt_rand(), true)), 0, 5); // Generate a random code (you can customize this)

		$this->session->set_userdata('captcha_code', $captcha_code);

		$data['captcha']['image'] = $this->create_captcha_image($captcha_code);

		return $data['captcha'];


	}

	private function create_captcha_image($captcha_code)
	{

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

} // end class


?>