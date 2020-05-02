<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pcstools extends CI_Controller { 
	public function __construct()
	{
		parent::__construct(); 
		
		$this->cache->clean(); 
		ob_clean();
		flush(); 
		header("Cache-Control: no-cache, must-revalidate");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		$this->load->model("Main_model", "main");
	}


	public function index()
	{


	}
	public function login()
	 {
		//$this->Backsystem_model->checksession($this->session->userdata('sessUsr'));
		//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5); 
		session_destroy(); 
		$path = "Login";
		$intail['setTitle'] = 'LOGIN'; 
		$intail['path']    = $path; 
		$intail["headder"] = "header";
		$intail["content"] = "content";
		$intail["footter"] = "footer";
		$this->load->view($path.'/login_view.php',$intail); 

	 }
	public function into()
	{ 
		$user  = ($this->input->get("u")) ? base64_decode( $this->input->get("u") ) : $this->session->userdata("id");
		$name  = ($this->input->get("n")) ? base64_decode( $this->input->get("n") ) : $this->session->userdata("name");
		$address  = ($this->input->get("a")) ? base64_decode( $this->input->get("a") ) : $this->session->userdata("address");
		$group = ($this->input->get("g")) ? base64_decode( $this->input->get("g") ) : $this->session->userdata("group");
		$user_menu = $this->Backsystem_model->get_menu($user); 
		$this->session->set_userdata("id"  ,$user);
		$this->session->set_userdata("name", $name);
		$this->session->set_userdata("address", $address);
		$this->session->set_userdata("group", $group);
		$this->session->set_userdata("login", true); 

		$uid = $this->session->userdata("id");
		$url = "http://192.168.161.102/api_system/Api_event_reportaccess/evtsys_getmenugp";
		$img = sprintf('assets\images\card\img_mem\%s.jpg',  substr( $uid,2,strlen($uid) ) );
		$g   = sprintf("'%s'",$this->session->userdata("group") );
		$menu = $this->main->apireq($url, array("g" => $g) ); 

		$this->session->set_userdata("pcsmenu", $menu);
		$this->session->set_userdata("uimage" , $this->main->img_path( $img, substr( $uid,2,strlen($uid)).".jpg" ));


		$this->session->set_userdata('menu'  ,$user_menu); //tempolary
		$this->session->set_userdata('sessUsr'  ,$user);

		echo 'home'; exit;
		redirect('pcstools/home');
	}
	public function home()
	 {
		$this->Backsystem_model->checksession();
		//$this->Backsystem_model->CheckUse($this->session->userdata('sessUsr'),5);  

		$path = "Home-menu";
		$intail['title']   = 'HOME'; 
		$intail['path']    =  $path; 
		$intail['uimg']    =  $this->session->userdata("uimage");
		$intail['pcsmenu'] =  $this->session->userdata("pcsmenu");
		$intail["header"]  = "header";
		$intail["content"] = "content";
		$intail["footer"]  = "footer";
		$this->load->view($path.'/home_view.php',$intail); 

	 }
	 
}