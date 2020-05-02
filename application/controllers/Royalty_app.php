<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Royalty_app extends CI_Controller {

	 
	public function __construct()
	{
		date_default_timezone_set("Asia/Bangkok");
		parent::__construct();
		$this->output->delete_cache();
		ob_clean();
		flush();
		//header('Content-Type: application/json');
		## asset config
		//session_destroy();

		//$this->template->write('plugins_url', $this->plugins);

	}
	public function index()
	{
		

	}
	public function json_getdata_sm()
	{
		//echo "gsdgsdfsdf";	
		 $date_deli = array($_POST['kvcArray'], $_POST['kvcArray2']);
		 $date_start = date( 'Y/m/d', strtotime($date_deli[0]) ) ;

		 $date_end   = date( 'Y/m/d', strtotime($date_deli[1]) ) ;


		 $data['sm'] = $this->Backroyalty_model->get_data_sm($date_start, $date_end);	

		 $this->Backroyalty_model->ins_royalty_temp( $data['sm'], 'ROYALTY_SM_TEMP' );	


		$flg = ( count($data['sm']) > 0 ) ? "complete" : "error" ;
		echo json_encode( $flg );

	}
	public function json_getdata_bh()
	{
		//echo "gsdgsdfsdf";	
		 $date_deli = array($_POST['kvcArray'], $_POST['kvcArray2']);
		 $date_start = date( 'Y/m/d', strtotime($date_deli[0]) ) ;

		 $date_end   = date( 'Y/m/d', strtotime($date_deli[1]) ) ;

//$date_start = date( 'Y/m/d', strtotime('2019-08-01') ) ;
//$date_end = date( 'Y/m/d', strtotime('2019-08-31') ) ;


		 $data['sm'] = $this->Backroyalty_model->get_data_bh($date_start, $date_end);	
		// $data['sm'] = $this->Backroyalty_model->get_data_bh('2019/05/01', '2019/05/31');
		 $this->Backroyalty_model->ins_royalty_temp_bh( $data['sm'], 'ROYALTY_SM_TEMP_BH' );	
		 //var_dump($data['sm']);
		//$arrReturn = array("code" => '200', "description" => "success.");
		// echo ($_POST['sad']);
		$flg = ( count($data['sm']) > 0 ) ? "complete" : "error" ;
		echo json_encode( $flg );

	}
	public function json_getdata_pl()
	{
		//echo "gsdgsdfsdf";	
		$date_deli = array($_POST['kvcArray'], $_POST['kvcArray2']);
		$date_start = date( 'Y/m/d', strtotime($date_deli[0]) ) ;

		$date_end   = date( 'Y/m/d', strtotime($date_deli[1]) ) ;


		 $data['sm'] = $this->Backroyalty_model->get_data_pl($date_start, $date_end);	
		// $data['sm'] = $this->Backroyalty_model->get_data_pl('2019/05/01', '2019/05/l31');
		 $this->Backroyalty_model->ins_royalty_temp( $data['sm'], 'ROYALTY_SM_TEMP_PCL' );	
		// var_dump($data['sm']);
		//$arrReturn = array("code" => '200', "description" => "success.");
		// echo ($_POST['sad']);
		$flg = ( count($data['sm']) > 0 ) ? "complete" : "error" ;
		echo json_encode( $flg );

	}

	public function json_getdata_ig()
	{
		//echo "gsdgsdfsdf";	
		$date_deli = array($_POST['kvcArray'], $_POST['kvcArray2']);
		$date_start = date( 'Y/m/d', strtotime($date_deli[0]) ) ;

		$date_end   = date( 'Y/m/d', strtotime($date_deli[1]) ) ;


		 $data['sm'] = $this->Backroyalty_model->get_data_ig($date_start, $date_end);	
		// $data['sm'] = $this->Backroyalty_model->get_data_pl('2019/05/01', '2019/05/31');
		 $this->Backroyalty_model->ins_royalty_temp( $data['sm'], 'ROYALTY_SM_TEMP_BRAKE_IGCE' );	
		// var_dump($data['sm']);
		//$arrReturn = array("code" => '200', "description" => "success.");
		// echo ($_POST['sad']);
		$flg = ( count( $data['sm'] ) > 0 ) ? 'complete' : "error" ;
		echo json_encode( $flg );

	}

	public function json_getdata_im()
	{
		//echo "gsdgsdfsdf";	
		$date_deli = array($_POST['kvcArray'], $_POST['kvcArray2']);
		$date_start = date( 'Y/m/d', strtotime($date_deli[0]) ) ;

		$date_end   = date( 'Y/m/d', strtotime($date_deli[1]) ) ;


		$data['sm'] = $this->Backroyalty_model->get_data_im($date_start, $date_end);	
		// $data['sm'] = $this->Backroyalty_model->get_data_pl('2019/05/01', '2019/05/01');
		 $this->Backroyalty_model->ins_royalty_temp( $data['sm'], 'ROYALTY_SM_TEMP_BRAKE_IMCT' );	
		// var_dump($data['sm']);
		//$arrReturn = array("code" => '200', "description" => "success.");
		// echo ($_POST['sad']);
		$flg = ( count($data['sm']) > 0 ) ? "complete" : "error" ;
		echo json_encode( $flg );

	}


	public function json_getdata_match_cnt()
	{



		$data['sm'] = $this->Backroyalty_model->match_data_royalty('ROYALTY_SM_TEMP',    'ROYALTY_SM');	
		$data['bh'] = $this->Backroyalty_model->match_data_royalty('ROYALTY_SM_TEMP_BH', 'ROYALTY_SM_BH');
		$data['im'] = $this->Backroyalty_model->match_data_royalty('ROYALTY_SM_TEMP_BRAKE_IGCE', 'ROYALTY_SM_BRAKE_IGCE');
		$data['ig'] = $this->Backroyalty_model->match_data_royalty('ROYALTY_SM_TEMP_BRAKE_IMCT', 'ROYALTY_SM_BRAKE_IMCT');
		$data['pl'] = $this->Backroyalty_model->match_data_royalty('ROYALTY_SM_TEMP_PCL', 'ROYALTY_SM_PCL');

		//$arrReturn = array("code" => '200', "description" => "success.");
		echo ( json_encode( $data ) );
		//var_dump($data); exit;
	}

	public function json_getdata_cust_cd()
	{


		//$arrReturn = array("code" => '200', "description" => "success.");
		echo ( json_encode( $this->Backroyalty_model->get_cust_cd( $_POST['custArray'] ) ) );
		//var_dump($data); exit;
	}

	public function json_getdata_master()
	{


		//$arrReturn = array("code" => '200', "description" => "success.");
		echo ( json_encode( $this->Backroyalty_model->get_master( $_POST['custArray'] ) ) );
		//var_dump($data); exit;
	}


	public function api_update_master()
	{
	

				$fg = array("MEC", "1050B374", "SLEEVE", "4P00", "0.03", "0");	  
							  
                          //WHEN CS.CUST_ANAME = 'IEMT' OR CS.CUST_ANAME = 'IEMT-LLC' OR CS.CUST_ANAME = 'IEMT-KD'THEN 'IEMT-SUM'

		//$result_cust = $this->Backpicking_model->get_select_Namecust($data_tran, $date_deli); 

		

		echo ( json_encode ( $this->Backroyalty_model->upd_data_master( $_POST['oor'], $_POST['table'] ) ) );
	}

	public function api_insert_master()
	{
	

				$fg = array("MTA", "49180-20200", "HOUSING BEARING", "RENAULT-R9N", "0.03");	  
							  
                          //WHEN CS.CUST_ANAME = 'IEMT' OR CS.CUST_ANAME = 'IEMT-LLC' OR CS.CUST_ANAME = 'IEMT-KD'THEN 'IEMT-SUM'

		//$result_cust = $this->Backpicking_model->get_select_Namecust($data_tran, $date_deli); 

		//var_dump( $this->Backroyalty_model->ins_new_master( $fg, "ROYALTY_SM_BH" )	);

		echo ( json_encode ( $this->Backroyalty_model->ins_new_master( $_POST['oor'], $_POST['table'] ) ) );
	}

	public function upload_price()
	{
	

		if(isset($_FILES["file"]["type"]))
		{
				$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
				$targetPath = $_SERVER['DOCUMENT_ROOT']."/report_access/upload_file/".$_FILES['file']['name']; // Target path where file is to be stored
				$part_project = $_SERVER['DOCUMENT_ROOT']."/report_access";
				$filename = 'material_cost' ; 
				$file_nameUp = 'material_cost_' . date('dmyHis');


				move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				copy( $part_project . "/upload_file/".$_FILES['file']['name'], $part_project . "/file_price_mat/".$filename.".csv" );
				rename( $part_project . "/upload_file/".$_FILES['file']['name'], $part_project . "/upload_file/".$file_nameUp.".csv" );
				

				echo ( $this->Backroyalty_model->ins_material_cost() );

			    //echo (  $str );
		}
		else
		{
				echo ( 'Error' );
		}

		
	}
	public function json_get_boi()
	{
	

				

				$this->Backroyalty_model->ins_boi_temp();

			    //echo (  $str );


		
	}
	public function json_get_tbk_rm()
	{
	

				

				$this->Backroyalty_model->tbk_rm();

			    //echo (  $str );


		
	}
	public function json_rep_sm()
	{
	

				$data['list_act_report'] =  array(  'sm' => $this->Backroyalty_model->rep_royalty_sm("sm"),
													'brake_imct' => $this->Backroyalty_model->rep_royalty_sm("imct"),
													'brake_igce' => $this->Backroyalty_model->rep_royalty_sm("igce"),
													'pcl' => $this->Backroyalty_model->rep_royalty_sm("pcl"),
													'bh' => $this->Backroyalty_model->rep_royalty_sm("bh")												
												 );
				$data['title'] = array( "SM", "BRAKE IMCT", "BRAKE IGCE", "PCL", "BH" );
				$data['filename'] = "royalty";
				$data['colhead']  = "CCFFCC";
				$data['colhead_font']  = "1A1100";					

				//$data[] = ;
				$this->load->view('from_report_royalty',$data);
				//$this->load->view('from_report', $data);


			    echo (  "Test!" );
	}
	public function json_rep_rm($tpy)
	{
    
				$data = array();

				if ($tpy == 'br') 
				{
					$data['list_act_report'] =  array( 'brake' => $this->Backroyalty_model->tbk_cost_rm_bk() );
					//$data['title'] = array("PUMP", "BRAKE");
					$data['filename'] = "materail_cost";					# code...
				}
				else
				{
					$data['list_act_report'] =  array( 'pump' => $this->Backroyalty_model->tbk_cost_rm_sm() );
					//$data['title'] = array("PUMP", "BRAKE");
					$data['filename'] = "materail_cost";							
				}

				//$data['colhead']  = "CCFFCC";
				//$data['colhead_font']  = "1A1100";					

				//$data[] = ;
				$this->load->view('export/from_csv',$data);
				//$this->load->view('from_report', $data);


			    echo (  "Test!" );
	}


	public function ind_ts()
	{
	
			$this->Backroyalty_model->ins_material_cost();

				//$this->load->view('from_report',$data);
				

				

			    //echo (  $str );


		
	}



#============================================================================================================================================================================================================================================================================








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
	// END Template Class

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */