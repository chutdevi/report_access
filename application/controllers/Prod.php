<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(dirname(__FILE__)."\Main_Controller.php");

class Prod extends CI_Controller {
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
function prd1()
	{

		$template = array(
							 "path"    => "Productionma/"
							,"header"  => "head_bar"
							,"menu"    => "menu_content"
							,"content" => "content_page1"
							,"modal"   => array( "modaller", "modalfilter", "modaldetailline")
							,"footer"  => "footer"
							,"data"    => $this->getline_prod("http://192.168.161.102/api_system/api_fasys/fasys_prodallcnt/?d=".date('Y-m-d',strtotime("- 0 day", strtotime( date('Y-m-d') ) )) ) 
							,"udate"   => date('Y-m-d',strtotime("- 0 day", strtotime( date('Y-m-d') ) ))
						 ); 

		$this->load->view('Productionma/prod_view', $template);
		//$this->getline_prod("http://192.168.161.102/api_system/api_fasys/fasys_prodallcnt/?d=".date('Y-m-d'))
		//$this->getline_prod("http://192.168.161.102/api_system/api_fasys/alsys_prodbyln/?d=".date('Y-m-d'))

		//var_dump( $this->getline_prod("http://192.168.161.102/api_system/api_fasys/fasys_prodallcnt/?d=2020-03-19") );exit;
	}
function prd()
	{ 
		$udt = ( $this->input->get("d") ) ? $this->input->get("d") :  date('Y-m-d',strtotime("- 0 day", strtotime( date('Y-m-d') ) )) ;
		$template = array(
							 "path"    => "Productionma/"
							,"header"  => "head_bar"
							,"menu"    => "menu_content"
							,"content" => "content_page1"
							,"modal"   => array( "modaller", "modalfilter", "modaldetailline")
							,"footer"  => "footer"
							,"data"    => $this->getline_prod("http://192.168.161.102/api_system/api_fasys/fasys_prodallcnt/?d=".date('Y-m-d',strtotime("- 0 day", strtotime( $udt ) )) ) 
							,"udate"   => date('Y-m-d',strtotime("- 0 day", strtotime( $udt ) ))
						 ); 

		$this->load->view('Productionma/prod_view', $template);
	}	
#-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= ajax
private function getline_prod($url)
{
	$json = file_get_contents($url);
	$json_data = json_decode($json, true);
	return $json_data;
}

#-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- File

}
