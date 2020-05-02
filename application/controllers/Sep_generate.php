<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//require_once(dirname(__FILE__)."\Main_Controller.php");
date_default_timezone_set("Asia/Bangkok");
class Sep_generate extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			
			## asset config
			//session_destroy();
			ob_clean();
			flush();
			//$this->template->write('plugins_url', $this->plugins);
			$this->load->model('Generate_model','md');
		}
	public function index()
		{
			$this->Backsystem_model->checksession();
			//echo "Access system is forbidden. in : " . dirname(__FILE__) . VIEWPATH;

			//$data['wi'] = 
			//$this->Ex_backship_model->get_test();
		
			//$this->md->get_compare_tag('2019-10-01', '2019-10-19');
			//$this->output('');
			// $this->output('starter_view');
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
	
	function ajax_excel_workdays()
		{
			$dir = "excel/producion-workdays/";
			if( is_dir($dir) === false ) mkdir($dir);

			$dir = sprintf("excel/producion-workdays/%s/", date('Ym') );
			if( is_dir($dir) === false ) mkdir($dir);

			$daypost = ($_POST) ? $this->input->post('days') : '2018/10/01';
			$filename = sprintf("%s%s.xlsx", $dir, "producion-workdays" ."-". $this->session->userdata('sessUsr') . date('YmdHis') );
			$data['cals'] = $this->md->workdays_data_calenda($daypost, -3, 3);
			$data['cont'] = array( "this" => $this->md->reportget_data_workdays( $daypost, "+ 0 month" )
								  ,"next" => $this->md->reportget_data_workdays( $daypost, "+ 1 month" ) 
								  ,"online_this"  =>  $this->md->reportget_data_linework( $daypost, "+ 0 month" )
								  ,"online_next"  =>  $this->md->reportget_data_linework( $daypost, "+ 1 month" )
								  ,"summary_line" =>  $this->md->reportget_data_linedays( $daypost )
								 );
			$data['days'] = $daypost;
			$data['fln']  = $filename;
			
			$data['hol1']  = $this->md->holidays_data_frommonth($daypost, "+ 0 month");
			$data['sat1']  = $this->md->workdays_data_saturday ($daypost, "+ 0 month");
			$data['hol2']  = $this->md->holidays_data_frommonth($daypost, "+ 1 month");
			$data['sat2']  = $this->md->workdays_data_saturday ($daypost, "+ 1 month");	    

		   	$this->load->view('from_report_workdays.php', $data);

			echo $filename;	
			exit;
		}	

	function ajax_excel_workdays_ac()
		{
			$dir = "excel/producion-workdays/";
			if( is_dir($dir) === false ) mkdir($dir);

			$dir = sprintf("excel/producion-workdays/%s/", date('Ym') );
			if( is_dir($dir) === false ) mkdir($dir);

			$daypost = ($_POST) ? $this->input->post('days') : '2020-04-01';
			$filename = sprintf("%s%s.xlsx", $dir, "producion-workdays-pa" ."-". $this->session->userdata('sessUsr') . date('YmdHis') );
			$data['cals'] = $this->md->workdays_data_calenda($daypost, -5, 1);
			$data['cont'] = array( "this" => $this->md->reportget_data_workdays_pa( $daypost, "+ 0 month", '1' )
								  ,"next" => $this->md->reportget_data_workdays_pa( $daypost, "+ 0 month", '2' ) 
								  ,"online_this"  =>  $this->md->reportget_data_linework_pa( $daypost, "+ 0 month", '1' )
								  ,"online_next"  =>  $this->md->reportget_data_linework_pa( $daypost, "+ 0 month", '2' )
								  ,"summary_line" =>  $this->md->reportget_data_linedays_pa( $daypost )
								 );
			$data['days'] = $daypost;
			$data['fln']  = $filename;
			
			$data['hol1']  = $this->md->holidays_data_frommonth($daypost, "+ 0 month");
			$data['sat1']  = $this->md->workdays_data_saturday ($daypost, "+ 0 month");
			$data['hol2']  = $this->md->holidays_data_frommonth($daypost, "+ 0 month");
			$data['sat2']  = $this->md->workdays_data_saturday ($daypost, "+ 0 month");	    
			//var_dump($data); exit;
		   	$this->load->view('from_report_workdays_pa.php', $data);

			echo $filename;	
			exit;
		}		


	function ajax_excel_vol2()
		{
			
			
			$styles = json_decode( $_POST['styles'] );

			$dir = sprintf("excel/%s/", $styles->fil );
			if( is_dir($dir) === false ) mkdir($dir);

			$dir = sprintf("excel/%s/%s/", $styles->fil, date('Ym') );
			if( is_dir($dir) === false ) mkdir($dir);


			//echo( $styles->fil ); exit;

			$data_file =  array ( strtolower( $styles->fil ) => json_decode( $_POST['parm1'] ) );

			$filename = sprintf("%s%s.xlsx", $dir, $styles->fil ."-". $this->session->userdata('sessUsr') . date('YmdHis') );
			
			$data['tle'] = array ( strtoupper( $styles->fil ) );
			$data['exp'] = $data_file;
			$data['cor'] = $styles->cor;
			$data['fln'] = $filename;
			$data['hcl'] = $styles->hcl;
	   

		   	$this->load->view('from_report_generate.php', $data);

		    //output_file($filename . date('YmdHis'). ".csv");
			echo $filename;	
			exit;
		}
	
	function ajax_csv_vol2()
		{
			$styles = json_decode( $_POST['styles'] );
			$dir = sprintf("csv/%s/", $styles->fil );
			if( is_dir($dir) === false ) mkdir($dir);			

			$dir = sprintf("csv/%s/%s/", $styles->fil, date('Ym') );
			if( is_dir($dir) === false ) mkdir($dir);

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
			$filename = sprintf("%s%s.csv", $dir, $styles->fil ."-". $this->session->userdata('sessUsr') . date('YmdHis') );
		   	$myfile = fopen($filename , 'w+') or die("Unable to open file!");
		    fwrite($myfile, $str);
		    fclose($myfile);
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

	function ajax_excel_workdays_dev()
		{
			$dir = "excel/producion-workdays/";
			if( is_dir($dir) === false ) mkdir($dir);

			$dir = sprintf("excel/producion-workdays/%s/", date('Ym') );
			if( is_dir($dir) === false ) mkdir($dir);

			$daypost = ($_POST) ? $this->input->post('days') : '2020/03/01';
			$filename = sprintf("%s%s.xlsx", $dir, "producion-workdays" ."-". $this->session->userdata('sessUsr') . date('YmdHis') );
			//var_dump($this->md->holidays_data_frommonth($daypost, "+ 0 month")); exit;			
			$data['cont'] = array( "this" => $this->md->reportget_data_workdays( $daypost, "+ 0 month" )
								  ,"next" => $this->md->reportget_data_workdays( $daypost, "+ 1 month" ) 
								  ,"online_this"  =>  $this->md->reportget_data_linework( $daypost, "+ 0 month" )
								  ,"online_next"  =>  $this->md->reportget_data_linework( $daypost, "+ 1 month" )
								  ,"summary_line" =>  $this->md->reportget_data_linedays( $daypost )
								 );
			$data['days'] = $daypost;
			$data['fln']  = $filename;

			$data['hol1']  = $this->md->holidays_data_frommonth($daypost, "+ 0 month");
			$data['sat1']  = $this->md->workdays_data_saturday ($daypost, "+ 0 month");
			$data['hol2']  = $this->md->holidays_data_frommonth($daypost, "+ 1 month");
			$data['sat2']  = $this->md->workdays_data_saturday ($daypost, "+ 1 month");	   

		   	$this->load->view('from_report_workdays_dev.php', $data);

			echo $filename;	
			exit;
		}	
	
}
