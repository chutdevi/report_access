<?php
class Backroyalty_model extends CI_Model 
{

    public function get_data_sm($sale_start, $sale_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " 
                        SELECT 
                          MT.CUST_GRP_CD
                        , TS.ITEM_CD
                        , TS.CUST_ITEM_CD
                        , MI.ITEM_NAME
                        , MP.MODEL
                        , TS.SHIP_UNIT_PRICE PRICE
                        , SUM(TS.SHIP_QTY) AS QTY 
                        , SUM(TS.SHIP_AMOUNT) AMOUNT
                        , TO_CHAR(SYSDATE - 0.082, 'YYYY/MM/DD HH24:MI:SS') UPDATE_DATE
                        ---, TO_CHAR(TS.DESINATED_DLV_DATE, 'YYYY/MM/DD') DLV
                        FROM 
                         T_SHIP TS
                        ,M_CUST MT
                        ,M_ITEM MI
                        ,M_PLANT_ITEM MP
                        WHERE 
                             TS.CUST_CD = MT.CUST_CD(+)
                         AND TS.ITEM_CD = MI.ITEM_CD(+)
                         AND TS.ITEM_CD = MP.ITEM_CD(+)
                         AND MT.CUST_GRP_CD IN( 'D20200', 'D20100', 'D20300', 'F30400', 'D20700') 
                         AND NOT (MP.MODEL LIKE '%VD00%' OR MP.MODEL LIKE '%700P%' OR MP.MODEL LIKE '%VC%')
                         AND SUBSTR(TS.ITEM_CD, -2) != 'SP'
                         AND ( TO_CHAR(TS.DESINATED_DLV_DATE,'YYYY/MM/DD') BETWEEN '$sale_start' AND '$sale_stop' )

                        GROUP BY 
                           TS.ITEM_CD
                         , TS.CUST_ITEM_CD
                         , MP.MODEL
                         , MI.ITEM_NAME
                         , TS.SHIP_UNIT_PRICE
                         , MT.CUST_GRP_CD
                        ORDER BY 1  , 4
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();


       // var_dump($recEx); exit;
        return $recEx;

    }

    public function get_data_bh($sale_start, $sale_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
                    //SELECT 
                    //   MT.CUST_GRP_CD
                    // , TS.ITEM_CD
                    // , TS.CUST_ITEM_CD
                    // , MI.ITEM_NAME
                    // , MP.MODEL
                    // , TS.SHIP_UNIT_PRICE PRICE
                    // , SUM(TS.SHIP_QTY) QTY 
                    // , SUM(TS.SHIP_AMOUNT) AMOUNT
                    // , TO_CHAR(SYSDATE - 0.082, 'YYYY/MM/DD HH24:MI:SS') UPDATE_DATE
                    // ---, TO_CHAR(TS.DESINATED_DLV_DATE, 'YYYY/MM/DD') DLV
                    // FROM 
                    //  T_SHIP TS
                    // ,M_CUST MT
                    // ,M_ITEM MI
                    // ,M_PLANT_ITEM MP
                    // WHERE 
                    //      TS.CUST_CD = MT.CUST_CD(+)
                    // AND  TS.ITEM_CD = MI.ITEM_CD(+)
                    // AND  TS.ITEM_CD = MP.ITEM_CD(+)
                    // AND  MT.CUST_ANAME = 'MTA'
                    // AND  ( TO_CHAR(TS.DESINATED_DLV_DATE,'YYYY/MM/DD') BETWEEN '$sale_start' AND '$sale_stop' )

                    // GROUP BY 
                    //    TS.ITEM_CD
                    //  , MP.MODEL
                    //  , TS.CUST_ITEM_CD                     
                    //  , MI.ITEM_NAME
                    //  , TS.SHIP_UNIT_PRICE
                    //  , MT.CUST_GRP_CD
                    // ORDER BY 1  , 4
        $sqlEx = " 
                    SELECT 
                      MT.CUST_GRP_CD
                    , TS.ITEM_CD
                    , TS.CUST_ITEM_CD
                    , MI.ITEM_NAME
                    , MP.MODEL
                    , TS.SHIP_UNIT_PRICE PRICE
                    , SUM(TS.SHIP_QTY) QTY 
                    , SUM(TS.SHIP_AMOUNT) AMOUNT
                    , CASE WHEN SUBSTR(TS.INVOICE_NO,0,2) = '90' THEN 'BOI-08' ELSE 'BOI-02' END GH
                    , TO_CHAR(SYSDATE - 0.082, 'YYYY/MM/DD HH24:MI:SS') UPDATE_DATE
                    ---, TO_CHAR(TS.DESINATED_DLV_DATE, 'YYYY/MM/DD') DLV
                    FROM 
                     T_SHIP TS
                    ,M_CUST MT
                    ,M_ITEM MI
                    ,M_PLANT_ITEM MP
                    WHERE 
                         TS.CUST_CD = MT.CUST_CD(+)
                    AND  TS.ITEM_CD = MI.ITEM_CD(+)
                    AND  TS.ITEM_CD = MP.ITEM_CD(+)
                    AND  MT.CUST_ANAME = 'MTA'
                    AND   ( TO_CHAR(TS.DESINATED_DLV_DATE,'YYYY/MM/DD') BETWEEN '$sale_start' AND '$sale_stop' )

                    GROUP BY 
                       TS.ITEM_CD
                     , MP.MODEL
                     , TS.CUST_ITEM_CD                     
                     , MI.ITEM_NAME
                     , TS.SHIP_UNIT_PRICE
                     , MT.CUST_GRP_CD
                     , SUBSTR(TS.INVOICE_NO,0,2)
                    ORDER BY 2
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();
        //var_dump($recEx); exit;
        return $recEx;

    }

    public function get_data_pl($sale_start, $sale_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " 
                    SELECT 
                      MT.CUST_GRP_CD
                    , TS.ITEM_CD                      
                    , TS.CUST_ITEM_CD
                    , MI.ITEM_NAME
                    , MP.MODEL
                    , TS.SHIP_UNIT_PRICE PRICE
                    , SUM(TS.SHIP_QTY) QTY 
                    , SUM(TS.SHIP_AMOUNT) AMOUNT
                    , TO_CHAR(SYSDATE - 0.082, 'YYYY/MM/DD HH24:MI:SS') UPDATE_DATE
                    ---, TO_CHAR(TS.DESINATED_DLV_DATE, 'YYYY/MM/DD') DLV
                    FROM 
                     T_SHIP TS
                    ,M_CUST MT
                    ,M_ITEM MI
                    ,M_PLANT_ITEM MP
                    WHERE 
                         TS.CUST_CD = MT.CUST_CD(+)
                    AND  TS.ITEM_CD = MI.ITEM_CD(+)
                    AND  TS.ITEM_CD = MP.ITEM_CD(+)
                    AND MT.CUST_GRP_CD IN( 'F30100', 'F30200', 'D21300')
                    AND SUBSTR(TS.ITEM_CD, -3) != 'ESP'
                    AND  ( TO_CHAR(TS.DESINATED_DLV_DATE,'YYYY/MM/DD') BETWEEN '$sale_start' AND '$sale_stop' )

                    GROUP BY 
                       TS.CUST_ITEM_CD
                     , TS.ITEM_CD                       
                     , MP.MODEL
                     , MI.ITEM_NAME
                     , TS.SHIP_UNIT_PRICE
                     , MT.CUST_GRP_CD
                    ORDER BY 1  , 4
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();
        //var_dump($recEx); exit;
        return $recEx;

    }

    public function get_data_ig($sale_start, $sale_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " 
                    SELECT 
                      MT.CUST_GRP_CD
                    , TS.ITEM_CD                      
                    , TS.CUST_ITEM_CD
                    , MI.ITEM_NAME
                    , MP.MODEL
                    , TS.SHIP_UNIT_PRICE PRICE
                    , SUM(TS.SHIP_QTY) QTY 
                    , SUM(TS.SHIP_AMOUNT) AMOUNT
                    , TO_CHAR(SYSDATE - 0.082, 'YYYY/MM/DD HH24:MI:SS') UPDATE_DATE
                    ---, TO_CHAR(TS.DESINATED_DLV_DATE, 'YYYY/MM/DD') DLV
                    FROM 
                     T_SHIP TS
                    ,M_CUST MT
                    ,M_ITEM MI
                    ,M_PLANT_ITEM MP
                    WHERE 
                         TS.CUST_CD = MT.CUST_CD(+)
                    AND  TS.ITEM_CD = MI.ITEM_CD(+)
                    AND  TS.ITEM_CD = MP.ITEM_CD(+)
                    AND  ( MP.MODEL LIKE '%VD00%' )
                    AND  SUBSTR(TS.ITEM_CD, -2) != 'SP'
                    AND  ( TO_CHAR(TS.DESINATED_DLV_DATE,'YYYY/MM/DD') BETWEEN '$sale_start' AND '$sale_stop' )

                    GROUP BY 
                       TS.CUST_ITEM_CD
                     , TS.ITEM_CD                       
                     , MP.MODEL
                     , MI.ITEM_NAME
                     , TS.SHIP_UNIT_PRICE
                     , MT.CUST_GRP_CD
                    ORDER BY 1  , 4
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();
        //var_dump($recEx); exit;
        return $recEx;

    }

    public function get_data_im($sale_start, $sale_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " 
                    SELECT 
                      MT.CUST_GRP_CD
                    , TS.ITEM_CD                      
                    , TS.CUST_ITEM_CD
                    , MI.ITEM_NAME
                    , MP.MODEL
                    , TS.SHIP_UNIT_PRICE PRICE
                    , SUM(TS.SHIP_QTY) QTY 
                    , SUM(TS.SHIP_AMOUNT) AMOUNT
                    , TO_CHAR(SYSDATE - 0.082, 'YYYY/MM/DD HH24:MI:SS') UPDATE_DATE
                    ---, TO_CHAR(TS.DESINATED_DLV_DATE, 'YYYY/MM/DD') DLV
                    FROM 
                     T_SHIP TS
                    ,M_CUST MT
                    ,M_ITEM MI
                    ,M_PLANT_ITEM MP
                    WHERE 
                         TS.CUST_CD = MT.CUST_CD(+)
                    AND  TS.ITEM_CD = MI.ITEM_CD(+)
                    AND  TS.ITEM_CD = MP.ITEM_CD(+)
                    AND  ( MP.MODEL LIKE '%700P%' OR MP.MODEL LIKE '%VC%' )
                    AND  SUBSTR(TS.ITEM_CD, -2) != 'SP'
                    AND  ( TO_CHAR(TS.DESINATED_DLV_DATE,'YYYY/MM/DD') BETWEEN '$sale_start' AND '$sale_stop' )

                    GROUP BY 
                       TS.CUST_ITEM_CD
                     , TS.ITEM_CD                       
                     , MP.MODEL
                     , MI.ITEM_NAME
                     , TS.SHIP_UNIT_PRICE
                     , MT.CUST_GRP_CD
                    ORDER BY 1  , 4
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();
        //var_dump($recEx); exit;
        return $recEx;

    }

    public function upd_data_master($up_data, $table)
    {

        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
       
        $this->ue = $this->load->database('jeaw_db', true);


                $login_dat = array(
                    'CODE'      => $up_data[1],
                    'PART_NO'   => $up_data[2],
                    'PART_NAME' => $up_data[3],
                    'MODEL'     => $up_data[4],
                    'TBK'       => $up_data[5],
                    'HIT'       => $up_data[6],
                    'UPDATE_DATE' => $datetime->format('Y\-m\-d\ H:i:s'),
                    'UPDATE_BY'   =>  $this->session->userdata('sessUsr')
                );

                $this->ue->where('INDEX_ROW', $up_data[0]);
                $this->ue->update( $table, $login_dat);                

                return $up_data;

    }

    public function ins_new_master($up_data, $table)
    {
        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $this->JB = $this->load->database('jeaw_db', true);
        $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
        $up_by = $this->session->userdata('sessUsr');

        //$excJb = $this->JB->query("TRUNCATE $table");
        //var_dump($data_sm); exit;
        $ind_tb = $this->JB->query(" SELECT IND FROM $table WHERE `CODE` = '$up_data[0]' GROUP BY IND");
        $recJb = $ind_tb->result_array();
//var_dump( $recJb); exit();
        $sqlJb = "";
          if ( $up_data[0] != '' )
          {        
            $sqlJb = "INSERT INTO $table (CODE, PART_NO, PART_NAME, MODEL, TBK, HIT, IND, UPDATE_DATE, UPDATE_BY) 
                      VALUES (
                                '{$up_data[0]}',
                                '{$up_data[1]}',
                                '{$up_data[2]}',
                                '{$up_data[3]}',
                                '{$up_data[4]}',
                                0,
                                '{$recJb[0]['IND']}',
                                '$date_cur',
                                '$up_by'                              
                             )" ;
            $excJb = $this->JB->query($sqlJb);
          }
     }

   public function ins_royalty_temp($up_data, $table)
    {

        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $this->JB = $this->load->database('jeaw_db', true);
        $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
        $up_by = $this->session->userdata('sessUsr');

        $excJb = $this->JB->query("TRUNCATE $table");
        //var_dump($data_sm); exit;
        //$ind_tb = $this->JB->query(" SELECT IND FROM $table WHERE `CODE` = '$up_data[0]' GROUP BY IND");
        //$recJb = $ind_tb->result_array();
//var_dump( $recJb); exit();
        $sqlJb = "";
          foreach ($up_data as $key => $value) 
          {  
            $sqlJb = "INSERT INTO $table (CUST_GRP_CD, PART_ITEM, PART_ITEM_CUST, PART_NAME, MODEL, PRICE, QTY, AMOUNT, UPDATE_DATE) 
                      VALUES (
                                '{$value['CUST_GRP_CD']}',
                                '{$value['ITEM_CD']}',
                                '{$value['CUST_ITEM_CD']}',
                                '{$value['ITEM_NAME']}',
                                '{$value['MODEL']}',
                                '{$value['PRICE']}',
                                '{$value['QTY']}',
                                '{$value['AMOUNT']}',
                                '$date_cur'                            
                             )" ;
            $excJb = $this->JB->query($sqlJb);
         } 

     }
   public function ins_royalty_temp_bh($up_data, $table)
    {

        $tz_object = new DateTimeZone('+0700');
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $this->JB = $this->load->database('jeaw_db', true);
        $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
        $up_by = $this->session->userdata('sessUsr');

        $excJb = $this->JB->query("TRUNCATE $table");
        //var_dump($data_sm); exit;
        //$ind_tb = $this->JB->query(" SELECT IND FROM $table WHERE `CODE` = '$up_data[0]' GROUP BY IND");
        //$recJb = $ind_tb->result_array();
//var_dump( $recJb); exit();
        $sqlJb = "";
          foreach ($up_data as $key => $value) 
          {  
            $sqlJb = "INSERT INTO $table (CUST_GRP_CD, PART_ITEM, PART_ITEM_CUST, PART_NAME, MODEL, PRICE, QTY, AMOUNT, BOI, UPDATE_DATE) 
                      VALUES (
                                '{$value['CUST_GRP_CD']}',
                                '{$value['ITEM_CD']}',
                                '{$value['CUST_ITEM_CD']}',
                                '{$value['ITEM_NAME']}',
                                '{$value['MODEL']}',
                                '{$value['PRICE']}',
                                '{$value['QTY']}',
                                '{$value['AMOUNT']}',
                                '{$value['GH']}',
                                '$date_cur'                            
                             )" ;
            $excJb = $this->JB->query($sqlJb);
         } 

     }

    public function match_data_royalty($table1, $table2)
    {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $comment = ($limit == 0) ? "--" : "";

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";

    
        $sqlJb = "  

                    SELECT 
                     SM.CODE CODE_RG
                    ,ST.PART_ITEM_CUST PART_NO
                    ,ST.PART_ITEM EXK_PART
                    ,ST.PART_NAME
                    ,CASE WHEN ISNULL(SM.MODEL) THEN ST.MODEL ELSE SM.MODEL END MODEL
                    ,ST.PRICE
                    ,ST.QTY
                    ,ST.AMOUNT
                    ,ST.CUST_GRP_CD


                    FROM 

                      $table1 ST  
                      
                      LEFT OUTER JOIN $table2 SM 

                      ON ST.PART_ITEM_CUST = SM.PART_NO OR ST.PART_ITEM = SM.PART_NO

                    WHERE ISNULL(SM.CODE)         
                ";
        //echo $sqlJb; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

    }

    public function get_cust_cd($gup)
    {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $comment = ($limit == 0) ? "--" : "";

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";

    
        $sqlJb = "  SELECT CUST_ANG CUST_ANMAE FROM ROYALTY_CUST_GROUP_MST WHERE CUST_CDG = '$gup'  ";
        //echo $sqlJb; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

    }

    public function get_master($gup)
    {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $comment = ($limit == 0) ? "--" : "";

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";

    
        $sqlJb = "  
                    SELECT 
                     CODE CODE_GP
                    ,PART_NO
                    ,PART_NAME
                    ,MODEL
                    ,TBK
                    ,HIT
                    ,INDEX_ROW
                    FROM 
                    $gup

               ";
        //echo $sqlJb; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

    }





    public function ins_material_cost()
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');
        //echo $table; exit;
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $this->JB = $this->load->database('jeaw_db', true);
        $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
        $part_project = $_SERVER['DOCUMENT_ROOT']."/report_access";
        $up_by = $this->session->userdata('sessUsr');
        $table = 'ROYALTY_MATERIAL_COST';
        //$excJb = $this->JB->query("TRUNCATE $table");
        //var_dump($data_sm); exit;

          $fn = fopen($part_project . "/file_price_mat/material_cost.csv","r");
          $result = array();
          $str = fgetcsv($fn);
          while( !feof($fn) ) 
          {

            
            $str = fgetcsv($fn);
            if( count($str) > 1 )
            array_push( $result, $str ) ;
            //echo  fgets($fn);
          } 


         //var_dump(  $result ); exit;
          fclose($fn);
          //exit;
        $sqlJb = "";

              foreach ($result as $value) 
              {
                  // echo strpos( $value[1] ,"(" ) . "<br>"; exit;
                  // echo strstr( $value[1], '(sd' );

                  if(strpos( $value[1] ,"(" ) == '')
                  {
                      $value[1] = $value[1] ;
                  }else{
                      $value[1] =  substr( $value[1], 0, strpos( $value[1] ,"(" ) ) ;
                  }
                    
                  $value[0] = trim($value[0]);
                  $value[1] = trim($value[1]);
                  $value[2] = trim($value[2]);
                  $value[3] = trim($value[3]);
                  $value[4] = trim($value[4]);  

                  $sqlJb = "SELECT ITEM_NO, PRICE FROM $table  WHERE ITEM_NO = '{$value[1]}' "    ;

                  //echo $sqlJb; exit;
                  $excJb = $this->JB->query($sqlJb);
                  $recJb = $excJb->result_array();

                if( count($recJb) > 0 )
                {

                 
                  if ( $value[4] != $recJb[0]["PRICE"] ) 
                  {

                    $item = $value[1] ; 

                      $login_dat = array(
                          'PRICE'       => $value[4],
                          'UPDATE_DATE' => $date_cur,
                          'UPDATE_BY'   => $up_by
                      );
                      $this->JB->where('ITEM_NO',  $item);
                      $this->JB->update( $table, $login_dat); 

                    # code...
                  }else{ echo($recJb[0]["PRICE"] . "<br>"); }

                }else{

        
                      $new_sqlJb = "INSERT INTO $table (CUST_ANAME,ITEM_NO,ITEM_NAME,MODEL,PRICE, UPDATE_DATE, UPDATE_BY) 
                              VALUES (
                                        '{$value[0]}',
                                        '{$value[1]}',
                                        '{$value[2]}',
                                        '{$value[3]}',
                                        '{$value[4]}',
                                        '$date_cur',
                                        '$up_by'
                                     )" ;
                      $excJb = $this->JB->query($new_sqlJb);
                }
              }
 //exit;
       // exit;
    }
    public function ins_boi_temp()
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');
        //echo $table; exit;
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $this->JB = $this->load->database('jeaw_db', true);

        $this->FN = $this->load->database('fin_db', true);
        $sq_boi = "SELECT * FROM sys_boi where boi_cd not in ('BOI-08' ,'BOI-02')";          
        $excFn = $this->FN->query($sq_boi);
        $recFn = $excFn->result_array();


        $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
        $up_by = $this->session->userdata('sessUsr');

        $table = 'ROYALTY_BOI';



        $excJb = $this->JB->query("TRUNCATE $table");
        //var_dump($data_sm); exit;





        $sqlJb = "";
        foreach ($recFn as $value) 
        {
                    
            $sqlJb = "INSERT INTO $table (ITEM_NO, ITEM_NAME, BOI_CD, BOI_NAME, UPDATE_DATE, UPDATE_BY) 
                      VALUES (
                                '{$value['item_no']}',
                                '{$value['item_name']}',
                                '{$value['boi_cd']}',
                                '{$value['boi_name']}',
                                '$date_cur',
                                '$up_by'                          
                             )" ;
            $excJb = $this->JB->query($sqlJb);
        }
    }


    public function tbk_rm()
    {
              $tz_object = new DateTimeZone('+0700');
              //date_default_timezone_set('Brazil/East');
              //echo $table; exit;
              $datetime = new DateTime();
              $datetime->setTimezone($tz_object);


              $this->EX = $this->load->database('another_db', true);
              $this->JB = $this->load->database('jeaw_db', true);
              $table = 'ROYALTY_TBK_RM';


              $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
                $sqlJb = "SELECT
                              MS.SOURCE_NAME
                            , MS.SOURCE_CD
                            , MS.ITEM_CD 
                            , UC.UNIT_COST
                            , VC.CUR_CD
                            FROM
                             ( SELECT * FROM M_SOURCE WHERE SOURCE_CD = 'T00100' AND EFF_PHASE_OUT_DATE >= SYSDATE ) MS
                            ,( SELECT * FROM M_PUCH_UNIT_COST WHERE VEND_CD = 'T00100' AND ( EFF_PHASE_OUT_DATE >= SYSDATE OR EFF_PHASE_OUT_DATE  IS NULL ) ) UC
                            , M_VEND_CTRL VC
                            WHERE
                              MS.ITEM_CD = UC.ITEM_CD(+)
                            AND MS.SOURCE_CD = VC.VEND_CD(+)

                            ORDER BY 1
                          ";
                $excJb = $this->EX->query($sqlJb);
                $recJb = $excJb->result_array();          

        $excJb = $this->JB->query("TRUNCATE $table");
        //var_dump($data_sm); exit;
        //$ind_tb = $this->JB->query(" SELECT IND FROM $table WHERE `CODE` = '$up_data[0]' GROUP BY IND");
        //$recJb = $ind_tb->result_array();
        //var_dump( $recJb); exit();
        $sqlJb = "";
          foreach ( $recJb as $key => $value ) 
          {  
            $sqlJb = "INSERT INTO $table (SOURCE_NAME, SOURCE_CD, ITEM_CD, UNIT_COST, CUR_CD, UPDATE_DATE) 
                      VALUES (
                                '{$value['SOURCE_NAME']}',
                                '{$value['SOURCE_CD']}',
                                '{$value['ITEM_CD']}',
                                '{$value['UNIT_COST']}',
                                '{$value['CUR_CD']}',
                                '$date_cur'                            
                             )" ;
            $excJb = $this->JB->query($sqlJb);
          }

    }












    public function rep_royalty_sm($up)
    {
        $tz_object = new DateTimeZone('+0700');
        //date_default_timezone_set('Brazil/East');
        //echo $table; exit;
        $datetime = new DateTime();
        $datetime->setTimezone($tz_object);
        $this->JB = $this->load->database('jeaw_db', true);
        $date_cur = $datetime->format('Y\-m\-d\ H:i:s');
        $boi_show = array("sm" => "--", "bh" => "--", "imct" => "--", "igce" => "--", "pcl" => "--");
        $non_show = "";
        $table_temp= "";
        $table_master = "";

            switch ($up) {
                case "sm":
                    $boi_show["sm"] = "";
                    $table_temp= "ROYALTY_SM_TEMP";
                    $table_master = "ROYALTY_SM";

                    //echo $table_master . "#" . $table_temp . " -> " . $up;
                    break;
                case "bh":
                    $boi_show["bh"] = "";
                    $table_temp= "ROYALTY_SM_TEMP_BH";
                    $table_master = "ROYALTY_SM_BH";

                    //echo $boi_show["bh"] . " -> " . $up;
                    break;
                case "imct":
                    $boi_show["imct"] = "";
                    $table_temp= "ROYALTY_SM_TEMP_BRAKE_IMCT";
                    $table_master = "ROYALTY_SM_BRAKE_IMCT";

                    //echo $table_master . "#" . $table_temp . " -> " . $up;
                    break;
                case "igce":
                    $boi_show["igce"] = "";
                    $table_temp= "ROYALTY_SM_TEMP_BRAKE_IGCE";
                    $table_master = "ROYALTY_SM_BRAKE_IGCE";

                    //echo $table_master . "#" . $table_temp . " -> " . $up;
                    break;
                case "pcl":
                    $non_show = "--";
                    $table_temp= "ROYALTY_SM_TEMP_PCL";
                    $table_master = "ROYALTY_SM_PCL";

                    //echo $table_master . "#" . $table_temp . " -> " . $up;
                    break;                                        
            }


//exit;
            $sqlJb = "";         
            $sqlJb = "SELECT
                         SM.`CODE` 
                        ,ST.PART_ITEM_CUST PART_NO
                        ,ST.PART_NAME PART_NAME
                        ,SM.MODEL
                        ,ST.PRICE
                        ,ST.QTY
                        ,ST.AMOUNT
                        ,NULL AS FORMULA1
                        ,IFNULL(RC.PRICE,0) AS MATERIAL_COST 
                        ,NULL AS FORMULA3
                        ,NULL AS FORMULA4
                        ,SM.TBK
                        ,SM.HIT
                         ,NULL FORMULA5
                         ,NULL FORMULA6
                         ,NULL FORMULA7
                         ,NULL FORMULA8
     {$boi_show["igce"]} ,CASE WHEN RB.BOI_CD = 'BOI-11' THEN '#' END AS 'BOI-2453'
      $non_show          ,CASE WHEN RB.BOI_CD LIKE 'N%'  THEN '#' END AS 'NON-BOI'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-01' THEN '#' END AS 'BOI-1473'
     {$boi_show["bh"]}   ,CASE WHEN ST.BOI    = 'BOI-02' THEN '#' END AS 'BOI-1260'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-03' THEN '#' END AS 'BOI-2138'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-04' THEN '#' END AS 'BOI-2555'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-05' THEN '#' END AS 'BOI-1833'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-10' THEN '#' END AS 'BOI-1458'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-06' THEN '#' END AS 'BOI-1834'
     {$boi_show["sm"]}   ,CASE WHEN RB.BOI_CD = 'BOI-09' THEN '#' END AS 'BOI-2495'
     {$boi_show["imct"]} ,CASE WHEN RB.BOI_CD = 'BOI-07' THEN '#' END AS 'BOI-2453'
     {$boi_show["bh"]}   ,CASE WHEN ST.BOI    = 'BOI-08' THEN '#' END AS 'BOI-2198'
                              
                        ,RB.BOI_CD 
                        ,RB.BOI_NAME


                        FROM

                        $table_temp ST

                        LEFT OUTER JOIN 

                        $table_master SM

                        ON ST.PART_ITEM_CUST = SM.PART_NO OR ST.PART_ITEM = SM.PART_NO

                        LEFT OUTER JOIN 

                        ROYALTY_MATERIAL_COST RC

                        ON ST.PART_ITEM_CUST = RC.ITEM_NO OR ST.PART_ITEM = RC.ITEM_NO

                        LEFT OUTER JOIN

                        ROYALTY_BOI RB

                        ON ST.PART_ITEM = RB.ITEM_NO

                        ORDER BY SM.IND, 2
                        " ;
            $excJb = $this->JB->query($sqlJb);
            $recJb = $excJb->result_array();

            return $recJb;
            //var_dump($recJb); exit;
    }
 
public function summary_cost_rm($table)
{
    $this->JB = $this->load->database('jeaw_db', true);
    $sqlJb = "
              SELECT
               RI.PART_ITEM
              ,BC.PARENT_ITEM
              ,BC.COMP_ITEM
              ,BC.SOURCE_NAME
              ,BC.UNIT_COST
              ,BC.UNIT_USE
              ,BC.SUM_COST
              ,BC.RATE_TOTAL
              FROM 

              $table RI

              LEFT OUTER JOIN

              (SELECT RM.SOURCE_NAME, BC.REF, BC.PARENT_ITEM, BC.COMP_ITEM, BC.UNIT_USE, BC.UNIT, RM.UNIT_COST, RM.CUR_CD, (BC.UNIT_USE * RM.UNIT_COST) SUM_COST, ROUND(RM.UNIT_COST * 0.300687089, 2) MUL_RATE, ROUND( ROUND(RM.UNIT_COST * 0.300687089,2) * BC.UNIT_USE, 2) RATE_TOTAL   FROM BOM_COMP BC LEFT OUTER JOIN ROYALTY_TBK_RM RM ON BC.COMP_ITEM = RM.ITEM_CD WHERE RM.SOURCE_CD = 'T00100') BC

              ON RI.PART_ITEM = BC.REF 


              UNION ALL


              SELECT
               RI.PART_ITEM
              ,NULL PARENT_ITEM
              ,NULL COMP_ITEM
              ,NULL SOURCE_NAME
              ,SUM(BC.UNIT_COST) UNIT_COST
              ,SUM(BC.UNIT_USE) UNIT_USE
              ,SUM(BC.SUM_COST) SUM_COST
              ,SUM(BC.RATE_TOTAL) RATE_TOTAL 
              FROM 

              $table RI

              LEFT OUTER JOIN

              (SELECT RM.SOURCE_NAME, BC.REF, BC.PARENT_ITEM, BC.COMP_ITEM, BC.UNIT_USE, BC.UNIT, RM.UNIT_COST, RM.CUR_CD, (BC.UNIT_USE * RM.UNIT_COST) SUM_COST, ROUND(RM.UNIT_COST * 0.300687089, 2) MUL_RATE, ROUND( ROUND(RM.UNIT_COST * 0.300687089,2) * BC.UNIT_USE, 2) RATE_TOTAL   FROM BOM_COMP BC LEFT OUTER JOIN ROYALTY_TBK_RM RM ON BC.COMP_ITEM = RM.ITEM_CD WHERE RM.SOURCE_CD = 'T00100') BC

              ON RI.PART_ITEM = BC.REF 

              GROUP BY RI.PART_ITEM


              ORDER BY 1, 2 DESC
-- WHERE RM.SOURCE_CD = 'T00100'
    ";

                $excJb = $this->JB->query($sqlJb);
                $recJb = $excJb->result_array();   
    return $recJb;
}
public function tbk_cost_rm_bk()
{
    $this->JB = $this->load->database('jeaw_db', true);
    $sqlJb = "
              SELECT
               RI.PART_ITEM
              ,SI.PART_NAME
              ,SI.CODE
              ,SI.MODEL
              ,BC.SOURCE_NAME
              ,SUM(BC.UNIT_COST) UNIT_COST
              ,BC.CUR_CD
              ,SUM(BC.UNIT_USE) UNIT_USE
              ,BC.UNIT
              ,0.300687089 RATE
              ,SUM(BC.SUM_COST) SUM_COST
              ,SUM(BC.RATE_TOTAL) RATE_TOTAL 
              FROM 

              ROYALTY_SM_TEMP_BRAKE_IMCT RI

              LEFT OUTER JOIN

              (SELECT RM.SOURCE_NAME, BC.REF, BC.PARENT_ITEM, BC.COMP_ITEM, BC.UNIT_USE, BC.UNIT, RM.UNIT_COST, RM.CUR_CD, (BC.UNIT_USE * RM.UNIT_COST) SUM_COST, ROUND(RM.UNIT_COST * 0.300687089, 2) MUL_RATE, ROUND( ROUND(RM.UNIT_COST * 0.300687089,2) * BC.UNIT_USE, 2) RATE_TOTAL   FROM BOM_COMP BC LEFT OUTER JOIN ROYALTY_TBK_RM RM ON BC.COMP_ITEM = RM.ITEM_CD WHERE RM.SOURCE_CD = 'T00100') BC

              ON RI.PART_ITEM = BC.REF 
          
              LEFT OUTER JOIN 

              ROYALTY_SM_BRAKE_IMCT SI

              ON RI.PART_ITEM = SI.PART_NO OR RI.PART_ITEM_CUST = SI.PART_NO
              WHERE NOT ISNULL( BC.SOURCE_NAME )
              GROUP BY 
               RI.PART_ITEM
              ,SI.PART_NAME
              ,SI.MODEL
              ,BC.SOURCE_NAME
              ,SI.CODE
              ,BC.UNIT
              ,BC.CUR_CD

              UNION ALL

              SELECT
               RI.PART_ITEM
              ,SI.PART_NAME
              ,SI.CODE
              ,SI.MODEL
              ,BC.SOURCE_NAME
              ,SUM(BC.UNIT_COST) UNIT_COST
              ,BC.CUR_CD
              ,SUM(BC.UNIT_USE) UNIT_USE
              ,BC.UNIT
              ,0.300687089 RATE
              ,SUM(BC.SUM_COST) SUM_COST
              ,SUM(BC.RATE_TOTAL) RATE_TOTAL 
              FROM 

              ROYALTY_SM_TEMP_BRAKE_IGCE RI

              LEFT OUTER JOIN

              (SELECT RM.SOURCE_NAME, BC.REF, BC.PARENT_ITEM, BC.COMP_ITEM, BC.UNIT_USE, BC.UNIT, RM.UNIT_COST, RM.CUR_CD, (BC.UNIT_USE * RM.UNIT_COST) SUM_COST, ROUND(RM.UNIT_COST * 0.300687089, 2) MUL_RATE, ROUND( ROUND(RM.UNIT_COST * 0.300687089,2) * BC.UNIT_USE, 2) RATE_TOTAL   FROM BOM_COMP BC LEFT OUTER JOIN ROYALTY_TBK_RM RM ON BC.COMP_ITEM = RM.ITEM_CD WHERE RM.SOURCE_CD = 'T00100') BC

              ON RI.PART_ITEM = BC.REF 
          
              LEFT OUTER JOIN 

              ROYALTY_SM_BRAKE_IGCE SI

              ON RI.PART_ITEM = SI.PART_NO OR RI.PART_ITEM_CUST = SI.PART_NO
              WHERE NOT ISNULL( BC.SOURCE_NAME )
              GROUP BY 
               RI.PART_ITEM
              ,SI.PART_NAME
              ,SI.MODEL
              ,BC.SOURCE_NAME
              ,SI.CODE
              ,BC.UNIT
              ,BC.CUR_CD
            
            ORDER BY 3, 1 DESC
-- WHERE RM.SOURCE_CD = 'T00100'
    ";

                $excJb = $this->JB->query($sqlJb);
                $recJb = $excJb->result_array();   
    return $recJb;
}
public function tbk_cost_rm_sm()
{
    $this->JB = $this->load->database('jeaw_db', true);
    $sqlJb = "
              SELECT
               RI.PART_ITEM
              ,SI.PART_NAME
              ,SI.CODE
              ,SI.MODEL
              ,BC.SOURCE_NAME
              ,SUM(BC.UNIT_COST) UNIT_COST
              ,BC.CUR_CD
              ,SUM(BC.UNIT_USE) UNIT_USE
              ,BC.UNIT
              ,0.300687089 RATE
              ,SUM(BC.SUM_COST) SUM_COST
              ,SUM(BC.RATE_TOTAL) RATE_TOTAL 
              FROM 

              ROYALTY_SM_TEMP RI

              LEFT OUTER JOIN

              (SELECT RM.SOURCE_NAME, BC.REF, BC.PARENT_ITEM, BC.COMP_ITEM, BC.UNIT_USE, BC.UNIT, RM.UNIT_COST, RM.CUR_CD, (BC.UNIT_USE * RM.UNIT_COST) SUM_COST, ROUND(RM.UNIT_COST * 0.300687089, 2) MUL_RATE, ROUND( ROUND(RM.UNIT_COST * 0.300687089,2) * BC.UNIT_USE, 2) RATE_TOTAL   FROM BOM_COMP BC LEFT OUTER JOIN ROYALTY_TBK_RM RM ON BC.COMP_ITEM = RM.ITEM_CD WHERE RM.SOURCE_CD = 'T00100') BC

              ON RI.PART_ITEM = BC.REF 
          
              LEFT OUTER JOIN 

              ROYALTY_SM SI

              ON RI.PART_ITEM = SI.PART_NO OR RI.PART_ITEM_CUST = SI.PART_NO
              WHERE NOT ISNULL( BC.SOURCE_NAME )
              GROUP BY 
               RI.PART_ITEM
              ,SI.PART_NAME
              ,SI.MODEL
              ,BC.SOURCE_NAME
              ,SI.CODE
              ,BC.UNIT
              ,BC.CUR_CD
            
            ORDER BY 3, 1 DESC
-- WHERE RM.SOURCE_CD = 'T00100'
    ";
                $excJb = $this->JB->query($sqlJb);
                $recJb = $excJb->result_array();   
    return $recJb;
}


    
}
?> 
