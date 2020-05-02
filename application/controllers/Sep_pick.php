<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(dirname(__FILE__)."\Main_Controller.php");

class Sep_pick extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		date_default_timezone_set("Asia/Bangkok");
		## asset config
		//session_destroy();
		ob_clean();
		flush();
		//$this->template->write('plugins_url', $this->plugins);

	}
	public function index()
	{
		//echo "Access system is forbidden. in : " . dirname(__FILE__) . VIEWPATH;

		$data['wi'] = $this->Backsep_model->get_wi_picking('');
		$this->Backsystem_model->checksession();
		$this->output('',$data);
		// $this->output('starter_view');
	}

	function head_css(){
		$data['view_path'] = VIEWPATH . 'sep_picking/' ;
		$this->load->view('sep_picking/template/head_css',$data);
	}
	
	function topbar(){
		$this->load->view('sep_picking/template/head_bar');
	}
	function leftbar(){
		$this->load->view('sep_picking/template/left_bar');
	}	
	// function menu_sidebar(){
		// $this->load->view('template/menu_sidebar');
	// }
	
	function footer(){
		$this->load->view('sep_picking/template/footer');
	}
	
	function footer_js(){
		$data['view_path'] = VIEWPATH . 'sep_picking/' ;
		$this->load->view('sep_picking/template/footer_js',$data);
	}
	
	function output($body='',$data='')
	{
			$this->head_css();
			$this->topbar();
			//$this->leftbar();
			// $this->menu_sidebar();
			$this->load->view('sep_picking/page1',$data);
			//$this->footer();
			$this->footer_js();
	}





	function get_wi()
	{
		echo json_encode( $this->Backsep_model->get_wi_picking($_POST['q']) );
	}
	function get_line_proditem()
	{
		echo json_encode( $this->Backsep_model->get_proditem_supply( $_POST['q']) );
	}	
	function get_line_suppitem()
	{
		echo json_encode( $this->Backsep_model->get_suppitem_supply( $_POST['q']) );
	}


	function get_line()
	{
		echo json_encode( $this->Backsep_model->get_line_picking( $_POST['q']) );
	}	
	function ajax_wi()
	{
		echo json_encode( $this->Backsep_model->get_wi_scan( $_POST['q']   ) );
	}
	function ajax_item()
	{
		echo json_encode( $this->Backsep_model->get_item_scan( $_POST['q'] ) );
	}
	function ajax_date()
	{
		echo json_encode( $this->Backsep_model->get_date_scan( date('Y-m-d',strtotime($_POST['st'])), date('Y-m-d',strtotime($_POST['en'])) ) );
	}	
	function ajax_line()
	{
		echo json_encode( $this->Backsep_model->get_line_scan( $_POST['q'] ) );
	}
	function ajax_all()
	{
		echo json_encode( $this->Backsep_model->get_all_scan() );
	}	
	function ajax_adv()
	{
		echo json_encode( $this->Backsep_model->get_adv_scan( $_POST['ln'], $_POST['tp'], $_POST['ts'], date('Y-m-d', strtotime($_POST['st']) ), date('Y-m-d', strtotime($_POST['en'])) ) );


		//echo json_encode( array( $_POST['ln'], $_POST['tp'], $_POST['ts'], date('Y-m-d', strtotime($_POST['st']) ), date('Y-m-d', strtotime($_POST['en'])) ) );
	}




	function ajax_csv()
	{

		$data_csv =  json_decode( $_POST['q'] );
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
	$filename = 'csv/picking/pick_'. date('YmdHis'). ".csv";

	

   	$myfile = fopen($filename , 'w+') or die("Unable to open file!");
    fwrite($myfile, $str);
    fclose($myfile);
    //output_file($filename . date('YmdHis'). ".csv");
	echo $filename;	
	exit;
	}	
	function ajax_excel()
	{

		

		$data_csv =  array ( strtolower($_POST['tm']) => json_decode( $_POST['q'] ) );
		$filename = 'excel/picking/pick_'. date('YmdHis'). ".xlsx";
		
		$data['tle'] = array ( strtoupper( $_POST['tm'] ) );
		$data['exp'] = $data_csv;
		$data['cor'] = 'a0f3c3';
		$data['fln'] = $filename;
		$data['hcl'] = '34495e';
   
   	
	

	

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





function ck(){


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
