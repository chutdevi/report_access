<?php
class Backuser_model extends CI_Model 
{

    public function Getuser($st_limit = 0,  $en_limit = 20) 
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
        $sqlue = "
                SELECT
                 US.*
                ,GU.GROUP_NAME
                FROM
                (
                SELECT 
                    USER_CD
                    , USER_NAME
                    , GROUP_CD GROUP_CD
                    , LOGIN_DATE, LOGOUT_DATE
                    , LAST_USE 
                    FROM 
                    user_sys 
                    GROUP BY 
                      USER_CD
                    , USER_NAME
                    ,  LOGIN_DATE
                    , LOGOUT_DATE
                    , LAST_USE 
                    ORDER BY LOGIN_DATE DESC LIMIT $st_limit, $en_limit
                )US
                LEFT  OUTER JOIN    g_user GU ON US.GROUP_CD = GU.GROUP_CD
                ";


        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        return $recue;
        //var_dump($recue); exit;



       // var_dump($recue[0]['TDF']); exit;
    }
    public function Getgroup() 
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

    public function Setgroup($gup_cd, $user_cd)
    {
        //session_destroy();
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

     $datetime = new DateTime();
     $datetime->setTimezone($tz_object);   

     $this->ue = $this->load->database('user', true);   

     $gup_cd = ($gup_cd == '') ? null : $gup_cd;

                $login_dat = array(
                    'GROUP_CD'      => $gup_cd,
                    'UPDATE_BY'     => $this->session->userdata('sessUsr'),
                    'UPDATE_DATE'   => $datetime->format('Y\-m\-d\ H:i:s')
                );

                $this->ue->where('USER_CD', $user_cd);
                $this->ue->update('user_sys',$login_dat);                

                return $gup_cd . " : " . $user_cd;
    }

    public function chk_user_new_system($usr='',$pwd='')
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
//        echo $datetime->format('Y\-m\-d\ H:i:s');
//        exit;        
        $this->ue = $this->load->database('user', true);
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $p['usr'] = trim($usr);
        $p['pwd'] = md5(trim($pwd));

        $user = $p['usr'];
        $pass = $p['pwd'];

        $sqlue = "SELECT * FROM user_sys WHERE USER_CD = '$user' and PASSWORD = '$pass' "; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();




     // echo $recue[0]['GROUP_CD']; exit;
        if ($excue->num_rows() > 0 ) 
            {
                if ( is_null($recue[0]['LOGOUT_DATE']) ) redirect('login/log_in/3');



                $login_dat = array(
                    'LOGIN_DATE'    => $datetime->format('Y\-m\-d\ H:i:s'),
                    'LOGOUT_DATE'   => NULL,
                    'LAST_USE'      => $datetime->format('Y\-m\-d\ H:i:s')
                );

                $this->ue->where('USER_CD', $usr);
                $this->ue->update('user_sys',$login_dat);                

                return $recue;

            }


        //echo $user . "<hr>" . $pass . "<hr>"; //exit;

        
        $sqlExp = "SELECT * FROM USER_MST WHERE USER_CD = '$user' and PASSWORD = '$pass' "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();
        //var_dump($recExp); exit;
            if ($excExp->num_rows() > 0 )
            {
                        $inta = array(
                            'USER_CD'     => $recExp[0]['USER_CD'], 
                            'USER_NAME'   => $recExp[0]['USER_NAME'], 
                            'PASSWORD'    => $recExp[0]['PASSWORD'], 
                            'ADDRESS'     => $recExp[0]['ADDRESS'],
                            'CREATE_DATE' => $datetime->format('Y\-m\-d\ H:i:s')
                        );

                    //var_dump($recExp); exit;
                    $this->ue->insert('user_sys', $inta);
            }
       //exit;
         return  $recExp;

    }       


    public function get_menu($usr='')
    {
        $this->EX = $this->load->database('user', true);
        


        
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = " SELECT m.MENU_NAME, m.SUB_MENU_NAME, m.LINK FROM menu_sys m LEFT OUTER JOIN user_sys u ON m.GROUP_CD = u.GROUP_CD  menu_mst t LEFT OUTER JOIN ON m.SUB_MENU_CD = t.SUB_MENU_CD  WHERE u.USER_CD = '$usr' AND t.STATUSD = 1  "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();

        $data = array( 'menu' => $this->ct_menu(),
                       'subm' => $recExp
                     );    


        //echo count($data['subm']); exit;    
        return $data;
    }

    public function ct_menu()
    {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME WHERE STATUSD = 1 ORDER BY MENU_CD "; 
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
                     COUNT(CASE WHEN ISNULL(US.LOGOUT_DATE) THEN US.USER_CD END) OFFLINE_SYS
                    ,COUNT(CASE WHEN NOT ISNULL(US.LOGOUT_DATE) THEN US.USER_CD END) ONLINE_SYS
                    ,COUNT(CASE WHEN NOT ISNULL(US.GROUP_CD) THEN US.USER_CD END) AVAILABLE_SYS
                    ,COUNT(CASE WHEN ISNULL(US.GROUP_CD) THEN US.USER_CD END) NO_SYS
                    FROM 
                     ( SELECT USER_CD , USER_NAME, LOGOUT_DATE , SUM(GROUP_CD) GROUP_CD FROM user_sys GROUP BY USER_CD , LOGOUT_DATE , USER_NAME ) US"; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        //var_dump($menu); exit;
        return $recExp;

    }    
}
?> 
