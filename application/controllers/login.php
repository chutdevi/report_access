<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//var_dump($this->cache->get_metadata('my_cached_item'));
		$this->cache->clean();
		//memory_get_usage();
		ob_clean();
		flush(); 
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	}


	public function index()
	{


	}

	public function log_in($alert=100)
	{
			redirect("pcstools/login"); 	
			if (is_null($this->session->userdata('sessUsr'))) $usr = '99';
			else $usr = $this->session->userdata('sessUsr'); 

			switch ($alert) {
				case 0:

					if($usr != '99') $this->Backsystem_model->logout($usr);

					//echo $usr; exit;
				     $arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");
					 $this->session->set_userdata($arrData);	
					$data['alert'] = '<!-- -->';
					break;
				case 1:
					
					$data['alert'] = '<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-ban"></i> Alert!</h4>
						ไม่สามารถทำการ LOGIN ได้ กรุณาลองใหม่อีกครั้ง
					  	</div>';
					 $arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");
					 $this->session->set_userdata($arrData);
					 //$this->Backsystem_model->checksession($usr);
					break;					  	
				case 2:

					$data['alert'] = '<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-info"></i> Alert!</h4>
						You have been signed out.
					  </div>';
					$arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");				
					
					$this->session->set_userdata($arrData);
					$this->Backsystem_model->logout($usr);					
					break;	
				case 3:
					$data['alert'] = '<div class="alert alert-warning alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-info"></i> Alert!</h4>
						บัญชีของคุณได้ทำการล๊อคอินอยู่ในระบบ ณ เวลานี้
					  </div>';
					$arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");				
					
					$this->session->set_userdata($arrData);
					//$this->Backsystem_model->checksession($usr,3);					
					break;	
				case 4:
					$data['alert'] = '<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-info"></i> Alert!</h4>
						บัญชีของคุณยังไม่ได้ทำการล๊อคเอ้า ออกจากระบบ กรุณาทำการล๊อคอินอีกครั้ง
					  </div>';
					$arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");				
					
					$this->session->set_userdata($arrData);
					//$this->Backsystem_model->checksession($usr,3);					
					break;	
				case 5:
					$data['alert'] = '<div class="alert alert-info alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-info"></i> Alert!</h4>
						บัญชีของคุณไม่มีการตอบสนองการทำงาน กรุณาทำการล๊อคอินอีกครั้ง
					  </div>';
					$arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");				
					
					$this->session->set_userdata($arrData);
					//$this->Backsystem_model->checksession($usr,3);					
					break;																
				default:
				   // $this->Backsystem_model->checksession($usr);
					 if($usr != '99') $this->Backsystem_model->logout($usr);
					
				     $arrData = array('sessUsr'=> $usr, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "OUT");
					 $this->session->set_userdata($arrData);
					
					$data['alert'] = '<!-- -->';
					break;
			}				 

			$this->load->view('login.php', $data); 

	}


	public function home()
	{ 
			redirect("pcstools/home");
				$user_menu = array();

				$usr = $this->input->post('username');
				$pwd = $this->input->post('password');


				$this->Backsystem_model->CheckUse($usr,4);	

				$usrData = $this->Backsystem_model->chk_user_new_system($usr,$pwd); 

			if( count($usrData) > 0 ) 
			{
										
				$user_menu = $this->Backsystem_model->get_menu($usr);					
				$arrData = array(	  'sessUsr'  => $usrData[0]['USER_CD']
									, 'sessUsrId'=> $usrData[0]['USER_NAME']
									, 'sessAdd'  => $usrData[0]['ADDRESS']
									, 'menu' 	 => $user_menu
									, 'file_nm'  => "nodata.file" 
									, 'loggedIn' => "OK"
									, 'login' 	 => true
								);	 
						$this->session->set_userdata($arrData); 		
						if(count($user_menu['subm']) >= 1)
							{
									redirect('login/menu/' . $usr  );
							}
						else
						{
						redirect('login/first_mem');
						} 								
			}else
			{
					$arrData = array('sessUsr'=> null, 'sessUsrId'=>null, 'sessLastacc'=> null, 'loggedIn' => "ERR");				
					
					$this->session->set_userdata($arrData);					
					//echo "<script>alert(' ไม่สามารถทำการ LOGIN ได้ กรุณาลองใหม่อีกครั้ง '); </script>"; //exit;
					//$data['alert'] = "";
					redirect('login/log_in/1');
			} 
				$this->template->write_view('page_header', 'home/header_v.php', $user_menu);
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'tmp_v.php');
				$this->template->write_view('page_footer', 'home/footer_v.php');
				$this->template->render();

	}
	public function menu($usr="")
	{
		redirect("pcstools/home");

		$this->Backsystem_model->checksession($usr);

		$this->Backsystem_model->CheckUse($usr,5); 
				$user_menu = $this->Backsystem_model->get_menu($usr); 
				$setTitle = 'Home';
				$intail['usr']  = $this->session->userdata('sessUsr');
				$intail['uid']  = $this->session->userdata('sessUsrId');
				$intail['add']  = $this->session->userdata('sessAdd');
				$intail['menu'] = $user_menu;
				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php', $intail);
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/hm.php', $user_menu);
				//$this->template->write_view('page_content', 'tmp_v.php');
				$this->template->write_view('page_footer', 'home/footer_v.php');
				$this->template->render();

	}
		


	public function log_out()
	{
		$this->Backsystem_model->logout($this->session->userdata('sessUsr')); 
	}	


    public function first_mem()
	{
		$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));

		$this->load->view('welcome_message.php');
	}

	} 