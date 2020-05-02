<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Del_plan extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		//$this->output->delete_cache();
				ob_clean();
				flush();
		## asset config
		//session_destroy();

		//$this->template->write('plugins_url', $this->plugins);

	}


	public function index()
	{

	}

	public function del_plan_mta()
	{
		$this->Backsystem_model->checksession();
		//$setTitle = strtoupper($this->router->fetch_method());
		//echo $setTitle; exit;
		$setTitle = 'DELIVERY PLAN OF MTA';
		//$setTitle = 'Home';
		$intail['usr'] = $this->session->userdata('sessUsr');
		$intail['uid'] = $this->session->userdata('sessUsrId');
		$intail['add'] = $this->session->userdata('sessAdd');
		$intail['menu'] = $this->session->userdata('menu');
		
		$this->template->write('page_title', $setTitle);
		$this->template->write_view('page_header', 'home/header_v.php',$intail);				
		//$this->template->write_view('page_menu', 'home/menu_v.php');
		$this->template->write_view('page_content', 'content/del_plan_mta.php', $data);
		$this->template->write_view('page_footer' , 'home/footer_v.php');
		$this->template->render();

	}	

	// public function download_del_plan()
	// {	
	// 	$get_year = $this->input->post('year');
	// 	$get_month = $this->input->post('month');
	// }	
}