<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header("Content-Type:text/html; charset=UTF-8"); 
date_default_timezone_set("Asia/Bangkok");
class Report extends CI_Controller { 
	public function __construct()
	{
		parent::__construct();
		## asset config
		//session_destroy();
				ob_clean();
				flush();
		//$this->template->write('plugins_url', $this->plugins);

	}


	public function index()
	 { 

	 }
	public function sal()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Sale report'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/sr.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function pur()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Purchase report'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/pr.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function prd()
	 {
				$this->Backsystem_model->checksession();
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5); 


				$this->load->model("Directory_model", "dr");
				if( $this->input->get("s") || $this->input->get("e") ){
					$dst = ( $this->input->get("s") ) ? $this->input->get("s") : date('Y-m-d');
					$den = ( $this->input->get("e") ) ? $this->input->get("e") : $dst;
					$this->dr->summarydetail_file($dst, $den); 
				}

				$url = "http://192.168.161.102/api_system/api_prdsys/prdsys_getdata_prd_list";
				//$this->dr->summarydetail_file($this->dr->apiget($url), '2020-04-01', '2020-04-15'); 	
				$intail['setTitle'] = 'Production-report'; 
				$intail['path'] = 'Report'; 
				$intail['dir']  = $this->dr->apiget($url); 
				$intail['usr']  = $this->session->userdata('sessUsr');
				$intail['uid']  = $this->session->userdata('sessUsrId');
				$intail['add']  = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				$intail["headder"] = "header_v";
				$intail["content"] = "content1";
				$intail["footter"] = "footer_v";
				$this->load->view('Report/report_view.php',$intail); 
	 }

	public function ipu()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Purchase Interface Data'; 
				$intail['usr'] =  $this->session->userdata('sessUsr');
				$intail['uid'] =  $this->session->userdata('sessUsrId');
				$intail['add'] =  $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				$intail['his']  = array( 'all' => $this->Backsystem_model->get_his(1, 11),'dom' => $this->Backsystem_model->get_his(1, 22), 'ove' => $this->Backsystem_model->get_his(1, 33) );

				//var_dump($intail['his']); exit;
				$intail['us']   = array( 'all' => $this->Backsystem_model->Ck_Newdata_pu($intail['his']['all'], 1, 11),
										 'dom' => $this->Backsystem_model->Ck_Newdata_pu($intail['his']['dom'], 1, 22), 
										 'ove' => $this->Backsystem_model->Ck_Newdata_pu($intail['his']['ove'], 1, 33) 
									   );

			$message_all = ( $intail['us']['all'] == "disabled" ) 
					? '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span> '.$intail['his']['all'][0]['USER_CD']." : ".$intail['his']['all'][0]['USER_NAME']."<br><br>"." has been downloaded on ".$intail['his']['all'][0]['DL_TIME']
				   	: '<span class="badge badge-pill badge-pink"    ><i class="fa  fa-bell-o faa-shake animated"></i></span> '.'You have new Data Interface' ;		
			$message_dom = ( $intail['us']['dom'] == "disabled" ) 
					? '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span> '.$intail['his']['dom'][0]['USER_CD']." : ".$intail['his']['dom'][0]['USER_NAME']."<br><br>"." has been downloaded on ".$intail['his']['dom'][0]['DL_TIME']
		            : '<span class="badge badge-pill badge-pink"    ><i class="fa  fa-bell-o faa-shake animated"></i></span> '.'You have new Data Interface' ;	
			$message_ove = ( $intail['us']['ove'] == "disabled" ) 
					? '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span> '.$intail['his']['ove'][0]['USER_CD']." : ".$intail['his']['ove'][0]['USER_NAME']."<br><br>"." has been downloaded on ".$intail['his']['ove'][0]['DL_TIME']
					: '<span class="badge badge-pill badge-pink"    ><i class="fa  fa-bell-o faa-shake animated"></i></span> '.'You have new Data Interface' ;
 
	  //var_dump($message_ove); exit;
				$intail['mes']  = array( 'all' => $message_all, 'dom' => $message_dom, 'ove' => $message_ove );											      	  

               
				//var_dump($intail['his']); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/inf_pu.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function isa()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Sales Interface Data'; 
				$intail['usr'] =  $this->session->userdata('sessUsr');
				$intail['uid'] =  $this->session->userdata('sessUsrId');
				$intail['add'] =  $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				$intail['his'] = array( 'all' => $this->Backsystem_model->get_his(2, 11), 'dom' => $this->Backsystem_model->get_his(2, 22), 'ove' => $this->Backsystem_model->get_his(2, 33) );
				//var_dump($intail['his']); exit;
				$intail['us']   = array( 'all' => $this->Backsystem_model->Ck_Newdata_sa($intail['his']['all'], 2, 11),
										 'dom' => $this->Backsystem_model->Ck_Newdata_sa($intail['his']['dom'], 2, 22), 
										 'ove' => $this->Backsystem_model->Ck_Newdata_sa($intail['his']['ove'], 2, 33) 
									   );

			$message_all = ( $intail['us']['all'] == "disabled" ) 
					? '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span> '.$intail['his']['all'][0]['USER_CD']." : ".$intail['his']['all'][0]['USER_NAME']."<br><br>"." has been downloaded on ".$intail['his']['all'][0]['DL_TIME']
				   	: '<span class="badge badge-pill badge-pink"    ><i class="fa  fa-bell-o faa-shake animated"></i></span> '.'You have new Data Interface' ;		
			$message_dom = ( $intail['us']['dom'] == "disabled" ) 
					? '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span> '.$intail['his']['dom'][0]['USER_CD']." : ".$intail['his']['dom'][0]['USER_NAME']."<br><br>"." has been downloaded on ".$intail['his']['dom'][0]['DL_TIME']
		            : '<span class="badge badge-pill badge-pink"    ><i class="fa  fa-bell-o faa-shake animated"></i></span> '.'You have new Data Interface' ;	
			$message_ove = ( $intail['us']['ove'] == "disabled" ) 
					? '<span class="badge badge-pill badge-success" ><i class="fa  fa-check  faa-shake animated"></i></span> '.$intail['his']['ove'][0]['USER_CD']." : ".$intail['his']['ove'][0]['USER_NAME']."<br><br>"." has been downloaded on ".$intail['his']['ove'][0]['DL_TIME']
					: '<span class="badge badge-pill badge-pink"    ><i class="fa  fa-bell-o faa-shake animated"></i></span> '.'You have new Data Interface' ;
 
	 //var_dump($message_ove); exit;
				$intail['mes']  = array( 'all' => $message_all, 'dom' => $message_dom, 'ove' => $message_ove );											      	  

               
				//var_dump($intail['his']); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/inf_sa.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 } 
	public function ipuch()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'History - Purchase Interface Data';
				$setTitle = 'Home';
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/inf_pu_.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function isach()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'History - Sales Interface Data'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/inf_sa_.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function hisdown()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'History - Download Interface Data';
				$setTitle = 'Home';
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/inf_his.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function picking()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'PICKING LIST & DELIVERY NOTE'; 
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/picking_view.php');

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	 }
	public function exceltest()
	 {

				$this->load->view('export/01simple-download-xlsx.php');

	 }

	public function getfile_prd()
	 {
			$this->load->model("Directory_model", "dr");
			$ofile = $this->input->get("f");
			$nfile = "temp/".basename($ofile);
			if(file_exists($ofile)){
				if( copy($ofile, $nfile) ){
					 
					//echo sprintf("copy file %s from path %s to path %s complete", basename($nfile)   , dirname($nfile, 1), dirname($ofile, 1) );
					$msg = sprintf("user: %s download: complete",$this->session->userdata('name'), basename($ofile) ); // array( "flg"=>1, "link" => $nfile, "message" => $msg )
					$url = sprintf("http://192.168.161.102/api_system/Api_event_reportaccess/evtsys_eventadd/" );
				    $data = array(
									 "u"  => sprintf("'%s'",$this->session->userdata('sessUsr'))
									,"f"  => sprintf("'%s'",basename($ofile))
									,"n"  => sprintf("'DOWNLOAD PRODUCTION FILE BY ( %s ) %s'",$this->session->userdata('sessUsr'),  $this->session->userdata('name'))
									,"id" => sprintf("'001'")
					);
					//echo "$url; exit;
					
					$this->dr->apireq($url, $data);
					echo json_encode( array( "flg"=>"1", "link" => $nfile, "user" => $this->session->userdata('name') ) ); 
				}else{
					//echo sprintf("copy file %s from path %s to path %s uncomplete", basename($nfile) , dirname($nfile, 1), dirname($ofile, 1) );
					$msg = sprintf("user: %s download: error",$this->session->userdata('name'), basename($ofile) );
					echo json_encode( array("flg"=>"0", "link" => "error", "message" => $msg ) );
				}
			}else{
				$msg = sprintf("user: %s download: uncomplete",$this->session->userdata('name'), basename($ofile) );
				echo json_encode( array("flg"=>"0", "link" => "not found", "message" => $msg ) );
			} 
	 } 	 
}