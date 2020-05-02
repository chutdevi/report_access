<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Amn_manage extends CI_Controller {

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
	public function ajax_getmainmenu()
	{

				echo json_encode( $this->Backmanage_model->main_menu() );

	}
	public function ajax_getmenu()
	{

				echo json_encode( $this->Backmanage_model->sub_menu( $_POST['menu'] ) );

	}	
	public function ajax_newcode()
	{
				echo ( $this->Backmanage_model->get_newcode(  $_POST['menu'] ) );
	}

	public function ajax_addsub()
	{
				echo ( $this->Backmanage_model->add_sub(  $_POST['menu_cd'], $_POST['menu_name'], $_POST['sub_cd'], $_POST['sub_name'], $_POST['link'] ) ) ;
	}

	public function ajax_upsub()
	{
				echo ( $this->Backmanage_model->update_sub( $_POST['sub_cd'], $_POST['sub_name'], $_POST['link']  ) ) ;
	}

	public function ajax_upstatus()
	{
				echo ( $this->Backmanage_model->on_off( $_POST['sub_cd'], $_POST['status'] ) ) ;
	}
	public function ajax_dupgroup()
	{
				echo ( $this->Backmanage_model->chk_dupgroup(  $_POST['gup_name'] ) ) ;

	}
	public function ajax_insgroup()
	{
				echo json_encode( $this->Backmanage_model->set_mainmenu(  $_POST['gup_name'] )  ) ;

	}


	public function ajax_getmenu_forgroup()
	{

				echo json_encode( $this->Backgroup_model->gup_menu( $_POST['gup'] ) );

	}
	public function ajax_getsubmenu_forgroup()
	{

				echo json_encode( $this->Backgroup_model->sub_menu( $_POST['menu_cd'] ) ) ;

	}

	public function ajax_getsubdetail_forgroup()
	{

				echo json_encode( $this->Backgroup_model->sub_detail( $_POST['sub_cd'] ) ) ;

	}
	public function ajax_setgroup_user()
	{

				echo ( $this->Backgroup_model->set_group_us( $_POST['gup_cd'], $_POST['menu_cd'], $_POST['menu_name'], $_POST['sub_cd']  ) ) ;

	}
	public function ajax_new_group_user()
	{
				//echo json_encode( $this->Backgroup_model->set_newgroup_us(  'TEst' )  ) ;

				echo json_encode( $this->Backgroup_model->set_newgroup_us(  $_POST['gup_name'] )  ) ;

	}
	public function ajax_dupgroup_us()
	{
				echo ( $this->Backgroup_model->chk_dupgroup(  $_POST['gup_name'] ) ) ;

	}
	public function ajax_rmgroup_us()
	{
				//echo ( $this->Backgroup_model->rem_meugroup(  4  )  ) ;
				echo ( $this->Backgroup_model->rem_meugroup(  $_POST['num']  )  ) ;

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

		
	}
