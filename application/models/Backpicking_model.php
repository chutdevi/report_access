<?php
class Backpicking_model extends CI_Model 
{

    public function get_select_Namecust($picking_value, $delivery_date)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
        $group_by = ( strlen($picking_value) > 20 ) ? "CS.CUST_NAME, CASE WHEN CS.CUST_ANAME = 'MEC-Free zone' OR CS.CUST_ANAME = 'MEC-SUPPLEMENT Free Zone' THEN 'MEC-SUM' WHEN CS.CUST_ANAME = 'IEMT' OR CS.CUST_ANAME = 'IEMT-LLC' OR CS.CUST_ANAME = 'IEMT-KD'   THEN 'IEMT-SUM' WHEN CS.CUST_ANAME = 'SKC-500' OR CS.CUST_ANAME = 'SKC-200'  THEN 'SKC-SUM' ELSE CS.CUST_ANAME END"
                                                     : $picking_value;  
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " SELECT 
                          $picking_value
                         FROM
                            (SELECT 
                            CUST_CD, 
                            CUST_ITEM_CD, 
                            CUST_ITEM_NAME, 
                            ITEM_CD, 
                            CASE WHEN CUST_CD IN ('T00100', 'T10200', 'T10600', 'T10300') THEN STNDRD_RCV_DESINATED_DLV_DATE ELSE DESINATED_DLV_DATE END DESINATED_DLV_DATE,
                            ODR_QTY, 
                            TOTAL_SHIP_QTY, 
                            DEL_FLG 
                            FROM 
                            T_ODR) TR, 

                          M_CUST CS,
                          M_PLANT_ITEM IT,
                          M_ITEM ITT

                          WHERE
                          TR.ITEM_CD = IT.ITEM_CD (+)
                          AND TR.ITEM_CD = ITT.ITEM_CD (+)
                          AND TR.CUST_CD = CS.CUST_CD (+)
                          AND TO_CHAR(TR.DESINATED_DLV_DATE,'YYYY/MM/DD') =  '$delivery_date' 
                          GROUP BY  
                          $group_by                        
                          ORDER BY 1   
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();


        //var_dump($recEx); //exit;
        return $recEx;

    }

    public function get_select_item_all()
    {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $sqlJb = " SELECT ITEM_CD FROM FLUCTUATION_ORDER GROUP BY ITEM_CD   "; 
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
        //$this->exp = $this->load->database('exp_db', TRUE);

        $comment = ($limit == 0) ? "--" : "";

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";

    
        $sqlJb = "  
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
                    ,QTY
                    ,SHIP_QTY
                    FROM 

                    FLUCTUATION_ORDER 

                    WHERE 
                    $cust AND
                    $item AND
                    IND BETWEEN '$date_st' AND '$date_en'    

           $comment ORDER BY IND LIMIT $limit
                ";
        //echo $sqlJb; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

    }
    public function get_chart_data($date_st, $date_en, $cust, $item, $limit=1000)
    {
        $this->JB = $this->load->database('jeaw_db', true);

        $dt = date('m',strtotime($date_st));
        //$this->exp = $this->load->database('exp_db', TRUE);

        $comment = ($limit == 0) ? "--" : "";

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";

    
        $sqlJb = "  
                     SELECT 
                     IND DATE_COLLECT
                    ,ITEM_CD
                    ,IFNULL(SUM(CASE WHEN MT = DATE_FORMAT(CURDATE() + INTERVAL 0 MONTH,'%m') THEN QTY END),0)  QTY_M1
                    ,IFNULL(SUM(CASE WHEN MT = DATE_FORMAT(CURDATE() + INTERVAL 1 MONTH,'%m') THEN QTY END),0)  QTY_M2
                    ,IFNULL(SUM(CASE WHEN MT = DATE_FORMAT(CURDATE() + INTERVAL 2 MONTH,'%m') THEN QTY END),0)  QTY_M3
                    ,IFNULL(SUM(CASE WHEN MT = DATE_FORMAT(CURDATE() + INTERVAL 3 MONTH,'%m') THEN QTY END),0)  QTY_M4
                    ,IFNULL(SUM(CASE WHEN MT = DATE_FORMAT(CURDATE() + INTERVAL 4 MONTH,'%m') THEN QTY END),0)  QTY_M5
                    FROM 

                    FLUCTUATION_ORDER 

                    WHERE 
                    $cust AND
                    $item AND
                    IND BETWEEN '$date_st' AND '$date_en' 
                    AND MT >= DATE_FORMAT(IND,'%m')   
                    GROUP BY
                     IND 
                    ,ITEM_CD
    
                ";
        //echo $sqlJb; exit;
        $excJb = $this->JB->query($sqlJb);
        $recJb = $excJb->result_array();


        //var_dump($recJb); exit;
        return $recJb;

    }
    
}
?> 
