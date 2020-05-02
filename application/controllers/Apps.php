<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Apps extends CI_Controller { 
	public function __construct()
	{
		parent::__construct();
		//$this->output->delete_cache();
				ob_clean();
				flush(); 
	}


	public function index()
	{

	}
	public function ine()
	{
				$this->Backsystem_model->checksession();
				$setTitle = 'Inventory';
 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu'); 
					$dat = array();
					$name_f = 'nodata.file';
					$arrData = array( 'sessCsv' => $dat ,'file_nm' => $name_f);					
					$this->session->set_userdata($arrData);				 
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);		 
				$this->template->write_view('page_content', 'content/inv_output.php'); 
				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render(); 
	} 
	public function ord()
	{
				$this->Backsystem_model->checksession(); 
				$setTitle = 'Fluctuation'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				$intail['cust'] = $this->Backsystem_model->get_select_cust();
				$intail['item'] = $this->Backsystem_model->get_select_item_all(); 
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail); 
				$this->template->write_view('page_content', 'content/or_input.php'); 
				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	}	
	public function cpp()
	{
				$this->Backsystem_model->checksession(); 
				$setTitle = 'Compaer Price'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				$data['cmp'] = $this->Backsystem_model->compare_price(); 
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail); 
				$this->template->write_view('page_content', 'content/compaer_price.php',$data);

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();
				//exit();
	}
	public function lbt()
	{ 
				$this->Backsystem_model->checksession(); 
				$access = $this->generateRandomString(45);

			    $myfile = fopen('F:\line_token_access.ini', 'w') or die("Unable to open file!");

			    fwrite($myfile,$access);
			    fclose($myfile);

			    $str_access = base64_encode($access); 

				redirect('http://192.168.161.102/table_linebot/Authen/sh/' . $str_access ); 


	}
	public function roy()
	{


				$this->Backsystem_model->checksession(); 
				$setTitle = 'Sale Royalty'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');

				if( date('d' > 29 ) ){
						$data['d_st'] = date("Y-m-d", strtotime('first day of this month', strtotime("-1 month", strtotime( date('Y/m/d')  ) )   ));
						$data['d_en'] = date("Y-m-d", strtotime('last day of this month' , strtotime("-1 month", strtotime( date('Y/m/d')  ) )   ));
				}else {
						$data['d_st'] = date("Y-m-d", strtotime('first day of this month', strtotime("-1 month", strtotime( date('Y/m/01')  ) )   ));
						$data['d_en'] = date("Y-m-d", strtotime('last day of this month' , strtotime("-1 month", strtotime( date('Y/m/01')  ) )   ));
				}


				$data['master_sm'] = $this->Backroyalty_model->get_master( 'ROYALTY_SM' );
				//$data['master_bh'] = $this->Backroyalty_model->get_master( 'ROYALTY_SM_BH' );
				//$data['master_ig'] = $this->Backroyalty_model->get_master( 'ROYALTY_SM_BRAKE_IGCE' );
				//$data['master_im'] = $this->Backroyalty_model->get_master( 'ROYALTY_SM_BRAKE_IMCT' );
				//$data['master_pl'] = $this->Backroyalty_model->get_master( 'ROYALTY_SM_PCL' );
				//$intail['item'] = $this->Backsystem_model->get_select_item_all();

				//var_dump($data); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/royal.php',$data);

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();


	}
	public function get_data()
	{
		$cus = ($_POST['select1'] == 'All') ? "--" : 'CUST_CD = '. "'" . $_POST['select1'] ."'" ;
		$itm = ($_POST['select2'] == 'All') ? "--" : 'ITEM_CD = '. "'" . $_POST['select2'] ."'" ;
		$dt1 = explode(' - ', $_POST['date1']);

		$dat = $this->Backsystem_model->get_raw_data(date('Y-m-d', strtotime($dt1[0])), date('Y-m-d', strtotime($dt1[1])), $cus, $itm);

		$name_f = $_POST['select1'].$_POST['select2'].date( 'ymd', strtotime($dt1[0]) ).date( 'ymd', strtotime($dt1[1]) );	

		$arrData = array( 'sessCsv' => $dat ,'file_nm' => $name_f);					
		$this->session->set_userdata($arrData); 
		$this->write_file( "csv/fluctuation/" .$name_f. ".csv",  $this->session->userdata('sessCsv') );


		if( count($dat) > 0 )
			echo json_encode( $dat );
		else
			echo json_encode( array('DATE_COLLECT' => 'fail') );	  

	}
	public function get_csv()
	{
		$cus = ($_POST['select1'] == 'All') ? "-- " : 'CUST_CD = '. "'" . $_POST['select1'] ."'" ;
		$itm = ($_POST['select2'] == 'All') ? "-- " : 'ITEM_CD = '. "'" . $_POST['select2'] ."'" ;
		$dt1 = explode(' - ', $_POST['date1']);
		$dat = $this->Backsystem_model->get_raw_data(date('Y-m-d', strtotime($dt1[0])), date('Y-m-d', strtotime($dt1[1])), $cus, $itm, 0);
		//$this->Backdataflu_model->get_raw_data(date('Y-m-d', strtotime($dt1[0])), date('Y-m-d', strtotime($dt1[1])), $sc1, $itm)

		//$name_f = trim($this->session->userdata('file_nm'));


		
		//echo trim($this->session->userdata('file_nm'));
		echo json_encode( $dat );
		//echo("<script>console.log('PHP: ".$sc1."');</script>");
		

	}
	public function get_f()
	{




		
		$this->write_file( "C:/Users/Chutdet_v/Desktop/New folder/test.csv", $this->session->userdata('sessCsv') );
		//echo json_encode( $itm );
		//echo("<script>console.log('PHP: ".$sc1."');</script>");
		

	}

    public function get_chart()
	{

		$cuss = ($_POST['selt1'] == 'All') ? "--" : 'CUST_CD = '. "'" . $_POST['selt1'] ."'" ;
		$itmm = ($_POST['selt2'] == 'All') ? "--" : 'ITEM_CD = '. "'" . $_POST['selt2'] ."'" ;
		$dt11 = explode(' - ', $_POST['dat1']);
		$datttt = $this->Backfluc_model->get_chart_data(date('Y-m-d', strtotime($dt11[0])), date('Y-m-d', strtotime($dt11[1])), $cuss, $itmm, 0);

		echo json_encode( $datttt );
		
	}
	public function write_file($filename, $data)
	{

		$str = '';
		foreach ($data[0] as $key => $value) 
		{
			 $str .= '"' . $key . '",';
		}
		$str = substr($str, 0, (strlen($str)-1) )  . "\r\n" ;
		foreach ($data as $key => $value) 
		{
			foreach ($value as $r => $va)
			{
			 	$str .= '"' . $va . '",';
			}
		$str = substr($str, 0, (strlen($str)-1) )  . "\r\n" ;	
		}


		$str = substr($str, 0, (strlen($str)-2) );	
		$myfile = fopen( $filename, 'w') or die("Unable to open file!");
		

		///file_get_contents('http://192.168.161.102/dep_trainer/Api_tool/api_test');
		//echo $str; exit;
		fwrite($myfile,$str);
		fclose($myfile); 

	}
 
	public function random_num()
	{ 
		echo rand(); 
	}

	public function generateRandomString($length = 10) 
	{
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) 
	    {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    //echo $randomString; exit;
	    return $randomString;
	}  
	public function in_item()
	{
		$cus = $_POST['sel'] ;

	if($_POST['sel'] == 'All')
		echo json_encode( $this->Backsystem_model->get_select_item_all() );
	else
		echo json_encode( $this->Backsystem_model->get_select_item($cus) ); 
	}
	public function minus_inv()
	{
		$plant = $_POST['sal'] ;
		$datt  = date('Y/m/d', strtotime($_POST['date_inv'])  ); 

		echo json_encode(  $this->Backsystem_model->get_minus_inv($plant, $datt) ); 

	}
	public function diff_inv()
	{
		$plant = $_POST['sal'] ;
		$datt  = date('Y/m/d', strtotime($_POST['date_inv'])  );


		echo json_encode(  $this->Backsystem_model->get_diff_inv($plant, $datt) ); 

	}

	public function wh_inv()
	{ 
		echo json_encode(  $this->Backsystem_model->get_wh_inv() );  

	}
	public function itm_inv()
	{ 
		echo json_encode(  $this->Backsystem_model->get_item_inv() ); 

	}

	public function exceltest()
	{ 
	    		echo $_GET['rev']+1;
	    		exit; 

	} 
	}
