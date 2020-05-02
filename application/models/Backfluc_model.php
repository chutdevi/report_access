<?php
class Backfluc_model extends CI_Model 
{

    public function get_select_cust()
    {
        $this->JB = $this->load->database('jeaw_db', true);
        //$this->exp = $this->load->database('exp_db', TRUE);

       // $sqlExp = "SELECT MENU_NAME FROM menu_mst GROUP BY MENU_NAME ORDER BY MENU_CD ";
        $sqlJb = " SELECT CUST_CD FROM FLUCTUATION_ORDER GROUP BY CUST_CD   "; 
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
                    -- SHIP_QTY = 0 AND
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
                    --AND SHIP_QTY = 0
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
