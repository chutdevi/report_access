<?php
class Backsep_model extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        ## asset config
        //session_destroy();
        ob_clean();
        flush();
        $tz_object = new DateTimeZone('+0700');
        $datetime  = new DateTime();
        $datetime->setTimezone($tz_object);

       $this->pcs = $this->load->database('pick',true);

       $this->emp = $this->load->database('user',true);
       
       $this->fa = $this->load->database('fa',true);

       $this->ship = $this->load->database('ship',true);

       $this->expk = $this->load->database('another_db', true);
        //$this->template->write('plugins_url', $this->plugins);
 
    }

    public function get_wi_picking($wi)
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
//        echo $datetime->format('Y\-m\-d\ H:i:s');
//        exit;        
        
        //echo $wi; exit;
        // $insert_user_stored_proc = "EXEC GETPICKING_WI ";
        // $data = array('wi' => $wi);
        $excue = $this->pcs->query("EXEC GETPICKING_WI '$wi'");
        $recue = $excue->result_array();


        //var_dump($recue); exit;
        return $recue;        


    }

    public function get_proditem_supply($wi)
    {

        $excue = $this->pcs->query("EXEC GETPICKING_LINE_PROD_ITEM '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }   
    public function get_suppitem_supply($wi)
    {

        $excue = $this->pcs->query("EXEC GETPICKING_LINE_SUPP_ITEM '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }   

    public function get_item_picking($wi)
    {

        $excue = $this->pcs->query("EXEC GETPICKING_ITEM '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }
    public function get_line_picking($wi)
    {

        $excue = $this->pcs->query("EXEC GETPICKING_LINE '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }


    public function get_wi_data($wi)
    {

        $excue = $this->pcs->query("EXEC TEST_WI '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }
    public function get_item_data($wi)
    {

        $excue = $this->pcs->query("EXEC TEST_ITEM '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }


    public function get_wi_scan($wi)
    {

        $excue = $this->pcs->query("EXEC GETDETAIL_WI_SCAN '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }
    public function get_item_scan($wi)
    {

        $excue = $this->pcs->query("EXEC GETDETAIL_ITEM_SCAN '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }    




   public function get_date_scan($st, $en)
    {

        $excue = $this->pcs->query("EXEC GETDETAIL_DATE_SCAN '$st', '$en'");
        $recue = $excue->result_array();

        return $recue;        
    }    
    public function get_line_scan($wi)
    {

        $excue = $this->pcs->query("EXEC GETDETAIL_LINE_SCAN '$wi'");
        $recue = $excue->result_array();

        return $recue;        
    }        
    public function get_all_scan()
    {

        $excue = $this->pcs->query("EXEC GETDETAIL_ALL_SCAN");
        $recue = $excue->result_array();

        return $recue;        
    }  
    public function get_adv_scan($ln, $tp, $ts, $st, $en)
    {

        $excue = $this->pcs->query("EXEC GETDETAIL_ADVANCED_SCAN '$ln', '$tp', '$ts', '$st', '$en'");
        $recue = $excue->result_array();

        return $recue;        
    }


    public function get_detail_user($id)
    {

        $excue = $this->emp->query("SELECT us.*, dp.DeptName FROM user us LEFT OUTER JOIN department dp ON us.DeptID = dp.DeptID WHERE us.EmpID = '$id'");
        $recue = $excue->result_array();

        return $recue;        
    }

    public function get_detail_work($wi)
    {


      $sql = "SELECT 
                  line_cd
                , VARCHAR_FORMAT( TO_DATE( plan_hi || '000000', 'YYYY/MM/DD HH24:MI:SS' ), 'YYYY-MM-DD' )  plan_date 
                , siji_jun prod_seq
                , plan_jun plan_seq                
                , hinban   item_cd
                , hinmei   item_name                
                , plan_su  prod_plan
                , jitu_su  prod_actu
                , CASE WHEN jitu_sd = '        ' THEN NULL ELSE VARCHAR_FORMAT( TO_DATE( jitu_sd || jitu_st, 'YYYY/MM/DD HH24:MI:SS' ), 'YYYY-MM-DD HH24:MI:SS' ) END  date_st
                , CASE WHEN jitu_ed = '        ' THEN NULL ELSE VARCHAR_FORMAT( TO_DATE( jitu_ed || jitu_et, 'YYYY/MM/DD HH24:MI:SS' ), 'YYYY-MM-DD HH24:MI:SS' ) END  date_en
                , sagyo_siji_no wi
                , jitu_lot lot_cd
                , VARCHAR_FORMAT( TO_DATE( upd_date, 'YYYY/MM/DD HH24:MI:SS' ), 'YYYY-MM-DD HH24:MI:SS' )  date_up
                from seisan_h 
                where sagyo_siji_no = '$wi'
                order by line_cd, plan_hi, siji_jun";

        $excue = $this->fa->query($sql);
        $recue = $excue->result_array();

        return $recue;      

    }




}
?> 
