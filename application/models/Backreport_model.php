<?php
class Backreport_model extends CI_Model 
{

    public function d_pur_report($picking_start, $picking_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " 
                SELECT 
                        TP.INSPC_ACPT_DATE,
                        TP.INVOICE_NO,
                        TP.PUCH_ODR_CD,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        TP.ITEM_CD,
                        TP.ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) QTY,
                        TP.STOCK_UNIT UNIT,
                        TP.UNIT_COST PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) PRICE_TOTAL,
                        NULL VAT,
                        NULL TOTAL_VAT,
                        VC.CUR_CD
                FROM  
                    T_PAST_INSPC_ACPT TP,
                    M_VEND_CTRL VC

                WHERE 

                     TP.VEND_CD = VC.VEND_CD(+)
                     AND TP.INVOICE_NO <> '-'  
                     AND (NOT(TP.VEND_CD  LIKE 'T%' OR TP.VEND_CD LIKE 'M%') OR (TP.VEND_CD = 'T10100' OR TP.VEND_CD = 'T11200' OR TP.VEND_CD = 'T11300'))
                     AND TO_CHAR(TP.INSPC_ACPT_DATE , 'YYYY/MM/DD') BETWEEN '$picking_start' AND '$picking_stop'
                GROUP BY
                     TP.INSPC_ACPT_DATE,
                     TP.INVOICE_NO,
                     TP.PUCH_ODR_CD,
                     TP.VEND_CD,
                     VC.VEND_NAME,
                     TP.ITEM_CD,
                     TP.ITEM_NAME,
                     TP.STOCK_UNIT,
                     TP.UNIT_COST,
                     VC.CUR_CD    
                  
                UNION ALL

                SELECT 
                        NULL INSPC_ACPT_DATE,
                        TP.INVOICE_NO,
                        NULL PUCH_ODR_CD,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        NULL ITEM_CD,
                        NULL ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) QTY,
                        TP.STOCK_UNIT UNIT,
                        NULL PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) PRICE_TOTAL ,
                        ROUND( SUM(TP.INSPC_ACPT_QTY) /7 ,2)*100 VAT,
                        (ROUND( SUM(TP.INSPC_ACPT_QTY) /7 ,2)*100) + SUM(TP.INSPC_ACPT_AMOUNT) TOTAL_VAT,
                        VC.CUR_CD
                FROM  
                        T_PAST_INSPC_ACPT TP,
                        M_VEND_CTRL VC

                WHERE 

                     TP.VEND_CD = VC.VEND_CD(+)
                     AND TP.INVOICE_NO <> '-' 
                     AND (NOT(TP.VEND_CD  LIKE 'T%' OR TP.VEND_CD LIKE 'M%') OR (TP.VEND_CD = 'T10100' OR TP.VEND_CD = 'T11200' OR TP.VEND_CD = 'T11300'))
                     AND TO_CHAR(TP.INSPC_ACPT_DATE , 'YYYY/MM/DD') BETWEEN '$picking_start' AND '$picking_stop'      
                 

                GROUP BY
                        TP.INVOICE_NO,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        TP.STOCK_UNIT,
                        VC.CUR_CD
                  
                UNION ALL

                SELECT 
                        NULL INSPC_ACPT_DATE,
                        NULL INVOICE_NO,
                        NULL PUCH_ODR_CD,
                        NULL VEND_CD,
                        TP.VEND_NAME,
                        NULL ITEM_CD,
                        NULL ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) QTY,
                        TP.STOCK_UNIT UNIT,
                        NULL PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) PRICE_TOTAL ,
                        ROUND( SUM(TP.INSPC_ACPT_QTY) /7 ,2)*100  VAT,
                         (ROUND( SUM(TP.INSPC_ACPT_QTY) /7 ,2)*100) + SUM(TP.INSPC_ACPT_AMOUNT) TOTAL_VAT,
                        TP.CUR_CD
                FROM  
                   (
                    SELECT 
                        NULL INSPC_ACPT_DATE,
                        TP.INVOICE_NO,
                        NULL PUCH_ODR_CD,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        NULL ITEM_CD,
                        NULL ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) INSPC_ACPT_QTY,
                        TP.STOCK_UNIT,
                        NULL PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) INSPC_ACPT_AMOUNT ,
                        ROUND( SUM(TP.INSPC_ACPT_QTY) /7 ,2)*100 VAT,
                        (ROUND( SUM(TP.INSPC_ACPT_QTY) /7 ,2)*100) + SUM(TP.INSPC_ACPT_AMOUNT) TOTAL_VAT,
                        VC.CUR_CD
                    FROM  
                        T_PAST_INSPC_ACPT TP,
                        M_VEND_CTRL VC

                    WHERE 

                        TP.VEND_CD = VC.VEND_CD(+)
                        AND TP.INVOICE_NO <> '-' 
                        AND (NOT(TP.VEND_CD  LIKE 'T%' OR TP.VEND_CD LIKE 'M%') OR (TP.VEND_CD = 'T10100' OR TP.VEND_CD = 'T11200' OR TP.VEND_CD = 'T11300'))
                        AND TO_CHAR(TP.INSPC_ACPT_DATE , 'YYYY/MM/DD') BETWEEN '$picking_start' AND '$picking_stop'      
                 

                    GROUP BY
                        TP.INVOICE_NO,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        TP.STOCK_UNIT,
                        VC.CUR_CD
                    ) TP
                    

                GROUP BY
                        TP.VEND_NAME,
                        TP.STOCK_UNIT,
                        TP.CUR_CD      
                  
                ORDER BY 5,2,1
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();


        //var_dump($recEx); //exit;
        return $recEx;

    }

    public function o_pur_report($picking_start, $picking_stop)
    {
        $this->EX = $this->load->database('another_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);
       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD "; 
        $sqlEx = " 
                SELECT 
                        TP.INSPC_ACPT_DATE,
                        TP.INVOICE_NO,
                        TP.PUCH_ODR_CD,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        TP.ITEM_CD,
                        TP.ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) QTY,
                        TP.STOCK_UNIT UNIT,
                        TP.UNIT_COST PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) PRICE_TOTAL,
                        NULL VAT,
                        NULL TOTAL_VAT,
                        VC.CUR_CD
                FROM  
                    T_PAST_INSPC_ACPT TP,
                    M_VEND_CTRL VC

                WHERE 

                     TP.VEND_CD = VC.VEND_CD(+)
                     AND TP.INVOICE_NO <> '-'  
                     AND ((TP.VEND_CD  LIKE 'T%' OR TP.VEND_CD LIKE 'M%') AND NOT(TP.VEND_CD = 'T10100' OR TP.VEND_CD = 'T11200' OR TP.VEND_CD = 'T11300'))
                     AND TO_CHAR(TP.INSPC_ACPT_DATE , 'YYYY/MM/DD') BETWEEN '$picking_start' AND '$picking_stop'
                GROUP BY
                     TP.INSPC_ACPT_DATE,
                     TP.INVOICE_NO,
                     TP.PUCH_ODR_CD,
                     TP.VEND_CD,
                     VC.VEND_NAME,
                     TP.ITEM_CD,
                     TP.ITEM_NAME,
                     TP.STOCK_UNIT,
                     TP.UNIT_COST,
                     VC.CUR_CD    
                  
                UNION ALL

                SELECT 
                        NULL INSPC_ACPT_DATE,
                        TP.INVOICE_NO,
                        NULL PUCH_ODR_CD,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        NULL ITEM_CD,
                        NULL ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) QTY,
                        TP.STOCK_UNIT UNIT,
                        NULL PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) PRICE_TOTAL ,
                        0 VAT,
                        0 + SUM(TP.INSPC_ACPT_AMOUNT) TOTAL_VAT,
                        VC.CUR_CD
                FROM  
                        T_PAST_INSPC_ACPT TP,
                        M_VEND_CTRL VC

                WHERE 

                     TP.VEND_CD = VC.VEND_CD(+)
                     AND TP.INVOICE_NO <> '-' 
                     AND ((TP.VEND_CD  LIKE 'T%' OR TP.VEND_CD LIKE 'M%') AND NOT(TP.VEND_CD = 'T10100' OR TP.VEND_CD = 'T11200' OR TP.VEND_CD = 'T11300'))
                     AND TO_CHAR(TP.INSPC_ACPT_DATE , 'YYYY/MM/DD') BETWEEN '$picking_start' AND '$picking_stop'      
                 

                GROUP BY
                        TP.INVOICE_NO,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        TP.STOCK_UNIT,
                        VC.CUR_CD
                  
                UNION ALL

                SELECT 
                        NULL INSPC_ACPT_DATE,
                        NULL INVOICE_NO,
                        NULL PUCH_ODR_CD,
                        NULL VEND_CD,
                        TP.VEND_NAME,
                        NULL ITEM_CD,
                        NULL ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) QTY,
                        TP.STOCK_UNIT UNIT,
                        NULL PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) PRICE_TOTAL ,
                        0  VAT,
                        0 + SUM(TP.INSPC_ACPT_AMOUNT) TOTAL_VAT,
                        TP.CUR_CD
                FROM  
                   (
                    SELECT 
                        NULL INSPC_ACPT_DATE,
                        TP.INVOICE_NO,
                        NULL PUCH_ODR_CD,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        NULL ITEM_CD,
                        NULL ITEM_NAME,
                        SUM(TP.INSPC_ACPT_QTY) INSPC_ACPT_QTY,
                        TP.STOCK_UNIT,
                        NULL PRICE,
                        SUM(TP.INSPC_ACPT_AMOUNT) INSPC_ACPT_AMOUNT ,
                        NULL VAT,
                        0 + SUM(TP.INSPC_ACPT_AMOUNT) TOTAL_VAT,
                        VC.CUR_CD
                    FROM  
                        T_PAST_INSPC_ACPT TP,
                        M_VEND_CTRL VC

                    WHERE 

                        TP.VEND_CD = VC.VEND_CD(+)
                        AND TP.INVOICE_NO <> '-' 
                        AND ((TP.VEND_CD  LIKE 'T%' OR TP.VEND_CD LIKE 'M%') AND NOT(TP.VEND_CD = 'T10100' OR TP.VEND_CD = 'T11200' OR TP.VEND_CD = 'T11300'))
                        AND TO_CHAR(TP.INSPC_ACPT_DATE , 'YYYY/MM/DD') BETWEEN '$picking_start' AND '$picking_stop'      
                 

                    GROUP BY
                        TP.INVOICE_NO,
                        TP.VEND_CD,
                        VC.VEND_NAME,
                        TP.STOCK_UNIT,
                        VC.CUR_CD
                    ) TP
                    

                GROUP BY
                        TP.VEND_NAME,
                        TP.STOCK_UNIT,
                        TP.CUR_CD      
                  
                ORDER BY 5,2,1
                 "; 
        $excEx = $this->EX->query($sqlEx);
        $recEx = $excEx->result_array();


        //var_dump($recEx); //exit;
        return $recEx;

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
