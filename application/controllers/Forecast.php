<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecast extends CI_Controller {

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

	//AMM Develop for support CE.
	public function forecast_rm()
	{
				$this->Backsystem_model->checksession();
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Forecast Raw Material';
				//$setTitle = 'Home';
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				$data['frmEdit'] = FALSE;

				$action = base64_decode($this->input->post('action'));

				//$this->ex = $this->load->database('another_db', TRUE);

				if( $action == "searchType" ){
					$data['frmEdit'] = TRUE;
					$data['forecast'] = $this->Backsystem_model->forecast_rm();
					//var_dump($data); exit;
				}

				//var_dump($intail['cust']); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/forecast_rm.php', $data);
				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	}	

	public function get_csv()
	{
		

		echo json_encode( $this->Backsystem_model->forecast_rm() );
		
	}
}