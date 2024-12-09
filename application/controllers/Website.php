<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Website extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('email');
       
        $this->load->model('admin/Blog_Model', 'Blog_Model');
        $this->load->model('admin/Seo_model', 'Seo_model');
        $this->load->model('admin/Service_Model', 'Service_Model');
    }
    
  


  

    public function index()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/index', $data);
        $this->load->view('frontend/include/footer');
    }
    public function about()
    {
      $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/about');
        $this->load->view('frontend/include/footer');

    }
    public function services()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/services',$data);
        $this->load->view('frontend/include/footer');

    }
        public function services_details()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $data['service_detail_data'] = $this->Service_Model->service_detail_data_nm();
        $data['service_view'] = $this->Service_Model->service_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/services-details', $data);
        $this->load->view('frontend/include/footer');

    }

   
    public function error404()
    {

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/404');
        $this->load->view('frontend/include/footer');
    }

   
    

    
    public function disclaimer()
    {

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/disclaimer');
        $this->load->view('frontend/include/footer');
    }

    public function refund_policy()
    {

        $this->load->view('frontend/include/header');
        $this->load->view('frontend/refund-policy');
        $this->load->view('frontend/include/footer');
    }

    

    

    public function blog_detail()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_detail_data'] = $this->Blog_Model->blog_detail_data_nm();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/blog-details', $data);
        $this->load->view('frontend/include/footer');

    }

    public function blog()
    {   
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/blog', $data);
        $this->load->view('frontend/include/footer');

    }


    public function contact()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/contact');
        $this->load->view('frontend/include/footer');

    }

    public function consultation()
    {
        $data['seo_view'] = $this->Seo_model->seo_view();
        $data['service_view'] = $this->Service_Model->service_view();
        $data['blog_view'] = $this->Blog_Model->blog_view();
        $this->load->view('frontend/include/header', $data);
        $this->load->view('frontend/consultation');
        $this->load->view('frontend/include/footer');

    }

    public function consultation_submit_data()
{
    $data = [];
    if ($this->input->post()) {

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'service' => $this->input->post('service'),
            'message' => $this->input->post('message'),
        );
        
        // Prepare mail data for thank-you message
        $mail_data = array(
            'name' => $this->input->post('name'),
        );
        
        // Insert data into the database
        $this->db->insert('consultation_data', $data);
        $message = $this->load->view('frontend/mailer/thank-you', $mail_data, TRUE);
        
        if ($this->db->affected_rows() > 0) {
            // Send thank-you email to the user
            $this->email->from('mails@adhyayeduventure.com', 'Adhyay Eduventure');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Thank you for Consultation');
            $this->email->message($message);
            
            if ($this->email->send()) {
                // Send admin notification with user data
                $admin_message = "
                    <h3>New Consultation Submission:</h3>
                    <p><strong>Name:</strong> {$data['name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Mobile:</strong> {$data['mobile']}</p>
                    <p><strong>Service:</strong> {$data['service']}</p>
                    <p><strong>Message:</strong> {$data['message']}</p>";

                $this->email->clear();
                $this->email->from('mails@adhyayeduventure.com', 'Adhyay Eduventure');
                $this->email->to('enquire@adhyayeduventure.com');  // Replace with the admin email
                $this->email->subject('New Consultation Submission');
                $this->email->message($admin_message);

                if ($this->email->send()) {
                    ?>
                    <script type="text/javascript">
                        alert("Submit Successfully");
                        window.location.href = "<?php echo base_url(); ?>";
                    </script>
                    <?php
                } else {
                    echo $this->email->print_debugger();
                    die;
                }
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }
    }
}

    public function contact_submit_data()
{
    $data = [];
    if ($this->input->post()) {

        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'mobile' => $this->input->post('mobile'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
        );
        
        // Prepare mail data for thank-you message
        $mail_data = array(
            'name' => $this->input->post('name'),
        );

        // Insert data into the database
        $this->db->insert('contact_form', $data);
        $message = $this->load->view('frontend/mailer/thank-you', $mail_data, TRUE);

        if ($this->db->affected_rows() > 0) {
            // Send thank-you email to the user
            $this->email->from('mails@adhyayeduventure.com', 'Adhyay Eduventure');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Thank you for Contact');
            $this->email->message($message);

            if ($this->email->send()) {
                // Send admin notification with user data
                $admin_message = "
                    <h3>New contact form submission:</h3>
                    <p><strong>Name:</strong> {$data['name']}</p>
                    <p><strong>Email:</strong> {$data['email']}</p>
                    <p><strong>Mobile:</strong> {$data['mobile']}</p>
                    <p><strong>Subject:</strong> {$data['subject']}</p>
                    <p><strong>Message:</strong> {$data['message']}</p>
                ";

                $this->email->clear();
                $this->email->from('mails@adhyayeduventure.com', 'Adhyay Eduventure');
                $this->email->to('enquire@adhyayeduventure.com'); // Replace with the admin email
                $this->email->subject('New Contact Form Submission');
                $this->email->message($admin_message);
                $this->email->set_mailtype('html'); // Set email type to HTML

                if ($this->email->send()) {
                    ?>
                    <script type="text/javascript">
                        alert("Submit Successfully");
                        window.location.href = "<?php echo base_url(); ?>";
                    </script>
                    <?php
                } else {
                    echo $this->email->print_debugger();
                    die;
                }
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }
    }
}



}
?>