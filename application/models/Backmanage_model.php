<?php
class Backmanage_model extends CI_Model 
{

    public function main_menu() 
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
//        echo $datetime->format('Y\-m\-d\ H:i:s');
//        exit;        
        $this->ue = $this->load->database('user', true);
        //$this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        //$this->exp = $this->load->database('exp_db', TRUE);
        $sqlue = "SELECT MENU_CD , MENU_NAME FROM main_menu_mst ORDER BY MENU_CD"; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return $recue;
        //var_dump($recue); exit;
       // var_dump($recue[0]['TDF']); exit;
    }

    public function sub_menu($meu_cd)
    {
        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
  
        $this->ue = $this->load->database('user', true);

        $sqlue = " SELECT NUM, SUB_MENU_CD , SUB_MENU_NAME , LINK, STATUSD FROM menu_mst WHERE MENU_CD = '$meu_cd' "; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return  $recue;

    }       


    public function get_newcode($meu_cd)
    {
        $this->EX = $this->load->database('user', true);
        


        
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = " SELECT IFNULL( SUBSTR(MAX(SUB_MENU_CD),4,2) + 1 ,0)  NEW_CODE FROM menu_mst WHERE MENU_CD = '$meu_cd'  "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


       // echo $recExp[0]["NEW_CODE"]; exit;    
            if( $recExp[0]["NEW_CODE"] > 0 )
            {        
                 return str_pad($recExp[0]["NEW_CODE"],2,"0",STR_PAD_LEFT);
             }else{
                 return str_pad('1',2,"0",STR_PAD_LEFT);
             }
    }
    public function add_sub( $menu_cd, $menu_name, $sub_cd, $sub_name, $link)
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);   

         $this->ue = $this->load->database('user', true);   

            $sqlue = " SELECT LINK FROM menu_mst WHERE LINK = '$link' "; 
            $excue = $this->ue->query($sqlue);
            $recue = $excue->result_array();

            if( count($recue) < 1 )
            {
                $inta = array(
                    'MENU_CD'       => $menu_cd,
                    'MENU_NAME'     => $menu_name,
                    'SUB_MENU_CD'   => $sub_cd,                             
                    'SUB_MENU_NAME' => $sub_name,  
                    'LINK'          => $link,
                    'STATUSD'       => 0,
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'CREATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s')
                );
                $this->ue->insert('menu_mst', $inta); 

                $intb = array(
                    'MENU_CD'       => $menu_cd,
                    'MENU_NAME'     => $menu_name,
                    'SUB_MENU_CD'   => $sub_cd,                             
                    'GROUP_CD'      => 0,
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'CREATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s')
                );
                $this->ue->insert('menu_sys', $intb); 

                 return 1;
            }
            else
            {
                 return 0;
            }
    }
    public function update_sub($sub_cd, $sub_name, $link)
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);        

         //$status = ( $status == 1 ) ? 0 : 1;
         $this->ue = $this->load->database('user', true); 
            $sqlue = " SELECT LINK FROM menu_mst WHERE LINK = '$link' "; 
            $excue = $this->ue->query($sqlue);
            $recue = $excue->result_array();

            if( count($recue) < 1 )
            {
             $this->ue->set('SUB_MENU_NAME' , $sub_name );
             $this->ue->set('LINK'          , $link     );
             $this->ue->set('UPDATE_DATE', $datetime->format('Y\-m\-d\ H:i:s') );
             $this->ue->set('UPDATE_BY'  , $this->session->userdata('sessUsr') );
             $this->ue->where('SUB_MENU_CD', $sub_cd);
             $this->ue->update('menu_mst');
             return 1;   
            }
            else
            {
             return 0;
            }
    }

    public function on_off($sub_meu_cd, $status)
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);        

         $status = ( $status == 1 ) ? 0 : 1;
         $this->ue = $this->load->database('user', true); 

         $this->ue->set('STATUSD' , $status );
         $this->ue->set('UPDATE_DATE', $datetime->format('Y\-m\-d\ H:i:s') );
         $this->ue->set('UPDATE_BY'  , $this->session->userdata('sessUsr') );
         $this->ue->where('SUB_MENU_CD', $sub_meu_cd);
         $this->ue->update('menu_mst');  

         return $status; 
    }
    public function chk_dupgroup($menu_name)
    {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = "SELECT MENU_CD FROM main_menu_mst WHERE LOWER( MENU_NAME ) = LOWER( '$menu_name' ) "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        if ( count($recExp) > 0 )
            return "0";
        else
            return "1";
    }

    public function set_mainmenu( $menu_name="" )
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);   

         $this->ue = $this->load->database('user', true);   

            $sqlue = " SELECT MAX(NUM)+ 1  NEWCODE FROM main_menu_mst -- WHERE NUM < 99 "; 
            $excue = $this->ue->query($sqlue);
            $recue = $excue->result_array();

            $new_code = sprintf( '%02d', $recue[0]['NEWCODE'] );

            //echo( $new_code ); exit; 
            if ( $this->chk_dupgroup($menu_name) == "1" )
            {
                $inta = array(
                    'MENU_CD'       => $new_code,
                    'MENU_NAME'     => $menu_name,
                    'STATUSD'       => 1,                             
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'CREATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                );
                $this->ue->insert('main_menu_mst', $inta); 

                return $this->main_menu();
            }else{

                return $this->main_menu();

            }

    }






    public function ct_menu()
    {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        //var_dump($menu); exit;
        return $recExp;

    }

    public function ins_His($id, $la_data, $typ, $flg, $fm)
    {
        //session_destroy();
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

     $datetime = new DateTime();
     $datetime->setTimezone($tz_object);   

     $this->ue = $this->load->database('user', true);    

                        $inta = array(
                            'USER_CD'     => $id,
                            'LT_DATA'     => $la_data,
                            'DATA_TYPE'   => $typ,                             
                            'FLG'         => $flg,  
                            'DL_TIME'     => $datetime->format('Y\-m\-d\ H:i:s'),
                            'FILE_NAME'   => $fm

                        );

                    //var_dump($inta); exit;

                    $this->ue->insert('in_down_his', $inta); 

                    return $inta;
    }
    public function user_sys()
    {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = " SELECT 
                        COUNT(CASE WHEN ISNULL(LOGOUT_DATE) THEN USER_CD END) OFFLINE_SYS
                ,       COUNT(CASE WHEN NOT ISNULL(LOGOUT_DATE) THEN USER_CD END) ONLINE_SYS
                ,       COUNT(CASE WHEN NOT ISNULL(GROUP_CD) THEN USER_CD END) AVAILABLE_SYS
                ,       COUNT(CASE WHEN ISNULL(GROUP_CD) THEN USER_CD END) NO_SYS
                FROM 
                user_sys "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        //var_dump($menu); exit;
        return $recExp;

    }    
}
?> 
