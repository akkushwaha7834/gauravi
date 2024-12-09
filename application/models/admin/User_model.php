<?php
class User_model extends CI_Model
{
	private $User = 'users';
	public function add_user($data)
	{
		$this->db->insert('users', $data);
		return $this->db->insert_id();
	}

	public function get_all_users()
	{
		if ($this->session->userdata('role') === '2') {
			$user_id = $this->session->userdata('admin_id');
			$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name, (SELECT Sum(amount) as balance from `wallet`) FROM `users` where id=$user_id;");

		} else {
			$query = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name FROM `users`;");
		}
		return $result = $query->result_array();
	}

	public function get_user_by_email($email) {
		$this->db->from('users');
		$this->db->where('email', $email); 
		return $this->db->get()->row(); 
	}

	public function PictureUrlById($id)
	{
		$this->db->select('id,firstname,picture_url');
		$this->db->where("id", $id);
		$this->db->limit(1);
		$query = $this->db->get('users');
		$res = $query->row_array();
		if (!empty($res['picture_url'])) {

			return base_url('uploads/profiles/' . $res['picture_url']);

		} else {

			return base_url('public/images/user-icon.jpg');

		}

	}

	public function PictureUrl()
	{

		$this->db->select('id,firstname,picture_url');

		$this->db->from($this->User);

		$this->db->where("id", $this->session->userdata('admin_id'));

		$this->db->limit(1);

		$query = $this->db->get();

		$res = $query->row_array();

		if (!empty($res['picture_url'])) {

			return base_url('uploads/profiles/' . $res['picture_url']);

		} else {

			return base_url('public/images/user-icon.jpg');

		}

	}
	public function GetUserData()
	{

		$this->db->select('`id`, `image`, `username`, `firstname`, `lastname`, `email`, `mobile_no`, `picture_url`, `profile_url`, `balance`, `password`, `is_admin`, `last_ip`, `created_at`, `updated_at` ');

		$this->db->from($this->User);

		$this->db->where("id", $this->session->userdata('is_admin'));

		$this->db->limit(1);

		$query = $this->db->get();

		if ($query) {

			return $query->row_array();

		} else {

			return false;

		}

	}

	public function get_users()
	{
		$result = $this->db->query("SELECT * FROM `users` where is_admin='2'");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function get_users_api($uid)
	{
		$result = $this->db->query("SELECT * FROM `users` where id = '$uid';");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function ClientsListCs()
	{

		$this->db->select('id,name,picture_url');

		// $this->db->from($this->Users);

		$this->db->where("role", "1");
		$query = $this->db->get();
		$r = $query->result_array();
		return $r;

	}

	public function VendorsList()
	{

		// 	$this->db->select('id,picture_url');

		//    $this->db->from($this->User);

		//    $this->db->where("role","1");

		$query = $this->db->get('users');

		$r = $query->result_array();

		return $r;

	}

	public function get_user_by_id($id)
	{
		$query = $this->db->get_where('users', array('id' => $id));
		return $result = $query->row_array();
	}

	public function edit_user($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('users', $data);
		return true;
	}


	public function role_fetch()
	{

		$role_data = $this->db->query("SELECT * FROM `role`");

		$fetch = $role_data->num_rows();
		if ($fetch > 0) {
			return $fetch = $role_data->result_array();

		} else {
			return false;
		}
	}

	public function fetch_state($country_id)
	{
		$this->db->where('country_id', $country_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('states');
		$output = '<option value="">Select State</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
		}
		return $output;
	}

	public function fetch_city($state_id)
	{
		$this->db->where('state_id', $state_id);
		$this->db->order_by('name', 'ASC');
		$query = $this->db->get('cities');
		$output = '<option value="">Select City</option>';
		foreach ($query->result() as $row) {
			$output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
		}
		return $output;
	}

	public function state_countrey()
	{
		$role_data = $this->db->query("SELECT * FROM `countries`");
		$fetch = $role_data->num_rows();
		if ($fetch > 0) {
			return $fetch = $role_data->result_array();
		} else {
			return false;
		}
	}

	//send verification email to user's email id
	function sendEmail($to_email)
	{
		$from_email = 'lilysharma002@gmail.com'; //change this to yours
		$subject = 'Aktivasi Akun';
		$message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://localhost/evotingcucukan/voter_register/verify/' . md5($to_email) . '<br /><br /><br />Thanks<br />Mydomain Team';

		//configure email settings
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com'; //smtp host name
		$config['smtp_port'] = '465'; //smtp port number
		$config['smtp_user'] = $from_email;
		$config['smtp_pass'] = 'mypassword'; //$from_email password
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;
		$config['newline'] = "\r\n"; //use double quotes
		$this->email->initialize($config);

		//send mail
		$this->email->from($from_email, 'Admin Evoting');
		$this->email->to($to_email);
		$this->email->subject($subject);
		$this->email->message($message);
		return $this->email->send();
	}

	// public function generateOtp($to_email) {

	//     $this->load->library('email');
	//     $this->load->helper('string');

	//     // Generate OTP
	//     $otp = random_string('numeric', 6);
	// 	$from_email = 'lilysharma002@gmail.com';

	//     // Save OTP in session
	//     $this->session->set_userdata('user_otp', $otp);

	//     // Send OTP via Email
	//     $this->email->from($from_email, 'Lily Sharma');
	//     $this->email->to($to_email);
	//     $this->email->subject('Your OTP Code');
	//     $this->email->message('Your OTP code is: ' . $otp);

	//     if ($this->email->send()) {
	//         echo 'Email sent successfully!';
	//     } else {
	//         echo 'Error sending email: ' . $this->email->print_debugger();
	//     }
	// }

	//activate user account
	function verifyEmailID($key)
	{
		$data = array('status' => 1);
		$this->db->where(md5('email'), $key);
		$this->db->update('user', $data);
	}

	public function getall_users()
	{
		if ($this->session->userdata('role') === '2') {
			$user_id = $this->session->userdata('admin_id');
			$result = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name,(SELECT countries.name from `countries` where countries.id=users.country) as country,(SELECT states.name from `states` where states.id=users.state) as state_name,(SELECT cities.name from `cities` where cities.id=users.city) as city,(SELECT branch.branch from `branch` where branch.id=users.branch_name) as branch_name FROM `users` where id=$user_id ;");
		} else {
			$result = $this->db->query("SELECT *,(SELECT role_name FROM `role` where id=is_admin) as role_name,(SELECT countries.name from `countries` where countries.id=users.country) as country,(SELECT states.name from `states` where states.id=users.state) as state_name,(SELECT cities.name from `cities` where cities.id=users.city) as city,(SELECT branch.branch from `branch` where branch.id=users.branch_name) as branch_name FROM `users`;");
		}
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}
	public function resolve_user_login($email, $password)
	{

		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hash = $this->db->get()->row('password');

		return $this->verify_password_hash($password, $hash);

	}


	private function hash_password($password)
	{

		return password_hash($password, PASSWORD_BCRYPT);

	}


	private function verify_password_hash($password, $hash)
	{

		return password_verify($password, $hash);

	}

	public function get_user_id_from_username($email)
	{

		$this->db->select('id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('id');

	}

	public function get_user($user_id)
	{

		$this->db->from('users');
		$this->db->where('id', $user_id);
		return $this->db->get()->row();

	}

	public function update_user($user_id, $data)
	{
		// Check if the user exists
		$user = $this->db->get_where('users', ['id' => $user_id])->row();

		if ($user) {
			// Prepare the data to update
			$update_data = [];
			if (isset($data['firstname'])) {
				$update_data['firstname'] = $data['firstname'];
			}

			if (isset($data['lastname'])) {
				$update_data['lastname'] = $data['lastname'];
			}

			if (isset($data['email'])) {
				$update_data['email'] = $data['email'];
			}

			if (isset($data['mobile_no'])) {
				$update_data['mobile_no'] = $data['mobile_no'];
			}

			if (isset($data['username'])) {
				$update_data['username'] = $data['username'];
			}

			// Add more fields as needed, such as 'name', etc.

			// Update the user data
			$this->db->where('id', $user_id);
			$this->db->update('users', $update_data);

			return true; // Return true if the update is successful
		}

		return false; // Return false if the user doesn't exist
	}



	public function refer_code_match($code)
	{
		$role_data = $this->db->query("SELECT * FROM `users` WHERE refer_code='$code'");
		$fetch = $role_data->num_rows();
		if ($fetch > 0) {
			return $fetch = $role_data->result_array();
		} else {
			return false;
		}
	}

	public function store_user($data)
	{

		$this->db->insert('spinwheel', $data);
		return $this->db->insert_id();
	}

	public function save_spin_result($user_id, $question)
	{

		$data = [
			'user_id' => $user_id,
			'question' => $question,
		];
		if ($this->db->insert('spin_data', $data)) {
			return $data;
		} else {
			return false;
		}
	}

	public function store_spin_result($data, $question, $mobile_no, $location)
	{
		// Store user data and spin result in the database
		// For simplicity, assume you have a table named 'spin_results'
		$data = [
			'name' => $data['name'],
			'email' => $data[''],
			'mobile_no' => $mobile_no,
			'location' => $location,
			// Add more fields as needed
		];
		if ($this->db->insert('spinwheel', $data)) {
			$data = [
				'question' => $question,
			];
			$this->db->insert('spinwheel', $data);
		} else {
			return false;
		}
	}

	public function spindata_view()
	{
		$result = $this->db->query("SELECT *,(Select users.username from `users` where users.id=spin_data.user_id) as username,(Select users.email from `users` where users.id=spin_data.user_id) as email,(Select users.mobile_no from `users` where users.id=spin_data.user_id) as mobile_no FROM `spin_data`");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function get_id_api($uid)
	{
		return $this->db->get_where('users', array('id' => $uid))->row_array();
	}

	public function spin_api($uid)
	{

		$result = $this->db->query("SELECT * FROM `spin_data` WHERE user_id=$uid;");
		if ($result->num_rows() > 0) {
			return $result->result();
		} else {
			return 0;
		}
	}

	public function getTransactions($user_id)
	{
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('spin_data');
		return $query->result();
	}

	public function getUserByEmail($email)
	{
		// Fetch user details based on the provided email address
		return $this->db->get_where('users', ['email' => $email])->row_array();
	}

	public function student_fetch()
	{
		$role_data = $this->db->query("SELECT * FROM `users` where is_admin=2");
		$fetch = $role_data->num_rows();
		if ($fetch > 0) {
			return $fetch = $role_data->result_array();
		} else {
			return false;
		}
	}

}


?>