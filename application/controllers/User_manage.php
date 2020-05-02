<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		ob_clean();
		flush();
		## asset config
		//session_destroy();

		//$this->template->write('plugins_url', $this->plugins);

	}


	public function index()
	{

	}
	public function ajax_user_list_ui()
	{
				$img = $this->Backuser_model->Getuser(0,5);

				//var_dump($img); exit;
				foreach($img as $x => $v)
					{
						$im = substr($v["USER_CD"], 2);
						echo $im;
						$this->img_mem($im);
					}

				echo json_encode( $img );

	}
	public function ajax_user_list()
	{
				$img = $this->Backuser_model->Getuser($_POST['data'],5);
				foreach($img as $x => $v)
					{
						$im = substr($v["USER_CD"], 2);
						$this->img_mem($im);
					}
				echo json_encode( $img );

	}
	public function ajax_user_group()
	{
				echo json_encode( $this->Backuser_model->Getgroup() ) ;

	}
	public function ajax_set_group()
	{
				echo ( $this->Backuser_model->Setgroup(  $_POST['gup_cd'], $_POST['user_cd'] ) );

				//echo ( $_POST['menu_cd'] . $_POST['menu_name'] . $_POST['sub_cd'] . $_POST['sub_name'] . $_POST['link'] );


				//echo ( $this->Backmanage_model->add_sub(  '00', 'Optiob', '00s01', 'Test', 'Test/mana' ) ) ;

	}

	public function ajax_addsub()
	{
				echo ( $this->Backmanage_model->add_sub(  $_POST['menu_cd'], $_POST['menu_name'], $_POST['sub_cd'], $_POST['sub_name'], $_POST['link'] ) ) ;

				//echo ( $_POST['menu_cd'] . $_POST['menu_name'] . $_POST['sub_cd'] . $_POST['sub_name'] . $_POST['link'] );


				//echo ( $this->Backmanage_model->add_sub(  '00', 'Optiob', '00s01', 'Test', 'Test/mana' ) ) ;

	}

	public function ajax_upsub()
	{
				echo ( $this->Backmanage_model->on_off( $_POST['sub_cd'], $_POST['sub_name'], $_POST['link']  ) ) ;
	}

	public function ajax_upstatus()
	{
				echo ( $this->Backmanage_model->on_off( $_POST['sub_cd'], $_POST['status'] ) ) ;
	}





	public function adm()
	{
				$this->Backsystem_model->checksession();


				$data['user_list'] = $this->Backuser_model->Getuser();
				$data['user_sys']  = $this->Backuser_model->user_sys();


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




    public function user_sys()
	{

				return json_encode($this->Backuser_model->user_sys());

	}
	public function exceltest()
	{

				$this->load->view('export/01simple-download-xlsx.php');

	}
	function img_mem($u)
		{

			$file_pointer = $u;//$_POST['img'];

			if ( file_exists('assets\images\card\img_mem\\' . $file_pointer . '.jpg') )  
			{ 
			    //echo json_encode( $this->Backsep_model->get_detail_user($file_pointer) );
			} 
			else 
			{ 

			    $this->save_image('http://192.168.82.23/member/photo/'. $file_pointer . '.jpg','assets\images\card\img_mem\\' . $file_pointer  . '.jpg');
			    //echo json_encode( $this->Backsep_model->get_detail_user($file_pointer) );		                            
			} 		
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
