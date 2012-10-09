<?php

class Site extends CI_Controller {
	function __construct() {
		parent::__construct();
	}

	function index() {
		$data = array(
			'form_submitted' => false,
			'form_errors' => false
		);
		$this->load->view('site_view', $data);
	}

	function form() {
		//echo "<pre>";
		//print_r($this->input->post());exit();
		//this->form_validation->set_rules('company_name', 'Your company', 'required');
		//$this->form_validation->set_rules('company_country', 'Country', 'required');
		//$this->form_validation->set_rules('company_city', 'City', 'required');
		//$this->form_validation->set_rules('company_nr_of_screens', 'Number of screens', 'required');
		$this->form_validation->set_rules('personal_first_name', 'First name', 'required');
		$this->form_validation->set_rules('personal_last_name', 'Last name', 'required');
		$this->form_validation->set_rules('personal_email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('personal_phone', 'Phone number', 'required');
		$this->form_validation->set_rules('personal_message', 'Personal message', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			$data = array(
				'form_submitted' => false,
				'form_errors' => true
			);
			$this->load->view('site_view', $data);
		}
		else
		{
			
			// Send a mail
			$this->load->library('email');

			$config['mailtype'] = 'html';
			$this->email->initialize($config);

			$message = "<strong>Your company</strong><br>" . $this->input->post('company_name') . "<br><br>";
			$message .= "<strong>Country</strong><br>" . $this->input->post('company_country') . "<br><br>";
			$message .= "<strong>City</strong><br>" . $this->input->post('company_city') . "<br><br>";
			$message .= "<strong>Application</strong><br>" . $this->input->post('company_application') . "<br><br>";
			$message .= "<strong>Number of screens</strong><br>" . $this->input->post('company_nr_of_screens') . "<br><br>";
			$message .= "<strong>First name</strong><br>" . $this->input->post('personal_first_name') . "<br><br>";
			$message .= "<strong>Last name</strong><br>" . $this->input->post('personal_last_name') . "<br><br>";
			$message .= "<strong>Email</strong><br>" . $this->input->post('personal_email') . "<br><br>";
			$message .= "<strong>Phone number</strong><br>" . $this->input->post('personal_phone') . "<br><br>";
			$message .= "<strong>Personal message</strong><br>" . nl2br($this->input->post('personal_message')) . "<br><br>";

			/*
			$this->email->from('info@flatturtle.com', 'FlatTurtle');
			$this->email->to('stijn@defunkt.nu');
			$this->email->subject('Contactformulier FlatTurtle site');
			$this->email->message($message);	

			$this->email->send();
			*/
			
			/* info@flatturtle.com  */
			$this->email->from('info@flatturtle.com', 'FlatTurtle');
			$this->email->to('info@flatturtle.com');
			$this->email->subject('Contactformulier FlatTurtle site');
			$this->email->message($message);	
	
			$this->email->send();
			
			$data = array(
				'form_submitted' => true,
				'form_errors' => false
			);

			



			$this->load->view('site_view', $data);
		}
	}
}