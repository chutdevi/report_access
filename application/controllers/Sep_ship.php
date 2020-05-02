<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__)."\Main_Controller.php");

class Sep_ship extends CI_Controller {

public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		## asset config
		//session_destroy();
		ob_clean();
		flush();
		//$this->template->write('plugins_url', $this->plugins);
		$this->load->model('Ex_backship_model','md');
		$this->Backsystem_model->checksession();
	}

public function index()
	{
		
		//echo "Access system is forbidden. in : " . dirname(__FILE__) . VIEWPATH;
		
		//$data['wi'] = 
		//$this->Ex_backship_model->get_test();
	
		//$this->md->get_compare_tag('2019-10-01', '2019-10-19');
		//$this->output('');
		// $this->output('starter_view');
	}

function head_css()
	{
		$data['view_path'] = VIEWPATH . 'sep_shipping/' ;
		$this->load->view('sep_shipping/template/head_css',$data);
	}
	
function topbar()
	{
		$this->load->view('sep_shipping/template/head_bar');
	}

function leftbar()
	{
		$this->load->view('sep_shipping/template/left_bar');
	}	
	// function menu_sidebar(){
		// $this->load->view('template/menu_sidebar');
	// }
	
function footer()
	{
		$this->load->view('sep_shipping/template/footer');
	}
		
function footer_js()
	{
		$data['view_path'] = VIEWPATH . 'sep_shipping/' ;
		$this->load->view('sep_shipping/template/footer_js',$data);

		
	}
	
function scancomp($body='',$data='')
	{
			$this->head_css();
			$this->topbar();
			//$this->leftbar();
			// $this->menu_sidebar();
			$this->load->view('sep_shipping/ship_page1');
			//$this->footer();
			$this->footer_js();
	}

function scanship($body='',$data='')
	{
		$template = array(
							 "path"    => "sep_shipping/"
							,"header"  => "head_bar"
							,"content" => "content_page1"
							,"footer"  => "footer"
						 ); 
		$this->load->view('sep_shipping/shipping_view', $template);

	}

#-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= ajax

function get_detail_scan_compare()
	{
		echo json_encode( $this->md->get_compare_tag( $_POST['parm1'], $_POST['parm2'] ) );
	}

function get_line_proditem()
	{
		echo json_encode( $this->Backsep_model->get_proditem_supply( $_POST['q']) );
	}	

#-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=--=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=- File

function ajax_csv()
	{

		$data_csv =  json_decode( $_POST['parm1'] );
		$head = "";
		$content = "";
		//var_dump($data_csv);
		foreach ($data_csv as $key => $value) 
		{
			$array_con = (array)$value;
			foreach($array_con as $k => $v)
			{
			  if($key == 0) $head .=  '"'. $k .'"' . ",";

				$content .= '"' . $v .'"' . ",";	
			}
			$content = substr($content, 0, (strlen($content)-1) )  . "\n";
			//break;			
		}

		$head = substr($head, 0, (strlen($head)-1) )  . "\n";
		$content = substr($content, 0, (strlen($content)-1) );
		//print_r( json_decode( $_POST[0] ) );
	
   
   	$str = $head . $content;
	$filename = 'csv/compare_tag/com_'. $this->session->userdata('sessUsr') . date('YmdHis'). ".csv";

	

   	$myfile = fopen($filename , 'w+') or die("Unable to open file!");
    fwrite($myfile, $str);
    fclose($myfile);
    //output_file($filename . date('YmdHis'). ".csv");
	echo $filename;	
	exit;
	}	

function ajax_excel()
	{

		

		$data_csv =  array ( strtolower('Com_pare_tag') => json_decode( $_POST['parm1'] ) );
		$filename = 'excel/compare_tag/com_'. $this->session->userdata('sessUsr') . date('YmdHis'). ".xlsx";
		
		$data['tle'] = array ( strtoupper( 'Com pare tag' ) );
		$data['exp'] = $data_csv;
		$data['cor'] = 'eeeeee';
		$data['fln'] = $filename;
		$data['hcl'] = '0288d1';
   
   	
	

	

   	$this->load->view('from_report_export.php', $data);

    //output_file($filename . date('YmdHis'). ".csv");
	echo $filename;	
	exit;
	}

function ajax_excel_vol2()
	{

		

		$data_csv =  array ( strtolower('Com_pare_tag') => json_decode( $_POST['parm1'] ) );
		$filename = 'excel/compare_tag/com_'. $this->session->userdata('sessUsr') . date('YmdHis'). ".xlsx";
		
		$data['tle'] = array ( strtoupper( 'Com pare tag' ) );
		$data['exp'] = $data_csv;
		$data['cor'] = 'eeeeee';
		$data['fln'] = $filename;
		$data['hcl'] = '0288d1';
   

   	$this->load->view('from_report_export.php', $data);

    //output_file($filename . date('YmdHis'). ".csv");
	echo $filename;	
	exit;
	}

function img_mem()
	{

		$file_pointer = $_POST['img'];

		if ( file_exists('assets\images\card\img_mem\\' . $file_pointer . '.jpg') )  
		{ 
		    echo json_encode( $this->Backsep_model->get_detail_user($file_pointer) );
		} 
		else 
		{ 

		    $this->save_image('http://192.168.82.23/member/photo/'. $file_pointer . '.jpg','assets\images\card\img_mem\\' . $file_pointer  . '.jpg');
		    echo json_encode( $this->Backsep_model->get_detail_user($file_pointer) );		                            
		} 		





	}

function get_wi_detail()
	{

		echo json_encode( $this->Backsep_model->get_detail_work( $_POST['wi'] ) );

	}

function ck()
	{


		$this->save_image('http://192.168.82.23/member/photo/01802.jpg','excel/image.jpg');

	}

function save_image($inPath,$outPath)
	{ //Download images from remote server
	    $in=    fopen($inPath, "rb");
	    $out=   fopen($outPath, "wb");
	    while ($chunk = fread($in,8192))
	    {
	        fwrite($out, $chunk, 8192);
	    }
	    fclose($in);
	    fclose($out);
	}



}
