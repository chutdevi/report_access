<?php
class Backgroup_model extends CI_Model 
{

    public function group_user() 
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
        $sqlue = "SELECT * FROM g_user"; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return $recue;
        //var_dump($recue); exit;
       // var_dump($recue[0]['TDF']); exit;
    }

    public function gup_menu($gup_cd)
    {
        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
  
        $this->ue = $this->load->database('user', true);

        $sqlue = " SELECT ms.*, mt.SUB_MENU_NAME, mt.STATUSD FROM menu_sys ms LEFT OUTER JOIN menu_mst mt ON ms.sub_menu_cd = mt.sub_menu_cd  WHERE GROUP_CD  = '$gup_cd' "; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return  $recue;

    }       
    public function sub_menu($meu_cd)
    {
        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
  
        $this->ue = $this->load->database('user', true);

        $sqlue = " SELECT mt.* FROM menu_mst mt  WHERE MENU_CD  = '$meu_cd' "; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return  $recue;

    }  

    public function chk_dupsub($meu_cd, $sub_cd)
    {
        $this->EX = $this->load->database('user', true);
        
        $sqlue = " SELECT ms.*, mt.SUB_MENU_NAME, mt.STATUSD FROM menu_sys ms LEFT OUTER JOIN menu_mst mt ON ms.sub_menu_cd = mt.sub_menu_cd  WHERE GROUP_CD  = '$gup_cd' AND mt.SUB_MENU_CD = '$sub_cd' "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();

            if( count($recExp) > 0 )
            {        
                 return 1;
            }else{
                 return 0;
            }
    }

    public function sub_detail($sub_cd)
    {
        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
  
        $this->ue = $this->load->database('user', true);

        $sqlue = " SELECT mt.* FROM menu_mst mt  WHERE SUB_MENU_CD  = '$sub_cd' "; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return  $recue;

    }  
    public function set_group_us( $gup_cd, $menu_cd, $menu_name, $sub_cd )
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);   

         $this->ue = $this->load->database('user', true);   

            $sqlue = " SELECT * FROM menu_sys WHERE MENU_CD = '$menu_cd' AND GROUP_CD = '$gup_cd' AND SUB_MENU_CD = '$sub_cd' "; 
            $excue = $this->ue->query($sqlue);
            $recue = $excue->result_array();

            if( count($recue) < 1 )
            {
                $inta = array(
                    'GROUP_CD'      => $gup_cd,
                    'MENU_CD'       => $menu_cd,
                    'MENU_NAME'     => $menu_name,
                    'SUB_MENU_CD'   => $sub_cd,                             
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'CREATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s')
                );
                $this->ue->insert('menu_sys', $inta); 
                 return 1;
            }
            else
            {
                 return 0;
            }
    }

    public function chk_dupgroup($menu_name)
    {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = "SELECT GROUP_CD FROM g_user WHERE LOWER( GROUP_NAME ) = LOWER( '$menu_name' ) "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        if ( count($recExp) > 0 )
            return "0";
        else
            return "1";
    }

    public function set_newgroup_us( $menu_name="" )
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);   

         $this->ue = $this->load->database('user', true);   

            $sqlue = " SELECT MAX(NUM)+ 1  NEWCODE FROM g_user -- WHERE NUM < 99 "; 
            $excue = $this->ue->query($sqlue);
            $recue = $excue->result_array();

            $new_code = $recue[0]['NEWCODE'];

            //echo( $new_code ); exit; 
            if ( $this->chk_dupgroup($menu_name) == "1" )
            {
                $inta = array(
                    'GROUP_CD'       => $new_code,
                    'GROUP_NAME'     => $menu_name,
                    'STATUSD'       => 1,                             
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'CREATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                );
                $this->ue->insert('g_user', $inta); 

                return $this->group_user();
            }else{

                return $this->group_user();

            }

    }

    public function rem_meugroup($num)
    {
         $tz_object = new DateTimeZone('+0700');
         $datetime = new DateTime();
         $datetime->setTimezone($tz_object);  
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
        $sqlExp = "SELECT *  FROM menu_sys WHERE NUM = '$num'"; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();

            if ( count($recExp) > 0 )
            {
                $inta = array(
                    'NUM_OLD'       => $recExp[0]['NUM'],
                    'MENU_CD'       => $recExp[0]['MENU_CD'],
                    'MENU_NAME'     => $recExp[0]['MENU_NAME'],
                    'SUB_MENU_CD'   => $recExp[0]['SUB_MENU_CD'],                             
                    'GROUP_CD'      => $recExp[0]['GROUP_CD'],
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                    'CREATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s'),
                );
                $this->EX->insert('remove_menu_sys', $inta); 
           
            } else {

                return 0;
            }       

        $sqlExp = "DELETE FROM menu_sys WHERE NUM = '$num'"; 
        $excExp = $this->EX->query($sqlExp);
        //$recExp = $excExp->result_array();

        $sqlExp = "SELECT * FROM menu_sys WHERE NUM = '$num'"; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();

        if ( count($recExp) > 0 )
            return 0;
        else
            return 1;
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
    // public function chk_dupgroup($menu_name)
    // {
    //     $this->EX = $this->load->database('user', true);
    //     //$this->exp = $this->load->database('exp_db', TRUE);

    //     $sqlExp = "SELECT MENU_CD FROM main_menu_mst WHERE LOWER( MENU_NAME ) = LOWER( '$menu_name' ) "; 
    //     $excExp = $this->EX->query($sqlExp);
    //     $recExp = $excExp->result_array();


    //     if ( count($recExp) > 0 )
    //         return "0";
    //     else
    //         return "1";
    // }

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
