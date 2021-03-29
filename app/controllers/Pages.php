<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('User_Model', 'Pages');
	}

	public function index()
	{
		redirect('pages/log_page/faculty-log-in.html/');
	}

	public function faculty_locator_chart($page)
	{
		if (!file_exists(APPPATH.'views/pages/'.$page)) {
			show_404();
		}
		
		$title['title'] = $page;
		$data["data"] = $this->User_Model->get_log();
		$this->load->view('templates/locator-head.html');
		$this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer.html');
	}

	public function faculty_registration($page)
	{
		if (!file_exists(APPPATH.'views/pages/'.$page)) {
			show_404();
		}

		$this->load->view('templates/page-header.html');
		$this->load->view('templates/log-nav.html');
		$this->load->view('pages/'.$page);
        $this->load->view('templates/footer.html');

	}

	public function log_page($page)
	{
		if (!file_exists(APPPATH.'views/pages/'.$page)) {
			show_404();
		}

		$this->load->view('templates/page-header.html');
		$this->load->view('templates/log-nav.html');
		$this->load->view('pages/'.$page);
        $this->load->view('templates/footer.html');

	}

	public function logout()
	{
		redirect('pages/secure/login.html/');
	}
	
}