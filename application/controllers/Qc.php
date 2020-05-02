<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(dirname(__FILE__)."\Main_Controller.php");

class Qc extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		ob_clean();
		flush();
		$this->load->model('Ex_backwork_model','md');
	}
public function index()
	{
	//	$this->Backsystem_model->checksession();
	}
function lpr()
	{

		$template = array(
							 "path"    => "Qc/"
							,"header"  => "header" 
							,"content" => "content_page1" 
							,"footer"  => "footer"
							,"modal"   =>  array("modalprint") 
						 );  
		$this->load->view('Qc/qc_view', $template); 
	}
function printqc()
	{ 
		$codi  = ( $this->input->get("d") ) ?  $this->input->get("d") : date('Y-m-d') ; 
		$plant = ( $this->input->get("t") ) ?  $this->input->get("t") : "51" ; 		
		$template = array(
							 "path"    => "Qc/print/"
							,"header"  => "header" 
							,"content" => "content_print" 
							,"footer"  => "footer"
							,"modal"   =>  array("")
							,"datapage"=>  array("d" => $codi, "t"=>$plant) 
						 );   
		$this->load->view('Qc/print/print_view', $template);
	}
#-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= ajax
private function getline_prod($url)
{
	//$url = "http://urlToYourJsonFile.com";
	$json = file_get_contents($url);
	$json_data = json_decode($json, true);
	return $json_data;
}

#-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- File

}
