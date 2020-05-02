<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gen extends CI_Controller {

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
		$this->output->delete_cache();
		## asset config
		//session_destroy();

		//$this->template->write('plugins_url', $this->plugins);

	}

	public function sal()
	{

		$date_start = date('Y/m/d', strtotime($this->input->post('date_start')));
		$date_end   = date('Y/m/d', strtotime($this->input->post('date_end')));

		//echo $date_start."<hr>".$date_end; exit;
		//$data['list_act_report'] = array( 'sale_report'  => $this->Backsystem_model->sale_report($date_start, $date_end) );
		//$this->god->welcome();

		$data_sale = $this->Backsystem_model->sale_report($date_start, $date_end);
		$data_boi  = $this->Backsystem_model->boi();

		//$this->god->boi_rel($data_sale, $data_boi);
		//var_dump( $this->Backsystem_model->boi() ); exit;

		$data['list_act_report'] =  array( 'sale_report' => $this->Backsystem_model->boi_rel($data_sale, $data_boi) );
		$data['title'] = array("Sale report");
		$data['filename'] = "sale_report";
		$data['colhead']  = "CCFFCC";
		$data['colhead_font']  = "1A1100";		
		$this->load->view('Export/from_report',$data);

	}

	public function inf_pu()
	{

		$date_start = date('Y/m/d', strtotime($this->input->post('date_start')));
		$date_end   = date('Y/m/d', strtotime($this->input->post('date_end')));

		 $csv  = "Inside Mgt No."                                	   . "," ;
		 $csv .= "Co. code"                                            . "," ;
		 $csv .= "Business pattern code"                               . "," ;
		 $csv .= "Line No."                                            . "," ;
		 $csv .= "Ref. origin type"                                    . "," ;
		 $csv .= "Sales actual Mgt No."                                . "," ;
		 $csv .= "Order Mgt No."                                       . "," ;
		 $csv .= "Sales slip No."                                      . "," ;
		 $csv .= "Ord No."                                             . "," ;
		 $csv .= "Accpt count"                                         . "," ;
		 $csv .= "Receiving check No."                                 . "," ;
		 $csv .= "Chargeable supply No."                               . "," ;
		 $csv .= "Temp. order No."                                     . "," ;
		 $csv .= "Bad disposal history slip No."                       . "," ;
		 $csv .= "Bad disposal history correction count"               . "," ;
		 $csv .= "Bad disposal history correction type"                . "," ;
		 $csv .= "Exception cost history slip No."                     . "," ;
		 $csv .= "Exception cost history correction count"             . "," ;
		 $csv .= "Exception cost history correction type"              . "," ;
		 $csv .= "Generation Proc type"                                . "," ;
		 $csv .= "Pmt recipient code"                                  . "," ;
		 $csv .= "Vendor code"                                         . "," ;
		 $csv .= "Plant code"                                          . "," ;
		 $csv .= "Item No."                                            . "," ;
		 $csv .= "Item name"                                           . "," ;
		 $csv .= "UC"                                                  . "," ;
		 $csv .= "UC type"                                             . "," ;
		 $csv .= "Qt."                                                 . "," ;
		 $csv .= "Measure unit"                                        . "," ;
		 $csv .= "Amt"                                                 . "," ;
		 $csv .= "Discount amount"                                     . "," ;
		 $csv .= "Receipt date"                                        . "," ;
		 $csv .= "Consumption tax code"                                . "," ;
		 $csv .= "Debt Interface flag"                                 . "," ;
		 $csv .= "Debt IF EXEC date"                                   . "," ;
		 $csv .= "Accnt interface flag"                                . "," ;
		 $csv .= "Accnt IF EXEC date"                                  . "," ;
		 $csv .= "AP slip type(black)"                                 . "," ;
		 $csv .= "AP slip type(red)"                                   . "," ;
		 $csv .= "AP stocking Div. code"                               . "," ;
		 $csv .= "AP debt calculation type"                            . "," ;
		 $csv .= "AP dealings type(black)"                             . "," ;
		 $csv .= "AP dealings type(red)"                               . "," ;
		 $csv .= "AP calculation item/auxiliary subject"               . "," ;
		 $csv .= "AP slip code(black)"                                 . "," ;
		 $csv .= "AP slip code(red)"                                   . "," ;
		 $csv .= "AiIF record type column value(debtor)"               . "," ;
		 $csv .= "AiIF record type column value(creditor)"             . "," ;
		 $csv .= "Ai slip type(debtor)"                                . "," ;
		 $csv .= "Ai slip type(creditor)"                              . "," ;
		 $csv .= "Ai issue section(debtor)"                            . "," ;
		 $csv .= "Ai issue section(creditor)"                          . "," ;
		 $csv .= "Ai calculation item(debtor)"                         . "," ;
		 $csv .= "Ai calculation item(creditor)"                       . "," ;
		 $csv .= "Ai auxiliary item(debtor)"                           . "," ;
		 $csv .= "Ai auxiliary item(creditor)"                         . "," ;
		 $csv .= "Ai charge division code(debtor)"                     . "," ;
		 $csv .= "Ai charge division code(creditor)"                   . "," ;
		 $csv .= "Ai detail summary(debtor)"                           . "," ;
		 $csv .= "Ai detail summary(creditor)"                         . "," ;
		 $csv .= "Ai detail outline name type"                         . "," ;
		 $csv .= "Ai consumption tax judgment type(debtor)"            . "," ;
		 $csv .= "Ai consumption tax judgment type(creditor)"          . "," ;
		 $csv .= "Accnt IF EXEC date"                                  . "," ;
		 $csv .= "Including tax or Excluding tax type"                 . "," ;
		 $csv .= "Tax rates 1"                                         . "," ;
		 $csv .= "Tax rates 2"                                         . "," ;
		 $csv .= "Tax rates 3"                                         . "," ;
		 $csv .= "Defect factor class"                                 . "," ;
		 $csv .= "Defect factor code"                                  . "," ;
		 $csv .= "Pre defect discovery origin line code"               . "," ;
		 $csv .= "Pre defect discovery origin vendor code"             . "," ;
		 $csv .= "Progress %"                                          . "," ;
		 $csv .= "Currency code"                                       . "," ;
		 $csv .= "Create slip type"                                    . "," ;
		 $csv .= "Slip Mgt company code"                               . "," ;
		 $csv .= "Ship returned goods flag"                            . "," ;
		 $csv .= "Gr company type"                                     . "," ;
		 $csv .= "Dealings Div."                                       . "," ;
		 $csv .= "Dealings Gr type"                                    . "," ;
		 $csv .= "Bad disposal type"                                   . "," ;
		 $csv .= "Cost processing type"                                . "," ;
		 $csv .= "Partner code"                                        . "," ;
		 $csv .= "UC Mgt company code"                                 . "," ;
		 $csv .= "UC acquisition destination type"                     . "," ;
		 $csv .= "UC acquisition destination traders code"             . "," ;
		 $csv .= "UC basic date"                                       . "," ;
		 $csv .= "UC basic Qt."                                        . "," ;
		 $csv .= "Journalizing judgment type"                          . "," ;
		 $csv .= "Invoice No."                                         . "," ;
		 $csv .= "BOItype"                                             . "," ;
		 $csv .= "ASIA IF EXEC date"                                   . "," ;

		// echo $csv; exit;	

		$data['list_act_report'] = $this->Backsystem_model->inf_pu($date_start, $date_end);

		$data['csv'] = $csv;

		//var_dump($data['list_act_report']); exit;
		// $data['title'] = array("Sale report");
		$data['filename'] = "KAIKAKE_";
		// $data['colhead']  = "CCFFCC";
		// $data['colhead_font']  = "1A1100";		
		$this->load->view('Export/from_csv',$data);

	}
	public function inf_sa()
	{

		$date_start = date('Y/m/d', strtotime($this->input->post('date_start')));
		$date_end   = date('Y/m/d', strtotime($this->input->post('date_end')));

		$csv  = "Inside Mgt No."                                     . "," ;
		$csv .= "Co. code"                                           . "," ;
		$csv .= "Business pattern code"                              . "," ;
		$csv .= "Line No."                                           . "," ;
		$csv .= "Ref. origin type"                                   . "," ;
		$csv .= "Sales actual Mgt No."                               . "," ;
		$csv .= "Order Mgt No."                                      . "," ;
		$csv .= "Sales slip No."                                     . "," ;
		$csv .= "Ord No."                                            . "," ;
		$csv .= "Accpt count"                                        . "," ;
		$csv .= "Receiving check No."                                . "," ;
		$csv .= "Chargeable supply No."                              . "," ;
		$csv .= "Temp. order No."                                    . "," ;
		$csv .= "Bad disposal history slip No."                      . "," ;
		$csv .= "Bad disposal history correction count"              . "," ;
		$csv .= "Bad disposal history correction type"               . "," ;
		$csv .= "Exception cost history slip No."                    . "," ;
		$csv .= "Exception cost history correction count"            . "," ;
		$csv .= "Exception cost history correction type"             . "," ;
		$csv .= "Generation Proc type"                               . "," ;
		$csv .= "Cust code"                                          . "," ;
		$csv .= "Cust item No."                                      . "," ;
		$csv .= "Cust item name"                                     . "," ;
		$csv .= "Last delivery place code"                           . "," ;
		$csv .= "Cust order No."                                     . "," ;
		$csv .= "Plant code"                                         . "," ;
		$csv .= "Item No."                                           . "," ;
		$csv .= "Item name"                                          . "," ;
		$csv .= "UC"                                                 . "," ;
		$csv .= "UC type"                                            . "," ;
		$csv .= "Qt."                                                . "," ;
		$csv .= "Measure unit"                                       . "," ;
		$csv .= "Amt"                                                . "," ;
		$csv .= "Sales date"                                         . "," ;
		$csv .= "Consumption tax code"                               . "," ;
		$csv .= "Accnt interface flag"                               . "," ;
		$csv .= "Accnt IF EXEC date"                                 . "," ;
		$csv .= "AiIF record type column value(debtor)"              . "," ;
		$csv .= "AiIF record type column value(creditor)"            . "," ;
		$csv .= "Ai slip type(debtor)"                               . "," ;
		$csv .= "Ai slip type(creditor)"                             . "," ;
		$csv .= "Ai issue section(debtor)"                           . "," ;
		$csv .= "Ai issue section(creditor)"                         . "," ;
		$csv .= "Ai calculation item(debtor)"                        . "," ;
		$csv .= "Ai calculation item(creditor)"                      . "," ;
		$csv .= "Ai auxiliary item(debtor)"                          . "," ;
		$csv .= "Ai auxiliary item(creditor)"                        . "," ;
		$csv .= "Ai charge division code(debtor)"                    . "," ;
		$csv .= "Ai charge division code(creditor)"                  . "," ;
		$csv .= "Ai detail summary(debtor)"                          . "," ;
		$csv .= "Ai detail summary(creditor)"                        . "," ;
		$csv .= "Ai detail outline name type"                        . "," ;
		$csv .= "Ai consumption tax judgment type(debtor)"           . "," ;
		$csv .= "Ai consumption tax judgment type(creditor)"         . "," ;
		$csv .= "Accnt IF EXEC date"                                 . "," ;
		$csv .= "Including tax or Excluding tax type"                . "," ;
		$csv .= "Tax rates 1"                                        . "," ;
		$csv .= "Tax rates 2"                                        . "," ;
		$csv .= "Tax rates 3"                                        . "," ;
		$csv .= "Currency code"                                      . "," ;
		$csv .= "Create slip type"                                   . "," ;
		$csv .= "Slip Mgt company code"                              . "," ;
		$csv .= "Ship returned goods flag"                           . "," ;
		$csv .= "Gr company type"                                    . "," ;
		$csv .= "Dealings Div."                                      . "," ;
		$csv .= "Dealings Gr type"                                   . "," ;
		$csv .= "Bad disposal type"                                  . "," ;
		$csv .= "Cost processing type"                               . "," ;
		$csv .= "Partner code"                                       . "," ;
		$csv .= "UC Mgt company code"                                . "," ;
		$csv .= "UC acquisition destination type"                    . "," ;
		$csv .= "UC acquisition destination traders code"            . "," ;
		$csv .= "UC basic date"                                      . "," ;
		$csv .= "UC basic Qt."                                       . "," ;
		$csv .= "Journalizing judgment type"                         . "," ;
		$csv .= "Invoice No."                                        . "," ;
		$csv .= "BOItype"                                            . "," ;
		$csv .= "ASIA IF EXEC date"                                  ;

		// echo $csv; exit;	

		$data['list_act_report'] = $this->Backsystem_model->inf_sa($date_start, $date_end);

		$data['csv'] = $csv;

		//var_dump($data['list_act_report']); exit;
		// $data['title'] = array("Sale report");
		$data['filename'] = "URIKAKE_";
		// $data['colhead']  = "CCFFCC";
		// $data['colhead_font']  = "1A1100";		
		$this->load->view('Export/from_csv_1',$data);

	}
		
	}
