<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_tool extends CI_Controller {

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
		$this->output->delete_cache();
		header('Content-Type: application/json');
		## asset config
		//session_destroy();
		ob_clean();
		flush();
		//$this->template->write('plugins_url', $this->plugins);

	}
	public function index()
	{
		

	}
	public function api_insHis()
	{
	
		

		$data['user_list'] = $this->Backuser_model->Getuser();		
		$arrReturn = array("code" => '200', "description" => "success.");
		echo json_encode($arrReturn);

	}
	public function api_test( $dat )
	{
	


		$inf = explode("-", $dat);
		//print_r($dat); exit;
		//$data['user_list'] = $this->Backuser_model->ins_His();	

		//$this->Backuser_model->Getuser();	
		//var_dump($inf); exit;

		$data['user_list'] = $this->Backuser_model->ins_His( $inf[0], $inf[1], $inf[2], $inf[3], $inf[4] );	

		//echo $la_data;
		// $arrReturn = array("code" => '200', "description" => $dat);
		// echo json_encode($arrReturn);

		//exit;
	}
	public function api_picking_custName()
	{
	

		$date_deli = $_POST['sal'] ;

		$result_cust = $this->Backpicking_model->get_select_Namecust('CS.CUST_NAME', $date_deli); 

		echo json_encode($result_cust);
	}
	public function api_picking_custAname()
	{
	
		$date_deli = $_POST['sal'] ;

		$result_cust = $this->Backpicking_model->get_select_Namecust('CS.CUST_ANAME', $date_deli); 

		echo json_encode($result_cust);
	}

	public function api_picking_listDownload()
	{
	
		$date_deli = $_POST['sal'] ;


		$data_tran = "CS.CUST_NAME, CASE WHEN CS.CUST_ANAME = 'MEC-Free zone' OR CS.CUST_ANAME = 'MEC-SUPPLEMENT Free Zone' THEN 'MEC-SUM' WHEN CS.CUST_ANAME = 'IEMT' OR CS.CUST_ANAME = 'IEMT-LLC' OR CS.CUST_ANAME = 'IEMT-KD' THEN 'IEMT-SUM' WHEN CS.CUST_ANAME = 'SKC-500' OR CS.CUST_ANAME = 'SKC-200'  THEN 'SKC-SUM' ELSE CS.CUST_ANAME END CUST_ANAME";
					  
						  
                          //WHEN CS.CUST_ANAME = 'IEMT' OR CS.CUST_ANAME = 'IEMT-LLC' OR CS.CUST_ANAME = 'IEMT-KD'THEN 'IEMT-SUM'

		$result_cust = $this->Backpicking_model->get_select_Namecust($data_tran, $date_deli); 

		echo json_encode($result_cust);
	}

	}
