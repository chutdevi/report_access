<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage extends CI_Controller {
 
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
	public function pms()
	{
				$this->Backsystem_model->checksession();


				$data['user_list'] = $this->Backuser_model->Getuser(0,5);

				$data['user_all'] = $this->Backuser_model->Getuser(0,1000);
				//$data['user_gup'] = $this->Backuser_model->Getgroup();
				$data['user_sys'] = $this->Backuser_model->user_sys();


				//var_dump($data);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Sale report';
				$setTitle = 'Home';
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');

				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'home/menu_v.php');
				$this->template->write_view('page_content', 'content/user.php',$data);

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	}

	public function adm()
	{
				$this->Backsystem_model->checksession();


				$data['main_menu'] = $this->Backmanage_model->main_menu();



				//var_dump($data);
				//$setTitle = strtoupper($this->router->fetch_method());
				//echo $setTitle; exit;
				$setTitle = 'Sale report';
				$setTitle = 'Home';
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');

				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'content/tmp_v.php');
				$this->template->write_view('page_content', 'content/admu.php',$data);

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	}
	public function agu()
	{
				$this->Backsystem_model->checksession();
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);

				$data['group_user'] = $this->Backgroup_model->group_user();

 
				$setTitle = 'Sale report';
				$setTitle = 'Home';
				$intail['usr'] = $this->session->userdata('sessUsr');
				$intail['uid'] = $this->session->userdata('sessUsrId');
				$intail['add'] = $this->session->userdata('sessAdd');
				$intail['menu'] = $this->session->userdata('menu');

				//var_dump($intail); exit;
				$this->template->write('page_title', $setTitle);
				$this->template->write_view('page_header', 'home/header_v.php',$intail);				
				//$this->template->write_view('page_menu', 'content/tmp_v.php');
				$this->template->write_view('page_content', 'content/adgu.php',$data);

				$this->template->write_view('page_footer' , 'home/footer_v.php');
				$this->template->render();

	}
	public function mnm()
	 {
				$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
				//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);  
				$intail['setTitle'] = "Manage-member";
				$intail['uimg']    =  $this->session->userdata("uimage");
				$intail['pcsmenu'] =  $this->session->userdata("pcsmenu");
				$intail["header"] = "header";
				$intail["content"] = "content";
				$intail["footer"] = "footer";  			
				$this->load->view('Manage/manage_view.php',$intail); 
	 }


    public function user_sys()
	{ 
		return json_encode($this->Backuser_model->user_sys()); 
	}
	public function exceltest()
	{

				$this->load->view('export/01simple-download-xlsx.php');

	}

		
	}
