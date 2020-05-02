<?php
class Backsystem_model extends CI_Model 
 {

    public function CheckSession($usr='', $re = 0) 
     {
        if( !$this->session->userdata('login') ){
           redirect('pcstools/login');
        }
        // if( !$this->session->userdata('login') ) 
        // { 
        //      $this->logout($usr);   
        //      redirect('login/log_in/'.$re); 
        //      return FALSE; 
        // }
        // else{  return TRUE;    }
        // return TRUE;
     }
    public function CheckUse($usr='', $re = 0) 
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
        $sqlue = "SELECT  TIMESTAMPDIFF(MINUTE, DATE_FORMAT(LOGIN_DATE,'%Y-%m-%d %H:%i:%s'), DATE_FORMAT(NOW(),'%Y-%m-%d %H:%i:%s')) TDF FROM user_sys WHERE  USER_CD = '$usr' AND ISNULL(LOGOUT_DATE)"; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        //var_dump($recue[0]['TDF']); exit;
        if($excue->num_rows() > 0 )
            if( intval($recue[0]['TDF']) > 20 )  
                { 
                    $this->logout($usr);
                    redirect('login/log_in/'.$re);
                }
            else
                {
                         $this->ue = $this->load->database('user', true); 
                         $this->ue->set('LAST_USE', $datetime->format('Y\-m\-d\ H:i:s') );
                         $this->ue->where('USER_CD', $usr);
                         $this->ue->update('user_sys');

                }
        $this->Check_logout();    

       // var_dump($recue[0]['TDF']); exit;
     }
    public function Check_logout() 
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
        $sqlue = "SELECT  *  FROM user_sys WHERE TIMESTAMPDIFF(HOUR, DATE_FORMAT(LAST_USE,'%Y-%m-%d %H:%i:%s'), DATE_FORMAT(SYSDATE(),'%Y-%m-%d %H:%i:%s')) >= 1 AND ISNULL(LOGOUT_DATE)"; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

        //var_dump($recue[0]['TDF']); exit;
        if($excue->num_rows() > 0 )
        {
            foreach ($recue as $key => $dif)
            {
                     $this->ue = $this->load->database('user', true); 
                     $this->ue->set('LOGOUT_DATE', $dif['LAST_USE'] );
                     $this->ue->where('USER_CD',   $dif['USER_CD']  );
                     $this->ue->update('user_sys');

            }
        }
        else
        {

            //echo "No data!"; exit;
        }


       // var_dump($recue[0]['TDF']); exit;
     }






    public function ClsUse() 
     {
        $tz_object = new DateTimeZone('+0700'); 
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object); 
        $this->ue = $this->load->database('user', true); 
        $sqlue = "SELECT  USER_CD, ROUND(TIME_TO_SEC( TIMEDIFF( NOW(), LAST_USE ))/60) TDF FROM user_sys WHERE ISNULL(LOGOUT_DATE)"; 
        $excue = $this->ue->query($sqlue);
        $recue = $excue->result_array();

 
        if($excue->num_rows() > 0 )
                 foreach ($recue as $key => $us) 
                 {
                    //
                        
                            if( intval($us['TDF']) > 4 )  
                             {                            

                                     //var_dump($us); exit;
                                     $this->ue = $this->load->database('user', true); 
                                     $this->ue->set('LOGOUT_DATE', $datetime->format('Y\-m\-d\ H:i:s') );
                                     $this->ue->where('USER_CD', $us['USER_CD']);
                                     $this->ue->update('user_sys');
                            }
                }

        

       // var_dump($recue[0]['TDF']); exit;
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
                //if ( is_null($recue[0]['LOGOUT_DATE']) ) redirect('login/log_in/3'); 
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

        $sqlExp = " SELECT m.MENU_NAME, t.SUB_MENU_NAME, t.LINK FROM menu_sys m LEFT OUTER JOIN menu_mst t ON m.SUB_MENU_CD = t.SUB_MENU_CD LEFT OUTER JOIN user_sys u ON m.GROUP_CD = u.GROUP_CD  WHERE u.USER_CD = '$usr' AND t.STATUSD = 1 GROUP BY m.MENU_NAME, t.SUB_MENU_NAME, t.LINK"; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();

        $data = array( 'menu' => $this->ct_menu($usr),
                       'subm' => $recExp
                     );    


        //echo count($data['subm']); exit;    
        return $data;
     }

    public function ct_menu($usr='')
     {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
        $sqlExp = " SELECT m.MENU_NAME FROM menu_sys m LEFT OUTER JOIN menu_mst t ON m.SUB_MENU_CD = t.SUB_MENU_CD LEFT OUTER JOIN user_sys u ON m.GROUP_CD = u.GROUP_CD  WHERE u.USER_CD = '$usr' AND t.STATUSD = 1 GROUP BY m.MENU_NAME ORDER BY m.SUB_MENU_CD "; 
        //$sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        //var_dump($menu); exit;
        return $recExp;

     }

    public function logout($usr='')
     {
        session_destroy();
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');

        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);        

        //echo $usr; exit;

        $this->ue = $this->load->database('user', true); 
        $this->ue->set('LAST_USE', $datetime->format('Y\-m\-d\ H:i:s') );
        $this->ue->set('LOGOUT_DATE', $datetime->format('Y\-m\-d\ H:i:s') );
        $this->ue->where('USER_CD', $usr);
        $this->ue->update('user_sys');   
     }

    public function get_his($typ=1, $flg=11)
     {
        $this->EX = $this->load->database('user', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

        $sqlExp = " SELECT h.*, u.USER_NAME FROM in_down_his h LEFT OUTER JOIN user_sys u ON h.USER_CD = u.USER_CD  WHERE DATA_TYPE = $typ AND FLG = $flg ORDER BY NO DESC LIMIT 0,1 "; 
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();


        //var_dump($recExp); exit;
        return $recExp;

     }
    public function Ck_Newdata_pu($lt, $typ=1, $flg=11)
     {
        $this->EX = $this->load->database('another_db', true);
        $w = '';

        //var_dump($lt[0]['LT_DATA']); 
        $last_data = intval( $lt[0]['LT_DATA'] );

        $table = 'UT_SLIP_INSPC' ; 

        if     ($flg == 33)     $w = "((VEND_CD  LIKE 'T%' OR VEND_CD LIKE 'M%') AND NOT(VEND_CD = 'T10100' OR VEND_CD = 'T11200' OR VEND_CD = 'T11300')) AND INTERNAL_CTRL_CD > $last_data AND ";
        elseif ($flg == 22)     $w = "(NOT(VEND_CD  LIKE 'T%' OR VEND_CD LIKE 'M%') OR (VEND_CD = 'T10100' OR VEND_CD = 'T11200' OR VEND_CD = 'T11300'))  AND INTERNAL_CTRL_CD > $last_data AND ";
        elseif ($flg == 11)  {  $w = "INTERNAL_CTRL_CD > $last_data AND "; $cm = '--'; }
        else   $w = "----"; 


        $sqlExp = "SELECT * FROM $table WHERE PUCH_ODR_CD IS NOT NULL AND ASIA_IF_EXEC_DATE IS NOT NULL AND $w ROWNUM <= 10  "; 
        //echo $sqlExp; exit;
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();
        //var_dump($recExp); exit;   
        if ($excExp->num_rows() < 1 )
        {
            return "disabled";
        }else
        {
            return "";
        }

     }
    public function Ck_Newdata_sa($lt, $typ=2, $flg=11)
     {
        $this->EX = $this->load->database('another_db', true);
        $w = '';

        //var_dump($lt[0]['LT_DATA']); exit;
        $last_data = intval( $lt[0]['LT_DATA'] );

        $table = 'UT_SLIP_SALES' ; 

        if     ($flg == 33)     $w = "((CUST_CD  LIKE 'T%' OR CUST_CD LIKE 'F%') AND NOT(CUST_CD = 'T10100' OR CUST_CD = 'T11200' OR CUST_CD = 'T11300')) AND INTERNAL_CTRL_CD  > $last_data AND ";
        elseif ($flg == 22)     $w = "((NOT CUST_CD  LIKE 'T%' OR CUST_CD LIKE 'F%') OR (CUST_CD = 'T10100' OR CUST_CD = 'T11200' OR CUST_CD = 'T11300'))  AND INTERNAL_CTRL_CD > $last_data AND ";
        elseif ($flg == 11)  {  $w = "INTERNAL_CTRL_CD > $last_data AND "; $cm = '--'; }
        else   $w = "----"; 


        $sqlExp = "SELECT * FROM $table WHERE CUST_ODR_NO IS NOT NULL AND ASIA_IF_EXEC_DATE IS NOT NULL AND $w ROWNUM <= 10  "; 
        //echo $sqlExp; exit;
        $excExp = $this->EX->query($sqlExp);
        $recExp = $excExp->result_array();
        //var_dump($recExp); exit;   
        if ($excExp->num_rows() < 1 )
        {
            return "disabled";
        }else
        {
            return "";
        }

     }
    public function get_select_cust()
     {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $sqlJb = " SELECT CUST_CD FROM FLUCTUATION_MODEL GROUP BY CUST_CD   "; 
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }

    public function get_select_item_all()
     {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $sqlJb = " SELECT ITEM_CD FROM FLUCTUATION_MODEL GROUP BY ITEM_CD   "; 
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }
    public function get_select_item($cust)
     {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $sqlJb = " SELECT ITEM_CD FROM FLUCTUATION_ORDER WHERE CUST_CD = '$cust' GROUP BY ITEM_CD    "; 
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }
 

    public function get_raw_data($date_st, $date_en, $cust, $item, $limit=1000)
     {
        $this->JB = $this->load->database('jeaw_db', true);
        $dt = date('m',strtotime($date_st));
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $comment = ( $limit == 0 ) ? "--" : "";
    
        $sqlJb = sprintf( "  
                     SELECT 
                     IND DATE_COLLECT
                    ,TYP
                    ,CUST_CD
                    ,CUST_NAME
                    ,CUST_ITEM_CD
                    ,ITEM_CD
                    ,ITEM_NAME
                    ,MODEL
                    ,PONO PO_NUMBER
                    ,CREATED_DATE
                    ,SHIP_PLAN_DATE
                    ,DELIVERY_DATE
                    ,DELIVERY_TIME
                    ,SHIP_NOTE
                    ,MT
                    ,QTY
                    ,SHIP_QTY
                    FROM 

                    FLUCTUATION_ORDER 

                    WHERE  
                    $cust AND
                    $item AND
                    IND BETWEEN '%s' AND '%s'
                    -- AND DATE_FORMAT(DELIVERY_DATE, '%%Y%%m%%d') >= DATE_FORMAT(IND,'%%Y%%m%%d')      

                $comment    ORDER BY IND LIMIT $limit
                ", date('Y-m-d', strtotime($date_st) )
                 , date('Y-m-d', strtotime($date_en) )  
            );
        //echo json_encode( $sqlJb ); exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }

    public function get_minus_inv($plant, $date_inv)
     {
        $this->JB = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $sqlJb = " SELECT
                     WH_CD
                    ,ITEM_CD
                    ,NULL AS NUM
                    ,NULL AS LOT
                    ,0  AS QTY
                    FROM
                    T_ITEM_INV
                    WHERE
                    TO_CHAR(INV_DATE,'YYYY/MM/DD') = '$date_inv' -- Inventory Stock Evacation
                    AND PLANT_CD = '$plant' -- Plant code
                    AND FINAL_BOOK_STOCK_QTY < 0
                    ORDER BY ITEM_CD, WH_CD    
                 "; 

              //   echo "$sqlJb"; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }

    public function get_diff_inv($plant, $date_inv)
     {
        $this->JB = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $coc = "(TII.WH_CD ||" . '/' . "|| TII.ITEM_CD ||" .  '/'  ."|| TII.ACTUAL_STOCK_QTY)";
        $sqlJb = "                       
                            SELECT
                             TII.PLANT_CD AS PLANT
                            ,TII.ITEM_CD AS ITEM_CD
                            ,MI.ITEM_NAME AS ITEM_NAME
                            ,DECODE(UPS.MSR_OUTSIDE_TYP,1,'IN',2,'EX',NULL) AS INEX_TYP
                            ,UPS.MSR_SOURCE_CD AS SOURCE_CD
                            ,UPS.MSR_SOURCE_NAME AS SOURCE_NAME
                            ,TII.WH_CD AS WH_CD
                            ,UPS.MPI_CLASIFICATION_CD AS LOCATION
                            ,TII.FINAL_BOOK_STOCK_QTY AS FBOOKQQSTK
                            ,TII.ACTUAL_STOCK_QTY AS ACTQQSTK
                            ,(TII.ACTUAL_STOCK_QTY - TII.FINAL_BOOK_STOCK_QTY) AS DIFF
                            ,(CASE WHEN TII.ACTUAL_STOCK_QTY = 0 AND TII.FINAL_BOOK_STOCK_QTY = 0 THEN 'OK' 
                                   WHEN TII.ACTUAL_STOCK_QTY = 0 AND TII.FINAL_BOOK_STOCK_QTY <> 0 THEN 'ACT-0'
                                   WHEN TII.ACTUAL_STOCK_QTY <> 0 AND TII.FINAL_BOOK_STOCK_QTY = 0 THEN 'BOOK-0'
                                   WHEN TII.ACTUAL_STOCK_QTY = TII.FINAL_BOOK_STOCK_QTY THEN 'OK'
                                   ELSE TO_CHAR(TRUNC(((TII.ACTUAL_STOCK_QTY/TII.FINAL_BOOK_STOCK_QTY)-1)*100 , 2))
                                   END ) AS RATE
                           ,(tii.wh_cd || '\\' || tii.item_cd || '\\' || tii.actual_stock_qty) as Key_CD3
                            FROM
                            T_ITEM_INV TII
                            ,M_ITEM MI
                            , UV_PRIORITY_SOURCE UPS
                            WHERE   
                                TII.ITEM_CD = MI.ITEM_CD (+)
                            AND TII.PLANT_CD = UPS.MPI_PLANT_CD (+)
                            AND TII.ITEM_CD = UPS.MPI_ITEM_CD (+)
                            AND TII.PLANT_CD = '$plant'
                            AND TO_CHAR(TII.INV_DATE,'YYYY/MM/DD') = '$date_inv'
                            ORDER BY
                             TII.PLANT_CD ASC
                            ,TII.ITEM_CD ASC
                            ,TII.WH_CD ASC
                 "; 
            
              //   echo "$sqlJb"; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }
    public function get_wh_inv()
     {
        $this->JB = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $coc = "(TII.WH_CD ||" . '/' . "|| TII.ITEM_CD ||" .  '/'  ."|| TII.ACTUAL_STOCK_QTY)";
        $sqlJb = "                       
                    SELECT
                     PLANT_CD
                    ,WH_CD
                    ,( PLANT_CD || '\\' || WH_CD)  AS KEY_CD
                    FROM
                     M_WH
                    ORDER BY
                     PLANT_CD ASC
                    ,WH_CD ASC
                 "; 
            
              //   echo "$sqlJb"; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }


    public function get_item_inv()
     {
        $this->JB = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $coc = "(TII.WH_CD ||" . '/' . "|| TII.ITEM_CD ||" .  '/'  ."|| TII.ACTUAL_STOCK_QTY)";
        $sqlJb = "                       
                    SELECT
                     MPI.PLANT_CD
                    ,MPI.ITEM_CD
                    ,(MPI.PLANT_CD || '\\' || MPI.ITEM_CD) AS KEY_CD
                    ,MI.ITEM_NAME
                    ,MPI.MRP_ODR_TYP
                    ,MPI.ABC_TYP
                    FROM
                    M_PLANT_ITEM MPI
                    ,M_ITEM MI
                    WHERE
                    MPI.ITEM_CD = MI.ITEM_CD (+)
                    ORDER BY
                    MPI.PLANT_CD ASC
                    ,MPI.ITEM_CD ASC
                 "; 
            
              //   echo "$sqlJb"; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }

    public function compare_price()
     {
        $this->JB = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        //$coc = "(TII.WH_CD ||" . '/' . "|| TII.ITEM_CD ||" .  '/'  ."|| TII.ACTUAL_STOCK_QTY)";
        $sqlJb = "  
                        SELECT GB.* ,
                          UR.USER_NAME USER_NAME_SALE
                        FROM
                          (SELECT OT.CUST_CD ,
                            MC.CUST_ANAME ,
                            OT.ITEM_CD ,
                            OT.CUST_ODR_NO ,
                            OT.UNIT_PRICE ,
                            SU.SALES_UNIT_COST ,
                            CASE
                              WHEN OT.DESINATED_DLV_DATE >= SU.EFF_PHASE_IN_DATE
                              THEN
                                CASE
                                  WHEN OT.UNIT_PRICE <> SU.SALES_UNIT_COST
                                  THEN 'FALSE'
                                  ELSE 'TRUE'
                                END
                            END PRICE ,
                            TO_CHAR(OT.DESINATED_DLV_DATE, 'YYYY-MM-DD HH24:MI:SS') DESINATED_DLV_DATE,
                            TO_CHAR(OT.SHIP_PLAN_DATE, 'YYYY-MM-DD HH24:MI:SS') SHIP_PLAN_DATE,
                            TO_CHAR(OT.UPDATED_DATE, 'YYYY-MM-DD HH24:MI:SS') DATE_ORDER_UPDATE ,
                            OT.UPDATED_BY BY_ORDER_UPDATE ,
                            US1.USER_NAME ,
                            TO_CHAR(SU.EFF_PHASE_IN_DATE, 'YYYY-MM-DD HH24:MI:SS') EFF_PHASE_IN_DATE,
                            TO_CHAR(SU.EFF_PHASE_OUT_DATE, 'YYYY-MM-DD HH24:MI:SS') EFF_PHASE_OUT_DATE,
                            TO_CHAR(SU.UPDATED_DATE, 'YYYY-MM-DD HH24:MI:SS') DATE_SALE_UPDATE ,
                            SU.UPDATED_BY BY_SALE_UPDATE
                            --, SU.user_name
                          FROM T_ODR OT ,
                            M_SALES_UNIT_COST SU ,
                            M_CUST MC ,
                            USER_MST US1
                          WHERE OT.CUST_CD  = SU.CUST_CD(+)
                          AND OT.ITEM_CD    = SU.ITEM_CD(+)
                          AND OT.CUST_CD    = MC.CUST_CD(+)
                          AND OT.UPDATED_BY = us1.user_cd(+)
                            --AND SU.updated_by = US2.USER_CD(+)
                            --AND OT.CUST_ODR_NO = '1K5B085900'
                          AND OT.DEL_FLG             = 0
                          AND OT.DESINATED_DLV_DATE >= SYSDATE
                            --AND ( SU.EFF_PHASE_OUT_DATE IS NULL OR (SU.EFF_PHASE_OUT_DATE >= OT.DESINATED_DLV_DATE AND SU.EFF_PHASE_OUT_DATE IS NOT NULL ) )
                            --AND SU.EFF_PHASE_IN_DATE >= OT.DESINATED_DLV_DATE
                          AND( (SU.EFF_PHASE_OUT_DATE >= OT.DESINATED_DLV_DATE OR SU.EFF_PHASE_OUT_DATE IS NULL ) OR (SU.EFF_PHASE_OUT_DATE >= OT.DESINATED_DLV_DATE AND SU.EFF_PHASE_OUT_DATE IS NOT NULL ))
                          
                          ) GB ,
                          USER_MST UR
                        WHERE GB.by_sale_update = UR.USER_CD(+)
                        AND PRICE               = 'FALSE'
                        GROUP BY 
                          GB.CUST_CD ,
                          GB.CUST_ANAME ,
                          GB.ITEM_CD ,
                          GB.CUST_ODR_NO ,
                          GB.UNIT_PRICE ,
                          GB.SALES_UNIT_COST ,
                          GB.PRICE ,
                          GB.DESINATED_DLV_DATE ,
                          GB.SHIP_PLAN_DATE ,
                          GB.DATE_ORDER_UPDATE ,
                          GB.BY_ORDER_UPDATE ,
                          GB.USER_NAME ,
                          GB.EFF_PHASE_IN_DATE ,
                          GB.EFF_PHASE_OUT_DATE ,
                          GB.DATE_SALE_UPDATE ,
                          GB.BY_SALE_UPDATE ,
                          UR.USER_NAME
                          
                            ORDER BY 1,
                            4,
                            13,
                            8
                 "; 
            
              //   echo "$sqlJb"; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

     }

    public function forecast_rm() 
     {
        $this->ex = $this->load->database('another_db', true);

        $date1 = date('M-Y');
        $strtime = strtotime($date1);

        $caldate2 = strtotime("+1 Month",$strtime);
        $date2 = date("M-Y", $caldate2);

        $caldate3 = strtotime("+2 Month",$strtime);
        $date3 = date("M-Y", $caldate3);

        $caldate4 = strtotime("+3 Month",$strtime);
        $date4 = date("M-Y", $caldate4);

        $caldate5 = strtotime("+4 Month",$strtime);
        $date5 = date("M-Y", $caldate5);

        $caldate6 = strtotime("+5 Month",$strtime);
        $date6 = date("M-Y", $caldate6);

        // var_dump($date1);
        // var_dump($date2);
        // var_dump($date3);
        // var_dump($date4);
        // var_dump($date5);
        // var_dump($date6);
        // exit;

        $sqlIns = " SELECT
                          WI.ITEM_CD AS ITEM_CD
                         ,ITT.ITEM_NAME AS ITEM_NAME
                         ,IT.MODEL AS MODEL
                         ,NVL(SUM(CASE WHEN TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,0),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,0)),'YYYY/MM/DD') THEN WI.ODR_QTY END ) , 0) AS MONTH1
                         ,NVL(SUM(CASE WHEN TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,1),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,1)),'YYYY/MM/DD') THEN WI.ODR_QTY END ) , 0) AS MONTH2
                         ,NVL(SUM(CASE WHEN TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,2),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,2)),'YYYY/MM/DD') THEN WI.ODR_QTY END ) , 0) AS MONTH3
                         ,NVL(SUM(CASE WHEN TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,3),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,3)),'YYYY/MM/DD') THEN WI.ODR_QTY END ) , 0) AS MONTH4
                         ,NVL(SUM(CASE WHEN TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,4),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,4)),'YYYY/MM/DD') THEN WI.ODR_QTY END ) , 0) AS MONTH5
                         ,NVL(SUM(CASE WHEN TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,5),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,5)),'YYYY/MM/DD') THEN WI.ODR_QTY END ) , 0) AS MONTH6

                         FROM
                         T_OD WI
                         ,M_PLANT_ITEM IT
                         ,M_ITEM ITT

                         WHERE
                         WI.ITEM_CD = IT.ITEM_CD (+)
                         AND IT.ITEM_CD = ITT.ITEM_CD (+)
                         AND WI.OD_TYP = '2'
                         AND NOT(WI.ODR_STS_TYP = 9 AND WI.TOTAL_RCV_QTY = 0)
                         AND IT.ITEM_CD LIKE '%RM%'
                         AND IT.PLANT_CD = '51'
                         AND IT.ITEM_CD <> '49177-20112-RM'
                         AND TO_CHAR(WI.PRD_PLAN_DATE,'YYYY/MM/DD') BETWEEN TO_CHAR(TRUNC(ADD_MONTHS(SYSDATE,0),'MM'),'YYYY/MM/DD') AND TO_CHAR(LAST_DAY(ADD_MONTHS(SYSDATE,5)),'YYYY/MM/DD')

                         GROUP BY WI.PLANT_CD, WI.ITEM_CD, ITT.ITEM_NAME, IT.MODEL ";

        $exc = $this->ex->query($sqlIns);
        $rec = $exc->result_array();

        return $rec;
        //var_dump($rec); exit;
     }






 }
?> 
