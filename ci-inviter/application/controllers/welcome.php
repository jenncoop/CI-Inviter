<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

        function __construct()
	{
		parent::__construct();

                $this->load->library('inviter');
                $this->config->load('inviter', TRUE);
	}

	public function index()
	{
                $this->load->view('welcome_message');
        }

        public function openinviter(){

                $this->load->library('form_validation');
                $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'required');
                $this->form_validation->set_rules('email_provider', 'Email Provider', 'required');

                if ($this->form_validation->run() === FALSE)
                {
                    echo "error";
                }
                else
                {
                    ini_set('display_errors',1);
                    error_reporting(E_ALL);
                    $this->load->library('Inviter');
                    $provider = $this->input->post('email_provider');
                    $password = $this->input->post('password');
                    $this->session->set_userdata('user_email', $this->input->post('email'));
                    $data['contacts'] = $this->inviter->grab_contacts($provider, $this->input->post('email'), $password);
                    $this->load->view('contacts', $data);
                }

        }

        public function invite_contacts(){
            
                $this->load->library('form_validation');
                $email_list = $this->input->post('contact_list');

                if ($email_list === FALSE)
                {
                    echo "nothing checked";
                }
                else
                {
                    $data['email_list'] = implode(", ", $email_list);
                    $data['default_subject'] = $this->config->item('default_subject', 'inviter');
                    $data['default_message'] = $this->config->item('default_message', 'inviter');
                    $this->load->view('invite_email', $data);
                }
        }

        /**
	 * Send email message to invitees
	 *
	 * @param	string
	 * @param	string
	 * @param	array
	 * @return	void
	 */
	public function send_email()
	{
                $this->load->library('form_validation');

                $this->form_validation->set_rules('subject', 'Subject', 'required');
                $this->form_validation->set_rules('message', 'Message', 'required');

                $this->load->library('email');
                $this->email->print_debugger();
                $this->email->from($this->session->userdata('user_email'));
                $this->email->reply_to($this->config->item('default_replyto', 'inviter'), $this->config->item('website_name', 'inviter'));
                $this->email->bcc($this->input->post('to'));
                $this->email->subject($this->input->post('subject'));
                $this->email->message($this->input->post('message'));
                if ( ! $this->email->send())
                {
                    echo "Error sending email";
                }
                else{
                    $this->load->view('success');
                }
                $this->session->sess_destroy();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */