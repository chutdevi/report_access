<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Download_history extends CI_Controller {

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
		## asset config
		//session_destroy();

		//$this->template->write('plugins_url', $this->plugins);

	}

	public function index()
	{
		$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
		$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
		//$setTitle = strtoupper($this->router->fetch_method());
		//echo $setTitle; exit;
		$setTitle = 'History - Download Interface Data';
		$intail['usr'] = $this->session->userdata('sessUsr');
		$intail['uid'] = $this->session->userdata('sessUsrId');
		$intail['add'] = $this->session->userdata('sessAdd');
		$intail['menu'] = $this->session->userdata('menu');
		//var_dump($intail); exit;
		$intail['frmEdit'] = FALSE;

		$this->template->write('page_title', $setTitle);
		$this->template->write_view('page_header', 'home/header_v.php',$intail);				
		//$this->template->write_view('page_menu', 'home/menu_v.php');
		$this->template->write_view('page_content', 'content/inf_his.php');

		$this->template->write_view('page_footer' , 'home/footer_v.php');
		$this->template->render();
	}

	public function showhis()
	{
		$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
		$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
		//$setTitle = strtoupper($this->router->fetch_method());
		//echo $setTitle; exit;
		$setTitle = 'History - Download Interface Data';
		$intail['usr'] = $this->session->userdata('sessUsr');
		$intail['uid'] = $this->session->userdata('sessUsrId');
		$intail['add'] = $this->session->userdata('sessAdd');
		$intail['menu'] = $this->session->userdata('menu');
		//var_dump($intail); exit;

		$setTitle = strtoupper(str_replace('_', ' ', $this->router->fetch_method()));
		$startdate = $this->input->post('date_start');
		$enddate = $this->input->post('date_end');
		// $startdate = date('d/m/Y', strtotime($action1));
		// $enddate = date('d/m/Y', strtotime($action2));

		$this->user = $this->load->database('user', TRUE);
		//$sqlIns = "SELECT * FROM in_down_his WHERE date_format(DL_TIME,'%d/%m/%Y') BETWEEN date_format('$startdate','%d/%m/%Y') AND date_format('$enddate','%d/%m/%Y')";
		$sqlIns = "SELECT DH.USER_CD AS 'USER_CD' , US.USER_NAME AS 'USER_NAME' , date_format(DH.DL_TIME,'%d/%m/%Y %H:%i:%s') AS 'DL_TIME', DH.DATA_TYPE AS 'DATA_TYPE', DH.FLG AS 'FLG', DH.FILE_NAME AS 'FILE_NAME' FROM user_sys US INNER JOIN in_down_his DH ON US.USER_CD = DH.USER_CD WHERE date_format(DH.DL_TIME,'%Y-%m-%d') BETWEEN '$startdate' AND '$enddate' AND NOT (ISNULL(DH.FILE_NAME)) ORDER BY 3 DESC";

		
		//echo $sqlIns; exit;
		$excIns = $this->user->query($sqlIns);
		$getdata = $excIns->result_array();


		if (count($sqlIns) > 0) $intail['frmEdit'] = TRUE;
		else $intail['frmEdit'] = FALSE;
		$intail['history'] = $getdata;
		//var_dump($getdata); exit;

		$this->template->write('page_title', $setTitle);
		$this->template->write_view('page_header', 'home/header_v.php',$intail);				
		//$this->template->write_view('page_menu', 'home/menu_v.php');
		$this->template->write_view('page_content', 'content/inf_his.php');
		$this->template->write_view('page_footer' , 'home/footer_v.php');
		$this->template->render();
	}
}
